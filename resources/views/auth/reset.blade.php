@extends('layouts.auth')

@section('title', 'Password Baru')

@section('content')
<div>
    <!-- Subtitle & Judul Halaman -->
    <span class="inline-block text-[10.5px] font-bold uppercase tracking-wider text-orange-600 mb-0.5">Pembaruan Sandi</span>
    <h1 class="text-xl sm:text-2xl font-extrabold text-gray-900 tracking-tight mb-1">Buat Password Baru</h1>
    <p class="text-xs text-gray-500 mb-3.5 leading-snug">
        Gunakan kombinasi yang kuat dan aman. Password lama Anda tidak akan berlaku lagi.
    </p>


    <!-- Form Reset Password -->
    <form id="fReset" method="POST" action="{{ route('password.update') }}" data-real="1" novalidate>
        @csrf

        <div class="pw" data-n="r"></div>

        @if ($errors->has('password'))
            <span class="err text-[11px] text-rose-500 font-medium mb-1 block" style="display:block">{{ $errors->first('password') }}</span>
        @endif

        <div class="flex items-center gap-3 pt-1.5">
            <button class="inline-flex items-center justify-center px-6 py-2 rounded-xl bg-orange-500 hover:bg-orange-600 text-white font-bold text-xs uppercase tracking-wider shadow-md hover:shadow-orange-500/30 hover:-translate-y-0.5 active:translate-y-0 transition-all cursor-pointer" type="submit">
                SIMPAN PASSWORD
            </button>
            <a class="text-xs font-semibold text-gray-500 hover:text-gray-800 transition-colors" href="{{ route('login') }}">
                Batal
            </a>
        </div>
    </form>
</div>
@endsection
