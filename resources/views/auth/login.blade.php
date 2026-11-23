@extends('layouts.auth')

@section('title', 'Masuk')

@section('content')
<div>
    <!-- Subtitle & Judul Halaman -->
    <span class="inline-block text-[10.5px] font-bold uppercase tracking-wider text-orange-600 mb-0.5">Selamat Datang</span>
    <h1 class="text-xl sm:text-2xl font-extrabold text-gray-900 tracking-tight mb-1">Masuk Akun Demo</h1>
    <p class="text-xs text-gray-500 mb-3 leading-snug">
        Gunakan akun demo Anda untuk mulai simulasi dan berlatih di pasar berjangka.
    </p>

    @if (session('status'))
        <div class="mb-3 p-3 rounded-xl bg-emerald-50 border border-emerald-200 text-xs text-emerald-800 leading-snug font-medium">
            {{ session('status') }}
        </div>
    @endif

    <!-- Form Login -->
    <form id="fLogin" method="POST" action="{{ route('login') }}" data-real="1" novalidate>
        @csrf

        <!-- Input Email -->
        <label class="f {{ $errors->has('email') ? 'bad' : '' }}">
            <b>Email <em>*</em></b>
            <input name="e" type="email" autocomplete="email" placeholder="nama@email.com" value="{{ old('email', old('e')) }}">
            <span class="err">{{ $errors->first('email') }}</span>
        </label>

        <!-- Input Password -->
        <label class="f">
            <b>Password <em>*</em></b>
            <input name="p" type="password" autocomplete="current-password" placeholder="Masukkan password Anda">
            <button class="eye" type="button" aria-label="Tampilkan password"></button>
            <span class="err"></span>
        </label>

        <!-- Dynamic Captcha Box -->
        <div class="capw" data-cap></div>

        <!-- Tombol Aksi -->
        <div class="flex items-center justify-between gap-3 pt-1">
            <button class="inline-flex items-center justify-center px-6 py-2 rounded-xl bg-orange-500 hover:bg-orange-600 text-white font-bold text-xs uppercase tracking-wider shadow-md hover:shadow-orange-500/30 hover:-translate-y-0.5 active:translate-y-0 transition-all cursor-pointer" type="submit">
                MASUK
            </button>
            <a class="text-xs font-semibold text-orange-600 hover:text-orange-700 hover:underline transition-colors" href="{{ route('lupa-password') }}">
                Lupa password?
            </a>
        </div>
    </form>

    <!-- Link ke Registrasi -->
    <p class="mt-3.5 pt-2.5 border-t border-gray-100 text-xs text-gray-500 text-center sm:text-left">
        Belum punya akun demo? 
        <a class="font-bold text-orange-600 hover:text-orange-700 hover:underline transition-colors" href="{{ route('register') }}">
            Daftar akun demo di sini &rarr;
        </a>
    </p>
</div>
@endsection
