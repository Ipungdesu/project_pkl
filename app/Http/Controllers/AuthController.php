<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class AuthController extends Controller
{
    /**
     * Tampilkan halaman verifikasi OTP pendaftaran akun demo.
     */
    public function verify(): View
    {
        return view('auth.verify');
    }

    /**
     * Tampilkan halaman pendaftaran akun demo berhasil.
     */
    public function done(): View
    {
        return view('auth.done');
    }
}
