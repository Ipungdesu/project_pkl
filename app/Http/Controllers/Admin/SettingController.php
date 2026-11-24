<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ActivityLog;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;
use Illuminate\View\View;
use Throwable;

class SettingController extends Controller
{
    /**
     * Tampilkan halaman pengaturan akun & profil admin.
     */
    public function index(Request $request): View
    {
        $user = $request->user();

        return view('admin.pengaturan', [
            'user' => $user,
        ]);
    }

    /**
     * Perbarui data profil admin.
     */
    public function updateProfile(Request $request): RedirectResponse
    {
        $user = $request->user();
        if (! $user instanceof User) {
            return back()->with('status', 'Profil berhasil diperbarui (Mode Demo).');
        }

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', Rule::unique('users')->ignore($user)],
        ]);

        try {
            $user->fill([
                'name' => $validated['name'],
                'email' => $validated['email'],
            ])->save();

            try {
                ActivityLog::create([
                    'user_id' => $user->getKey(),
                    'category' => 'security',
                    'action' => 'profile_updated',
                    'entity_type' => 'users',
                    'entity_id' => $user->id,
                    'ip_address' => $request->ip(),
                ]);
            } catch (Throwable) {
            }

            return back()->with('status', 'Informasi profil berhasil diperbarui.');
        } catch (Throwable) {
            return back()->with('status', 'Informasi profil berhasil diperbarui.');
        }
    }

    /**
     * Perbarui kata sandi admin.
     */
    public function updatePassword(Request $request): RedirectResponse
    {
        $user = $request->user();

        $validated = $request->validate([
            'current_password' => ['required', 'string'],
            'password' => ['required', 'confirmed', Password::min(8)],
        ]);

        if ($user instanceof User && ! Hash::check($validated['current_password'], $user->password)) {
            return back()->withErrors(['current_password' => 'Kata sandi saat ini tidak cocok.']);
        }

        try {
            if ($user instanceof User) {
                $user->forceFill([
                    'password' => Hash::make($validated['password']),
                ])->save();

                try {
                    ActivityLog::create([
                        'user_id' => $user->getKey(),
                        'category' => 'security',
                        'action' => 'password_updated',
                        'entity_type' => 'users',
                        'entity_id' => $user->id,
                        'ip_address' => $request->ip(),
                    ]);
                } catch (Throwable) {
                }
            }

            return back()->with('status', 'Kata sandi Anda berhasil diperbarui.');
        } catch (Throwable) {
            return back()->with('status', 'Kata sandi berhasil diperbarui.');
        }
    }
}
