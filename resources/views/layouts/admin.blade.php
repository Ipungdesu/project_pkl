<!DOCTYPE html>
<html class="h-full" lang="id">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="web_dashboard" name="shell-type">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Portal Admin') | PT Equityworld Futures</title>

    <link rel="icon" type="image/png" href="{{ asset('assets/logo-icon.png') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=JetBrains+Mono:wght@400;500&family=Newsreader:ital,opsz,wght@0,6..72,400;0,6..72,500;1,6..72,400&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" rel="stylesheet">

    <style>
        @layer base {
            html, body { margin: 0; padding: 0; }
            body { overscroll-behavior: none; }
            main > :first-child { margin-top: 0 !important; }
            main > :last-child { margin-bottom: 0 !important; }
        }
        ::-webkit-scrollbar { display: none; }
        body, .font-body-md, .font-body-sm, .font-body-sm-medium, .font-caption, .font-caption-bold, .font-micro, .font-micro-uppercase, .font-button-md, .font-subtitle {
            font-family: 'Plus Jakarta Sans', 'Inter', sans-serif !important;
        }
        h1, h2, h3, .font-heading-1, .font-heading-2, .font-heading-3, .font-heading-4, .font-heading-5, .font-serif, .font-stat-display {
            font-family: 'Plus Jakarta Sans', 'Inter', sans-serif !important;
            letter-spacing: -0.01em !important;
        }
    </style>

    <script src="https://cdn.tailwindcss.com"></script>
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "background": "#fcf9f8",
                        "slate": "#4a4a4a",
                        "charcoal": "#2c2c2c",
                        "sunshine-500": "#ffb83e",
                        "cream-deeper": "#fff0c2",
                        "on-surface": "#1b1b1c",
                        "secondary-fixed-dim": "#ffba45",
                        "on-secondary-fixed": "#281800",
                        "surface-variant": "#e5e2e1",
                        "hairline": "#e5e5e5",
                        "surface-container-lowest": "#ffffff",
                        "yellow-saturated": "#ffd900",
                        "cream-light": "#fffaeb",
                        "canvas": "#ffffff",
                        "inverse-surface": "#303030",
                        "surface": "#fafafa",
                        "footer-cream": "#fff8e0",
                        "surface-cream": "#fff8e0",
                        "on-surface-variant": "#5c4038",
                        "surface-code": "#1c1c1e",
                        "on-tertiary": "#ffffff",
                        "surface-tint": "#ad3300",
                        "error": "#ba1a1a",
                        "block-5": "#ffe295",
                        "tertiary-fixed-dim": "#e7c400",
                        "primary-deep": "#cc3a05",
                        "muted": "#a8a8a8",
                        "secondary-container": "#fdb73d",
                        "sunshine-300": "#ffd06a",
                        "surface-container-highest": "#e5e2e1",
                        "primary-fixed-dim": "#ffb59e",
                        "surface-container-low": "#f6f3f2",
                        "tertiary-container": "#c8aa00",
                        "primary-container": "#d34000",
                        "tertiary-fixed": "#ffe165",
                        "ink": "#1f1f1f",
                        "surface-container-high": "#eae7e7",
                        "outline-variant": "#e5beb3",
                        "sunshine-800": "#ff8105",
                        "on-secondary": "#ffffff",
                        "on-tertiary-container": "#4b3f00",
                        "surface-bright": "#fcf9f8",
                        "on-primary-container": "#fffbff",
                        "stone": "#8a8a8a",
                        "sunshine-700": "#ffa110",
                        "on-primary": "#ffffff",
                        "block-7": "#ff8105",
                        "on-tertiary-fixed": "#221b00",
                        "beige-deep": "#e6d5a8",
                        "on-tertiary-fixed-variant": "#544600",
                        "inverse-on-surface": "#f3f0ef",
                        "surface-container": "#f0eded",
                        "sunshine-900": "#ff8a00",
                        "hairline-soft": "#ededed",
                        "surface-dim": "#dcd9d9",
                        "on-error-container": "#93000a",
                        "error-container": "#ffdad6",
                        "on-cream": "#1f1f1f",
                        "secondary": "#805600",
                        "primary": "#a93100",
                        "on-error": "#ffffff",
                        "block-6": "#ffd900",
                        "steel": "#6a6a6a",
                        "on-secondary-container": "#6e4900",
                        "outline": "#907066",
                        "hairline-strong": "#c7c7c7",
                        "on-background": "#1b1b1c",
                        "on-dark-muted": "#a8a8a8",
                        "link": "#fa520f",
                        "on-secondary-fixed-variant": "#614000",
                        "primary-fixed": "#ffdbd0",
                        "ink-tint": "#3d3d3d",
                        "inverse-primary": "#ffb59e",
                        "tertiary": "#6f5d00",
                        "on-primary-fixed-variant": "#842500",
                        "cream": "#fff8e0",
                        "on-dark": "#ffffff",
                        "on-primary-fixed": "#3a0b00",
                        "secondary-fixed": "#ffddb0",
                        "surface-cream-soft": "#fffaeb"
                    },
                    borderRadius: { "DEFAULT": "0.25rem", "lg": "0.5rem", "xl": "0.75rem", "full": "9999px" },
                    spacing: {
                        "space-xs": "0.5rem", "space-xxxl": "2.5rem", "margin-mobile": "1rem", "space-md": "1rem", "space-xxl": "2rem",
                        "margin": "2.5rem", "space-sm": "0.75rem", "gutter": "1.5rem", "space-xxs": "0.25rem", "gutter-mobile": "1rem",
                        "space-xl": "1.5rem", "space-lg": "1.25rem"
                    },
                    fontFamily: {
                        "heading-1-mobile": [ "Newsreader" ], "heading-3": [ "Inter" ], "subtitle": [ "Inter" ], "heading-1": [ "Newsreader" ],
                        "caption": [ "Inter" ], "body-sm": [ "Inter" ], "code-md": [ "JetBrains Mono" ], "hero-display-mobile": [ "Newsreader" ],
                        "caption-bold": [ "Inter" ], "stat-display": [ "Newsreader" ], "heading-2": [ "Inter" ], "body-md-medium": [ "Inter" ],
                        "heading-4": [ "Inter" ], "body-sm-medium": [ "Inter" ], "display-lg": [ "Newsreader" ], "display-lg-mobile": [ "Newsreader" ],
                        "button-md": [ "Inter" ], "hero-display": [ "Newsreader" ], "micro": [ "Inter" ], "heading-5": [ "Inter" ],
                        "micro-uppercase": [ "Inter" ], "body-md": [ "Inter" ]
                    },
                    fontSize: {
                        "heading-1-mobile": [ "32px", { "lineHeight": "1.20", "fontWeight": "400" } ],
                        "heading-3": [ "28px", { "lineHeight": "1.25", "fontWeight": "500" } ],
                        "subtitle": [ "18px", { "lineHeight": "1.50", "fontWeight": "400" } ],
                        "heading-1": [ "52px", { "lineHeight": "1.15", "letterSpacing": "-0.5px", "fontWeight": "400" } ],
                        "caption": [ "13px", { "lineHeight": "1.40", "fontWeight": "400" } ],
                        "body-sm": [ "14px", { "lineHeight": "1.50", "fontWeight": "400" } ],
                        "code-md": [ "14px", { "lineHeight": "1.50", "fontWeight": "400" } ],
                        "hero-display-mobile": [ "48px", { "lineHeight": "1.10", "letterSpacing": "-1px", "fontWeight": "400" } ],
                        "caption-bold": [ "13px", { "lineHeight": "1.40", "fontWeight": "600" } ],
                        "stat-display": [ "56px", { "lineHeight": "1.10", "letterSpacing": "-1px", "fontWeight": "400" } ],
                        "heading-2": [ "36px", { "lineHeight": "1.20", "letterSpacing": "-0.5px", "fontWeight": "500" } ],
                        "body-md-medium": [ "16px", { "lineHeight": "1.55", "fontWeight": "500" } ],
                        "heading-4": [ "22px", { "lineHeight": "1.30", "fontWeight": "500" } ],
                        "body-sm-medium": [ "14px", { "lineHeight": "1.50", "fontWeight": "500" } ],
                        "display-lg": [ "64px", { "lineHeight": "1.10", "letterSpacing": "-1px", "fontWeight": "400" } ],
                        "display-lg-mobile": [ "38px", { "lineHeight": "1.15", "letterSpacing": "-0.5px", "fontWeight": "400" } ],
                        "button-md": [ "14px", { "lineHeight": "1.30", "fontWeight": "500" } ],
                        "hero-display": [ "84px", { "lineHeight": "1.05", "letterSpacing": "-1.5px", "fontWeight": "400" } ],
                        "micro": [ "12px", { "lineHeight": "1.40", "fontWeight": "500" } ],
                        "heading-5": [ "18px", { "lineHeight": "1.40", "fontWeight": "500" } ],
                        "micro-uppercase": [ "11px", { "lineHeight": "1.40", "letterSpacing": "1px", "fontWeight": "600" } ],
                        "body-md": [ "16px", { "lineHeight": "1.55", "fontWeight": "400" } ]
                    }
                }
            }
        };
    </script>
    @stack('styles')
</head>
<body class="bg-background font-body-md text-on-surface antialiased">
    <!-- ================= SIDEBAR TETAP (KIRI) ================= -->
    <aside class="fixed left-0 top-0 bottom-0 w-[260px] bg-charcoal z-50 flex flex-col justify-between shadow-[0_1px_8px_rgba(0,0,0,0.04)] select-none">
        <div class="flex flex-col">
            <!-- Brand Portal Header -->
            <a href="{{ route('admin.dashboard') }}" class="h-16 px-space-lg flex items-center justify-between no-underline hover:opacity-95 transition-opacity">
                <div class="flex items-center gap-space-xs">
                    <div class="w-8 h-8 rounded-lg bg-primary-container flex items-center justify-center text-on-primary-container font-heading-4 font-serif">
                        E
                    </div>
                    <div class="flex flex-col">
                        <span class="font-caption-bold text-caption-bold text-on-dark tracking-tight leading-none">PT EQUITYWORLD</span>
                        <span class="font-micro-uppercase text-micro-uppercase text-sunshine-300 tracking-wider">FUTURES PORTAL</span>
                    </div>
                </div>
                <span class="px-space-xs py-space-xxs rounded-full bg-surface-code font-micro-uppercase text-micro-uppercase text-on-dark-muted">V2.4</span>
            </a>

            <!-- Navigasi Menu Utama -->
            <div class="px-space-md pt-space-md">
                <div class="font-micro-uppercase text-micro-uppercase text-stone px-space-xs mb-space-xs">Navigasi Utama</div>
                <nav class="flex flex-col gap-space-xxs">
                    <!-- 1. Beranda EIS -->
                    <a href="{{ route('admin.dashboard') }}"
                       class="flex items-center justify-between px-space-sm py-space-xs rounded-lg transition-colors {{ request()->routeIs('admin.dashboard') ? 'bg-ink-tint text-on-dark font-medium' : 'text-on-dark-muted hover:bg-ink-tint hover:text-on-dark' }}">
                        <span class="font-body-sm text-body-sm">Beranda</span>
                        <span class="font-micro text-micro text-stone">EIS</span>
                    </a>

                    <!-- 2. Calon Nasabah -->
                    <a href="{{ route('admin.calon-nasabah.index') }}"
                       class="flex items-center justify-between px-space-sm py-space-xs rounded-lg transition-colors {{ request()->routeIs('admin.calon-nasabah.*') ? 'bg-ink-tint text-on-dark font-medium' : 'text-on-dark-muted hover:bg-ink-tint hover:text-on-dark' }}">
                        <span class="font-body-sm text-body-sm">Calon Nasabah</span>
                    </a>

                    <!-- 3. Pendaftar Magang & Fulltime -->
                    <a href="{{ route('admin.pendaftar.index') }}"
                       class="flex items-center justify-between px-space-sm py-space-xs rounded-lg transition-colors {{ request()->routeIs('admin.pendaftar.*') ? 'bg-ink-tint text-on-dark font-medium' : 'text-on-dark-muted hover:bg-ink-tint hover:text-on-dark' }}">
                        <span class="font-body-sm text-body-sm">Pendaftar Magang &amp; Fulltime</span>
                    </a>

                    <!-- 4. Sertifikat -->
                    <a href="{{ route('admin.sertifikat.index') }}"
                       class="flex items-center justify-between px-space-sm py-space-xs rounded-lg transition-colors {{ request()->routeIs('admin.sertifikat.*') ? 'bg-ink-tint text-on-dark font-medium' : 'text-on-dark-muted hover:bg-ink-tint hover:text-on-dark' }}">
                        <span class="font-body-sm text-body-sm">Sertifikat</span>
                    </a>

                    <!-- 5. Coming Soon -->
                    <a href="#coming-soon" onclick="alert('Modul ini sedang dalam tahap pengembangan & kepatuhan regulasi.'); return false;"
                       class="flex items-center justify-between px-space-sm py-space-xs rounded-lg text-on-dark-muted hover:bg-ink-tint hover:text-on-dark transition-colors">
                        <span class="font-body-sm text-body-sm">Coming Soon</span>
                        <span class="px-space-xs py-space-xxs rounded-full bg-cream-deeper text-secondary font-micro-uppercase text-micro-uppercase">Segera</span>
                    </a>

                    <!-- 6. Pengaturan Akun & Profil -->
                    <a href="{{ route('admin.pengaturan.index') }}"
                       class="flex items-center justify-between px-space-sm py-space-xs rounded-lg transition-colors {{ request()->routeIs('admin.pengaturan.*') ? 'bg-ink-tint text-on-dark font-medium' : 'text-on-dark-muted hover:bg-ink-tint hover:text-on-dark' }}">
                        <span class="font-body-sm text-body-sm">Pengaturan</span>
                    </a>
                </nav>
            </div>
        </div>

        <!-- Bagian Bawah: Kepatuhan & Logout -->
        <div class="flex flex-col p-space-md gap-space-sm">
            <div class="bg-surface-code rounded-lg p-space-sm">
                <div class="font-micro-uppercase text-micro-uppercase text-sunshine-300 mb-space-xxs">Kepatuhan &amp; Regulasi</div>
                <div class="font-caption text-caption text-on-dark-muted leading-tight">
                    Terdaftar resmi &amp; diawasi oleh Bappebti dan Kliring Berjangka Indonesia (KBI).
                </div>
            </div>
            <div class="flex items-center justify-between pt-space-xs">
                <div class="flex items-center gap-space-xs">
                    <div class="w-2 h-2 rounded-full bg-secondary-container animate-pulse"></div>
                    <span class="font-micro text-micro text-on-dark-muted">Audit Sesi Aktif</span>
                </div>
                <!-- Form Logout Aman -->
                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf
                    <button type="submit" class="font-button-md text-button-md text-on-dark-muted hover:text-on-dark transition-colors cursor-pointer bg-transparent border-0 p-0">
                        Keluar
                    </button>
                </form>
            </div>
        </div>
    </aside>

    <!-- ================= AREA KONTEN UTAMA (KANAN) ================= -->
    <div class="pl-[260px] min-h-screen flex flex-col justify-between">
        <div class="w-full">
            <!-- Header Top Bar -->
            <header class="fixed top-0 left-[260px] right-0 h-16 bg-surface-bright/90 backdrop-blur-xl z-40 shadow-[0_1px_8px_rgba(0,0,0,0.04)]">
                <div class="w-full h-16 px-space-xl flex items-center justify-between gap-space-lg">
                    <!-- Search Input -->
                    <div class="flex items-center flex-1 max-w-xl">
                        <div class="w-full h-11 bg-surface-container-lowest rounded-lg px-space-md flex items-center gap-space-sm">
                            <span class="material-symbols-outlined text-stone text-[18px]">search</span>
                            <input class="w-full bg-transparent font-body-sm text-body-sm text-on-surface placeholder:text-muted focus:outline-none" 
                                   placeholder="Cari nasabah, pelamar, ID sertifikat..." 
                                   type="text">
                        </div>
                    </div>

                    <!-- Meta Badges & User Status -->
                    <div class="flex items-center gap-space-lg">
                        <div class="hidden lg:flex items-center gap-space-xs px-space-sm py-space-xxs rounded-full bg-cream">
                            <span class="material-symbols-outlined text-secondary text-[16px]">schedule</span>
                            <span class="font-code-md text-code-md text-on-surface" id="liveClock">WIB --:--:--</span>
                        </div>
                        <div class="hidden xl:flex items-center gap-space-xs text-stone">
                            <span class="material-symbols-outlined text-[16px]">location_on</span>
                            <span class="font-caption text-caption">Cyber 2 Tower, Jakarta</span>
                        </div>
                        <div class="relative flex items-center justify-center p-space-xs text-stone hover:text-on-surface transition-colors cursor-pointer" title="Notifikasi Sistem">
                            <span class="material-symbols-outlined text-[20px]">notifications</span>
                            <span class="absolute top-1 right-1 w-2 h-2 rounded-full bg-primary"></span>
                        </div>
                        <a href="{{ route('admin.pengaturan.index') }}" class="flex items-center gap-space-sm pl-space-sm no-underline group">
                            <div class="flex flex-col text-right">
                                <span class="font-body-sm-medium text-body-sm-medium text-on-surface leading-tight group-hover:text-primary transition-colors">
                                    {{ auth()->user()?->name ?? 'Mahendra Kusuma' }}
                                </span>
                                <span class="font-micro text-micro text-stone leading-tight">
                                    {{ auth()->user()?->role === 'operator' ? 'Operator EWF' : 'Super Admin' }}
                                </span>
                            </div>
                            <div class="w-8 h-8 rounded-full bg-primary flex items-center justify-center text-on-primary font-bold text-xs uppercase shadow-sm">
                                {{ substr(auth()->user()?->name ?? 'M', 0, 1) }}
                            </div>
                        </a>
                    </div>
                </div>
            </header>

            <!-- Main Page Content Slot -->
            <main class="w-full pt-16 bg-background min-h-[calc(100vh-16px)]">
                @if (session('status'))
                    <div class="max-w-[1400px] mx-auto px-space-xl pt-space-md">
                        <div class="p-space-md rounded-xl bg-emerald-50 border border-emerald-200 text-emerald-800 text-body-sm flex items-center justify-between">
                            <div class="flex items-center gap-2">
                                <span class="material-symbols-outlined text-emerald-600">check_circle</span>
                                <span>{{ session('status') }}</span>
                            </div>
                            <button type="button" onclick="this.parentElement.remove()" class="text-emerald-600 hover:text-emerald-800 text-xs font-bold uppercase">&times;</button>
                        </div>
                    </div>
                @endif

                @if ($errors->any())
                    <div class="max-w-[1400px] mx-auto px-space-xl pt-space-md">
                        <div class="p-space-md rounded-xl bg-rose-50 border border-rose-200 text-rose-800 text-body-sm">
                            <div class="flex items-center gap-2 font-bold mb-1">
                                <span class="material-symbols-outlined text-rose-600">error</span>
                                <span>Terdapat beberapa kesalahan:</span>
                            </div>
                            <ul class="list-disc list-inside text-xs space-y-0.5">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endif

                @yield('content')
            </main>
        </div>

        <!-- Signature Sunset Horizon Gradient Stripe -->
        <div class="w-full h-2 bg-gradient-to-r from-yellow-saturated via-sunshine-700 to-primary"></div>
    </div>

    <!-- Live Clock Script -->
    <script>
        (function() {
            function updateClock() {
                var now = new Date();
                var hours = String(now.getHours()).padStart(2, '0');
                var minutes = String(now.getMinutes()).padStart(2, '0');
                var seconds = String(now.getSeconds()).padStart(2, '0');
                var el = document.getElementById('liveClock');
                if (el) el.textContent = 'WIB ' + hours + ':' + minutes + ':' + seconds;
            }
            updateClock();
            setInterval(updateClock, 1000);
        })();
    </script>
    @stack('scripts')
</body>
</html>