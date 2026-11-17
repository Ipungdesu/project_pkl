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