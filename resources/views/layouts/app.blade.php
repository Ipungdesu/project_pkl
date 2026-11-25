{{-- resources/views/layouts/app.blade.php --}}
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{-- Token CSRF wajib untuk request AJAX / Fetch / Form internal --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', config('app.name', 'Sistem EWF'))</title>

    {{-- Slot CSS tambahan untuk halaman internal --}}
    @stack('styles')
</head>
<body class="bg-slate-50 text-slate-800 antialiased min-h-screen flex flex-col">
    @php($user = auth()->user())
    <header class="bg-white/95 backdrop-blur border-b border-orange-100 sticky top-0 z-40">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-3 flex items-center justify-between gap-4">
            <a href="{{ route('dashboard') }}" class="flex items-center gap-2.5">
                <img src="{{ asset('assets/logo_ewf-removebg-preview-1.png') }}" alt="Logo PT Equityworld Futures" class="w-8 h-8 object-contain">
                <span class="font-bold text-gray-900 text-sm tracking-tight">PT Equityworld Futures</span>
            </a>

            <nav class="hidden md:flex items-center gap-5 text-sm font-medium text-gray-600">
                <a href="{{ route('dashboard') }}" class="hover:text-orange-600 transition">Dashboard</a>
                @if ($user?->isMagang() || $user?->isKaryawan())
                    <a href="{{ route('applicant.profile.edit') }}" class="hover:text-orange-600 transition">Profil</a>
                    <a href="{{ route('applicant.jobs.index') }}" class="hover:text-orange-600 transition">Lowongan</a>
                    <a href="{{ route('applicant.applications.index') }}" class="hover:text-orange-600 transition">Lamaran</a>
                @endif
                @if ($user?->isOperator())
                    <a href="{{ route('operator.dashboard') }}" class="hover:text-orange-600 transition">Operator</a>
                    <a href="{{ route('operator.admins.index') }}" class="hover:text-orange-600 transition">Kelola Admin</a>
                @endif
                @if ($user?->isAdmin() || $user?->isOperator())
                    <a href="{{ route('admin.dashboard') }}" class="hover:text-orange-600 transition">Admin</a>
                    <a href="{{ route('admin.applications.index') }}" class="hover:text-orange-600 transition">Lamaran</a>
                    <a href="{{ route('admin.jobs.index') }}" class="hover:text-orange-600 transition">Lowongan</a>
                    <a href="{{ route('admin.employees.index') }}" class="hover:text-orange-600 transition">Karyawan</a>
                    <a href="{{ route('admin.interns.index') }}" class="hover:text-orange-600 transition">Magang</a>
                @endif
                <a href="{{ route('beranda') }}" class="hover:text-orange-600 transition">Beranda</a>
            </nav>
<body class="bg-slate-50 text-slate-800 antialiased">

    {{-- Area utama konten halaman dalam (Dashboard Admin, Operator, Karyawan, Magang) --}}
    <main>
        @yield('content')

        {{-- Form logout terautentikasi --}}
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit">Logout</button>
        </form>
    </main>

    {{-- Slot JS / React Island tambahan untuk halaman internal --}}
    @stack('scripts')
</body>
</html>