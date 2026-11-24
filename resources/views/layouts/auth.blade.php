<!DOCTYPE html>
<html lang="id" class="h-full">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title') | EquityWorld Futures</title>
    <link rel="icon" type="image/png" href="{{ asset('assets/logo-icon.png') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['"Plus Jakarta Sans"', 'Inter', 'system-ui', 'sans-serif'],
                    },
                    colors: {
                        brand: {
                            50: '#fff7ed',
                            100: '#ffedd5',
                            200: '#fed7aa',
                            300: '#fdba74',
                            400: '#fb923c',
                            500: '#f7941d',
                            600: '#ea580c',
                            700: '#c2410c',
                        }
                    },
                    animation: {
                        'spin-slow': 'spin 22s linear infinite',
                        'spin-reverse': 'spin-rev 28s linear infinite',
                        'float': 'float 4s ease-in-out infinite',
                        'pulse-glow': 'pulse-glow 3.5s ease-in-out infinite',
                    },
                    keyframes: {
                        'spin-rev': {
                            '0%': { transform: 'rotate(360deg)' },
                            '100%': { transform: 'rotate(0deg)' },
                        },
                        'float': {
                            '0%, 100%': { transform: 'translateY(0px)' },
                            '50%': { transform: 'translateY(-5px)' },
                        },
                        'pulse-glow': {
                            '0%, 100%': { opacity: '0.45', transform: 'scale(0.98)' },
                            '50%': { opacity: '0.85', transform: 'scale(1.06)' },
                        }
                    }
                }
            }
        }
    </script>

    <style>
        /* Komponen Form Presisi & Kompak */
        .f { display: block; position: relative; margin-bottom: 0.65rem; }
        .f > b { display: block; font-size: 0.72rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.05em; color: #374151; margin-bottom: 0.25rem; }
        .f > b em { color: #e11d48; font-style: normal; margin-left: 2px; }
        .f input,
        .f select,
        .f textarea {
            width: 100%;
            height: 2.45rem;
            border-radius: 0.65rem;
            border: 1px solid #d1d5db;
            background: #ffffff;
            color: #111827;
            padding: 0 0.85rem;
            font-size: 0.8125rem;
            font-weight: 500;
            outline: none;
            transition: all 0.15s ease;
        }
        .f textarea {
            height: auto;
            min-height: 4.5rem;
            padding: 0.6rem 0.85rem;
        }
        .f input::placeholder,
        .f textarea::placeholder { color: #9ca3af; font-size: 0.78rem; }
        .f input:focus,
        .f select:focus,
        .f textarea:focus {
            border-color: #f7941d;
            box-shadow: 0 0 0 3px rgba(247, 148, 29, 0.18);
        }
        .f.bad input,
        .f.bad select,
        .f.bad textarea {
            border-color: #ef4444;
            background-color: #fffafb;
        }
        .f.bad input:focus,
        .f.bad select:focus,
        .f.bad textarea:focus {
            box-shadow: 0 0 0 3px rgba(239, 68, 68, 0.15);
        }
        .err {
            display: none;
            color: #ef4444;
            font-size: 0.7rem;
            font-weight: 500;
            margin-top: 0.2rem;
        }
        .f.bad .err, .capw.bad .err { display: block; }
        
        /* Tombol Eye */
        .eye {
            position: absolute;
            right: 0.5rem;
            top: 1.65rem;
            width: 1.85rem;
            height: 1.85rem;
            border: 0;
            background: transparent;
            color: #9ca3af;
            cursor: pointer;
            border-radius: 0.375rem;
            display: grid;
            place-items: center;
            transition: color 0.15s ease;
        }
        .eye:hover { color: #4b5563; }
        .eye svg { width: 1.1rem; height: 1.1rem; fill: none; stroke: currentColor; stroke-width: 1.8; stroke-linecap: round; stroke-linejoin: round; }
        .eye .sl { display: none; }
        .eye.on .sl { display: block; }
        
        /* Captcha Box Kompak */
        .capw { margin-bottom: 0.55rem; }
        .cap {
            display: flex;
            align-items: center;
            width: 235px;
            max-width: 100%;
            height: 3.15rem;
            border: 1px solid #e5e7eb;
            background: #f9fafb;
            border-radius: 0.65rem;
            padding: 0 0.75rem;
            cursor: pointer;
            font-size: 0.75rem;
            font-weight: 600;
            color: #374151;
            transition: all 0.15s ease;
            user-select: none;
        }
        .cap:hover { background: #f3f4f6; border-color: #d1d5db; }
        .cap .bx {
            width: 1.35rem;
            height: 1.35rem;
            border: 2px solid #cbd5e1;
            border-radius: 0.35rem;
            background: #ffffff;
            display: grid;
            place-items: center;
            flex-shrink: 0;
            margin-right: 0.65rem;
            transition: all 0.15s ease;
        }
        .cap .rc {
            margin-left: auto;
            align-self: stretch;
            padding-left: 0.65rem;
            border-left: 1px solid #e5e7eb;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 1px;
            font-size: 0.5rem;
            color: #9ca3af;
        }
        .cap .rc svg { width: 1.4rem; height: 1.4rem; }
        .cap.spin .bx {
            border-color: #f7941d;
            border-top-color: transparent;
            border-radius: 50%;
            animation: spin 0.7s linear infinite;
        }
        .cap.ok .bx {
            border-color: #16a34a;
            background: #16a34a;
            color: #ffffff;
        }
        .cap.ok .bx::after {
            content: "✓";
            font-size: 0.85rem;
            font-weight: 800;
            line-height: 1;
        }
        .capw.bad .cap { border-color: #f87171; background: #fff5f5; }

        /* Password Meter & Rules Kompak */
        .meter {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 0.3rem;
            margin: -0.15rem 0 0.25rem;
        }
        .meter i {
            height: 3.5px;
            border-radius: 9999px;
            background: #e5e7eb;
            transition: background 0.25s ease;
        }
        .meterl { height: 0.95rem; font-size: 0.7rem; font-weight: 700; }
        .rules {
            list-style: none;
            margin: 0 0 0.65rem;
            padding: 0;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 0.25rem 0.5rem;
            font-size: 0.7rem;
            color: #6b7280;
        }
        @media (max-width: 640px) {
            .rules { grid-template-columns: 1fr; }
        }
        .rules li { display: flex; align-items: center; gap: 0.35rem; }
        .rules li::before {
            content: "";
            width: 0.75rem;
            height: 0.75rem;
            border-radius: 50%;
            border: 1.5px solid #cbd5e1;
            flex-shrink: 0;
            transition: all 0.15s ease;
        }
        .rules li.ok { color: #16a34a; font-weight: 600; }
        .rules li.ok::before {
            background: #16a34a url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16'%3E%3Cpath d='M4.5 8.3l2.3 2.3 4.7-4.9' fill='none' stroke='%23fff' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'/%3E%3C/svg%3E") center/10px no-repeat;
            border-color: #16a34a;
        }

        /* Input OTP Kompak */
        .otp { display: flex; gap: 0.45rem; justify-content: center; margin: 0.4rem 0 0.65rem; }
        .otp input {
            width: 2.6rem;
            height: 3.1rem;
            text-align: center;
            font-size: 1.25rem;
            font-weight: 800;
            border-radius: 0.65rem;
            border: 1.5px solid #d1d5db;
            background: #ffffff;
            color: #111827;
            outline: none;
            transition: all 0.15s ease;
        }
        .otp input:focus {
            border-color: #f7941d;
            box-shadow: 0 0 0 3px rgba(247, 148, 29, 0.2);
        }
        .otp.bad input { border-color: #ef4444; background: #fff5f5; }
        @media (max-width: 400px) {
            .otp { gap: 0.3rem; }
            .otp input { width: 2.2rem; height: 2.8rem; font-size: 1.1rem; }
        }

        /* Toast Popup */
        .toast {
            position: fixed;
            left: 50%;
            bottom: calc(1.25rem + env(safe-area-inset-bottom, 0px));
            transform: translate(-50%, 1.25rem);
            opacity: 0;
            background: #111827;
            color: #ffffff;
            padding: 0.55rem 1.15rem;
            border-radius: 9999px;
            font-size: 0.8rem;
            font-weight: 600;
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.3);
            transition: all 0.25s cubic-bezier(0.16, 1, 0.3, 1);
            z-index: 50;
            pointer-events: none;
            max-width: 90vw;
            text-align: center;
        }
        .toast.on { opacity: 1; transform: translate(-50%, 0); }
        
        .logo > .fb { display: none; }
        .logo.static > * { display: none; }
        .logo.static > .fb { display: block; }
    </style>
</head>
<body class="min-h-screen flex flex-col justify-between py-2 sm:py-3 px-3 sm:px-6 relative text-gray-800 antialiased selection:bg-orange-500 selection:text-white overflow-y-auto">

    <!-- ================= LATAR BELAKANG GEDUNG (JELAS & ELEGAN) ================= -->
    <div class="fixed inset-0 -z-10 overflow-hidden pointer-events-none select-none">
        <!-- Background Image Gedung (Opacity 85% terlihat jelas) -->
        <div class="absolute inset-0 bg-cover bg-center opacity-85 transition-opacity"
             style="background-image: url('{{ asset('assets/gedung.webp') }}');">
        </div>
        <!-- Lapisan Gradien Elegan EWF -->
        <div class="absolute inset-0 bg-gradient-to-tr from-slate-950/70 via-slate-900/40 to-amber-600/25"></div>
        <div class="absolute inset-0 bg-radial-at-c from-transparent via-black/25 to-black/50"></div>
    </div>

    <!-- ================= HEADER TOP ================= -->
    <header class="w-full max-w-4xl lg:max-w-5xl mx-auto mb-1.5 px-2 flex items-center justify-between z-10 shrink-0">
        <!-- Brand Logo: HANYA LOGO BERSIH TANPA TULISAN DI BAWAHNYA -->
        <a href="{{ route('beranda') }}" class="group flex items-center gap-2.5 no-underline transition hover:opacity-95">
            <img src="{{ asset('assets/logo-icon.png') }}" 
                 alt="Logo PT Equityworld Futures" 
                 class="w-7 h-7 sm:w-8 sm:h-8 object-contain shrink-0 drop-shadow-md group-hover:scale-105 transition-transform" />
            <span class="font-extrabold text-xs sm:text-sm tracking-tight text-white drop-shadow-md group-hover:text-orange-300 transition-colors">
                EQUITYWORLD FUTURES
            </span>
        </a>

        <!-- Tombol Kembali ke Beranda -->
        <a href="{{ route('beranda') }}" 
           class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-white/85 hover:bg-white text-[11px] font-bold text-gray-800 hover:text-orange-600 border border-white/70 shadow-sm transition-all backdrop-blur-md">
            <span>← Beranda</span>
        </a>
    </header>

    <!-- ================= KARTU UTAMA AUTH ================= -->
    <main class="w-full max-w-5xl lg:max-w-6xl mx-auto my-auto bg-white/95 backdrop-blur-xl border border-white/70 rounded-2xl sm:rounded-3xl shadow-[0_20px_50px_-15px_rgba(0,0,0,0.35)] grid grid-cols-1 lg:grid-cols-12 overflow-hidden z-10 transition-all shrink-0 lg:min-h-[580px]">
        
        <!-- KOLOM KIRI: HERO & ANIMASI 3D GLOBE -->
        <aside class="lg:col-span-5 bg-gradient-to-b from-orange-50/90 via-white/70 to-orange-50/90 p-4 sm:p-6 lg:p-7 flex flex-col items-center justify-center relative border-b lg:border-b-0 lg:border-r border-orange-100/80 overflow-hidden select-none shrink-0 min-h-[320px] lg:min-h-full">
            
            <!-- Efek Halo Pendaran Cahaya (Ambient Glow) -->
            <div class="absolute w-52 h-52 rounded-full bg-gradient-to-tr from-orange-500/35 via-amber-400/25 to-yellow-300/20 blur-2xl animate-pulse-glow -z-0 pointer-events-none"></div>

            <!-- Wadah Globe Beranimasi Floating dengan UKURAN TETAP PRESISI (185px) DI SETIAP HALAMAN -->
            <div class="relative w-[165px] sm:w-[185px] aspect-[760/853] shrink-0 flex items-center justify-center z-10 animate-float logo">
                
                <!-- Lingkaran Luar Berputar Halus (Futuristic Tech Orbit) -->
                <div class="absolute -inset-3.5 rounded-full border border-orange-400/25 border-dashed animate-spin-reverse pointer-events-none"></div>

                <!-- Lapisan Dasar: Logo Background (Bagian Belakang Cincin) -->
                <img src="{{ asset('assets/logo-bg.webp') }}" 
                     alt="EquityWorld Futures" 
                     class="absolute inset-0 w-full h-full object-contain block z-0 select-none pointer-events-none">

                <!-- 3D Globe Canvas (Animasi Bola Dunia Berputar Mulus) -->
                <canvas id="gl" width="560" height="629" 
                        class="absolute inset-0 w-full h-full block z-10" 
                        aria-hidden="true"></canvas>

                <!-- Cincin Depan & Teks EWF (Statis Presisi Membungkus Bola Dunia) -->
                <img src="{{ asset('assets/logo-ring.webp') }}" 
                     alt="" 
                     class="absolute inset-0 w-full h-full object-contain block z-20 pointer-events-none drop-shadow-[0_2px_8px_rgba(247,148,29,0.25)]">

                <!-- Gambar Fallback (Jika Canvas Tidak Didukung) -->
                <img class="fb hidden absolute inset-0 w-full h-full object-contain" 
                     src="{{ asset('assets/logo-full.webp') }}" 
                     alt="EquityWorld Futures">
            </div>

            <!-- Texture Daratan untuk Globe (Hidden) -->
            <img id="land" hidden alt="" src="{{ asset('assets/land.png') }}">

            <!-- Teks Tagline -->
            <p class="mt-2 text-[11px] sm:text-xs text-gray-600 font-semibold text-center max-w-[220px] leading-snug">
                Platform Perdagangan Berjangka Komoditi &amp; Derivatif Nasional
            </p>

            <!-- Badge Regulasi Resmi -->
            <div class="mt-2 inline-flex items-center gap-1.5 px-2.5 py-0.5 bg-white/90 border border-orange-200/90 rounded-full shadow-xs text-[10px] font-bold text-gray-700">
                <span class="relative flex h-1.5 w-1.5">
                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
                    <span class="relative inline-flex rounded-full h-1.5 w-1.5 bg-emerald-500"></span>
                </span>
                <span>Terdaftar &amp; Diawasi BAPPEBTI &amp; JFX</span>
            </div>
        </aside>

        <!-- KOLOM KANAN: KONTEN FORM AUTH -->
        <section class="lg:col-span-7 p-4 sm:p-6 lg:p-7 flex flex-col justify-center relative overflow-y-auto" id="authPane">
            <div id="paneContent" class="w-full my-auto transition-all duration-200 ease-out">
                @yield('content')
            </div>
        </section>
    </main>

    <!-- ================= FOOTER DISCLAIMER ================= -->
    <footer class="w-full max-w-4xl lg:max-w-5xl mx-auto mt-1.5 px-3 py-1.5 bg-white/80 backdrop-blur-md rounded-xl border border-white/60 text-center text-[10px] sm:text-[10.5px] text-gray-600 shadow-sm z-10 leading-tight shrink-0">
        Anggota Jakarta Futures Exchange (JFX) &amp; Indonesia Derivatives Clearing House (KBI).<br>
        <span class="text-gray-500">Perdagangan berjangka memiliki risiko tinggi. Pastikan Anda memahami instrumen sebelum berinvestasi.</span>
    </footer>

    <!-- Toast Container -->
    <div class="toast" id="toast" role="status"></div>

    <!-- Scripts -->
    <script src="{{ asset('assets/js/globe.js') }}"></script>
    <script src="{{ asset('assets/js/auth.js') }}"></script>
</body>
</html>
