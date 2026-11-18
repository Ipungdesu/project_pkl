@extends('layouts.auth')

@section('title', 'Verifikasi Email')

@section('content')
<div>
    <!-- Subtitle & Judul Halaman -->
    <span class="inline-block text-[10.5px] font-bold uppercase tracking-wider text-orange-600 mb-0.5">Keamanan Akun</span>
    <h1 class="text-xl sm:text-2xl font-extrabold text-gray-900 tracking-tight mb-1">Verifikasi Email</h1>
    <p class="text-xs text-gray-500 mb-3.5 leading-snug">
        Kode 6 digit telah dikirim ke <strong id="mail" class="text-gray-900 font-bold">email Anda</strong>. Kode berlaku selama 10 menit.
    </p>

    <!-- Form OTP -->
    <form id="fOtp" method="POST" action="#" data-next="{{ route('pendaftaran.berhasil') }}" novalidate>
        @csrf
        
        <!-- 6 Digit OTP Inputs -->
        <div class="otp" id="otp">
            <input maxlength="1" inputmode="numeric" aria-label="Digit 1">
            <input maxlength="1" inputmode="numeric" aria-label="Digit 2">
            <input maxlength="1" inputmode="numeric" aria-label="Digit 3">
            <input maxlength="1" inputmode="numeric" aria-label="Digit 4">
            <input maxlength="1" inputmode="numeric" aria-label="Digit 5">
            <input maxlength="1" inputmode="numeric" aria-label="Digit 6">
        </div>
        
        <span class="err text-xs text-rose-500 font-medium text-center mb-2 block" id="otpErr" style="display:none">
            Masukkan 6 digit kode verifikasi secara lengkap.
        </span>

        <!-- Tombol Aksi -->
        <div class="flex flex-wrap items-center justify-between gap-3 pt-2">
            <button class="inline-flex items-center justify-center px-6 py-2 rounded-xl bg-orange-500 hover:bg-orange-600 text-white font-bold text-xs uppercase tracking-wider shadow-md hover:shadow-orange-500/30 hover:-translate-y-0.5 active:translate-y-0 transition-all cursor-pointer" type="submit">
                VERIFIKASI
            </button>
            <button class="text-xs font-bold text-orange-600 hover:text-orange-700 disabled:text-gray-400 disabled:cursor-not-allowed transition-colors cursor-pointer" type="button" id="resend" disabled>
                Kirim ulang kode (60)
            </button>
        </div>
    </form>

    <!-- Switcher -->
    <p class="mt-4 pt-2.5 border-t border-gray-100 text-xs text-gray-500 text-center sm:text-left">
        Salah alamat email? 
        <a class="font-bold text-orange-600 hover:text-orange-700 hover:underline transition-colors" href="{{ route('register') }}">
            Ubah data pendaftaran &rarr;
        </a>
    </p>
</div>
@endsection
