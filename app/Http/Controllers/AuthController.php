<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class AuthController extends Controller
{
    /**
     * Tampilkan halaman login.
     */
    public function login(): View
    {
        return view('auth.login');
    }

    /**
     * Tampilkan halaman registrasi akun demo.
     */
    public function register(): View
    {
        return view('auth.register');
    }

    /**
     * Tampilkan halaman verifikasi OTP.
     */
    public function verify(): View
    {
        return view('auth.verify');
    }

    /**
     * Tampilkan halaman lupa password.
     */
    public function forgotPassword(): View
    {
        return view('auth.forgot');
    }

    /**
     * Tampilkan halaman reset password baru.
     */
    public function resetPassword(): View
    {
        return view('auth.reset');
    }

    /**
     * Tampilkan halaman pendaftaran akun demo berhasil.
     */
    public function done(): View
    {
        return view('auth.done');
    }
}
