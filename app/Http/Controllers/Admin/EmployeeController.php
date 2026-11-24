<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class EmployeeController extends Controller
{
    public function index(Request $request): View
    {
        $this->authorizePanel($request->user());

        $employees = User::query()
            ->where('role', 'karyawan')
            ->with([
                'profile:id,user_id,full_name',
                'applications' => fn ($query) => $query
                    ->with('jobOpening:id,title,type')
                    ->latest('submitted_at')
                    ->latest('id')
                    ->limit(1),
            ])
            ->orderBy('name')
            ->paginate(15);

        return view('admin.employees.index', [
            'employees' => $employees,
        ]);
    }

    private function authorizePanel(?User $user): void
    {
        abort_unless($user && ($user->isAdmin() || $user->isOperator()), 403);
    }
}
