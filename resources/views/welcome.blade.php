<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PT Equityworld Futures | Landing Page</title>
    <!-- Pastikan Anda sudah mengonfigurasi Tailwind via Vite di Laravel Anda (@vite(['resources/css/app.css', 'resources/js/app.js'])) -->
    <!-- Untuk keperluan preview instan jika Vite belum jalan, Anda bisa gunakan CDN sementara: -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>

<body class="bg-white text-gray-800 antialiased overflow-x-hidden">

    <!-- ================= NAVBAR ================= -->
    <div class="max-w-7xl mx-auto px-4 pt-6">
        <nav class="bg-orange-100 rounded-full px-6 py-3 flex justify-between items-center">
            <!-- Logo -->
            <div class="flex items-center space-x-2">
                <!-- Tag img untuk memanggil file logo -->
                <img src="/assets/logo_ewf-removebg-preview-1.png" alt="Logo PT Equityworld Futures" class="w-10 h-10 object-contain" />
                <span class="font-bold text-gray-900">PT Equityworld Futures</span>
            </div>

            <!-- Menu Navigasi -->
            <div class="hidden md:flex space-x-8 text-sm font-medium">
                <a href="#" class="text-gray-900 hover:text-orange-500">Beranda</a>
                <a href="#" class="text-gray-600 hover:text-orange-500">Tentang Kami</a>
                <a href="#" class="text-gray-600 hover:text-orange-500">Peluang Karir</a>
            </div>

            <!-- Tombol CTA -->
            <a href="#"
                class="bg-orange-500 hover:bg-orange-600 text-white px-6 py-2 rounded-full text-sm font-semibold transition">
                Masuk / Daftar
            </a>
        </nav>
    </div>

    <!-- ================= HERO SECTION ================= -->
    <section class="max-w-7xl mx-auto px-4 pt-16 pb-24 grid md:grid-cols-2 gap-12 items-center relative">
        <!-- Latar Belakang Gedung (Opsional, gunakan absolute div dengan opacity rendah) -->

        <!-- Kolom Kiri: Teks -->
        <div class="space-y-6 relative z-10">
            <div class="text-xs font-bold text-gray-500 tracking-wider uppercase flex items-center space-x-2">
                <span class="w-2 h-2 bg-orange-500 rounded-full"></span>
                <span>Pialang Berjangka Resmi - Mandat Regulasi Penuh</span>
            </div>

            <h1 class="text-5xl font-extrabold leading-tight text-gray-900">
                Membangun Integritas <br> Pasar Berjangka, <br>
                <span class="text-orange-500">Mencetak Talenta</span> <br>
                <span class="text-orange-500">Finansial Berdaya Saing</span> <br> Tinggi.
            </h1>

            <p class="text-gray-600 max-w-lg">
                PT Equityworld Futures mengintegrasikan ekosistem perdagangan komoditi teregulasi Bappebti dengan
                akselerasi karir profesional. Kami membuka jalur nyata bagi talenta berprestasi untuk menguasai industri
                keuangan derivatif nasional.
            </p>

            <!-- Tombol Hero -->
            <div class="flex space-x-4 pt-4">
                <a href="#"
                    class="bg-orange-500 text-white px-6 py-3 rounded-xl font-semibold hover:bg-orange-600 transition flex items-center space-x-2">
                    <span>Lihat Peluang Karir</span>
                    <span>→</span>
                </a>
                <a href="#"
                    class="bg-white border border-gray-200 text-gray-700 px-6 py-3 rounded-xl font-semibold hover:bg-gray-50 transition">
                    🏛️ Tentang EWF & Regulasi
                </a>
            </div>

            <!-- Badges/Partners -->
            <div class="flex space-x-4 pt-6">
                <div class="bg-white border border-gray-100 shadow-sm px-4 py-2 rounded-lg flex items-center space-x-2">
                    <span class="w-3 h-3 bg-orange-400 rounded-full"></span>
                    <span class="text-xs font-bold text-gray-700">BAPPEBTI</span>
                </div>
                <div class="bg-white border border-gray-100 shadow-sm px-4 py-2 rounded-lg flex items-center space-x-2">
                    <span class="w-3 h-3 bg-orange-400 rounded-full"></span>
                    <span class="text-xs font-bold text-gray-700">Anggota BBJ</span>
                </div>
                <div class="bg-white border border-gray-100 shadow-sm px-4 py-2 rounded-lg flex items-center space-x-2">
                    <span class="text-xl">🔒</span>
                    <span class="text-xs font-bold text-gray-700">Kliring KBI</span>
                </div>
            </div>
        </div>

        <!-- Kolom Kanan: Gambar & Card -->
        <div class="relative z-10">
            <div class="bg-gray-200 rounded-3xl overflow-hidden h-96 relative shadow-lg">
                <!-- Gunakan asset Laravel untuk gambar asli: src="{{ asset('images/hero-office.jpg') }}" -->
                <img src="https://images.unsplash.com/photo-1600880292203-757bb62b4baf?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80"
                    alt="Kantor EWF" class="w-full h-full object-cover">

                <!-- Overlay Teks pada Gambar -->
                <div class="absolute bottom-0 left-0 w-full bg-gradient-to-t from-gray-900 to-transparent p-6 pt-16">
                    <span class="bg-orange-500 text-white text-xs font-bold px-2 py-1 rounded">KANTOR PUSAT
                        JAKARTA</span>
                    <p class="text-white font-semibold mt-2 leading-tight">Pusat Operasional Terintegrasi & Pusat
                        Pembinaan Profesi Pialang Berjangka</p>
                </div>
            </div>

            <!-- Floating Stats Card -->
            <div
                class="absolute -bottom-8 -left-8 bg-white p-6 rounded-2xl shadow-xl flex space-x-8 border border-gray-50">
                <div>
                    <p class="text-xs text-gray-500">Jumlah Cabang</p>
                    <p class="text-2xl font-bold text-gray-900">6 Kantor</p>
                </div>
                <div>
                    <p class="text-xs text-gray-500">Jaringan Kantor</p>
                    <p class="text-2xl font-bold text-gray-900">4 Kota</p>
                    <p class="text-xs text-gray-400">Seluruh Indonesia</p>
                </div>
            </div>
        </div>
    </section>

    <!-- ================= PROCESS SECTION (Alur Rekrutmen) ================= -->
    <section class="bg-gray-50 py-20 mt-12">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <span
                class="bg-gray-900 text-white text-xs font-bold px-3 py-1 rounded-full uppercase tracking-wider">Transparansi
                Seleksi</span>
            <h2 class="text-3xl font-bold text-gray-900 mt-6">Alur Rekrutmen Karyawan & Profesional</h2>
            <p class="text-gray-500 mt-2 max-w-2xl mx-auto text-sm">EWF menerapkan standar seleksi berjenjang, objektif,
                dan berorientasi pada kepatuhan finansial serta potensi kepemimpinan masa depan.</p>

            <!-- Cards Grid -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mt-12 text-left">
                <!-- Card 1 -->
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 hover:shadow-md transition">
                    <div class="flex justify-between items-start mb-4">
                        <span class="text-orange-200 text-3xl font-extrabold">01</span>
                        <span class="text-gray-400 text-xl">📄</span>
                    </div>
                    <h3 class="font-bold text-gray-900 text-lg leading-tight mb-4">Pengajuan Berkas Online</h3>
                    <div class="bg-gray-50 px-3 py-2 rounded-lg flex items-center space-x-2 text-xs text-gray-600">
                        <span class="w-2 h-2 bg-green-500 rounded-full"></span>
                        <span>Verifikasi dokumen via sistem</span>
                    </div>
                </div>

                <!-- Card 2 -->
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 hover:shadow-md transition">
                    <div class="flex justify-between items-start mb-4">
                        <span class="text-orange-200 text-3xl font-extrabold">02</span>
                        <span class="text-gray-400 text-xl">👥</span>
                    </div>
                    <h3 class="font-bold text-gray-900 text-lg leading-tight mb-4">Verifikasi Kualifikasi HRD</h3>
                    <div class="bg-gray-50 px-3 py-2 rounded-lg flex items-center space-x-2 text-xs text-gray-600">
                        <span class="w-2 h-2 bg-gray-400 rounded-full"></span>
                        <span>Proses 2 - 3 Hari Kerja</span>
                    </div>
                </div>

                <!-- Card 3 -->
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 hover:shadow-md transition">
                    <div class="flex justify-between items-start mb-4">
                        <span class="text-orange-200 text-3xl font-extrabold">03</span>
                        <span class="text-gray-400 text-xl">📊</span>
                    </div>
                    <h3 class="font-bold text-gray-900 text-lg leading-tight mb-4">Wawancara & Psikotes</h3>
                    <div class="bg-orange-50 px-3 py-2 rounded-lg flex items-center space-x-2 text-xs text-orange-700">
                        <span class="w-2 h-2 bg-orange-400 rounded-full"></span>
                        <span>Online via Zoom / Offline di Cabang</span>
                    </div>
                </div>

                <!-- Card 4 -->
                <div
                    class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 hover:shadow-md transition border-b-4 border-b-orange-500">
                    <div class="flex justify-between items-start mb-4">
                        <span class="text-orange-500 text-3xl font-extrabold">04</span>
                        <span class="text-gray-400 text-xl">🤝</span>
                    </div>
                    <h3 class="font-bold text-gray-900 text-lg leading-tight mb-4">Onboarding & Pembekalan</h3>
                    <div class="bg-orange-50 px-3 py-2 rounded-lg flex items-center space-x-2 text-xs text-orange-700">
                        <span class="w-2 h-2 bg-orange-500 rounded-full"></span>
                        <span>Pelatihan Terstruktur</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ================= CTA SECTION ================= -->
    <section class="max-w-7xl mx-auto px-4 py-20">
        <div class="bg-orange-100 rounded-3xl p-10 md:p-16 flex flex-col md:flex-row items-center justify-between">
            <div class="md:w-2/3 space-y-4">
                <span class="text-orange-600 text-xs font-bold tracking-wider uppercase">Bergabung Bersama Kami</span>
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900">Tertarik Menjadi Bagian dari Tim Profesional
                    EWF?</h2>
                <p class="text-gray-700 max-w-xl">Kami membuka pintu bagi para profesional pasar modal, analis
                    finansial berbakat, serta talenta muda melalui program magang universitas. Bangun kompetensi Anda
                    dalam ekosistem bursa berjangka berintegritas tinggi.</p>

                <div class="flex space-x-4 pt-2 text-sm text-gray-800 font-medium">
                    <span class="flex items-center"><span class="text-green-500 mr-1">✔</span> Pelatihan
                        Terstruktur</span>
                    <span class="flex items-center"><span class="text-green-500 mr-1">✔</span> Sertifikasi Wakil
                        Pialang Resmi</span>
                    <span class="flex items-center"><span class="text-green-500 mr-1">✔</span> Jenjang Karir
                        Transparan</span>
                </div>
            </div>
            <div class="md:w-1/3 flex flex-col space-y-4 mt-8 md:mt-0 md:pl-10">
                <a href="#"
                    class="bg-orange-500 hover:bg-orange-600 text-white text-center px-6 py-4 rounded-xl font-bold shadow-lg transition">Pelajari
                    Karir Profesional</a>
                <a href="#"
                    class="bg-white hover:bg-gray-50 text-gray-900 text-center px-6 py-4 rounded-xl font-bold shadow transition border border-gray-200">Program
                    Magang Mahasiswa</a>
            </div>
        </div>
    </section>

    <!-- ================= FOOTER ================= -->
    <footer class="bg-gray-100 pt-16 pb-8 border-t border-gray-200">
        <div class="max-w-7xl mx-auto px-4 grid grid-cols-1 md:grid-cols-4 gap-8">
            <!-- Brand Info -->
            <div class="space-y-4">
                <div class="flex items-center space-x-2 mb-4">
                    <div
                        class="w-8 h-8 bg-orange-500 rounded-full flex items-center justify-center text-white font-bold text-xs">
                        EWF</div>
                    <span class="font-bold text-gray-900">PT Equityworld Futures</span>
                </div>
                <p class="text-xs text-gray-500 leading-relaxed">Perusahaan pialang berjangka resmi terkemuka di
                    Indonesia. Kami menyediakan infrastruktur perdagangan komoditi dan derivatif yang transparan, aman,
                    dan berizin penuh, serta didukung kehandalan teknologi sistem informasi terkini.</p>
                <div class="flex space-x-2 pt-2">
                    <span
                        class="bg-white border border-gray-200 text-[10px] px-2 py-1 rounded font-bold text-gray-600">ANGGOTA
                        BBJ</span>
                    <span
                        class="bg-white border border-gray-200 text-[10px] px-2 py-1 rounded font-bold text-gray-600">KLIRING
                        KBI</span>
                    <span
                        class="bg-white border border-gray-200 text-[10px] px-2 py-1 rounded font-bold text-orange-500">BAPPEBTI</span>
                </div>
            </div>

            <!-- Links 1 -->
            <div>
                <h4 class="font-bold text-gray-900 mb-4">Tentang EWF</h4>
                <ul class="space-y-2 text-sm text-gray-600">
                    <li><a href="#" class="hover:text-orange-500">Profil & Legalitas</a></li>
                    <li><a href="#" class="hover:text-orange-500">Produk Komoditi & Valas</a></li>
                    <li><a href="#" class="hover:text-orange-500">Rekening Terpisah (Segregated)</a></li>
                    <li><a href="#" class="hover:text-orange-500">Riset Pasar & Berita</a></li>
                    <li><a href="#" class="hover:text-orange-500">Tata Kelola Perusahaan</a></li>
                </ul>
            </div>

            <!-- Links 2 -->
            <div>
                <h4 class="font-bold text-gray-900 mb-4">Karir & Program</h4>
                <ul class="space-y-2 text-sm text-gray-600">
                    <li><a href="#" class="hover:text-orange-500">Lowongan Profesional</a></li>
                    <li><a href="#" class="hover:text-orange-500">Program Magang Mahasiswa</a></li>
                    <li><a href="#" class="hover:text-orange-500">Budaya & Nilai Kerja</a></li>
                    <li><a href="#" class="hover:text-orange-500">Fasilitas & Pengembangan</a></li>
                    <li><a href="#" class="hover:text-orange-500">Hubungi Tim HRD</a></li>
                </ul>
            </div>

            <!-- Contact -->
            <div>
                <h4 class="font-bold text-gray-900 mb-4">Kantor Operasional</h4>
                <p class="text-sm text-gray-600 mb-2">Trillium Office & Residence,<br>Jl. Pemuda No.108-116, Embong
                    Kaliasin, Surabaya 60271</p> <!-- Disamakan dengan lokasi magang Anda -->
                <p class="text-sm text-gray-600 mb-2 font-medium">📞 031-XXXX-XXXX</p>
                <p class="text-sm text-gray-600 text-orange-500">✉️ corporate@equityworld-futures.com</p>
            </div>
        </div>

        <div
            class="max-w-7xl mx-auto px-4 mt-12 pt-8 border-t border-gray-200 flex flex-col md:flex-row justify-between items-center text-xs text-gray-400">
            <p>&copy; 2026 PT Equityworld Futures. Seluruh hak cipta dilindungi undang-undang.</p>
            <div class="space-x-4 mt-4 md:mt-0">
                <a href="#" class="hover:text-gray-600">Ketentuan Hukum</a>
                <a href="#" class="hover:text-gray-600">Kebijakan Privasi</a>
                <a href="#" class="hover:text-gray-600">Pusat Bantuan</a>
            </div>
        </div>
    </footer>

</body>

</html>
