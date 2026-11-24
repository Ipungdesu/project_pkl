<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\PasswordOtpController;
use App\Http\Controllers\Auth\RegisteredUserController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function (): void {
    Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('/login', [AuthenticatedSessionController::class, 'store'])->middleware('throttle:10,1');

    Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('/register', [RegisteredUserController::class, 'store'])->middleware('throttle:5,1');

    Route::get('/pendaftaran-berhasil', fn () => view('auth.done'))->name('pendaftaran.berhasil');

    Route::get('/lupa-password', [PasswordOtpController::class, 'create'])->name('lupa-password');
    Route::post('/lupa-password', [PasswordOtpController::class, 'send'])
        ->name('lupa-password.send')
        ->middleware('throttle:password-otp');

    Route::get('/verifikasi', [PasswordOtpController::class, 'showVerify'])->name('verifikasi');
    Route::post('/verifikasi', [PasswordOtpController::class, 'verify'])
        ->name('verifikasi.submit')
        ->middleware('throttle:10,1');

    Route::get('/reset-password', [PasswordOtpController::class, 'showReset'])->name('reset-password');
    Route::post('/reset-password', [PasswordOtpController::class, 'reset'])
        ->name('password.update')
        ->middleware('throttle:5,1');
});

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
    ->middleware('auth')
    ->name('logout');
