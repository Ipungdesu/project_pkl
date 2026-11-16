<?php

use Illuminate\Support\Facades\Route;

// Rute untuk Halaman Utama (Beranda / Landing Page)
// File view: resources/views/welcome.blade.php
Route::get('/', function () {
    return view('welcome');
})->name('beranda');

// Rute untuk Halaman Tentang Kami
// File view: resources/views/about.blade.php
Route::get('/tentang', function () {
    // Karena nama filenya about.blade.php, kita gunakan view('about')
    return view('about');
})->name('tentang');
