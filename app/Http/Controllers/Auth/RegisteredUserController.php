<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    public function create(): View
    {
        return view('auth.register');
    }

    public function store(Request $request): RedirectResponse
    {
        $email = $request->input('email', $request->input('e'));
        $password = $request->input('password', $request->input('p'));
        $passwordConfirmation = $request->input('password_confirmation', $request->input('cp', $request->input('confirm_password')));
        $name = $request->input('name');
        $role = $request->input('role', 'magang');

        if (! is_string($name) || trim($name) === '') {
            $name = is_string($email) && str_contains($email, '@')
                ? Str::headline(Str::before($email, '@'))
                : 'Pelamar';
        }

        $request->merge([
            'name' => $name,
            'email' => $email,
            'role' => $role,
            'password' => $password,
            'password_confirmation' => $passwordConfirmation,
        ]);

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:users,email'],
            'role' => ['required', Rule::in(['magang', 'karyawan'])],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = DB::transaction(function () use ($validated): User {
            $user = User::create([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'password' => $validated['password'],
            ]);
            $user->forceFill([
                'role' => $validated['role'],
                'status' => 'active',
            ])->save();
            $user->profile()->create(['full_name' => $validated['name']]);

            return $user;
        });

        event(new Registered($user));
        Auth::login($user);
        $request->session()->regenerate();

        if ($request->filled('_redirect') || $request->routeIs('register')) {
            return redirect()->route($user->isMagang() ? 'magang.dashboard' : 'karyawan.dashboard');
        }

        return redirect()->route($user->isMagang() ? 'magang.dashboard' : 'karyawan.dashboard');
    }
}
