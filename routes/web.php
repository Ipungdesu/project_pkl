<?php

use App\Http\Controllers\Operator\AdminController;
use Illuminate\Support\Facades\Route;

// Rute untuk Halaman Utama (Beranda / Landing Page)
Route::get('/', function () {
    return view('welcome');
})->name('beranda');

// Rute untuk Halaman Tentang Kami
Route::get('/tentang', function () {
    return view('about');
})->name('tentang');

// Rute untuk Halaman Peluang Karir
Route::get('/peluang-karir', function () {
    return view('karir');
})->name('karir');

// Rute Landingpage Ke Halaman Login
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::middleware('auth')->group(function (): void {
    Route::get('/operator/dashboard', fn() => view('dashboards.operator'))
        ->middleware('role:operator')
        ->name('operator.dashboard');

    Route::get('/admin/dashboard', fn() => view('dashboards.admin'))
        ->middleware('role:admin,operator')
        ->name('admin.dashboard');

    Route::get('/magang/dashboard', fn() => view('dashboards.magang'))
        ->middleware('role:magang')
        ->name('magang.dashboard');

    Route::get('/karyawan/dashboard', fn() => view('dashboards.karyawan'))
        ->middleware('role:karyawan')
        ->name('karyawan.dashboard');

    Route::prefix('operator')->name('operator.')->middleware('role:operator')->group(function (): void {
        Route::resource('admins', AdminController::class)
            ->except(['show'])
            ->parameters(['admins' => 'user']);
    });
});

require __DIR__ . '/auth.php';
