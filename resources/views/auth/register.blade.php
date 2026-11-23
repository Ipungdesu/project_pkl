@extends('layouts.auth')

@section('title', 'Daftar Akun Demo')

@section('content')
<div>
    <!-- Subtitle & Judul Halaman -->
    <span class="inline-block text-[10.5px] font-bold uppercase tracking-wider text-orange-600 mb-0.5">Akun Simulasi</span>
    <h1 class="text-xl sm:text-2xl font-extrabold text-gray-900 tracking-tight mb-1">Daftar Akun Demo</h1>
    <p class="text-xs text-gray-500 mb-2.5 leading-snug">
        Cukup email dan password untuk mulai simulasi trading bebas risiko.
    </p>


    <!-- Form Registrasi -->
    <form id="fReg" method="POST" action="{{ route('register') }}" data-real="1" novalidate>
        @csrf

        <!-- Nama -->
        <label class="f {{ $errors->has('name') ? 'bad' : '' }}">
            <b>Nama Lengkap <em>*</em></b>
            <input name="name" type="text" autocomplete="name" placeholder="Nama lengkap" value="{{ old('name') }}">
            <span class="err">{{ $errors->first('name') }}</span>
        </label>

        <!-- Email -->
        <label class="f {{ $errors->has('email') ? 'bad' : '' }}">
            <b>Email <em>*</em></b>
            <input name="e" type="email" autocomplete="email" placeholder="nama@email.com" value="{{ old('email', old('e')) }}">
            <span class="err">{{ $errors->first('email') }}</span>
        </label>

        <label class="f {{ $errors->has('role') ? 'bad' : '' }}">
            <b>Daftar Sebagai <em>*</em></b>
            <select name="role" class="w-full h-[2.45rem] rounded-[0.65rem] border border-gray-300 bg-white px-3 text-[0.8125rem] font-medium text-gray-900 focus:border-[#f7941d] focus:outline-none" style="box-shadow:none;">
                <option value="magang" @selected(old('role', 'magang') === 'magang')>Magang</option>
                <option value="karyawan" @selected(old('role') === 'karyawan')>Karyawan</option>
            </select>
            <span class="err">{{ $errors->first('role') }}</span>
        </label>

        <!-- Dynamic Password Box (Password, Meter, Rules, Confirm Password) -->
        <div class="pw" data-n="p"></div>

        @if ($errors->has('password'))
            <span class="err text-[11px] text-rose-500 font-medium mb-1 block" style="display:block">{{ $errors->first('password') }}</span>
        @endif

        <!-- Dynamic Captcha Box -->
        <div class="capw" data-cap></div>

        <!-- Checkbox Persetujuan -->
        <label class="flex items-start gap-2 text-[11px] text-gray-600 mt-1 mb-1 cursor-pointer select-none">
            <input type="checkbox" name="agree" class="w-3.5 h-3.5 mt-0.5 rounded border-gray-300 text-orange-500 focus:ring-orange-400 accent-orange-500 shrink-0" @checked(old('agree'))>
            <span>Saya menyetujui <a class="font-bold text-orange-600 hover:underline" href="#privacy" data-toast="Kebijakan Privasi PT Equityworld Futures.">Kebijakan Privasi &amp; Ketentuan</a>.</span>
        </label>
        <span class="err text-[11px] text-rose-500 font-medium ml-5 mb-1 block" id="agreeErr" style="display:none">Anda harus menyetujui kebijakan privasi.</span>

        <!-- Tombol Submit -->
        <div class="pt-1">
            <button class="w-full sm:w-auto inline-flex items-center justify-center px-6 py-2 rounded-xl bg-orange-500 hover:bg-orange-600 text-white font-bold text-xs uppercase tracking-wider shadow-md hover:shadow-orange-500/30 hover:-translate-y-0.5 active:translate-y-0 transition-all cursor-pointer" type="submit">
                DAFTAR SEKARANG
            </button>
        </div>
    </form>

    <!-- Switcher ke Login -->
    <p class="mt-2.5 pt-2 border-t border-gray-100 text-xs text-gray-500 text-center sm:text-left">
        Sudah punya akun demo? 
        <a class="font-bold text-orange-600 hover:text-orange-700 hover:underline transition-colors" href="{{ route('login') }}">
            Masuk di sini &rarr;
        </a>
    </p>
</div>
@endsection
