<?php

namespace Tests\Feature\Admin;

use App\Models\Application;
use App\Models\ApplicationStatusHistory;
use App\Models\InternPlacement;
use App\Models\JobOpening;
use App\Models\User;
use Tests\Feature\Models\PostgresFeatureTestCase;

class AdminPanelTest extends PostgresFeatureTestCase
{
    public function test_admin_routes_are_forbidden_for_magangs_and_karyawans_but_allowed_for_admin_and_operator(): void
    {
        $admin = $this->userWithRole('admin');
        $admin->forceFill(['status' => 'active'])->save();
        $operator = $this->userWithRole('operator');
        $operator->forceFill(['status' => 'active'])->save();
        $jobOpening = $this->createJobOpening($admin, 'magang', 'Lowongan Admin');
        $magangApplicant = $this->createApplicantWithProfile('magang', '3578000000001001', '081234560001');
        $application = $this->createApplicationRecord($magangApplicant, $jobOpening, 'submitted');
        $placement = InternPlacement::create([
            'application_id' => $application->id,
            'status' => 'active',
        ]);

        $protectedGetRoutes = [
            route('admin.applications.index'),
            route('admin.applications.show', $application),
            route('admin.jobs.index'),
            route('admin.jobs.create'),
            route('admin.jobs.edit', $jobOpening),
            route('admin.employees.index'),
            route('admin.interns.index'),
            route('admin.interns.placements.edit', $placement),
            route('admin.dashboard'),
        ];

        foreach (['magang', 'karyawan'] as $role) {
            $user = $this->userWithRole($role);
            $user->forceFill(['status' => 'active'])->save();
            $this->actingAs($user);

            foreach ($protectedGetRoutes as $url) {
                $this->get($url)->assertForbidden();
            }
        }

        foreach ([$admin, $operator] as $panelUser) {
            $this->actingAs($panelUser);

            foreach ($protectedGetRoutes as $url) {
                $this->get($url)->assertOk();
            }
        }
    }

    public function test_draft_applications_are_not_listed_and_cannot_be_viewed(): void
    {
        $admin = $this->userWithRole('admin');
        $admin->forceFill(['status' => 'active'])->save();
        $draftJob = $this->createJobOpening($admin, 'magang', 'Lowongan Draft');
        $submittedJob = $this->createJobOpening($admin, 'magang', 'Lowongan Submitted');
        $applicant = $this->createApplicantWithProfile('magang', '3578000000001002', '081234560002');
        $draft = $this->createApplicationRecord($applicant, $draftJob, 'draft');
        $submitted = $this->createApplicationRecord($applicant, $submittedJob, 'submitted');

        $this->actingAs($admin);

        $this->get(route('admin.applications.index'))
            ->assertOk()
            ->assertViewHas('applications', function ($applications) use ($draft, $submitted) {
                return $applications->contains('id', $submitted->id)
                    && ! $applications->contains('id', $draft->id);
            });

        $this->get(route('admin.applications.show', $draft))->assertNotFound();
        $this->get(route('admin.applications.show', $submitted))->assertOk();
    }

    public function test_valid_and_invalid_status_transitions(): void
    {
        $admin = $this->userWithRole('admin');
        $admin->forceFill(['status' => 'active'])->save();
        $jobOpening = $this->createJobOpening($admin, 'magang', 'Lowongan Transisi');
        $applicant = $this->createApplicantWithProfile('magang', '3578000000001003', '081234560003');
        $application = $this->createApplicationRecord($applicant, $jobOpening, 'submitted');

        $this->actingAs($admin);

        $this->post(route('admin.applications.transition', $application), [
            'status' => 'in_review',
            'admin_note' => 'Mulai review',
        ])->assertRedirect(route('admin.applications.show', $application));

        $application->refresh();
        $this->assertSame('in_review', $application->status);

        $this->post(route('admin.applications.transition', $application), [
            'status' => 'interview',
        ])->assertRedirect(route('admin.applications.show', $application));
        $this->assertSame('interview', $application->fresh()->status);

        $invalidJobOpening = $this->createJobOpening($admin, 'magang', 'Lowongan Transisi Invalid');
        $invalidApplication = $this->createApplicationRecord($applicant, $invalidJobOpening, 'interview');
        $this->post(route('admin.applications.transition', $invalidApplication), [
            'status' => 'in_review',
        ])->assertSessionHasErrors('status');
        $this->assertSame('interview', $invalidApplication->fresh()->status);
    }

    public function test_accept_creates_intern_placement_for_magang_and_not_for_karyawan(): void
    {
        $admin = $this->userWithRole('admin');
        $admin->forceFill(['status' => 'active'])->save();
        $magangJob = $this->createJobOpening($admin, 'magang', 'Magang Accept');
        $magangApplicant = $this->createApplicantWithProfile('magang', '3578000000001004', '081234560004');
        $magangApplication = $this->createApplicationRecord($magangApplicant, $magangJob, 'submitted');

        $karyawanJob = $this->createJobOpening($admin, 'kerja', 'Kerja Accept');
        $karyawanApplicant = $this->createApplicantWithProfile('karyawan', '3578000000001005', '081234560005');
        $karyawanApplication = $this->createApplicationRecord($karyawanApplicant, $karyawanJob, 'submitted');

        $this->actingAs($admin);

        $this->post(route('admin.applications.transition', $magangApplication), [
            'status' => 'accepted',
            'admin_note' => 'Diterima magang',
        ])->assertRedirect(route('admin.applications.show', $magangApplication));

        $magangApplication->refresh();
        $this->assertSame('accepted', $magangApplication->status);
        $this->assertDatabaseHas('intern_placements', [
            'application_id' => $magangApplication->id,
            'status' => 'active',
        ]);

        $this->post(route('admin.applications.transition', $karyawanApplication), [
            'status' => 'accepted',
            'admin_note' => 'Diterima kerja',
        ])->assertRedirect(route('admin.applications.show', $karyawanApplication));

        $karyawanApplication->refresh();
        $this->assertSame('accepted', $karyawanApplication->status);
        $this->assertDatabaseMissing('intern_placements', [
            'application_id' => $karyawanApplication->id,
        ]);
    }

    public function test_reject_requires_note_and_records_status_without_duplicate_history(): void
    {
        $admin = $this->userWithRole('admin');
        $admin->forceFill(['status' => 'active'])->save();
        $jobOpening = $this->createJobOpening($admin, 'kerja', 'Lowongan Reject');
        $applicant = $this->createApplicantWithProfile('karyawan', '3578000000001006', '081234560006');
        $application = $this->createApplicationRecord($applicant, $jobOpening, 'submitted');

        $this->actingAs($admin);

        $historyBefore = ApplicationStatusHistory::query()
            ->where('application_id', $application->id)
            ->count();

        $this->post(route('admin.applications.reject', $application), [
            'admin_note' => '',
        ])->assertSessionHasErrors('admin_note');
        $this->assertSame('submitted', $application->fresh()->status);

        $this->post(route('admin.applications.reject', $application), [
            'admin_note' => 'Tidak memenuhi kualifikasi',
        ])->assertRedirect(route('admin.applications.show', $application));

        $application->refresh();
        $this->assertSame('rejected', $application->status);
        $this->assertSame('Tidak memenuhi kualifikasi', $application->admin_note);

        $historyAfter = ApplicationStatusHistory::query()
            ->where('application_id', $application->id)
            ->where('from_status', 'submitted')
            ->where('to_status', 'rejected')
            ->count();

        $this->assertSame(1, $historyAfter);
        $this->assertSame($historyBefore + 1, ApplicationStatusHistory::query()->where('application_id', $application->id)->count());

        $transitionJobOpening = $this->createJobOpening($admin, 'kerja', 'Lowongan Transition History');
        $transitionApp = $this->createApplicationRecord($applicant, $transitionJobOpening, 'submitted');
        $beforeTransition = ApplicationStatusHistory::query()->where('application_id', $transitionApp->id)->count();
        $this->post(route('admin.applications.transition', $transitionApp), [
            'status' => 'in_review',
        ])->assertRedirect(route('admin.applications.show', $transitionApp));
        $inReviewHistory = ApplicationStatusHistory::query()
            ->where('application_id', $transitionApp->id)
            ->where('from_status', 'submitted')
            ->where('to_status', 'in_review')
            ->count();
        $this->assertSame(1, $inReviewHistory);
        $this->assertSame($beforeTransition + 1, ApplicationStatusHistory::query()->where('application_id', $transitionApp->id)->count());
    }

    public function test_nik_is_masked_by_default_and_reveal_is_recorded(): void
    {
        $admin = $this->userWithRole('admin');
        $admin->forceFill(['status' => 'active'])->save();
        $jobOpening = $this->createJobOpening($admin, 'magang', 'Lowongan NIK');
        $nik = '3578123456789012';
        $applicant = $this->createApplicantWithProfile('magang', $nik, '081234560007');
        $application = $this->createApplicationRecord($applicant, $jobOpening, 'submitted');

        $maskedNik = $applicant->profile->fresh()->maskedNik();

        $this->actingAs($admin);

        $this->get(route('admin.applications.show', $application))
            ->assertOk()
            ->assertSee($maskedNik)
            ->assertDontSee($nik);

        $this->post(route('admin.applications.reveal-nik', $application))
            ->assertRedirect(route('admin.applications.show', $application));

        $this->assertDatabaseHas('activity_logs', [
            'user_id' => $admin->id,
            'category' => 'security',
            'action' => 'nik_revealed',
            'entity_type' => 'applications',
            'entity_id' => $application->id,
        ]);

        $this->get(route('admin.applications.show', $application))
            ->assertOk()
            ->assertSee($nik);
    }

    public function test_whatsapp_number_is_normalized_and_contact_is_logged(): void
    {
        $admin = $this->userWithRole('admin');
        $admin->forceFill(['status' => 'active'])->save();
        $jobOpening = $this->createJobOpening($admin, 'kerja', 'Lowongan WA');

        $applicantZero = $this->createApplicantWithProfile('karyawan', '3578000000001008', '081234560008');
        $appZero = $this->createApplicationRecord($applicantZero, $jobOpening, 'submitted');

        $this->actingAs($admin);
        $responseZero = $this->get(route('admin.applications.whatsapp', $appZero));
        $responseZero->assertRedirect();
        $this->assertStringContainsString('https://wa.me/6281234560008', $responseZero->headers->get('Location'));
        $this->assertDatabaseHas('activity_logs', [
            'user_id' => $admin->id,
            'category' => 'admin',
            'action' => 'whatsapp_contacted',
            'entity_type' => 'applications',
            'entity_id' => $appZero->id,
        ]);

        $applicantEight = $this->createApplicantWithProfile('karyawan', '3578000000001009', '81234560009');
        $appEight = $this->createApplicationRecord($applicantEight, $jobOpening, 'submitted');
        $responseEight = $this->get(route('admin.applications.whatsapp', $appEight));
        $responseEight->assertRedirect();
        $this->assertStringContainsString('https://wa.me/6281234560009', $responseEight->headers->get('Location'));
    }

    public function test_job_opening_with_applications_cannot_be_deleted(): void
    {
        $admin = $this->userWithRole('admin');
        $admin->forceFill(['status' => 'active'])->save();
        $jobOpening = $this->createJobOpening($admin, 'kerja', 'Lowongan Tidak Bisa Dihapus');
        $applicant = $this->createApplicantWithProfile('karyawan', '3578000000001010', '081234560010');
        $this->createApplicationRecord($applicant, $jobOpening, 'submitted');

        $this->actingAs($admin);

        $this->delete(route('admin.jobs.destroy', $jobOpening))
            ->assertRedirect(route('admin.jobs.index'))
            ->assertSessionHasErrors('job');

        $this->assertDatabaseHas('job_openings', ['id' => $jobOpening->id]);
    }

    public function test_intern_placement_dates_are_validated(): void
    {
        $admin = $this->userWithRole('admin');
        $admin->forceFill(['status' => 'active'])->save();
        $jobOpening = $this->createJobOpening($admin, 'magang', 'Lowongan Placement');
        $applicant = $this->createApplicantWithProfile('magang', '3578000000001011', '081234560011');
        $application = $this->createApplicationRecord($applicant, $jobOpening, 'submitted');
        $placement = InternPlacement::create([
            'application_id' => $application->id,
            'status' => 'active',
        ]);

        $this->actingAs($admin);

        $this->put(route('admin.interns.placements.update', $placement), [
            'division' => 'IT',
            'mentor_name' => 'Mentor',
            'start_date' => '2026-05-10',
            'end_date' => '2026-05-01',
            'status' => 'active',
        ])->assertSessionHasErrors('end_date');

        $this->put(route('admin.interns.placements.update', $placement), [
            'division' => 'IT',
            'mentor_name' => 'Mentor',
            'start_date' => '2026-05-01',
            'end_date' => '2026-05-10',
            'status' => 'completed',
        ])->assertRedirect(route('admin.interns.index'));

        $placement->refresh();
        $this->assertSame('IT', $placement->division);
        $this->assertSame('Mentor', $placement->mentor_name);
        $this->assertSame('completed', $placement->status);
    }

    private function createJobOpening(User $creator, string $type, string $title): JobOpening
    {
        return JobOpening::create([
            'created_by' => $creator->id,
            'title' => $title,
            'type' => $type,
            'description' => 'Deskripsi '.$title,
            'is_active' => true,
        ]);
    }

    private function createApplicantWithProfile(string $role, string $nik, string $phone): User
    {
        $user = $this->userWithRole($role);
        $user->forceFill(['status' => 'active'])->save();
        $user->profile()->create([
            'full_name' => 'Pelamar '.$user->id,
            'nik_encrypted' => $nik,
            'phone_encrypted' => $phone,
            'birth_place' => 'Jakarta',
            'birth_date' => '2000-01-01',
            'address' => 'Jakarta',
            'last_education' => 'S1',
        ]);

        if ($role === 'magang') {
            $user->internDetail()->create([
                'university' => 'Universitas Contoh',
                'major' => 'Informatika',
                'student_id_number' => (string) $user->id,
                'semester' => 6,
            ]);
        }

        return $user;
    }

    private function createApplicationRecord(User $applicant, JobOpening $jobOpening, string $status): Application
    {
        return Application::create([
            'applicant_id' => $applicant->id,
            'job_opening_id' => $jobOpening->id,
            'status' => $status,
            'submitted_at' => $status === 'draft' ? null : now()->subDay(),
        ]);
    }
}
