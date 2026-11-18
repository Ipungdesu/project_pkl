@extends('layouts.public')

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PT Equityworld Futures | Landing Page</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>

<body class="bg-white text-gray-800 antialiased overflow-x-hidden">

    <!-- ================= NAVBAR (FLOATING) ================= -->
    <div class="fixed top-0 left-0 w-full z-50 pt-4 px-4 sm:px-6 lg:px-8">
        <nav
            class="max-w-7xl mx-auto bg-orange-200/90 backdrop-blur-md rounded-full px-4 py-2 sm:px-6 sm:py-3 flex justify-between items-center shadow-sm border border-orange-300">
            <!-- Logo -->
            <div class="flex items-center space-x-2">
                <img src="{{ asset('assets/logo_ewf-removebg-preview-1.png') }}" alt="Logo PT Equityworld Futures"
                    class="w-8 h-8 sm:w-10 sm:h-10 object-contain" />
                <span class="font-bold text-gray-900 text-sm sm:text-base">PT Equityworld Futures</span>
            </div>

            <!-- Menu Navigasi (Desktop) -->
            <div class="hidden md:flex space-x-6 lg:space-x-10 text-sm font-semibold">
                <a href="{{ route('beranda') }}" class="text-gray-900 hover:text-orange-600 transition">Beranda</a>
                <a href="{{ route('tentang') }}" class="text-gray-800 hover:text-orange-600 transition">Tentang Kami</a>
                <a href="#lowongan" class="text-gray-800 hover:text-orange-600 transition">Peluang Karir</a>
            </div>

            <!-- Tombol CTA Nav -->
            <a href="{{ auth()->check() ? route('applicant.jobs.index') : route('register') }}"
                class="bg-orange-500 hover:bg-orange-600 text-white px-4 py-2 sm:px-6 sm:py-2.5 rounded-full text-xs sm:text-sm font-bold shadow-md transition">
                Masuk / Daftar
            </a>
        </nav>
    </div>
@section('title', 'PT Equityworld Futures | Pialang Berjangka Resmi Indonesia')

@section('content')
    <!-- ================= HERO SECTION ================= -->
    <section class="relative w-full pt-32 lg:pt-40 pb-20 overflow-hidden min-h-[92vh] flex items-center">
        <!-- Gedung Background with subtle fade to white -->
        <div class="absolute inset-0 z-0">
            <div class="absolute inset-0 bg-cover bg-top opacity-[0.22]"
                style="background-image: url('{{ asset('assets/gedung-kpf.avif') }}');">
            </div>
            <div class="absolute inset-0 bg-gradient-to-b from-white/10 via-white/70 to-white"></div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 w-full">
            <div class="grid lg:grid-cols-12 gap-12 lg:gap-8 items-center">

                <!-- Kolom Kiri: Teks & Headline -->
                <div class="space-y-6 lg:col-span-7 animate-fade-in-up">
                    <!-- Top Pill Tag -->
                    <div class="inline-flex items-center space-x-2 text-xs font-bold text-gray-600 tracking-wider uppercase">
                        <span class="w-2.5 h-2.5 bg-orange-500 rounded-full flex-shrink-0 animate-pulse"></span>
                        <span class="text-orange-600">PIALANG BERJANGKA RESMI</span>
                        <span class="text-gray-300">•</span>
                        <span>MANDAT REGULASI PENUH</span>
                    </div>

                    <!-- Main Headline -->
                    <h1 class="text-4xl sm:text-5xl lg:text-[3.25rem] font-extrabold leading-tight sm:leading-tight lg:leading-[1.2] text-gray-900 tracking-tight">
                        Membangun Integritas<br>
                        Pasar Berjangka,<br>
                        <span class="text-orange-500">Mencetak Talenta</span><br>
                        <span class="text-orange-500">Finansial Berdaya Saing</span><br>
                        Tinggi.
                    </h1>

                    <!-- Deskripsi Singkat -->
                    <p class="text-gray-600 max-w-xl text-base sm:text-lg leading-relaxed">
                        PT Equityworld Futures mengintegrasikan ekosistem perdagangan komoditi teregulasi Bappebti dengan akselerasi karir profesional. Kami membuka jalur nyata bagi talenta berprestasi untuk menguasai industri keuangan derivatif nasional.
                    </p>

                <!-- Tombol Hero -->
                <div class="flex flex-wrap gap-4 pt-2">
                    <a href="#lowongan"
                        class="bg-orange-500 text-white px-8 py-3.5 rounded-lg font-bold hover:bg-orange-600 transition flex items-center space-x-2 shadow-md hover:shadow-lg">
                        <span>Lihat Peluang Karir</span>
                        <span class="ml-2 font-black">→</span>
                    </a>
                    <a href="{{ route('tentang') }}"
                        class="bg-white/80 backdrop-blur-sm border border-orange-200 text-gray-800 px-8 py-3.5 rounded-lg font-bold hover:bg-orange-50 transition shadow-sm">
                        🏛️ Tentang EWF & Regulasi
                    </a>
                </div>
                    <!-- Tombol Aksi Hero -->
                    <div class="flex flex-wrap items-center gap-4 pt-2">
                        <a href="{{ route('karir') }}"
                            class="bg-orange-500 hover:bg-orange-600 text-white font-bold px-7 py-3.5 rounded-xl shadow-md hover:shadow-lg hover:-translate-y-0.5 transition duration-200 flex items-center space-x-2 text-sm sm:text-base">
                            <span>Lihat Peluang Karir</span>
                            <span class="font-extrabold text-lg leading-none">→</span>
                        </a>
                        <a href="{{ route('tentang') }}"
                            class="bg-white/90 backdrop-blur-sm border border-gray-200 text-gray-800 font-bold px-6 py-3.5 rounded-xl hover:bg-orange-50/60 hover:border-orange-300 hover:-translate-y-0.5 transition duration-200 shadow-xs flex items-center space-x-2 text-sm sm:text-base">
                            <svg class="w-5 h-5 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                            </svg>
                            <span>Tentang EWF & Regulasi</span>
                        </a>
                    </div>

                    <!-- 3 Badge Regulasi Resmi -->
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-3 pt-6 max-w-2xl">
                        <!-- Badge Bappebti -->
                        <div class="bg-white/95 backdrop-blur-sm border border-gray-100 shadow-sm px-4 py-3 rounded-2xl flex items-center space-x-3 hover:shadow-md transition">
                            <div class="w-8 h-8 rounded-full bg-orange-50 border border-orange-200 flex items-center justify-center flex-shrink-0 text-orange-500">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-xs font-extrabold text-gray-900 leading-tight">BAPPEBTI</p>
                                <p class="text-[10px] text-gray-400 font-semibold uppercase">Diawasi Kemendag RI</p>
                            </div>
                        </div>

                        <!-- Badge BBJ -->
                        <div class="bg-white/95 backdrop-blur-sm border border-gray-100 shadow-sm px-4 py-3 rounded-2xl flex items-center space-x-3 hover:shadow-md transition">
                            <div class="w-8 h-8 rounded-full bg-orange-50 border border-orange-200 flex items-center justify-center flex-shrink-0 text-orange-500">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-xs font-extrabold text-gray-900 leading-tight">Anggota BBJ</p>
                                <p class="text-[10px] text-gray-400 font-semibold uppercase">Bursa Berjangka JKT</p>
                            </div>
                        </div>

                        <!-- Badge KBI -->
                        <div class="bg-white/95 backdrop-blur-sm border border-gray-100 shadow-sm px-4 py-3 rounded-2xl flex items-center space-x-3 hover:shadow-md transition">
                            <div class="w-8 h-8 rounded-full bg-orange-50 border border-orange-200 flex items-center justify-center flex-shrink-0 text-orange-500">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-xs font-extrabold text-gray-900 leading-tight">Kliring KBI</p>
                                <p class="text-[10px] text-gray-400 font-semibold uppercase">Segregated Account</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Kolom Kanan: Card Kantor Pusat Jakarta & Stats -->
                <div class="lg:col-span-5 relative mt-6 lg:mt-0 animate-fade-in-scale animation-delay-200">
                    <!-- Bingkai Gambar Operasional -->
                    <div class="bg-gray-900 rounded-3xl overflow-hidden h-[30rem] sm:h-[32rem] relative shadow-2xl border border-gray-100 group">
                        <!-- Placeholder Foto Aktivitas Kantor EWF (Ganti dengan file aset foto bila sudah ada) -->
                        <img src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?auto=format&fit=crop&w=900&q=80"
                            alt="Aktivitas Kantor Operasional EWF"
                            class="w-full h-full object-cover opacity-90 group-hover:scale-105 transition duration-700">

                        <!-- Overlay Teks -->
                        <div class="absolute bottom-0 left-0 w-full bg-gradient-to-t from-gray-950 via-gray-900/80 to-transparent p-6 pt-32 pb-24">
                            <span class="inline-block bg-orange-500 text-white text-[10px] font-bold px-2.5 py-1 rounded tracking-wider uppercase mb-2">
                                Kantor Pusat Jakarta
                            </span>
                            <p class="text-white font-semibold text-base sm:text-lg leading-snug max-w-sm">
                                Pusat Operasional Terintegrasi & Pusat Pembinaan Profesi Pialang Berjangka
                            </p>
                        </div>
                    </div>

                    <!-- Floating Stats Card (Kotak Statistik Cabang & Kota) -->
                    <div class="absolute -bottom-6 -left-3 sm:-left-6 bg-white p-5 sm:p-6 rounded-2xl shadow-xl border border-gray-100 flex items-center space-x-6 z-20 animate-float">
                        <div>
                            <p class="text-[11px] text-gray-400 uppercase font-semibold">Jumlah Cabang</p>
                            <p class="text-2xl sm:text-3xl font-extrabold text-gray-900 leading-none mt-1">6 Kantor</p>
                        </div>
                        <div class="w-px h-10 bg-gray-200"></div>
                        <div>
                            <p class="text-[11px] text-gray-400 uppercase font-semibold">Jaringan Kantor</p>
                            <p class="text-2xl sm:text-3xl font-extrabold text-gray-900 leading-none mt-1">4 Kota</p>
                            <p class="text-[10px] text-gray-400 mt-0.5">Seluruh Indonesia</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- ================= ALUR REKRUTMEN SECTION ================= -->
    <section class="relative w-full pt-24 pb-28 bg-gray-50 overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
            <!-- Section Tag -->
            <div class="reveal inline-block bg-gray-900 text-white text-[10px] font-bold px-4 py-1.5 rounded-full uppercase tracking-widest mb-4">
                Transparansi Seleksi
            </div>
            
            <h2 class="reveal delay-100 text-3xl md:text-4xl font-extrabold text-gray-900 tracking-tight">
                Alur Rekrutmen Karyawan & Profesional
            </h2>
            <p class="reveal delay-200 text-gray-500 mt-3 max-w-2xl mx-auto text-sm sm:text-base leading-relaxed">
                EWF menerapkan standar seleksi berjenjang, objektif, dan berorientasi pada kepatuhan finansial serta potensi kepemimpinan masa depan.
            </p>

            <!-- Cards Grid: 4 Langkah Rekrutmen -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mt-14 text-left">
                <!-- Card 01 -->
                <div class="reveal delay-100 bg-white p-7 rounded-2xl shadow-sm border border-gray-100 flex flex-col justify-between hover:shadow-md hover:-translate-y-1 transition duration-200">
                    <div>
                        <div class="flex justify-between items-center mb-6">
                            <span class="text-2xl font-black text-orange-400">01</span>
                            <div class="w-10 h-10 rounded-xl bg-orange-50 flex items-center justify-center text-orange-500">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                </svg>
                            </div>
                        </div>
                        <h3 class="font-bold text-gray-900 text-lg mb-2">Pengajuan Berkas Online</h3>
                        <p class="text-gray-500 text-xs sm:text-sm leading-relaxed">
                            Unggah Curriculum Vitae, portofolio akademik/kerja, dan kelengkapan identitas melalui portal rekrutmen resmi EWF.
                        </p>
                    </div>
                    <div class="mt-8 pt-4 border-t border-gray-50 flex items-center space-x-2 text-xs font-medium text-emerald-600">
                        <span class="w-2 h-2 bg-emerald-500 rounded-full"></span>
                        <span>Verifikasi Instan via email</span>
                    </div>
                </div>

                <!-- Card 02 -->
                <div class="reveal delay-200 bg-white p-7 rounded-2xl shadow-sm border border-gray-100 flex flex-col justify-between hover:shadow-md hover:-translate-y-1 transition duration-200">
                    <div>
                        <div class="flex justify-between items-center mb-6">
                            <span class="text-2xl font-black text-orange-400">02</span>
                            <div class="w-10 h-10 rounded-xl bg-orange-50 flex items-center justify-center text-orange-500">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                            </div>
                        </div>
                        <h3 class="font-bold text-gray-900 text-lg mb-2">Verifikasi Kualifikasi HRD</h3>
                        <p class="text-gray-500 text-xs sm:text-sm leading-relaxed">
                            Penyaringan administratif komprehensif, evaluasi profil risiko personal, dan penilaian rekam jejak integritas finansial.
                        </p>
                    </div>
                    <div class="mt-8 pt-4 border-t border-gray-50 flex items-center space-x-2 text-xs font-medium text-gray-500">
                        <svg class="w-3.5 h-3.5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span>Proses 2 - 3 hari kerja</span>
                    </div>
                </div>

                <!-- Card 03 -->
                <div class="reveal delay-300 bg-white p-7 rounded-2xl shadow-sm border border-gray-100 flex flex-col justify-between hover:shadow-md hover:-translate-y-1 transition duration-200">
                    <div>
                        <div class="flex justify-between items-center mb-6">
                            <span class="text-2xl font-black text-orange-400">03</span>
                            <div class="w-10 h-10 rounded-xl bg-orange-50 flex items-center justify-center text-orange-500">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z" />
                                </svg>
                            </div>
                        </div>
                        <h3 class="font-bold text-gray-900 text-lg mb-2">Wawancara & Psikotes</h3>
                        <p class="text-gray-500 text-xs sm:text-sm leading-relaxed">
                            Sesi pendalaman kompetensi logika, asesmen psikologi pasar, serta wawancara penerimaan oleh pimpinan cabang atau divisi.
                        </p>
                    </div>
                    <div class="mt-8 pt-4 border-t border-gray-50 flex items-center space-x-2 text-xs font-medium text-orange-600">
                        <svg class="w-3.5 h-3.5 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        <span>Zoom / Onsite di Cabang</span>
                    </div>
                </div>

                <!-- Card 04 -->
                <div class="reveal delay-400 bg-white p-7 rounded-2xl shadow-sm border border-gray-100 flex flex-col justify-between hover:shadow-md hover:-translate-y-1 transition duration-200">
                    <div>
                        <div class="flex justify-between items-center mb-6">
                            <span class="text-2xl font-black text-orange-400">04</span>
                            <div class="w-10 h-10 rounded-xl bg-orange-50 flex items-center justify-center text-orange-500">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                                </svg>
                            </div>
                        </div>
                        <h3 class="font-bold text-gray-900 text-lg mb-2">Onboarding & Pembekalan</h3>
                        <p class="text-gray-500 text-xs sm:text-sm leading-relaxed">
                            Pelatihan intensif mekanisme perdagangan derivatif, kepatuhan kode etik pialang, serta pembekalan ujian profesi WPB.
                        </p>
                    </div>
                    <div class="mt-8 pt-4 border-t border-gray-50 flex items-center space-x-2 text-xs font-medium text-orange-600">
                        <svg class="w-3.5 h-3.5 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" />
                        </svg>
                        <span>Program Sertifikasi Resmi</span>
                    </div>
                </div>
            </div>

            <!-- Banner Peringatan Rekrutmen Gratis & Aduan HRD -->
            <div class="reveal delay-200 mt-10 bg-white border border-orange-200/80 rounded-2xl p-4 sm:p-5 shadow-xs flex flex-col md:flex-row items-center justify-between gap-4 text-left">
                <div class="flex items-center space-x-3.5">
                    <div class="w-9 h-9 rounded-full bg-orange-100/70 text-orange-600 flex items-center justify-center flex-shrink-0">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                        </svg>
                    </div>
                    <p class="text-xs sm:text-sm text-gray-700 leading-snug">
                        Seluruh tahapan rekrutmen PT Equityworld Futures bersifat <strong class="text-gray-900 font-bold">gratis & tanpa dipungut biaya apapun</strong>. Waspadai segala bentuk penipuan yang mengatasnamakan manajemen EWF.
                    </p>
                </div>
                <a href="#aduan"
                    class="flex-shrink-0 text-xs sm:text-sm font-bold text-orange-600 hover:text-orange-700 flex items-center space-x-1 group">
                    <span>Pusat Aduan HRD</span>
                    <span class="group-hover:translate-x-1 transition duration-200">→</span>
                </a>
            </div>
        </div>
    </section>

    <!-- ================= LOWONGAN SECTION ================= -->
    <section id="lowongan" class="relative w-full py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4">
            <div class="text-center max-w-2xl mx-auto">
                <div class="inline-block bg-orange-50 text-orange-600 text-[10px] font-bold px-4 py-1.5 rounded-md uppercase tracking-widest mb-6">
                    Peluang Karir
                </div>
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900">Lowongan yang Sedang Dibuka</h2>
                <p class="text-gray-500 mt-3 text-sm">Temukan kesempatan untuk berkembang bersama PT Equityworld Futures.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mt-12">
                @forelse ($jobOpenings as $jobOpening)
                    <article class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 hover:shadow-md transition">
                        <span class="inline-block bg-orange-50 text-orange-600 text-[10px] font-bold px-3 py-1 rounded-full uppercase">
                            {{ $jobOpening->type === 'magang' ? 'Magang' : 'Karyawan' }}
                        </span>
                        <h3 class="font-bold text-gray-900 text-lg mt-4">{{ $jobOpening->title }}</h3>
                        <p class="text-gray-500 text-sm mt-2">{{ \Illuminate\Support\Str::limit($jobOpening->description, 160) }}</p>
                        @if ($jobOpening->deadline)
                            <p class="text-gray-400 text-xs mt-4">Batas waktu: {{ $jobOpening->deadline->format('d-m-Y') }}</p>
                        @endif
                        <a
                            href="{{ auth()->check() ? route('applicant.jobs.index') : route('register') }}"
                            class="inline-flex mt-6 bg-orange-500 hover:bg-orange-600 text-white px-5 py-2.5 rounded-lg text-sm font-bold transition"
                        >
                            Lamar
                        </a>
                    </article>
                @empty
                    <p class="md:col-span-2 lg:col-span-3 text-center text-gray-500">Belum ada lowongan yang tersedia.</p>
                @endforelse
            </div>
        </div>
    </section>

    <!-- ================= FOOTER ================= -->
    <footer class="bg-gray-100 pt-16 pb-8 border-t border-gray-200 mt-10">
        <div class="max-w-7xl mx-auto px-4 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12">
            <!-- Brand Info -->
            <div class="space-y-6">
                <div class="flex items-center space-x-3">
                    <img src="{{ asset('assets/logo_ewf-removebg-preview-1.png') }}" alt="Logo PT Equityworld Futures" class="w-8 h-8 object-contain" />
                    <span class="font-bold text-gray-900 text-sm">PT Equityworld Futures</span>
                </div>
                <p class="text-xs text-gray-500 leading-relaxed pr-4">Perusahaan pialang berjangka resmi terkemuka di
                    Indonesia. Kami menyediakan infrastruktur perdagangan komoditi dan derivatif yang transparan, aman,
                    dan berizin penuh, serta didukung kehandalan teknologi sistem informasi terkini.</p>
                <div class="flex flex-wrap gap-2">
                    <span class="bg-white border border-gray-200 text-[9px] px-2 py-1 rounded font-bold text-gray-600">ANGGOTA BBJ</span>
                    <span class="bg-white border border-gray-200 text-[9px] px-2 py-1 rounded font-bold text-gray-600">KLIRING KBI</span>
                    <span class="bg-white border border-gray-200 text-[9px] px-2 py-1 rounded font-bold text-orange-500">BAPPEBTI</span>
                </div>
            </div>

            <!-- Links 1 -->
            <div>
                <h4 class="font-bold text-gray-900 mb-6 text-sm">Tentang EWF</h4>
                <ul class="space-y-3 text-xs font-medium text-gray-500">
                    <li><a href="#" class="hover:text-orange-500 transition">Profil & Legalitas</a></li>
                    <li><a href="#" class="hover:text-orange-500 transition">Produk Komoditi & Valas</a></li>
                    <li><a href="#" class="hover:text-orange-500 transition">Rekening Terpisah (Segregated)</a></li>
                    <li><a href="#" class="hover:text-orange-500 transition">Riset Pasar & Berita</a></li>
                    <li><a href="#" class="hover:text-orange-500 transition">Tata Kelola Perusahaan</a></li>
                </ul>
            </div>
    <!-- ================= CTA BERGABUNG SECTION ================= -->
    <section class="relative w-full py-20 bg-orange-500 overflow-hidden">
        <!-- Background Wave Pattern -->
        <div class="absolute inset-0 z-0 opacity-20 pointer-events-none">
            <img src="{{ asset('assets/aset-bg-bawah.svg') }}" alt="Aset Pola Background" class="w-full h-full object-cover">
        </div>

        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 w-full">
            <div class="reveal-scale bg-white rounded-3xl p-8 sm:p-12 md:p-14 shadow-2xl border border-orange-100 flex flex-col md:flex-row items-center justify-between gap-10">
                <!-- Kiri: Teks & Checklist -->
                <div class="md:w-3/5 space-y-4">
                    <span class="text-orange-500 text-xs font-bold tracking-widest uppercase">
                        Bergabung Bersama Kami
                    </span>
                    <h2 class="text-2xl sm:text-3xl md:text-4xl font-extrabold text-gray-900 leading-tight">
                        Tertarik Menjadi Bagian dari Tim Profesional EWF?
                    </h2>
                    <p class="text-gray-500 text-xs sm:text-sm leading-relaxed">
                        Kami membuka pintu bagi para profesional pasar modal, analis finansial berbakat, serta talenta muda melalui program magang universitas. Bangun kompetensi Anda dalam ekosistem bursa berjangka berintegritas tinggi.
                    </p>

                    <!-- 3 Checklist -->
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-3 pt-4 text-xs font-semibold text-gray-800">
                        <div class="flex items-center space-x-2">
                            <span class="w-4 h-4 rounded-full bg-orange-100 text-orange-600 flex items-center justify-center text-[10px] font-bold">✓</span>
                            <span>Pelatihan Terakreditasi</span>
                        </div>
                        <div class="flex items-center space-x-2">
                            <span class="w-4 h-4 rounded-full bg-orange-100 text-orange-600 flex items-center justify-center text-[10px] font-bold">✓</span>
                            <span>Sertifikasi WPB Resmi</span>
                        </div>
                        <div class="flex items-center space-x-2">
                            <span class="w-4 h-4 rounded-full bg-orange-100 text-orange-600 flex items-center justify-center text-[10px] font-bold">✓</span>
                            <span>Jenjang Karir Transparan</span>
                        </div>
                    </div>
                </div>

                <!-- Kanan: 2 Tombol Aksi -->
                <div class="md:w-2/5 flex flex-col sm:flex-row md:flex-col gap-4 w-full">
                    <a href="{{ route('karir') }}"
                        class="bg-orange-500 hover:bg-orange-600 text-white font-bold text-center px-6 py-4 rounded-xl shadow-md hover:shadow-lg transition text-sm">
                        Jelajahi Karir Profesional
                    </a>
                    <a href="{{ route('karir') }}"
                        class="bg-white hover:bg-gray-50 text-gray-900 font-bold text-center px-6 py-4 rounded-xl shadow-xs border border-gray-200 transition text-sm">
                        Program Magang Mahasiswa
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection
