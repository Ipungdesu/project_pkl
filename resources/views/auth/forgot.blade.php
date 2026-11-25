@extends('layouts.auth')

@section('title', 'Lupa Password')

@section('content')
<div>
    <!-- Subtitle & Judul Halaman -->
    <span class="inline-block text-[10.5px] font-bold uppercase tracking-wider text-orange-600 mb-0.5">Bantuan Akun</span>
    <h1 class="text-xl sm:text-2xl font-extrabold text-gray-900 tracking-tight mb-1">Lupa Password</h1>
    <p class="text-xs text-gray-500 mb-3.5 leading-snug">
        Masukkan email terdaftar untuk menerima tautan atur ulang password.
    </p>

    <!-- Form Lupa Password -->
    <form id="fForgot" method="POST" action="#" novalidate>
        @csrf

        <label class="f">
            <b>Email Terdaftar <em>*</em></b>
            <input name="e" type="email" autocomplete="email" placeholder="nama@email.com">
            <span class="err"></span>
        </label>

        <!-- Notifikasi Sukses Terkirim (Default hidden) -->
        <div class="mb-3 p-3 rounded-xl bg-emerald-50 border border-emerald-200 text-xs text-emerald-800 leading-snug font-medium" id="sent" hidden>
            Tautan atur ulang password sudah dikirim ke <strong id="fm" class="font-bold underline"></strong>. Periksa kotak masuk atau spam.
        </div>

        <!-- Tombol Aksi -->
        <div class="flex flex-wrap items-center gap-3 pt-1.5">
            <button class="inline-flex items-center justify-center px-6 py-2 rounded-xl bg-orange-500 hover:bg-orange-600 text-white font-bold text-xs uppercase tracking-wider shadow-md hover:shadow-orange-500/30 hover:-translate-y-0.5 active:translate-y-0 transition-all cursor-pointer" type="submit" id="fBtn">
                KIRIM TAUTAN
            </button>
            <a class="text-xs font-bold text-orange-600 hover:text-orange-700 hover:underline transition-colors" href="{{ route('password.reset') }}" id="demoReset" hidden>
                Buka Halaman Reset (Demo) &rarr;
            </a>
            <a class="text-xs font-semibold text-gray-500 hover:text-gray-800 transition-colors ml-auto" href="{{ route('login') }}">
                Kembali ke login
            </a>
        </div>
    </form>
</div>
@endsection
