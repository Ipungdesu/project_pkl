@extends('layouts.auth')

@section('title', 'Pendaftaran Berhasil')

@section('content')
<div class="text-center sm:text-left">
    <!-- Icon Centang Sukses -->
    <div class="w-14 h-14 rounded-2xl bg-gradient-to-tr from-orange-500 to-amber-400 flex items-center justify-center text-white shadow-lg shadow-orange-500/30 mb-3.5 mx-auto sm:mx-0">
        <svg class="w-7 h-7" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5"/>
        </svg>
    </div>

    <!-- Judul & Info -->
    <span class="inline-block text-[10.5px] font-bold uppercase tracking-wider text-emerald-600 mb-0.5">Status: Akun Aktif</span>
    <h1 class="text-xl sm:text-2xl font-extrabold text-gray-900 tracking-tight mb-1.5">Pendaftaran Berhasil!</h1>
    <p class="text-xs text-gray-500 mb-4 leading-normal max-w-md">
        Selamat, akun demo Anda telah berhasil dibuat dan siap digunakan. Silakan masuk untuk mulai simulasi perdagangan.
    </p>

    <!-- Tombol Masuk -->
    <div>
        <a class="inline-flex items-center justify-center px-7 py-2.5 rounded-xl bg-orange-500 hover:bg-orange-600 text-white font-bold text-xs uppercase tracking-wider shadow-md hover:shadow-orange-500/30 hover:-translate-y-0.5 active:translate-y-0 transition-all cursor-pointer" href="{{ route('login') }}">
            KE HALAMAN LOGIN &rarr;
        </a>
    </div>
</div>
@endsection
