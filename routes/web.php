<?php

use App\Http\Controllers\Applicant\ApplicationController;
use App\Http\Controllers\Applicant\JobOpeningController;
use App\Http\Controllers\Applicant\ProfileController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Operator\AdminController;
use App\Models\JobOpening;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome', [
        'jobOpenings' => JobOpening::open()
            ->orderBy('deadline')
            ->orderBy('id')
            ->get(),
    ]);
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
    Route::middleware('role:magang,karyawan')->prefix('pelamar')->name('applicant.')->group(function (): void {
        Route::get('/profil', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::put('/profil', [ProfileController::class, 'update'])->name('profile.update');
        Route::get('/lowongan', [JobOpeningController::class, 'index'])->name('jobs.index');
        Route::post('/lowongan/{jobOpening}/lamar', [JobOpeningController::class, 'apply'])->name('jobs.apply');
        Route::get('/lamaran', [ApplicationController::class, 'index'])->name('applications.index');
        Route::get('/lamaran/{application}', [ApplicationController::class, 'show'])->name('applications.show');
        Route::post('/lamaran/{application}/dokumen', [ApplicationController::class, 'storeDocument'])
            ->name('applications.documents.store');
        Route::post('/lamaran/{application}/kirim', [ApplicationController::class, 'submit'])
            ->name('applications.submit');
    });

    Route::get('/dokumen-lamaran/{document}', [ApplicationController::class, 'download'])
        ->name('application-documents.download');

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
