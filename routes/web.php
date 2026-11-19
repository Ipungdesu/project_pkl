<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Operator\AdminController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('beranda');

Route::get('/tentang', function () {
    return view('about');
})->name('tentang');

Route::get('/peluang-karir', function () {
    return view('karir');
})->name('karir');

Route::middleware('guest')->group(function (): void {
    Route::get('/verifikasi', [AuthController::class, 'verify'])->name('verifikasi');
    Route::get('/pendaftaran-berhasil', [AuthController::class, 'done'])->name('pendaftaran.berhasil');
});

Route::middleware('auth')->group(function (): void {
    Route::get('/operator/dashboard', fn () => view('dashboards.operator'))
        ->middleware('role:operator')
        ->name('operator.dashboard');

    Route::get('/admin/dashboard', fn () => view('dashboards.admin'))
        ->middleware('role:admin,operator')
        ->name('admin.dashboard');

    Route::get('/magang/dashboard', fn () => view('dashboards.magang'))
        ->middleware('role:magang')
        ->name('magang.dashboard');

    Route::get('/karyawan/dashboard', fn () => view('dashboards.karyawan'))
        ->middleware('role:karyawan')
        ->name('karyawan.dashboard');

    Route::prefix('operator')->name('operator.')->middleware('role:operator')->group(function (): void {
        Route::resource('admins', AdminController::class)
            ->except(['show'])
            ->parameters(['admins' => 'user']);
    });
});

require __DIR__.'/auth.php';
