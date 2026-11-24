<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UpdateInternPlacementRequest;
use App\Models\InternPlacement;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class InternController extends Controller
{
    public function index(Request $request): View
    {
        $this->authorizePanel($request->user());

        $interns = User::query()
            ->where('role', 'magang')
            ->with([
                'profile:id,user_id,full_name',
                'applications' => fn ($query) => $query
                    ->with(['jobOpening:id,title,type', 'internPlacement'])
                    ->latest('submitted_at')
                    ->latest('id'),
            ])
            ->orderBy('name')
            ->paginate(15);

        return view('admin.interns.index', [
            'interns' => $interns,
        ]);
    }

    public function edit(Request $request, InternPlacement $placement): View
    {
        $this->authorizePanel($request->user());

        $placement->loadMissing(['application.applicant.profile', 'application.jobOpening']);

        return view('admin.interns.edit', [
            'placement' => $placement,
        ]);
    }

    public function update(UpdateInternPlacementRequest $request, InternPlacement $placement): RedirectResponse
    {
        $placement->update($request->validated());

        return redirect()->route('admin.interns.index')->with('status', 'Penempatan magang berhasil diperbarui.');
    }

    private function authorizePanel(?User $user): void
    {
        abort_unless($user && ($user->isAdmin() || $user->isOperator()), 403);
    }
}
