<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\RejectApplicationRequest;
use App\Http\Requests\Admin\TransitionApplicationStatusRequest;
use App\Models\ActivityLog;
use App\Models\Application;
use App\Models\JobOpening;
use App\Models\User;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\QueryException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use RuntimeException;

class ApplicationController extends Controller
{
    public function index(Request $request): View
    {
        $this->authorizePanel($request->user());

        $filters = $request->validate([
            'type' => ['nullable', 'in:magang,kerja'],
            'status' => ['nullable', 'in:submitted,in_review,interview,accepted,rejected'],
            'job_opening_id' => ['nullable', 'integer', 'exists:job_openings,id'],
            'search' => ['nullable', 'string', 'max:255'],
        ]);

        $applications = Application::query()
            ->with([
                'applicant:id,name,email',
                'applicant.profile:id,user_id,full_name',
                'jobOpening:id,title,type',
            ])
            ->where('status', '!=', 'draft')
            ->when($filters['status'] ?? null, fn ($query, $status) => $query->where('status', $status))
            ->when($filters['type'] ?? null, fn ($query, $type) => $query->whereHas('jobOpening', fn ($q) => $q->where('type', $type)))
            ->when($filters['job_opening_id'] ?? null, fn ($query, $jobOpeningId) => $query->where('job_opening_id', $jobOpeningId))
            ->when($filters['search'] ?? null, function ($query, $search): void {
                $search = trim($search);
                $query->whereHas('applicant', function ($applicantQuery) use ($search): void {
                    $applicantQuery->where(function ($q) use ($search): void {
                        $q->where('name', 'ilike', "%{$search}%")
                            ->orWhere('email', 'ilike', "%{$search}%")
                            ->orWhereHas('profile', fn ($profileQuery) => $profileQuery->where('full_name', 'ilike', "%{$search}%"));
                    });
                });
            })
            ->latest('submitted_at')
            ->latest('id')
            ->paginate(15)
            ->withQueryString();

        return view('admin.applications.index', [
            'applications' => $applications,
            'filters' => $filters,
            'jobOpenings' => JobOpening::query()->orderBy('title')->get(['id', 'title', 'type']),
        ]);
    }

    public function show(Request $request, Application $application): View
    {
        $this->authorizePanel($request->user());
        abort_if($application->status === 'draft', 404);

        $application->load([
            'applicant.profile',
            'applicant.internDetail',
            'jobOpening',
            'documents',
            'statusHistory.changedBy:id,name',
            'reviewer:id,name',
            'internPlacement',
        ]);

        $revealed = in_array($application->getKey(), $request->session()->get('revealed_nik_applications', []), true);

        $profile = $application->applicant?->profile;
        $whatsappNumber = $profile ? $this->normalizeWhatsappNumber($profile->phone_encrypted) : null;
        $whatsappMessage = $this->whatsappMessage($application);
        $whatsappUrl = $whatsappNumber
            ? 'https://wa.me/'.$whatsappNumber.'?text='.rawurlencode($whatsappMessage)
            : null;

        return view('admin.applications.show', [
            'application' => $application,
            'nikRevealed' => $revealed,
            'whatsappUrl' => $whatsappUrl,
        ]);
    }

    public function revealNik(Request $request, Application $application): RedirectResponse
    {
        $this->authorizePanel($request->user());
        abort_if($application->status === 'draft', 404);

        $application->loadMissing('applicant.profile');
        $profile = $application->applicant?->profile;

        ActivityLog::create([
            'user_id' => $request->user()->getKey(),
            'category' => 'security',
            'action' => 'nik_revealed',
            'entity_type' => 'applications',
            'entity_id' => $application->getKey(),
            'ip_address' => $request->ip(),
            'metadata' => ['profile_id' => $profile?->getKey()],
        ]);

        $revealed = $request->session()->get('revealed_nik_applications', []);
        $revealed[] = $application->getKey();
        $request->session()->put('revealed_nik_applications', array_values(array_unique($revealed)));

        return redirect()->route('admin.applications.show', $application);
    }

    public function whatsapp(Request $request, Application $application): RedirectResponse
    {
        $this->authorizePanel($request->user());
        abort_if($application->status === 'draft', 404);

        $application->loadMissing(['applicant.profile', 'jobOpening']);
        $profile = $application->applicant?->profile;
        $whatsappNumber = $profile ? $this->normalizeWhatsappNumber($profile->phone_encrypted) : null;

        abort_if($whatsappNumber === null, 404);

        ActivityLog::create([
            'user_id' => $request->user()->getKey(),
            'category' => 'admin',
            'action' => 'whatsapp_contacted',
            'entity_type' => 'applications',
            'entity_id' => $application->getKey(),
            'ip_address' => $request->ip(),
            'metadata' => ['job_opening_id' => $application->job_opening_id],
        ]);

        $url = 'https://wa.me/'.$whatsappNumber.'?text='.rawurlencode($this->whatsappMessage($application));

        return redirect()->away($url);
    }

    public function transition(TransitionApplicationStatusRequest $request, Application $application): RedirectResponse
    {
        $this->authorizePanel($request->user());
        abort_if($application->status === 'draft', 404);

        $status = $request->validated('status');

        try {
            if ($status === 'accepted') {
                $application->refresh();

                if (! $application->canTransitionTo('accepted')) {
                    return back()->withErrors(['status' => 'Perubahan status tidak valid untuk lamaran ini.']);
                }

                $application->accept($request->user(), $request->validated('admin_note'));
            } else {
                DB::transaction(function () use ($request, $application, $status): void {
                    $locked = Application::query()->lockForUpdate()->findOrFail($application->getKey());

                    if (! $locked->canTransitionTo($status)) {
                        throw new RuntimeException('Perubahan status tidak valid untuk lamaran ini.');
                    }

                    $locked->forceFill([
                        'status' => $status,
                        'reviewed_by' => $request->user()->getKey(),
                        'reviewed_at' => now(),
                        'admin_note' => $request->validated('admin_note'),
                    ])->save();
                });
            }
        } catch (AuthorizationException $exception) {
            abort(403, $exception->getMessage());
        } catch (RuntimeException $exception) {
            if ($exception->getMessage() === 'Perubahan status tidak valid untuk lamaran ini.') {
                return back()->withErrors(['status' => $exception->getMessage()]);
            }

            report($exception);

            return back()->withErrors(['status' => 'Lamaran sudah diproses atau tidak dapat diperbarui. Silakan muat ulang halaman.']);
        } catch (QueryException $exception) {
            report($exception);

            return back()->withErrors(['status' => 'Lamaran sudah diproses atau tidak dapat diperbarui. Silakan muat ulang halaman.']);
        }

        return redirect()->route('admin.applications.show', $application)->with('status', 'Status lamaran berhasil diperbarui.');
    }

    public function reject(RejectApplicationRequest $request, Application $application): RedirectResponse
    {
        $this->authorizePanel($request->user());
        abort_if($application->status === 'draft', 404);

        $application->refresh();

        if (! $application->canTransitionTo('rejected')) {
            return back()->withErrors(['admin_note' => 'Lamaran ini tidak dapat ditolak pada status saat ini.']);
        }

        try {
            $application->reject($request->user(), $request->validated('admin_note'));
        } catch (AuthorizationException $exception) {
            abort(403, $exception->getMessage());
        } catch (QueryException|RuntimeException $exception) {
            report($exception);

            return back()->withErrors(['admin_note' => 'Lamaran sudah diproses atau tidak dapat ditolak. Silakan muat ulang halaman.']);
        }

        return redirect()->route('admin.applications.show', $application)->with('status', 'Lamaran berhasil ditolak.');
    }

    private function authorizePanel(?User $user): void
    {
        abort_unless($user && ($user->isAdmin() || $user->isOperator()), 403);
    }

    private function normalizeWhatsappNumber(?string $phone): ?string
    {
        if ($phone === null) {
            return null;
        }

        $digits = preg_replace('/\D+/', '', $phone);

        if (! is_string($digits) || $digits === '') {
            return null;
        }

        if (str_starts_with($digits, '0')) {
            $digits = '62'.substr($digits, 1);
        } elseif (str_starts_with($digits, '8')) {
            $digits = '62'.$digits;
        }

        return $digits;
    }

    private function whatsappMessage(Application $application): string
    {
        $applicantName = $application->applicant?->profile?->full_name
            ?? $application->applicant?->name
            ?? 'Pelamar';
        $jobTitle = $application->jobOpening?->title ?? 'lowongan';

        return "Halo {$applicantName}, kami dari PT Equityworld Futures ingin menghubungi Anda terkait lamaran untuk posisi {$jobTitle}.";
    }
}
