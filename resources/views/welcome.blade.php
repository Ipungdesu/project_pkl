<!DOCTYPE html>
<html lang="id">

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
                <a href="#" class="text-gray-800 hover:text-orange-600 transition">Peluang Karir</a>
            </div>

            <!-- Tombol CTA Nav -->
            <a href="#"
                class="bg-orange-500 hover:bg-orange-600 text-white px-4 py-2 sm:px-6 sm:py-2.5 rounded-full text-xs sm:text-sm font-bold shadow-md transition">
                Masuk / Daftar
            </a>
        </nav>
    </div>

    <!-- ================= HERO SECTION ================= -->
    <section class="relative w-full pt-32 pb-24 overflow-hidden min-h-[90vh] flex items-center">
        <!-- Latar Belakang Gedung (Fade ke putih) -->
        <div class="absolute inset-0 z-0">
            <!-- Background Image -->
            <div class="absolute inset-0 bg-cover bg-top opacity-[0.25]"
                style="background-image: url('{{ asset('assets/gedung-kpf.avif') }}');">
            </div>
            <!-- Gradient Overlay -->
            <div class="absolute inset-0 bg-gradient-to-b from-transparent via-white/70 to-white"></div>
        </div>

        <!-- Container Konten -->
        <div class="max-w-7xl mx-auto px-4 grid lg:grid-cols-12 gap-12 items-center relative z-10 w-full">

            <!-- Kolom Kiri: Teks -->
            <div class="space-y-8 lg:col-span-7">
                <!-- Label atas -->
                <div class="text-xs font-bold text-gray-500 tracking-wider uppercase flex items-center space-x-2">
                    <span class="w-2.5 h-2.5 bg-orange-500 rounded-full"></span>
                    <span>Pialang Berjangka Resmi - Mandat Regulasi Penuh</span>
                </div>

                <!-- Headline -->
                <h1 class="text-5xl lg:text-6xl font-extrabold leading-[1.1] text-gray-900 tracking-tight">
                    Membangun Integritas <br> Pasar Berjangka, <br>
                    <span class="text-orange-500">Mencetak Talenta</span> <br>
                    <span class="text-orange-500">Finansial Berdaya Saing</span> <br> Tinggi.
                </h1>

                <!-- Deskripsi -->
                <p class="text-gray-500 max-w-xl text-base leading-relaxed">
                    PT Equityworld Futures mengintegrasikan ekosistem perdagangan komoditi teregulasi Bappebti dengan
                    akselerasi karir profesional. Kami membuka jalur nyata bagi talenta berprestasi untuk menguasai
                    industri keuangan derivatif nasional.
                </p>

                <!-- Tombol Hero -->
                <div class="flex flex-wrap gap-4 pt-2">
                    <a href="#"
                        class="bg-orange-500 text-white px-8 py-3.5 rounded-lg font-bold hover:bg-orange-600 transition flex items-center space-x-2 shadow-md hover:shadow-lg">
                        <span>Lihat Peluang Karir</span>
                        <span class="ml-2 font-black">→</span>
                    </a>
                    <a href="#"
                        class="bg-white/80 backdrop-blur-sm border border-orange-200 text-gray-800 px-8 py-3.5 rounded-lg font-bold hover:bg-orange-50 transition shadow-sm">
                        🏛️ Tentang EWF & Regulasi
                    </a>
                </div>

                <!-- Badges/Partners -->
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 pt-8 max-w-2xl">
                    
                    <!-- Badge Bappebti -->
                    <div class="bg-white/90 backdrop-blur-sm border border-gray-100 shadow-sm px-4 py-3 rounded-xl flex items-center space-x-3 hover:shadow-md transition">
                        <!-- Menggunakan Ikon Perisai untuk Regulasi/Pengawasan -->
                        <div class="w-6 h-6 rounded-full border-2 border-orange-400 flex-shrink-0 flex items-center justify-center text-xs">🛡️</div>
                        <div>
                            <p class="text-[10px] text-gray-400 font-semibold uppercase">Diawasi & Teregulasi</p>
                            <p class="text-sm font-bold text-gray-800">BAPPEBTI</p>
                        </div>
                    </div>
                    
                    <!-- Badge BBJ -->
                    <div class="bg-white/90 backdrop-blur-sm border border-gray-100 shadow-sm px-4 py-3 rounded-xl flex items-center space-x-3 hover:shadow-md transition">
                        <!-- Menggunakan Ikon Orang/Anggota untuk Keanggotaan -->
                        <div class="w-6 h-6 rounded-full border-2 border-orange-400 flex-shrink-0 flex items-center justify-center text-xs">👥</div>
                        <div>
                            <p class="text-[10px] text-gray-400 font-semibold uppercase">Penyelenggara</p>
                            <p class="text-sm font-bold text-gray-800">Anggota BBJ</p>
                        </div>
                    </div>
                    
                    <!-- Badge KBI -->
                    <div class="bg-white/90 backdrop-blur-sm border border-gray-100 shadow-sm px-4 py-3 rounded-xl flex items-center space-x-3 hover:shadow-md transition">
                        <!-- Ikon Gembok dipertahankan sesuai permintaan Anda -->
                        <div class="w-6 h-6 rounded-full border-2 border-orange-400 flex-shrink-0 flex items-center justify-center text-xs">🔒</div>
                        <div>
                            <p class="text-[10px] text-gray-400 font-semibold uppercase">Penjaminan Dana</p>
                            <p class="text-sm font-bold text-gray-800">Kliring KBI</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Kolom Kanan: Gambar & Card -->
            <div class="relative lg:col-span-5 mt-16 lg:mt-0 px-4 sm:px-12 lg:px-0">
                <!-- Bingkai Gambar Hero -->
                <div class="bg-gray-200 rounded-3xl overflow-hidden h-[32rem] relative shadow-2xl">
                    <img src="https://images.unsplash.com/photo-1600880292203-757bb62b4baf?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80"
                        alt="Aktivitas Kantor EWF" class="w-full h-full object-cover">

                    <!-- Overlay Teks -->
                    <!-- PERBAIKAN: Menggunakan pb-[100px] sm:pb-[120px] untuk mendorong teks ke atas melewati batas tinggi kotak putih -->
                    <div class="absolute bottom-0 left-0 w-full bg-gradient-to-t from-gray-900 via-gray-900/80 to-transparent p-6 pt-32 pb-[100px] sm:pb-[120px]">
                        <span class="bg-orange-500 text-white text-[10px] font-bold px-2 py-1 rounded uppercase">Kantor Pusat Jakarta</span>
                        <p class="text-white font-medium mt-3 leading-snug text-sm max-w-sm">Pusat Operasional Terintegrasi & Pusat Pembinaan Profesi Pialang Berjangka</p>
                    </div>
                </div>

                <!-- Floating Stats Card (Kotak Info) -->
                <div class="absolute -bottom-6 -left-2 sm:-left-8 bg-white p-5 sm:p-6 rounded-2xl shadow-xl flex gap-6 border border-gray-100 z-20 w-max max-w-full overflow-hidden">
                    <div>
                        <p class="text-[10px] text-gray-400 uppercase font-semibold">Jumlah Cabang</p>
                        <p class="text-2xl sm:text-3xl font-extrabold text-gray-900 leading-none mt-1">6 Kantor</p>
                    </div>
                    <!-- Garis Pemisah -->
                    <div class="w-px bg-gray-200 hidden sm:block"></div>
                    <div>
                        <p class="text-[10px] text-gray-400 uppercase font-semibold">Jaringan Kantor</p>
                        <p class="text-2xl sm:text-3xl font-extrabold text-gray-900 leading-none mt-1">4 Kota</p>
                        <p class="text-[10px] text-gray-400 mt-1">Seluruh Indonesia</p>
                    </div>
                </div>
            </div>
    </section>

    <!-- ================= ALUR REKRUTMEN & CTA SECTION (GABUNGAN) ================= -->
    <!-- Menggabungkan kedua area ini agar layer z-index gambar oranye dan kartu bekerja sempurna -->
    <section class="relative w-full pt-24 pb-20 bg-gray-50 overflow-hidden">
        
        <!-- LAYER 1: Background SVG Ombak Oranye -->
        <!-- Menggunakan top-[380px] md:top-[420px] agar ombak SELALU mulai tepat dari tengah-tengah baris kartu, tidak peduli ukuran layarnya -->
        <div class="absolute inset-x-0 bottom-0 top-[380px] md:top-[420px] z-0">
            <img src="{{ asset('assets/aset-bg-bawah.svg') }}" alt="Background Oranye" class="w-full h-full object-cover object-top">
        </div>

        <!-- LAYER 2: Konten Alur Rekrutmen -->
        <div class="max-w-7xl mx-auto px-4 text-center relative z-10">
            
            <div class="inline-block bg-gray-900 text-white text-[10px] font-bold px-4 py-1.5 rounded-md uppercase tracking-widest mb-6">
                Transparansi Seleksi
            </div>
            
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900">Alur Rekrutmen Karyawan & Profesional</h2>
            <p class="text-gray-500 mt-3 max-w-2xl mx-auto text-sm">EWF menerapkan standar seleksi berjenjang, objektif, dan berorientasi pada kepatuhan finansial serta potensi kepemimpinan masa depan.</p>

            <!-- Cards Grid (Alur) -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mt-16 text-left">
                <!-- Card 1 -->
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 flex flex-col h-full hover:shadow-md transition">
                    <div class="flex justify-between items-start mb-6">
                        <div class="w-12 h-12 bg-orange-50 rounded-full flex items-center justify-center text-orange-400 font-bold text-lg">01</div>
                        <span class="text-gray-300 text-2xl">📄</span>
                    </div>
                    <h3 class="font-bold text-gray-900 text-lg leading-tight mb-auto">Pengajuan Berkas<br>Online</h3>
                    <div class="bg-gray-50/80 px-3 py-2.5 rounded-lg flex items-center space-x-2 text-xs text-gray-500 mt-6 border border-gray-100">
                        <span class="w-1.5 h-1.5 bg-green-500 rounded-full"></span>
                        <span>Verifikasi dokumen via sistem</span>
                    </div>
                </div>

                <!-- Card 2 -->
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 flex flex-col h-full hover:shadow-md transition">
                    <div class="flex justify-between items-start mb-6">
                        <div class="w-12 h-12 bg-orange-50 rounded-full flex items-center justify-center text-orange-400 font-bold text-lg">02</div>
                        <span class="text-gray-300 text-2xl">👥</span>
                    </div>
                    <h3 class="font-bold text-gray-900 text-lg leading-tight mb-auto">Verifikasi Kualifikasi<br>HRD</h3>
                    <div class="bg-gray-50/80 px-3 py-2.5 rounded-lg flex items-center space-x-2 text-xs text-gray-500 mt-6 border border-gray-100">
                        <span class="w-1.5 h-1.5 bg-gray-400 rounded-full"></span>
                        <span>Proses 2 - 3 Hari Kerja</span>
                    </div>
                </div>

                <!-- Card 3 -->
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 flex flex-col h-full hover:shadow-md transition">
                    <div class="flex justify-between items-start mb-6">
                        <div class="w-12 h-12 bg-orange-50 rounded-full flex items-center justify-center text-orange-400 font-bold text-lg">03</div>
                        <span class="text-gray-300 text-2xl">📊</span>
                    </div>
                    <h3 class="font-bold text-gray-900 text-lg leading-tight mb-auto">Wawancara &<br>Psikotes</h3>
                    <div class="bg-orange-50/50 px-3 py-2.5 rounded-lg flex items-center space-x-2 text-xs text-orange-600 mt-6 border border-orange-100/50">
                        <span class="w-1.5 h-1.5 bg-orange-400 rounded-full"></span>
                        <span>Online via Zoom / Offline Cabang</span>
                    </div>
                </div>

                <!-- Card 4 (Highlight) -->
                <div class="bg-white p-6 rounded-2xl shadow-md border-2 border-orange-400 flex flex-col h-full relative overflow-hidden hover:shadow-lg transition">
                    <div class="flex justify-between items-start mb-6">
                        <div class="w-12 h-12 bg-orange-400 rounded-full flex items-center justify-center text-white font-bold text-lg">04</div>
                        <span class="text-gray-300 text-2xl">🤝</span>
                    </div>
                    <h3 class="font-bold text-gray-900 text-lg leading-tight mb-auto">Onboarding &<br>Pembekalan</h3>
                    <div class="bg-orange-50/50 px-3 py-2.5 rounded-lg flex items-center space-x-2 text-xs text-orange-600 mt-6 border border-orange-100/50">
                        <span class="w-1.5 h-1.5 bg-orange-400 rounded-full"></span>
                        <span>Pelatihan Terstruktur</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- LAYER 3: Kotak CTA -->
        <!-- Margin top diatur ke mt-16 agar jarak antara kartu dan kotak putih tetap proporsional -->
        <div class="max-w-6xl mx-auto px-4 w-full relative z-20 mt-16 md:mt-24">
            <div class="bg-white rounded-3xl p-10 md:p-14 flex flex-col md:flex-row items-center justify-between shadow-2xl border border-gray-100">
                
                <div class="md:w-3/5 space-y-4 pr-0 md:pr-8">
                    <span class="text-orange-500 text-[10px] font-bold tracking-widest uppercase">Bergabung Bersama Kami</span>
                    <h2 class="text-3xl md:text-4xl font-extrabold text-gray-900 leading-tight">Tertarik Menjadi Bagian dari Tim Profesional EWF?</h2>
                    <p class="text-gray-500 text-sm leading-relaxed mt-4">Kami membuka pintu bagi para profesional pasar modal, analis finansial berbakat, serta talenta muda melalui program magang universitas. Bangun kompetensi Anda dalam ekosistem bursa berjangka berintegritas tinggi.</p>

                    <div class="flex flex-wrap gap-x-6 gap-y-2 pt-4 text-xs text-gray-700 font-semibold">
                        <span class="flex items-center"><span class="text-black mr-2 font-black">✓</span> Pelatihan Terstruktur</span>
                        <span class="flex items-center"><span class="text-black mr-2 font-black">✓</span> Sertifikasi Wakil Pialang Resmi</span>
                        <span class="flex items-center"><span class="text-black mr-2 font-black">✓</span> Jenjang Karir Transparan</span>
                    </div>
                </div>
                
                <div class="md:w-2/5 flex flex-col sm:flex-row gap-4 mt-8 md:mt-0 justify-end w-full">
                    <a href="#" class="bg-orange-500 hover:bg-orange-600 text-white text-center px-6 py-4 rounded-xl font-bold shadow-lg transition text-sm flex-1">
                        Pelajari Karir<br>Profesional
                    </a>
                    <a href="#" class="bg-white hover:bg-gray-50 text-gray-900 text-center px-6 py-4 rounded-xl font-bold shadow-sm transition border border-gray-200 text-sm flex-1">
                        Program Magang<br>Mahasiswa
                    </a>
                </div>

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

            <!-- Links 2 -->
            <div>
                <h4 class="font-bold text-gray-900 mb-6 text-sm">Karir & Program</h4>
                <ul class="space-y-3 text-xs font-medium text-gray-500">
                    <li><a href="#" class="hover:text-orange-500 transition">Lowongan Profesional</a></li>
                    <li><a href="#" class="hover:text-orange-500 transition">Program Magang Mahasiswa</a></li>
                    <li><a href="#" class="hover:text-orange-500 transition">Budaya & Nilai Kerja</a></li>
                    <li><a href="#" class="hover:text-orange-500 transition">Fasilitas & Pengembangan</a></li>
                    <li><a href="#" class="hover:text-orange-500 transition">Hubungi Tim HRD</a></li>
                </ul>
            </div>

            <!-- Contact -->
            <div>
                <h4 class="font-bold text-gray-900 mb-6 text-sm">Kantor Operasional</h4>
                <p class="text-xs text-gray-500 mb-4 leading-relaxed">Trillium Office & Residence,<br>Jl. Pemuda No.108-116, Embong
                    Kaliasin, Surabaya 60271</p>
                <div class="space-y-2">
                    <p class="text-xs text-gray-900 font-bold flex items-center"><span class="mr-2">📞</span> 031-XXXX-XXXX</p>
                    <p class="text-xs text-orange-500 font-medium flex items-center"><span class="mr-2">✉️</span> corporate@equityworld-futures.com</p>
                </div>
            </div>
        </div>

        <!-- Footer Bottom -->
        <div class="max-w-7xl mx-auto px-4 mt-16 pt-8 border-t border-gray-200 flex flex-col md:flex-row justify-between items-center text-[10px] text-gray-400 font-medium">
            <p>&copy; 2026 PT Equityworld Futures. Seluruh hak cipta dilindungi undang-undang.</p>
            <div class="flex space-x-6 mt-4 md:mt-0">
                <a href="#" class="hover:text-gray-600 transition">Ketentuan Hukum</a>
                <a href="#" class="hover:text-gray-600 transition">Kebijakan Privasi</a>
                <a href="#" class="hover:text-gray-600 transition">Pusat Bantuan</a>
            </div>
        </div>
    </footer>

</body>
</html>