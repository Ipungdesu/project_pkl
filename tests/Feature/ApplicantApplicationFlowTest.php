<?php

namespace Tests\Feature;

use App\Models\ActivityLog;
use App\Models\Application;
use App\Models\JobOpening;
use App\Models\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Tests\Feature\Models\PostgresFeatureTestCase;

class ApplicantApplicationFlowTest extends PostgresFeatureTestCase
{
    public function test_profile_is_encrypted_and_duplicate_nik_is_rejected(): void
    {
        $firstApplicant = $this->createApplicant('karyawan', false);
        $secondApplicant = $this->createApplicant('karyawan', false);
        $nik = '3578001234567890';
        $phone = '081234567890';

        $this->actingAs($firstApplicant)
            ->put(route('applicant.profile.update'), $this->profilePayload($nik, $phone))
            ->assertRedirect(route('applicant.profile.edit'))
            ->assertSessionHasNoErrors();

        $storedProfile = DB::table('profiles')->where('user_id', $firstApplicant->getKey())->first();

        $this->assertNotSame($nik, $storedProfile->nik_encrypted);
        $this->assertNotSame($phone, $storedProfile->phone_encrypted);
        $this->assertSame(hash_hmac('sha256', $nik, config('app.key')), $storedProfile->nik_hash);
        $this->assertDatabaseHas('activity_logs', [
            'user_id' => $firstApplicant->getKey(),
            'category' => 'application',
            'action' => 'profile_updated',
            'entity_type' => 'profiles',
            'entity_id' => $storedProfile->id,
        ]);

        $this->actingAs($firstApplicant)
            ->get(route('applicant.profile.edit'))
            ->assertOk()
            ->assertSee('3578********7890')
            ->assertSee('0812****7890')
            ->assertDontSee($nik)
            ->assertDontSee($phone);

        $this->actingAs($secondApplicant)
            ->put(route('applicant.profile.update'), $this->profilePayload($nik, '081298765432'))
            ->assertSessionHasErrors('nik');

        $this->assertNull($secondApplicant->fresh()->profile);
    }

    public function test_magang_profile_saves_intern_details_while_karyawan_profile_does_not(): void
    {
        $intern = $this->createApplicant('magang', false);
        $employee = $this->createApplicant('karyawan', false);
        $internPayload = array_merge($this->profilePayload('3578001234567890', '081234567890'), [
            'university' => 'Universitas Contoh',
            'major' => 'Informatika',
            'student_id_number' => 'NIM-001',
            'semester' => 6,
        ]);

        $this->actingAs($intern)
            ->put(route('applicant.profile.update'), $internPayload)
            ->assertRedirect(route('applicant.profile.edit'))
            ->assertSessionHasNoErrors();

        $this->assertDatabaseHas('intern_details', [
            'user_id' => $intern->getKey(),
            'university' => 'Universitas Contoh',
            'major' => 'Informatika',
            'student_id_number' => 'NIM-001',
            'semester' => 6,
        ]);

        $this->actingAs($employee)
            ->put(route('applicant.profile.update'), $this->profilePayload('3578009876543210', '081298765432'))
            ->assertRedirect(route('applicant.profile.edit'))
            ->assertSessionHasNoErrors();

        $this->assertDatabaseMissing('intern_details', ['user_id' => $employee->getKey()]);
    }

    public function test_applicant_job_list_and_application_requirements_follow_the_user_role(): void
    {
        $intern = $this->createApplicant('magang');
        $employee = $this->createApplicant('karyawan');
        $internOpening = $this->createOpening('magang', 'Internship role opening');
        $employeeOpening = $this->createOpening('kerja', 'Employee role opening');
        $internApplication = $this->makeApplicationForApplicant($intern, $internOpening);
        $employeeApplication = $this->makeApplicationForApplicant($employee, $employeeOpening);

        $this->actingAs($intern)
            ->get(route('applicant.jobs.index'))
            ->assertOk()
            ->assertSee('Internship role opening')
            ->assertDontSee('Employee role opening');

        $this->actingAs($employee)
            ->get(route('applicant.jobs.index'))
            ->assertOk()
            ->assertSee('Employee role opening')
            ->assertDontSee('Internship role opening');

        $this->actingAs($intern)
            ->get(route('applicant.profile.edit'))
            ->assertSee('Universitas');

        $this->actingAs($employee)
            ->get(route('applicant.profile.edit'))
            ->assertDontSee('Universitas');

        $this->actingAs($intern)
            ->get(route('applicant.applications.show', $internApplication))
            ->assertSee('Transkrip');

        $this->actingAs($employee)
            ->get(route('applicant.applications.show', $employeeApplication))
            ->assertDontSee('Transkrip');
    }

    public function test_landing_page_displays_only_open_database_job_openings(): void
    {
        $openOpening = $this->createOpening('magang', 'Public internship opening');
        $this->createOpening('kerja', 'Expired public opening', [
            'deadline' => today()->subDay(),
        ]);
        $this->createOpening('kerja', 'Inactive public opening', [
            'is_active' => false,
        ]);

        $this->get(route('beranda'))
            ->assertOk()
            ->assertSee($openOpening->title)
            ->assertDontSee('Expired public opening')
            ->assertDontSee('Inactive public opening')
            ->assertSee(route('register'));
    }

    public function test_applicant_can_create_only_one_application_for_an_opening(): void
    {
        $applicant = $this->createApplicant('magang');
        $opening = $this->createOpening('magang', 'Open internship');

        $this->actingAs($applicant)
            ->post(route('applicant.jobs.apply', $opening))
            ->assertRedirect();

        $this->post(route('applicant.jobs.apply', $opening))
            ->assertRedirect(route('applicant.jobs.index'))
            ->assertSessionHas('error', 'Anda sudah pernah melamar lowongan ini.');

        $this->assertSame(
            1,
            Application::query()
                ->where('applicant_id', $applicant->getKey())
                ->where('job_opening_id', $opening->getKey())
                ->count(),
        );
    }

    public function test_applicant_must_complete_the_profile_before_applying(): void
    {
        $applicant = $this->createApplicant('magang', false);
        $opening = $this->createOpening('magang');

        $this->actingAs($applicant)
            ->post(route('applicant.jobs.apply', $opening))
            ->assertRedirect(route('applicant.profile.edit'))
            ->assertSessionHas('error', 'Lengkapi profil sebelum melamar lowongan.');

        $this->assertSame(0, $applicant->applications()->count());
    }

    public function test_expired_and_inactive_openings_cannot_be_applied_to(): void
    {
        $applicant = $this->createApplicant('magang');
        $expiredOpening = $this->createOpening('magang', 'Expired internship', [
            'deadline' => today()->subDay(),
        ]);
        $inactiveOpening = $this->createOpening('magang', 'Inactive internship', [
            'is_active' => false,
        ]);

        $this->actingAs($applicant)
            ->post(route('applicant.jobs.apply', $expiredOpening))
            ->assertRedirect(route('applicant.jobs.index'))
            ->assertSessionHas('error');

        $this->post(route('applicant.jobs.apply', $inactiveOpening))
            ->assertRedirect(route('applicant.jobs.index'))
            ->assertSessionHas('error');

        $this->assertSame(0, $applicant->applications()->count());
    }

    public function test_upload_rejects_an_unsupported_file_type(): void
    {
        Storage::fake('local');
        $applicant = $this->createApplicant('magang');
        $application = $this->makeApplicationForApplicant($applicant, $this->createOpening('magang'));

        $this->actingAs($applicant)
            ->post(route('applicant.applications.documents.store', $application), [
                'doc_type' => 'cv',
                'file' => UploadedFile::fake()->create('payload.txt', 10, 'text/plain'),
            ])
            ->assertSessionHasErrors('file');

        $this->assertDatabaseMissing('application_documents', [
            'application_id' => $application->getKey(),
            'doc_type' => 'cv',
        ]);
    }

    public function test_upload_rejects_a_file_larger_than_two_megabytes(): void
    {
        Storage::fake('local');
        $applicant = $this->createApplicant('magang');
        $application = $this->makeApplicationForApplicant($applicant, $this->createOpening('magang'));

        $this->actingAs($applicant)
            ->post(route('applicant.applications.documents.store', $application), [
                'doc_type' => 'cv',
                'file' => UploadedFile::fake()->create('cv.pdf', 2049, 'application/pdf'),
            ])
            ->assertSessionHasErrors('file');

        $this->assertDatabaseMissing('application_documents', [
            'application_id' => $application->getKey(),
            'doc_type' => 'cv',
        ]);
    }

    public function test_upload_uses_a_private_uuid_filename_and_records_activity(): void
    {
        Storage::fake('local');
        Storage::fake('public');
        $applicant = $this->createApplicant('magang');
        $application = $this->makeApplicationForApplicant($applicant, $this->createOpening('magang'));

        $this->actingAs($applicant)
            ->post(route('applicant.applications.documents.store', $application), [
                'doc_type' => 'cv',
                'file' => UploadedFile::fake()->create('curriculum-vitae.pdf', 100, 'application/pdf'),
            ])
            ->assertRedirect(route('applicant.applications.show', $application));

        $document = $application->documents()->where('doc_type', 'cv')->firstOrFail();
        $fileName = basename($document->file_path);

        $this->assertSame(1, preg_match(
            '/^[0-9a-f]{8}-[0-9a-f]{4}-[1-8][0-9a-f]{3}-[89ab][0-9a-f]{3}-[0-9a-f]{12}\.pdf$/i',
            $fileName,
        ));
        $this->assertTrue(Storage::disk('local')->exists($document->file_path));
        $this->assertFalse(Storage::disk('public')->exists($document->file_path));
        $this->assertDatabaseHas('activity_logs', [
            'category' => 'document',
            'action' => 'document_uploaded',
            'entity_type' => 'application_documents',
            'entity_id' => $document->getKey(),
        ]);
    }

    public function test_submission_requires_every_document_and_leaves_the_draft_unchanged(): void
    {
        $applicant = $this->createApplicant('magang');
        $application = $this->makeApplicationForApplicant($applicant, $this->createOpening('magang'));

        $this->actingAs($applicant)
            ->post(route('applicant.applications.submit', $application))
            ->assertSessionHasErrors('documents');

        $this->assertSame('draft', $application->fresh()->status);
        $this->assertDatabaseMissing('activity_logs', [
            'category' => 'application',
            'action' => 'application_submitted',
            'entity_id' => $application->getKey(),
        ]);
        $this->assertSame(
            0,
            $application->statusHistory()->where('to_status', 'submitted')->count(),
        );
    }

    public function test_submitting_a_complete_application_updates_status_history_and_activity_log(): void
    {
        Storage::fake('local');
        $applicant = $this->createApplicant('magang');
        $application = $this->makeApplicationForApplicant($applicant, $this->createOpening('magang'));

        foreach (['cv', 'ktp', 'transkrip'] as $docType) {
            $path = 'applications/'.$application->getKey().'/'.Str::uuid().'.pdf';
            Storage::disk('local')->put($path, '%PDF test document');
            $application->documents()->create([
                'doc_type' => $docType,
                'file_path' => $path,
                'original_name' => $docType.'.pdf',
            ]);
        }

        $this->actingAs($applicant)
            ->post(route('applicant.applications.submit', $application))
            ->assertRedirect(route('applicant.applications.show', $application));

        $application->refresh();
        $this->assertSame('submitted', $application->status);
        $this->assertNotNull($application->submitted_at);
        $this->assertSame(
            1,
            $application->statusHistory()
                ->where('from_status', 'draft')
                ->where('to_status', 'submitted')
                ->count(),
        );
        $this->assertSame(
            1,
            ActivityLog::query()
                ->where('category', 'application')
                ->where('action', 'application_submitted')
                ->where('entity_id', $application->getKey())
                ->count(),
        );
    }

    public function test_other_applicants_cannot_view_or_download_documents_but_admin_can_download(): void
    {
        Storage::fake('local');
        $owner = $this->createApplicant('magang');
        $otherApplicant = $this->createApplicant('karyawan');
        $admin = $this->createApplicant('admin', false);
        $application = $this->makeApplicationForApplicant($owner, $this->createOpening('magang'));
        $path = 'applications/'.$application->getKey().'/private-cv.pdf';
        Storage::disk('local')->put($path, '%PDF private content');
        $document = $application->documents()->create([
            'doc_type' => 'cv',
            'file_path' => $path,
            'original_name' => 'cv.pdf',
        ]);

        $this->actingAs($otherApplicant)
            ->get(route('applicant.applications.show', $application))
            ->assertForbidden();

        $this->get(route('application-documents.download', $document))
            ->assertForbidden();

        $this->actingAs($admin)
            ->get(route('application-documents.download', $document))
            ->assertDownload('cv.pdf');
    }

    public function test_submitted_applications_cannot_be_changed_or_have_documents_replaced(): void
    {
        Storage::fake('local');
        $applicant = $this->createApplicant('karyawan');
        $application = $this->makeApplicationForApplicant(
            $applicant,
            $this->createOpening('kerja'),
            'submitted',
        );

        $this->actingAs($applicant)
            ->post(route('applicant.applications.documents.store', $application), [
                'doc_type' => 'cv',
                'file' => UploadedFile::fake()->create('cv.pdf', 100, 'application/pdf'),
            ])
            ->assertForbidden();
    }

    /**
     * @return array<string, string|int>
     */
    private function profilePayload(string $nik, string $phone): array
    {
        return [
            'full_name' => 'Applicant Name',
            'nik' => $nik,
            'phone' => $phone,
            'birth_place' => 'Jakarta',
            'birth_date' => '2000-01-01',
            'address' => 'Jakarta',
            'last_education' => 'S1',
        ];
    }

    private function createApplicant(string $role, bool $withCompleteProfile = true): User
    {
        $user = User::factory()->create();
        $user->forceFill(['role' => $role, 'status' => 'active'])->save();

        if (! $withCompleteProfile) {
            return $user;
        }

        $user->profile()->create([
            'full_name' => 'Applicant '.$user->getKey(),
            'nik_encrypted' => '357800'.str_pad((string) $user->getKey(), 10, '0', STR_PAD_LEFT),
            'phone_encrypted' => '0812'.str_pad((string) $user->getKey(), 6, '0', STR_PAD_LEFT).'7890',
            'birth_place' => 'Jakarta',
            'birth_date' => '2000-01-01',
            'address' => 'Jakarta',
            'last_education' => 'S1',
        ]);

        if ($role === 'magang') {
            $user->internDetail()->create([
                'university' => 'Universitas Contoh',
                'major' => 'Informatika',
                'student_id_number' => (string) $user->getKey(),
                'semester' => 6,
            ]);
        }

        return $user;
    }

    /**
     * @param  array<string, mixed>  $attributes
     */
    private function createOpening(string $type, string $title = 'Applicant opening', array $attributes = []): JobOpening
    {
        return JobOpening::create(array_merge([
            'title' => $title,
            'type' => $type,
            'description' => 'Applicant test opening',
            'is_active' => true,
        ], $attributes));
    }

    private function makeApplicationForApplicant(
        User $applicant,
        JobOpening $opening,
        string $status = 'draft',
    ): Application {
        return Application::create([
            'applicant_id' => $applicant->getKey(),
            'job_opening_id' => $opening->getKey(),
            'status' => $status,
            'submitted_at' => $status === 'submitted' ? now() : null,
        ]);
    }
}
