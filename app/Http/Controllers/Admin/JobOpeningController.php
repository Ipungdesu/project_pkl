<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreJobOpeningRequest;
use App\Http\Requests\Admin\UpdateJobOpeningRequest;
use App\Models\ActivityLog;
use App\Models\JobOpening;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class JobOpeningController extends Controller
{
    public function index(Request $request): View
    {
        $this->authorizePanel($request->user());

        $jobOpenings = JobOpening::query()
            ->withCount('applications')
            ->latest('id')
            ->paginate(15);

        return view('admin.jobs.index', [
            'jobOpenings' => $jobOpenings,
        ]);
    }

    public function create(Request $request): View
    {
        $this->authorizePanel($request->user());

        return view('admin.jobs.create', [
            'jobOpening' => new JobOpening(['is_active' => true]),
        ]);
    }

    public function store(StoreJobOpeningRequest $request): RedirectResponse
    {
        $validated = $request->validated();
        $validated['is_active'] = $request->boolean('is_active', true);
        $validated['created_by'] = $request->user()->getKey();

        $jobOpening = JobOpening::create($validated);

        ActivityLog::create([
            'user_id' => $request->user()->getKey(),
            'category' => 'admin',
            'action' => 'job_created',
            'entity_type' => 'job_openings',
            'entity_id' => $jobOpening->getKey(),
            'ip_address' => $request->ip(),
            'metadata' => ['title' => $jobOpening->title, 'type' => $jobOpening->type],
        ]);

        return redirect()->route('admin.jobs.index')->with('status', 'Lowongan berhasil dibuat.');
    }

    public function edit(Request $request, JobOpening $jobOpening): View
    {
        $this->authorizePanel($request->user());

        return view('admin.jobs.edit', [
            'jobOpening' => $jobOpening,
        ]);
    }

    public function update(UpdateJobOpeningRequest $request, JobOpening $jobOpening): RedirectResponse
    {
        $validated = $request->validated();
        $validated['is_active'] = $request->boolean('is_active');

        $jobOpening->update($validated);

        ActivityLog::create([
            'user_id' => $request->user()->getKey(),
            'category' => 'admin',
            'action' => 'job_updated',
            'entity_type' => 'job_openings',
            'entity_id' => $jobOpening->getKey(),
            'ip_address' => $request->ip(),
            'metadata' => ['title' => $jobOpening->title],
        ]);

        return redirect()->route('admin.jobs.index')->with('status', 'Lowongan berhasil diperbarui.');
    }

    public function toggle(Request $request, JobOpening $jobOpening): RedirectResponse
    {
        $this->authorizePanel($request->user());

        $jobOpening->update(['is_active' => ! $jobOpening->is_active]);

        ActivityLog::create([
            'user_id' => $request->user()->getKey(),
            'category' => 'admin',
            'action' => 'job_toggled',
            'entity_type' => 'job_openings',
            'entity_id' => $jobOpening->getKey(),
            'ip_address' => $request->ip(),
            'metadata' => ['is_active' => $jobOpening->is_active],
        ]);

        return redirect()->route('admin.jobs.index')->with('status', 'Status aktif lowongan berhasil diubah.');
    }

    public function destroy(Request $request, JobOpening $jobOpening): RedirectResponse
    {
        $this->authorizePanel($request->user());

        if ($jobOpening->applications()->exists()) {
            return redirect()->route('admin.jobs.index')
                ->withErrors(['job' => 'Lowongan yang sudah memiliki lamaran tidak dapat dihapus. Nonaktifkan lowongan.']);
        }

        return redirect()->route('admin.jobs.index')
            ->withErrors(['job' => 'Penghapusan lowongan tidak diizinkan. Nonaktifkan lowongan.']);
    }

    private function authorizePanel(?User $user): void
    {
        abort_unless($user && ($user->isAdmin() || $user->isOperator()), 403);
    }
}
