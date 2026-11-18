<?php

namespace App\Http\Controllers\Applicant;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\JobOpening;
use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class JobOpeningController extends Controller
{
    public function index(Request $request): View
    {
        $user = $request->user();
        abort_unless($user instanceof User, 403);

        $type = $user->isMagang() ? 'magang' : 'kerja';

        return view('applicant.jobs.index', [
            'jobOpenings' => JobOpening::open()
                ->where('type', $type)
                ->orderBy('deadline')
                ->orderBy('id')
                ->get(),
            'profileComplete' => $user->hasCompleteApplicantProfile(),
        ]);
    }

    public function apply(Request $request, JobOpening $jobOpening): RedirectResponse
    {
        $user = $request->user();
        abort_unless($user instanceof User, 403);

        if (! $user->hasCompleteApplicantProfile()) {
            return redirect()
                ->route('applicant.profile.edit')
                ->with('error', 'Lengkapi profil sebelum melamar lowongan.');
        }

        $expectedType = $user->isMagang() ? 'magang' : 'kerja';

        if ($jobOpening->type !== $expectedType) {
            abort(404);
        }

        if (! JobOpening::open()->whereKey($jobOpening->getKey())->exists()) {
            return redirect()
                ->route('applicant.jobs.index')
                ->with('error', 'Lowongan ini sudah tidak aktif atau melewati batas waktu.');
        }

        if (Application::query()
            ->where('applicant_id', $user->getKey())
            ->where('job_opening_id', $jobOpening->getKey())
            ->exists()) {
            return redirect()
                ->route('applicant.jobs.index')
                ->with('error', 'Anda sudah pernah melamar lowongan ini.');
        }

        try {
            $application = Application::create([
                'applicant_id' => $user->getKey(),
                'job_opening_id' => $jobOpening->getKey(),
                'status' => 'draft',
            ]);
        } catch (QueryException $exception) {
            $duplicateExists = Application::query()
                ->where('applicant_id', $user->getKey())
                ->where('job_opening_id', $jobOpening->getKey())
                ->exists();

            if (! $duplicateExists) {
                throw $exception;
            }

            return redirect()
                ->route('applicant.jobs.index')
                ->with('error', 'Anda sudah pernah melamar lowongan ini.');
        }

        return redirect()
            ->route('applicant.applications.show', $application)
            ->with('status', 'Draft lamaran berhasil dibuat. Lengkapi berkas untuk mengirim lamaran.');
    }
}
