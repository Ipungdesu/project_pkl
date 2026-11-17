@extends('layouts.app')

@section('title', 'Peluang Karir & Program Magang MBKM | PT Equityworld Futures')

@section('content')
    <!-- ================= HERO SECTION ================= -->
    <section class="relative w-full pt-32 lg:pt-40 pb-16 overflow-hidden min-h-[70vh] flex flex-col justify-center items-center text-center bg-gray-50/50">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 w-full space-y-6 animate-fade-in-up">
            <!-- Pill Tag -->
            <div class="inline-flex items-center space-x-2 text-xs font-bold text-orange-600 tracking-wider uppercase bg-orange-50/80 border border-orange-200/80 px-4 py-1.5 rounded-full">
                <span class="w-2 h-2 bg-orange-500 rounded-full animate-pulse"></span>
                <span>Rekrutmen Talenta & Magang MBKM Periode 2026</span>
            </div>

            <!-- Main Headline -->
            <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold text-gray-900 tracking-tight leading-tight">
                Jadilah <span class="text-orange-500">Bagian</span> Dari Kami
            </h1>

            <!-- Subtitle -->
            <p class="text-gray-600 text-sm sm:text-base md:text-lg max-w-2xl mx-auto leading-relaxed">
                Akselerasi potensimu di pialang berjangka komoditi terkemuka di Indonesia. Bergabunglah dengan lingkungan kerja meritokratis, bimbingan langsung para analis top, dan fasilitas teknologi perdagangan derivatif termutakhir.
            </p>

            <!-- CTA Buttons -->
            <div class="flex flex-wrap justify-center items-center gap-4 pt-2">
                <a href="#jalur-penerimaan"
                    class="bg-slate-900 hover:bg-slate-800 text-white font-bold px-7 py-3.5 rounded-xl shadow-md hover:-translate-y-0.5 transition duration-200 flex items-center space-x-2 text-sm sm:text-base">
                    <span>Eksplorasi Peluang Kerja</span>
                    <span class="text-base leading-none">↓</span>
                </a>
                <a href="#jalur-magang"
                    class="bg-white hover:bg-orange-50/60 border border-gray-200 text-gray-900 font-bold px-7 py-3.5 rounded-xl hover:-translate-y-0.5 transition duration-200 shadow-xs flex items-center space-x-2 text-sm sm:text-base">
                    <span>🎓</span>
                    <span>Program Magang MBKM</span>
                </a>
            </div>
        </div>

        <!-- Banner Image Kegiatan / Magang EWF -->
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 w-full mt-12 relative z-10 animate-fade-in-scale animation-delay-200">
            <div class="relative rounded-3xl overflow-hidden shadow-2xl border border-gray-200 bg-gray-900 group">
                <!-- Placeholder Banner Foto Eksekutif & Tim Magang (Ganti dengan foto asli) -->
                <img src="https://images.unsplash.com/photo-1517245386807-bb43f82c33c4?auto=format&fit=crop&w=1200&q=80"
                    alt="Executive Team & Peserta Program Magang PT Equityworld Futures"
                    class="w-full h-64 sm:h-80 md:h-[26rem] object-cover opacity-90 group-hover:scale-102 transition duration-700">

                <!-- Overlay Badge Caption -->
                <div class="absolute inset-0 bg-gradient-to-t from-gray-950 via-transparent to-transparent flex flex-col justify-end p-6 sm:p-8 text-left">
                    <span class="bg-orange-500 text-white text-[10px] font-bold px-3 py-1 rounded-full uppercase tracking-wider w-max mb-2">
                        Dokumentasi Resmi
                    </span>
                    <h3 class="text-white text-base sm:text-xl font-bold tracking-tight">
                        EXECUTIVE TEAM & PESERTA PROGRAM MAGANG 2024 PT EQUITYWORLD FUTURES
                    </h3>
                    <p class="text-gray-300 text-xs sm:text-sm mt-1">
                        Sinergi pembinaan talenta muda bersama jajaran pimpinan divisi operasional dan analis pasar.
                    </p>
                </div>
            </div>

            <!-- Stats Bar Row Below Image -->
            <div class="bg-white p-6 sm:p-7 rounded-2xl shadow-xl border border-gray-100 max-w-4xl mx-auto -mt-8 sm:-mt-10 relative z-20 grid grid-cols-2 md:grid-cols-4 gap-6 text-center animate-fade-in-up animation-delay-300">
                <div>
                    <p class="text-2xl sm:text-3xl font-black text-gray-900">7+</p>
                    <p class="text-[10px] sm:text-[11px] font-bold text-gray-400 uppercase tracking-wider mt-1">Kantor Cabang Resmi</p>
                </div>
                <div class="border-l border-gray-100 pl-4">
                    <p class="text-2xl sm:text-3xl font-black text-orange-500">1.000+</p>
                    <p class="text-[10px] sm:text-[11px] font-bold text-gray-400 uppercase tracking-wider mt-1">Alumni Magang & Karir</p>
                </div>
                <div class="border-l border-gray-100 pl-4">
                    <p class="text-2xl sm:text-3xl font-black text-emerald-600">100%</p>
                    <p class="text-[10px] sm:text-[11px] font-bold text-gray-400 uppercase tracking-wider mt-1">Legalitas Bappebti</p>
                </div>
                <div class="border-l border-gray-100 pl-4">
                    <p class="text-2xl sm:text-3xl font-black text-gray-900">A+</p>
                    <p class="text-[10px] sm:text-[11px] font-bold text-gray-400 uppercase tracking-wider mt-1">Jenjang Mentorship</p>
                </div>
            </div>
        </div>
    </section>

    <!-- ================= JALUR PENERIMAAN TALENTA (DAFTAR SEKARANG) ================= -->
    <section id="jalur-penerimaan" class="relative py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Section Header -->
            <div class="reveal text-center mb-14">
                <span class="text-orange-500 text-xs font-bold tracking-widest uppercase block mb-1">
                    Jalur Penerimaan Talenta
                </span>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-gray-900 tracking-tight">
                    Daftar <span class="text-orange-500">Sekarang</span>
                </h2>
                <p class="text-gray-500 text-sm sm:text-base max-w-xl mx-auto mt-2">
                    Pilih jalur karir yang selaras dengan aspirasi profesional dan tahapan pendidikan Anda.
                </p>
            </div>

            <!-- 2 Track Cards -->
            <div class="grid md:grid-cols-2 gap-8 items-stretch max-w-5xl mx-auto">

                <!-- Jalur 01: Profesional Penuh Waktu -->
                <div class="reveal delay-100 bg-white rounded-3xl p-8 sm:p-10 shadow-sm hover:shadow-xl border-t-4 border-orange-500 border-x border-b border-gray-100 flex flex-col justify-between hover:-translate-y-1 transition duration-200">
                    <div class="space-y-6">
                        <!-- Top Tag Row -->
                        <div class="flex items-center justify-between">
                            <span class="text-xs font-bold text-orange-600 uppercase tracking-wider">
                                JALUR 01 • PROFESIONAL PENUH WAKTU
                            </span>
                            <span class="bg-emerald-50 text-emerald-700 border border-emerald-200 text-[10px] font-bold px-2.5 py-1 rounded-full">
                                ● Penempatan Riset
                            </span>
                        </div>

                        <!-- Card Title & Desc -->
                        <div>
                            <h3 class="text-2xl font-extrabold text-gray-900 mb-3">
                                Program Manajemen & Analis Finansial
                            </h3>
                            <p class="text-gray-500 text-sm leading-relaxed">
                                Ditujukan bagi lulusan sarjana dan profesional berpengalaman yang ingin membangun karir eksekutif dalam bidang konsultasi komoditi, analisis pasar derivatif, dan manajemen cabang.
                            </p>
                        </div>

                        <!-- Image Placeholder Divisi Riset -->
                        <div class="relative rounded-2xl overflow-hidden h-44 bg-gray-100 border border-gray-100">
                            <img src="https://images.unsplash.com/photo-1551836022-d5d88e9218df?auto=format&fit=crop&w=700&q=80"
                                alt="Divisi Analisis & Manajemen Risiko"
                                class="w-full h-full object-cover">
                            <div class="absolute bottom-3 left-3 bg-gray-950/80 backdrop-blur-xs text-white text-[10px] font-bold px-3 py-1 rounded-md">
                                Divisi Analisis & Manajemen Risiko
                            </div>
                        </div>

                        <!-- Keunggulan & Fasilitas -->
                        <div>
                            <p class="text-[11px] font-bold text-gray-400 uppercase tracking-wider mb-3">
                                Keunggulan & Fasilitas Karir
                            </p>
                            <ul class="space-y-3 text-xs sm:text-sm text-gray-600">
                                <li class="flex items-start">
                                    <span class="w-4 h-4 rounded-full bg-orange-100 text-orange-600 flex items-center justify-center text-[10px] font-bold mr-2.5 mt-0.5 flex-shrink-0">✓</span>
                                    <span>Jenjang karir berbasis meritokrasi: Associate → Senior Executive → Branch Manager.</span>
                                </li>
                                <li class="flex items-start">
                                    <span class="w-4 h-4 rounded-full bg-orange-100 text-orange-600 flex items-center justify-center text-[10px] font-bold mr-2.5 mt-0.5 flex-shrink-0">✓</span>
                                    <span>Dukungan penuh sertifikasi resmi Ujian Profesi Bappebti (Wakil Pialang Berjangka / WPB).</span>
                                </li>
                                <li class="flex items-start">
                                    <span class="w-4 h-4 rounded-full bg-orange-100 text-orange-600 flex items-center justify-center text-[10px] font-bold mr-2.5 mt-0.5 flex-shrink-0">✓</span>
                                    <span>Akses data analitik eksklusif: real-time feeds serta skema insentif performa tanpa batas.</span>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <!-- CTA Button -->
                    <div class="pt-8 mt-6 border-t border-gray-100">
                        <a href="#formulir-profesional"
                            class="block w-full bg-orange-500 hover:bg-orange-600 text-white font-bold py-3.5 px-6 rounded-xl text-center text-sm shadow-md hover:shadow-lg transition">
                            Lamar Posisi Profesional →
                        </a>
                    </div>
                </div>

                <!-- Jalur 02: Magang Mahasiswa & Fresh Graduates -->
                <div id="jalur-magang" class="reveal delay-200 bg-white rounded-3xl p-8 sm:p-10 shadow-sm hover:shadow-xl border-t-4 border-slate-900 border-x border-b border-gray-100 flex flex-col justify-between hover:-translate-y-1 transition duration-200">
                    <div class="space-y-6">
                        <!-- Top Tag Row -->
                        <div class="flex items-center justify-between">
                            <span class="text-xs font-bold text-slate-900 uppercase tracking-wider">
                                JALUR 02 • MAHASISWA & FRESH GRADUATES
                            </span>
                            <span class="bg-orange-50 text-orange-700 border border-orange-200 text-[10px] font-bold px-2.5 py-1 rounded-full">
                                ● Bersertifikat / Onsite
                            </span>
                        </div>

                        <!-- Card Title & Desc -->
                        <div>
                            <h3 class="text-2xl font-extrabold text-gray-900 mb-3">
                                Program Magang MBKM & Riset Pasar
                            </h3>
                            <p class="text-gray-500 text-sm leading-relaxed">
                                Pengalaman kerja nyata bagi mahasiswa aktif tingkat akhir. Pelajari dinamika perdagangan emas fisik, valuta asing, dan komoditi pertanian secara langsung dari praktisi industri.
                            </p>
                        </div>

                        <!-- Image Placeholder MBKM Komoditas -->
                        <div class="relative rounded-2xl overflow-hidden h-44 bg-gray-100 border border-gray-100">
                            <img src="https://images.unsplash.com/photo-1531482615713-2afd69097998?auto=format&fit=crop&w=700&q=80"
                                alt="MBKM Komoditas & Kampus Merdeka"
                                class="w-full h-full object-cover">
                            <div class="absolute bottom-3 left-3 bg-gray-950/80 backdrop-blur-xs text-white text-[10px] font-bold px-3 py-1 rounded-md">
                                MBKM Komoditas & Kampus Merdeka
                            </div>
                        </div>

                        <!-- Keunggulan Program Magang -->
                        <div>
                            <p class="text-[11px] font-bold text-gray-400 uppercase tracking-wider mb-3">
                                Keunggulan Program Magang
                            </p>
                            <ul class="space-y-3 text-xs sm:text-sm text-gray-600">
                                <li class="flex items-start">
                                    <span class="w-4 h-4 rounded-full bg-slate-100 text-slate-800 flex items-center justify-center text-[10px] font-bold mr-2.5 mt-0.5 flex-shrink-0">✓</span>
                                    <span>Konversi SKS resmi kemitraan perguruan tinggi (untuk magang bersertifikat industri).</span>
                                </li>
                                <li class="flex items-start">
                                    <span class="w-4 h-4 rounded-full bg-slate-100 text-slate-800 flex items-center justify-center text-[10px] font-bold mr-2.5 mt-0.5 flex-shrink-0">✓</span>
                                    <span>Mentorship langsung dari Senior Market Analyst dan Chief Broker EWF profesional.</span>
                                </li>
                                <li class="flex items-start">
                                    <span class="w-4 h-4 rounded-full bg-slate-100 text-slate-800 flex items-center justify-center text-[10px] font-bold mr-2.5 mt-0.5 flex-shrink-0">✓</span>
                                    <span>Fast-track rekrutmen tetap pasca kelulusan bagi peserta magang berprestasi tinggi.</span>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <!-- CTA Button -->
                    <div class="pt-8 mt-6 border-t border-gray-100">
                        <a href="#formulir-magang"
                            class="block w-full bg-slate-900 hover:bg-slate-800 text-white font-bold py-3.5 px-6 rounded-xl text-center text-sm shadow-md hover:shadow-lg transition">
                            Daftar Program Magang Mahasiswa 🎓
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- ================= TEMUKAN LEBIH BANYAK (KANAL GALERI RESMI) ================= -->
    <section class="relative py-16 bg-gray-50/70 border-t border-gray-100">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="reveal bg-white rounded-3xl p-8 sm:p-10 border border-gray-100 shadow-sm flex flex-col lg:flex-row items-center justify-between gap-8">
                <!-- Kiri: Penjelasan Galeri -->
                <div class="lg:w-1/2 space-y-2">
                    <span class="text-orange-500 text-xs font-bold tracking-widest uppercase block">
                        Kanal Galeri Resmi
                    </span>
                    <h3 class="text-2xl sm:text-3xl font-extrabold text-gray-900">
                        Temukan Lebih Banyak
                    </h3>
                    <p class="text-gray-500 text-xs sm:text-sm leading-relaxed">
                        B-roll aktivitas harian, testimoni magang, insight dunia trading komoditi, dan update rekrutmen kami di platform sosial media resmi.
                    </p>
                </div>

                <!-- Kanan: 2 Kartu Sosial Media -->
                <div class="lg:w-1/2 grid grid-cols-1 sm:grid-cols-2 gap-4 w-full">
                    <!-- Instagram Card -->
                    <a href="https://instagram.com" target="_blank" rel="noopener noreferrer"
                        class="bg-gray-50 hover:bg-orange-50/40 p-4 rounded-2xl border border-gray-100 hover:border-orange-200 transition flex items-center justify-between group">
                        <div class="flex items-center space-x-3">
                            <div class="w-10 h-10 rounded-xl bg-gradient-to-tr from-amber-500 via-rose-500 to-purple-600 text-white flex items-center justify-center flex-shrink-0">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                                </svg>
                            </div>
                            <div>
                                <p class="text-[10px] text-gray-400 font-semibold uppercase">Instagram Resmi</p>
                                <p class="text-xs font-bold text-gray-900 group-hover:text-orange-600 transition">@galerimagang.id</p>
                                <p class="text-[9px] text-gray-400">Update Kegiatan Harian & Event</p>
                            </div>
                        </div>
                        <svg class="w-4 h-4 text-gray-400 group-hover:text-orange-500 group-hover:translate-x-0.5 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                        </svg>
                    </a>

                    <!-- TikTok Card -->
                    <a href="https://tiktok.com" target="_blank" rel="noopener noreferrer"
                        class="bg-gray-50 hover:bg-orange-50/40 p-4 rounded-2xl border border-gray-100 hover:border-orange-200 transition flex items-center justify-between group">
                        <div class="flex items-center space-x-3">
                            <div class="w-10 h-10 rounded-xl bg-slate-900 text-white flex items-center justify-center flex-shrink-0">
                                <svg class="w-5 h-5 text-orange-400" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M19.59 6.69a4.83 4.83 0 0 1-3.77-4.25V2h-3.45v13.67a2.89 2.89 0 0 1-5.2 1.74 2.89 2.89 0 0 1 2.31-4.64 2.93 2.93 0 0 1 .88.13V9.4a6.84 6.84 0 0 0-1-.05A6.33 6.33 0 0 0 3 15.65 6.34 6.34 0 0 0 9.35 22a6.34 6.34 0 0 0 6.34-6.35V8.71a8.33 8.33 0 0 0 4.9 1.6V6.86a4.84 4.84 0 0 1-1-.17z"/>
                                </svg>
                            </div>
                            <div>
                                <p class="text-[10px] text-gray-400 font-semibold uppercase">TikTok Resmi</p>
                                <p class="text-xs font-bold text-gray-900 group-hover:text-orange-600 transition">@galerimagang.id</p>
                                <p class="text-[9px] text-gray-400">Tips Karir, Edukasi Finansial</p>
                            </div>
                        </div>
                        <svg class="w-4 h-4 text-gray-400 group-hover:text-orange-500 group-hover:translate-x-0.5 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection

