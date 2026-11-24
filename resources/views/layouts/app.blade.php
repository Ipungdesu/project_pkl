<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', config('app.name', 'PT Equityworld Futures'))</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: { sans: ['"Plus Jakarta Sans"', '"Inter"', 'sans-serif'] },
                    colors: {
                        brand: { 50:'#fff7ed',100:'#ffedd5',200:'#fed7aa',300:'#fdba74',400:'#fb923c',500:'#f97316',600:'#ea580c',700:'#c2410c',800:'#9a3412',900:'#7c2d12' },
                        navy: { 900:'#0b1329', 950:'#070c1b' }
                    }
                }
            }
        }
    </script>
    <style>body{font-family:'Plus Jakarta Sans','Inter',sans-serif;}</style>
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

            <div class="flex items-center gap-3">
                @auth
                    <span class="hidden sm:inline text-xs text-gray-500">{{ $user->name }} <span class="text-gray-400">({{ $user->role }})</span></span>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="bg-orange-500 hover:bg-orange-600 text-white px-4 py-2 rounded-full text-xs font-semibold shadow-sm transition">Logout</button>
                    </form>
                @endauth
            </div>
        </div>
    </header>

    <main class="flex-grow">
        <div class="max-w-7xl mx-auto w-full px-4 sm:px-6 lg:px-8 py-8">
            @yield('content')
        </div>
    </main>

    <footer class="border-t border-gray-200 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4 text-xs text-gray-500 flex items-center justify-between gap-4">
            <p>&copy; {{ date('Y') }} PT Equityworld Futures</p>
            <a href="{{ route('beranda') }}" class="hover:text-orange-600 transition">Kembali ke situs</a>
        </div>
    </footer>

    @stack('scripts')
</body>
</html>