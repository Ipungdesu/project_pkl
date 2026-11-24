<?php

use App\Http\Controllers\Applicant\ApplicationController;
use App\Http\Controllers\Applicant\JobOpeningController;
use App\Http\Controllers\Applicant\ProfileController;
use App\Http\Controllers\Operator\AdminController;
use App\Models\JobOpening;
use Illuminate\Support\Facades\Route;

// Rute untuk Halaman Utama (Beranda / Landing Page)
Route::get('/', function () {
    return view('welcome', [
        'jobOpenings' => JobOpening::open()
            ->orderBy('deadline')
            ->orderBy('id')
            ->get(),
    ]);
})->name('beranda');

// Rute untuk Halaman Tentang Kami
Route::get('/tentang', function () {
    return view('about');
})->name('tentang');

// Rute untuk Halaman Peluang Karir
Route::get('/peluang-karir', function () {
    return view('karir');
})->name('karir');

Route::middleware('auth')->group(function (): void {
    Route::get('/dashboard', function () {
        $user = request()->user();

        if ($user?->isOperator()) {
            return redirect()->route('operator.dashboard');
        }

        if ($user?->isAdmin()) {
            return redirect()->route('admin.dashboard');
        }

        if ($user?->isMagang()) {
            return redirect()->route('magang.dashboard');
        }

        if ($user?->isKaryawan()) {
            return redirect()->route('karyawan.dashboard');
        }

        abort(403);
    })->name('dashboard');

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
