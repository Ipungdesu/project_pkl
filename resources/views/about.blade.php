@extends('layouts.app')

@section('title', 'Tentang Kami & Legalitas Resmi | PT Equityworld Futures')

@section('content')
    <!-- ================= HERO SECTION (PROFIL & LEGALITAS) ================= -->
    <section class="relative w-full pt-32 lg:pt-40 pb-16 overflow-hidden min-h-[85vh] flex items-center bg-gray-50/60">
        <!-- Subtle decorative glow -->
        <div class="absolute top-20 right-0 w-96 h-96 bg-orange-100/40 rounded-full blur-3xl pointer-events-none"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 w-full">
            <div class="grid lg:grid-cols-12 gap-12 lg:gap-8 items-center">

                <!-- Kolom Kiri: Teks Profil Perusahaan -->
                <div class="space-y-6 lg:col-span-7 animate-fade-in-up">
                    <!-- Pill Tag -->
                    <div
                        class="inline-flex items-center space-x-2 text-xs font-bold text-orange-600 tracking-wider uppercase">
                        <span class="w-2.5 h-2.5 bg-orange-500 rounded-full flex-shrink-0 animate-pulse"></span>
                        <span>PROFIL & LEGALITAS RESMI SEJAK 2005</span>
                    </div>

                    <!-- Headline -->
                    <h1
                        class="text-3xl sm:text-4xl lg:text-[2.85rem] font-extrabold text-gray-900 leading-snug sm:leading-tight lg:leading-[1.25] tracking-tight">
                        Membangun Integritas &amp;<br class="hidden sm:inline">
                        Kepercayaan Berkelanjutan di<br class="hidden sm:inline">
                        <span class="text-orange-500">Pasar Berjangka Nasional</span>
                    </h1>

                    <!-- Paragraf Penjelasan -->
                    <div class="space-y-4 text-gray-600 text-sm sm:text-base leading-relaxed">
                        <p>
                            PT Equityworld Futures ("EWF") memimpin industri pialang berjangka derivatif dan komoditi
                            bilateral dengan standar kepatuhan regulasi mutlak serta akuntabilitas tata kelola investasi
                            terpercaya di Indonesia.
                        </p>
                        <p>
                            Dikelola dengan sistem rekening terpisah (<em>Segregated Account</em>) di bank kustodian
                            pemerintah dan penjaminan kliring KBI, EWF konsisten memberikan rasa aman serta kepastian
                            likuiditas bagi seluruh pelaku pasar finansial.
                        </p>
                        <p>
                            Berbekal koordinasi berkesinambungan bersama regulator pasar dan bursa resmi, EWF memperkuat
                            komitmen transparansi transaksi demi perlindungan optimal setiap nasabah di seluruh Indonesia.
                        </p>
                    </div>

                    <!-- 3 Feature Badges -->
                    <div class="flex flex-wrap gap-2.5 pt-2">
                        <div
                            class="inline-flex items-center space-x-2 bg-emerald-50 border border-emerald-200/80 px-3 py-1.5 rounded-full text-xs font-semibold text-emerald-800">
                            <svg class="w-3.5 h-3.5 text-emerald-600 flex-shrink-0" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                    d="M5 13l4 4L19 7" />
                            </svg>
                            <span>100% Segregated Account Terverifikasi</span>
                        </div>
                        <div
                            class="inline-flex items-center space-x-2 bg-orange-50 border border-orange-200/80 px-3 py-1.5 rounded-full text-xs font-semibold text-orange-800">
                            <svg class="w-3.5 h-3.5 text-orange-600 flex-shrink-0" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                            </svg>
                            <span>Kliring & Penjaminan PT KBI</span>
                        </div>
                        <div
                            class="inline-flex items-center space-x-2 bg-amber-50 border border-amber-200/80 px-3 py-1.5 rounded-full text-xs font-semibold text-amber-800">
                            <svg class="w-3.5 h-3.5 text-amber-600 flex-shrink-0" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                            <span>Izin BAPPEBTI No. 54/BAPPEBTI/SI/1/2005</span>
                        </div>
                    </div>
                </div>

                <!-- Kolom Kanan: Card Kantor Pusat Operasional -->
                <div class="lg:col-span-5 animate-fade-in-scale animation-delay-200">
                    <div class="bg-white rounded-3xl p-6 sm:p-8 shadow-xl border border-gray-100 space-y-6">
                        <!-- Top Header -->
                        <div class="flex items-center justify-between border-b border-gray-100 pb-4">
                            <div>
                                <span class="text-[10px] font-bold text-gray-400 uppercase tracking-wider block">
                                    Kantor Pusat Operasional
                                </span>
                                <h3 class="text-xl font-extrabold text-gray-900 mt-0.5">Cyber 2 Tower, Jakarta</h3>
                            </div>
                            <span
                                class="bg-emerald-50 text-emerald-700 border border-emerald-200 text-[11px] font-bold px-3 py-1 rounded-full">
                                ● Beroperasi Aktif
                            </span>
                        </div>

                        <!-- Address Info Box -->
                        <div class="bg-gray-50/80 rounded-2xl p-4 border border-gray-100 flex items-start space-x-3">
                            <div
                                class="w-8 h-8 rounded-lg bg-orange-100 text-orange-600 flex items-center justify-center flex-shrink-0 mt-0.5">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-xs font-bold text-gray-900">Cyber 2 Tower Lt. 19</p>
                                <p class="text-[11px] text-gray-500 mt-0.5 leading-relaxed">
                                    Jl. H.R. Rasuna Said Blok X-5 Kav. 13, Kuningan, Jakarta Selatan 12950, Indonesia
                                </p>
                            </div>
                        </div>

                        <!-- 2 Sub-boxes: Regulator & Bursa -->
                        <div class="grid grid-cols-2 gap-3">
                            <div class="bg-gray-50/80 rounded-2xl p-3.5 border border-gray-100">
                                <p class="text-[9px] font-bold text-gray-400 uppercase tracking-wider">Regulator Utama</p>
                                <p class="text-sm font-extrabold text-gray-900 mt-1">BAPPEBTI</p>
                                <p class="text-[10px] text-gray-500 mt-0.5">Kementerian Perdagangan RI</p>
                            </div>
                            <div class="bg-gray-50/80 rounded-2xl p-3.5 border border-gray-100">
                                <p class="text-[9px] font-bold text-gray-400 uppercase tracking-wider">Bursa & Kliring</p>
                                <p class="text-sm font-extrabold text-gray-900 mt-1">BBJ & KBI</p>
                                <p class="text-[10px] text-gray-500 mt-0.5">Anggota Bursa & Penjaminan</p>
                            </div>
                        </div>

                        <!-- Bottom Stats Row -->
                        <div class="pt-4 border-t border-gray-100 flex items-center justify-between">
                            <div>
                                <p class="text-2xl font-black text-orange-500 leading-none">20+</p>
                                <p class="text-[10px] text-gray-500 font-semibold uppercase mt-1">Tahun Berdedikasi</p>
                                <p class="text-[9px] text-gray-400">Pasar Finansial</p>
                            </div>
                            <div class="w-px h-10 bg-gray-200"></div>
                            <div>
                                <p class="text-2xl font-black text-gray-900 leading-none">7 Cabang</p>
                                <p class="text-[10px] text-gray-500 font-semibold uppercase mt-1">Kantor Operasional</p>
                                <p class="text-[9px] text-gray-400">Di 5 Kota Besar Indonesia</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- ================= 4 METRIC CARDS ROW ================= -->
    <section class="relative w-full py-12 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Metric 1 -->
                <div class="reveal delay-100 bg-white p-6 rounded-2xl border border-gray-100 shadow-sm hover:shadow-md hover:-translate-y-1 transition duration-200">
                    <div class="flex items-center justify-between mb-4">
                        <span class="text-[10px] font-bold text-gray-400 uppercase tracking-wider">Tahun Berdiri</span>
                        <div class="w-8 h-8 rounded-lg bg-orange-50 text-orange-500 flex items-center justify-center">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                        </div>
                    </div>
                    <p class="text-3xl font-extrabold text-gray-900 leading-tight">20+ Tahun</p>
                    <p class="text-xs text-gray-500 mt-1">Beroperasi resmi sejak 2005</p>
                </div>

                <!-- Metric 2 -->
                <div class="reveal delay-200 bg-white p-6 rounded-2xl border border-gray-100 shadow-sm hover:shadow-md hover:-translate-y-1 transition duration-200">
                    <div class="flex items-center justify-between mb-4">
                        <span class="text-[10px] font-bold text-gray-400 uppercase tracking-wider">Jaringan Kantor</span>
                        <div class="w-8 h-8 rounded-lg bg-orange-50 text-orange-500 flex items-center justify-center">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                            </svg>
                        </div>
                    </div>
                    <p class="text-3xl font-extrabold text-gray-900 leading-tight">7 Cabang</p>
                    <p class="text-xs text-gray-500 mt-1">Jaringan kantor di kota utama</p>
                </div>

                <!-- Metric 3 -->
                <div class="reveal delay-300 bg-white p-6 rounded-2xl border border-gray-100 shadow-sm hover:shadow-md hover:-translate-y-1 transition duration-200">
                    <div class="flex items-center justify-between mb-4">
                        <span class="text-[10px] font-bold text-gray-400 uppercase tracking-wider">Keamanan Dana</span>
                        <div class="w-8 h-8 rounded-lg bg-emerald-50 text-emerald-600 flex items-center justify-center">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                            </svg>
                        </div>
                    </div>
                    <p class="text-3xl font-extrabold text-gray-900 leading-tight">100%</p>
                    <p class="text-xs text-gray-500 mt-1">Keamanan tersegregasi penuh di KBI</p>
                </div>

                <!-- Metric 4 -->
                <div class="reveal delay-400 bg-white p-6 rounded-2xl border border-gray-100 shadow-sm hover:shadow-md hover:-translate-y-1 transition duration-200">
                    <div class="flex items-center justify-between mb-4">
                        <span class="text-[10px] font-bold text-gray-400 uppercase tracking-wider">Kepatuhan Hukum</span>
                        <div class="w-8 h-8 rounded-lg bg-blue-50 text-blue-600 flex items-center justify-center">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3" />
                            </svg>
                        </div>
                    </div>
                    <p class="text-3xl font-extrabold text-gray-900 leading-tight">Resmi & Lengkap</p>
                    <p class="text-xs text-gray-500 mt-1">Regulasi: Bappebti, BBJ & KBI</p>
                </div>
            </div>
        </div>
    </section>

    <!-- ================= SEKSI: VISI & MISI ================= -->
    <section class="relative py-20 bg-gray-50/50 overflow-hidden">
        <!-- Background Decorative Orange Arches -->
        <div
            class="absolute -right-24 top-20 w-96 h-96 rounded-full border-[30px] border-orange-500/20 pointer-events-none">
        </div>
        <div
            class="absolute -left-20 bottom-10 w-80 h-80 rounded-full border-[25px] border-orange-500/20 pointer-events-none">
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <!-- Header Visi & Misi -->
            <div class="reveal text-center mb-16">
                <h2 class="text-3xl sm:text-4xl font-extrabold text-gray-900">
                    Visi & Misi PT Equityworld Futures
                </h2>
                <p class="text-gray-500 text-sm sm:text-base max-w-2xl mx-auto mt-3">
                    Komitmen fundamental yang mengarahkan setiap operasional, etika kerja pegawai, dan layanan kepada
                    investor.
                </p>
            </div>

            <!-- Grid 2 Kartu: Visi & Misi -->
            <div class="grid md:grid-cols-2 gap-8 items-stretch">
                <!-- Kartu Visi -->
                <div class="reveal delay-100 bg-white rounded-3xl p-8 sm:p-12 shadow-sm border border-gray-100 flex flex-col justify-between hover:shadow-md transition">
                    <div>
                        <!-- Icon Eye in Navy Square -->
                        <div
                            class="w-14 h-14 bg-gray-950 rounded-2xl flex items-center justify-center text-white mb-6 shadow-sm">
                            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                        </div>
                        <p class="text-[11px] font-bold text-gray-400 uppercase tracking-widest mb-1">
                            Orientasi Masa Depan
                        </p>
                        <h3 class="text-2xl font-extrabold text-gray-900 mb-6">Visi Perusahaan</h3>
                        <p
                            class="text-gray-700 text-lg sm:text-xl font-medium leading-relaxed italic border-l-4 border-orange-500 pl-4">
                            "Menjadi perusahaan pialang berjangka terdepan, tepercaya, dan bereputasi paling unggul di
                            Indonesia melalui penerapan tata kelola berintegritas tinggi serta standar pelayanan bertaraf
                            internasional."
                        </p>
                    </div>

                    <!-- Bottom Checkmark -->
                    <div
                        class="mt-12 pt-6 border-t border-gray-50 flex items-center text-xs sm:text-sm text-emerald-700 font-semibold">
                        <span
                            class="w-5 h-5 rounded-full bg-emerald-100 text-emerald-600 flex items-center justify-center mr-2 text-xs">✓</span>
                        <span>Fokus pada keberlanjutan jangka panjang & perlindungan nasabah.</span>
                    </div>
                </div>

                <!-- Kartu Misi -->
                <div class="reveal delay-200 bg-white rounded-3xl p-8 sm:p-12 shadow-sm border border-gray-100 flex flex-col justify-between hover:shadow-md transition">
                    <div>
                        <!-- Icon Flag in Orange Square -->
                        <div
                            class="w-14 h-14 bg-orange-500 rounded-2xl flex items-center justify-center text-white mb-6 shadow-sm">
                            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 21v-4m0 0V5a2 2 0 012-2h6.5l1 1H21l-3 6 3 6h-8.5l-1-1H5a2 2 0 00-2 2zm9-13.5V9" />
                            </svg>
                        </div>
                        <p class="text-[11px] font-bold text-orange-500 uppercase tracking-widest mb-1">
                            Aksi Korporasi Berkelanjutan
                        </p>
                        <h3 class="text-2xl font-extrabold text-gray-900 mb-6">Misi Perusahaan</h3>

                        <ul class="space-y-4">
                            <li class="flex items-start">
                                <span class="w-2 h-2 bg-orange-500 rounded-full mt-2 mr-3 flex-shrink-0"></span>
                                <span class="text-gray-600 text-sm leading-relaxed">
                                    Menyelenggarakan transaksi perdagangan berjangka yang aman, likuid, dan patuh regulasi
                                    BAPPEBTI.
                                </span>
                            </li>
                            <li class="flex items-start">
                                <span class="w-2 h-2 bg-orange-500 rounded-full mt-2 mr-3 flex-shrink-0"></span>
                                <span class="text-gray-600 text-sm leading-relaxed">
                                    Mengembangkan kompetensi talenta finansial melalui riset mendalam, etika profesi, dan
                                    edukasi terstruktur.
                                </span>
                            </li>
                            <li class="flex items-start">
                                <span class="w-2 h-2 bg-orange-500 rounded-full mt-2 mr-3 flex-shrink-0"></span>
                                <span class="text-gray-600 text-sm leading-relaxed">
                                    Menyediakan infrastruktur digital modern untuk mempermudah analisis data pasar secara
                                    <em>real-time</em>.
                                </span>
                            </li>
                            <li class="flex items-start">
                                <span class="w-2 h-2 bg-orange-500 rounded-full mt-2 mr-3 flex-shrink-0"></span>
                                <span class="text-gray-600 text-sm leading-relaxed">
                                    Mendorong literasi publik mengenai manajemen risiko derivatif di seluruh penjuru
                                    Indonesia.
                                </span>
                            </li>
                        </ul>
                    </div>

                    <!-- Bottom Checkmark -->
                    <div
                        class="mt-8 pt-6 border-t border-gray-50 flex items-center text-xs sm:text-sm text-emerald-700 font-semibold">
                        <span
                            class="w-5 h-5 rounded-full bg-emerald-100 text-emerald-600 flex items-center justify-center mr-2 text-xs">✓</span>
                        <span>Kemitraan berkesinambungan bersama institusi perbankan resmi.</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ================= SEKSI: NILAI - NILAI PERUSAHAAN ================= -->
    <section class="relative py-24 bg-white overflow-hidden">
        <!-- Orange Curved Wave Backdrop at the Bottom -->
        <div
            class="absolute bottom-0 left-0 w-full h-1/2 bg-orange-500 rounded-t-[80px] md:rounded-t-[160px] z-0 opacity-95">
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
            <h2 class="reveal text-3xl sm:text-4xl font-extrabold text-gray-900 mb-3">
                Nilai - Nilai Perusahaan
            </h2>
            <p class="reveal delay-100 text-gray-500 text-sm sm:text-base max-w-2xl mx-auto mb-16">
                Etika, disiplin, dan profesionalitas menjadi jangkar operasional harian kami dalam melayani nasabah dan
                memajukan karir setiap insan EWF.
            </p>

            <!-- Grid 4 Kartu Nilai Perusahaan -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 text-left">
                <!-- Nilai 1 -->
                <div class="reveal delay-100 bg-white rounded-3xl p-8 shadow-lg border border-gray-100 hover:-translate-y-1 transition duration-200">
                    <div class="w-12 h-12 rounded-2xl bg-orange-50 text-orange-500 flex items-center justify-center mb-6">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3" />
                        </svg>
                    </div>
                    <h3 class="font-bold text-gray-900 text-lg mb-2">Disiplin Kepatuhan</h3>
                    <p class="text-gray-500 text-xs sm:text-sm leading-relaxed">
                        Menjalankan seluruh proses bisnis sesuai kerangka regulasi dengan kontrol internal yang kuat dan
                        transparan.
                    </p>
                </div>

                <!-- Nilai 2 -->
                <div class="reveal delay-200 bg-white rounded-3xl p-8 shadow-lg border border-gray-100 hover:-translate-y-1 transition duration-200">
                    <div class="w-12 h-12 rounded-2xl bg-orange-50 text-orange-500 flex items-center justify-center mb-6">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                    </div>
                    <h3 class="font-bold text-gray-900 text-lg mb-2">Transparansi Finansial</h3>
                    <p class="text-gray-500 text-xs sm:text-sm leading-relaxed">
                        Pelaporan transaksi dan pencatatan rekening nasabah (<em>segregated account</em>) secara riil dan
                        terverifikasi di KBI.
                    </p>
                </div>

                <!-- Nilai 3 -->
                <div class="reveal delay-300 bg-white rounded-3xl p-8 shadow-lg border border-gray-100 hover:-translate-y-1 transition duration-200">
                    <div class="w-12 h-12 rounded-2xl bg-orange-50 text-orange-500 flex items-center justify-center mb-6">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
                        </svg>
                    </div>
                    <h3 class="font-bold text-gray-900 text-lg mb-2">Inovasi Berkelanjutan</h3>
                    <p class="text-gray-500 text-xs sm:text-sm leading-relaxed">
                        Mendorong pengembangan teknologi, produk, dan proses kerja untuk menghasilkan pengalaman transaksi
                        yang semakin efisien.
                    </p>
                </div>

                <!-- Nilai 4 -->
                <div class="reveal delay-400 bg-white rounded-3xl p-8 shadow-lg border border-gray-100 hover:-translate-y-1 transition duration-200">
                    <div class="w-12 h-12 rounded-2xl bg-orange-50 text-orange-500 flex items-center justify-center mb-6">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z" />
                        </svg>
                    </div>
                    <h3 class="font-bold text-gray-900 text-lg mb-2">Integritas Profesional</h3>
                    <p class="text-gray-500 text-xs sm:text-sm leading-relaxed">
                        Menjunjung standar etika yang tinggi serta menjaga konsistensi tindakan dan keputusan dalam setiap
                        aktivitas perusahaan.
                    </p>
                </div>
            </div>
        </div>
    </section>
@endsection
