<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tentang Kami | PT Equityworld Futures</title>
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

            <!-- Menu Navigasi -->
            <div class="hidden md:flex space-x-6 lg:space-x-10 text-sm font-semibold">
                <!-- Tambahkan properti aktif/oranye pada halaman yang sedang dibuka -->
                <a href="{{ route('beranda') }}" class="text-gray-900 hover:text-orange-600 transition">Beranda</a>
                <a href="{{ route('tentang') }}" class="text-orange-600 font-bold transition">Tentang Kami</a>
                <a href="#" class="text-gray-800 hover:text-orange-600 transition">Peluang Karir</a>
            </div>

            <!-- Tombol CTA -->
            <a href="{{ route('login') }}"
                class="bg-orange-500 hover:bg-orange-600 text-white px-4 py-2 sm:px-6 sm:py-2.5 rounded-full text-xs sm:text-sm font-bold shadow-md transition">
                Masuk / Daftar
            </a>
        </nav>
    </div>

    <!-- ================= SEKSI: TENTANG KAMI ================= -->
    <section class="relative pt-40 pb-20 overflow-hidden">
        <!-- Dekorasi Oranye Samping Kiri (Setengah Lingkaran) -->
        <div class="absolute top-40 -left-20 w-40 h-80 rounded-r-full border-[20px] border-orange-500 opacity-90 z-0">
        </div>

        <div class="max-w-5xl mx-auto px-4 relative z-10">
            <!-- Kotak Latar Belakang Abu-abu Terang -->
            <div class="bg-gray-50 rounded-[40px] p-10 md:p-16 shadow-sm border border-gray-100 text-center">
                <h1 class="text-4xl md:text-5xl font-extrabold text-gray-900 mb-8">Tentang Kami</h1>

                <p class="text-gray-600 leading-relaxed mb-6 max-w-3xl mx-auto">
                    PT Equityworld Futures ("EWF") hadir sebagai mitra investasi yang mengutamakan
                    kepercayaan dan profesionalisme di industri perdagangan berjangka. Dengan fokus
                    pada kualitas layanan dan edukasi berkelanjutan, EWF membantu nasabah menavigasi
                    peluang pasar secara lebih terarah dan aman.
                </p>

                <p class="text-gray-600 leading-relaxed max-w-3xl mx-auto">
                    Sejak mulai beroperasi pada tahun 2005, EWF terus tumbuh dan memperluas jangkauan
                    layanan hingga memiliki tujuh kantor operasional di Jakarta, Surabaya, Semarang,
                    Manado, dan Cirebon. Sebagai perusahaan pialang berjangka resmi, EWF terdaftar dan
                    diawasi oleh Badan Pengawas Perdagangan Berjangka Komoditi (BAPPEBTI), Otoritas
                    Jasa Keuangan (OJK), dan Bank Indonesia (BI), serta menjadi anggota PT Bursa Berjangka
                    Jakarta (BBJ) dan PT Kliring Berjangka Indonesia (Persero). Dengan landasan regulasi
                    yang kuat, EWF berkomitmen memberikan pengalaman transaksi yang transparan,
                    akuntabel, dan berstandar tinggi.
                </p>
            </div>
        </div>
    </section>

    <!-- ================= SEKSI: VISI & MISI ================= -->
    <section class="relative py-20 bg-white">
        <!-- Latar Belakang Aksen Lingkaran Oranye di Belakang Kartu Misi -->
        <div
            class="absolute right-0 top-32 w-1/2 h-[400px] bg-orange-500 rounded-l-[100px] z-0 opacity-90 hidden md:block">
        </div>

        <div class="max-w-7xl mx-auto px-4 relative z-10">
            <!-- Judul Seksi -->
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-extrabold text-gray-900 mb-4">Visi & Misi PT Equityworld Futures
                </h2>
                <p class="text-gray-500 text-sm max-w-2xl mx-auto">Komitmen fundamental yang mengarahkan setiap
                    operasional, etika kerja pegawai, dan layanan kepada investor.</p>
            </div>

            <!-- Grid Visi & Misi -->
            <div class="grid md:grid-cols-2 gap-8 items-stretch">

                <!-- Kartu Visi -->
                <div
                    class="bg-gray-50 rounded-[32px] p-10 md:p-12 shadow-md border border-gray-100 flex flex-col justify-between">
                    <div>
                        <!-- Ikon Visi -->
                        <div
                            class="w-14 h-14 bg-gray-900 rounded-2xl flex items-center justify-center text-white text-xl mb-6 shadow-md">
                            👁️</div>
                        <p class="text-gray-400 text-xs font-bold tracking-widest uppercase mb-2">Orientasi Masa Depan
                        </p>
                        <h3 class="text-2xl font-bold text-gray-900 mb-6">Visi Perusahaan</h3>
                        <p class="text-gray-700 text-lg font-medium leading-relaxed italic">
                            "Menjadi perusahaan pialang berjangka terdepan, tepercaya, dan bereputasi paling unggul di
                            Indonesia
                            melalui penerapan tata kelola berintegritas tinggi serta standar pelayanan bertaraf
                            internasional."
                        </p>
                    </div>
                    <!-- Poin Tambahan -->
                    <div class="mt-12 flex items-center text-sm text-green-600 font-medium">
                        <span class="mr-2 text-lg">✓</span> Fokus pada keberlanjutan jangka panjang & perlindungan
                        nasabah.
                    </div>
                </div>

                <!-- Kartu Misi -->
                <div
                    class="bg-gray-50 rounded-[32px] p-10 md:p-12 shadow-md border border-gray-100 h-full flex flex-col justify-between">
                    <div>
                        <!-- Ikon Misi -->
                        <div
                            class="w-14 h-14 bg-orange-500 rounded-2xl flex items-center justify-center text-white text-xl mb-6 shadow-md">
                            🎯</div>
                        <p class="text-orange-500 text-xs font-bold tracking-widest uppercase mb-2">Aksi Korporasi
                            Berkelanjutan</p>
                        <h3 class="text-2xl font-bold text-gray-900 mb-6">Misi Perusahaan</h3>

                        <ul class="space-y-4">
                            <li class="flex items-start">
                                <span class="text-orange-500 mr-3 mt-0.5">🎯</span>
                                <span class="text-gray-600 text-sm leading-relaxed">Menyelenggarakan transaksi
                                    perdagangan berjangka yang aman, likuid, dan patuh regulasi BAPPEBTI.</span>
                            </li>
                            <li class="flex items-start">
                                <span class="text-orange-500 mr-3 mt-0.5">🎯</span>
                                <span class="text-gray-600 text-sm leading-relaxed">Mengembangkan kompetensi talenta
                                    finansial melalui riset mendalam, etika profesi, dan edukasi terstruktur.</span>
                            </li>
                            <li class="flex items-start">
                                <span class="text-orange-500 mr-3 mt-0.5">🎯</span>
                                <span class="text-gray-600 text-sm leading-relaxed">Menyediakan infrastruktur digital
                                    modern untuk mempermudah analisis data pasar secara *real-time*.</span>
                            </li>
                            <li class="flex items-start">
                                <span class="text-orange-500 mr-3 mt-0.5">🎯</span>
                                <span class="text-gray-600 text-sm leading-relaxed">Mendorong literasi publik mengenai
                                    manajemen risiko derivatif di seluruh penjuru Indonesia.</span>
                            </li>
                        </ul>
                    </div>
                    <!-- Poin Tambahan -->
                    <div class="mt-12 flex items-center text-sm text-green-600 font-medium">
                        <span class="mr-2 text-lg">✓</span> Kemitraan berkesinambungan bersama institusi perbankan
                        resmi.
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- ================= SEKSI: NILAI-NILAI PERUSAHAAN ================= -->
    <section class="relative py-20 mb-20 overflow-hidden">

        <!-- Aksen Gelombang Oranye di Belakang Nilai-Nilai -->
        <div
            class="absolute bottom-0 left-0 w-full h-[60%] bg-orange-500 z-0 opacity-90 rounded-t-[100px] md:rounded-t-[300px]">
        </div>

        <div class="max-w-7xl mx-auto px-4 relative z-10 text-center">

            <h2 class="text-3xl md:text-4xl font-extrabold text-gray-900 mb-4">Nilai - Nilai Perusahaan</h2>
            <p class="text-gray-500 text-sm max-w-2xl mx-auto mb-16">Etika, disiplin, dan profesionalitas menjadi
                jangkar operasional harian kami dalam melayani nasabah dan memajukan karir setiap insan EWF.</p>

            <!-- Grid 4 Kartu Nilai Perusahaan -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 text-left">

                <!-- Nilai 1 -->
                <div class="bg-gray-50 rounded-3xl p-8 shadow-sm border border-gray-100 hover:shadow-lg transition">
                    <div class="text-3xl text-orange-500 mb-4">⚖️</div>
                    <h3 class="font-bold text-gray-900 text-lg mb-3">Disiplin Kepatuhan</h3>
                    <p class="text-gray-500 text-xs leading-relaxed">Menjalankan seluruh proses bisnis sesuai kerangka
                        regulasi dengan kontrol internal yang kuat dan transparan.</p>
                </div>

                <!-- Nilai 2 -->
                <div class="bg-gray-50 rounded-3xl p-8 shadow-sm border border-gray-100 hover:shadow-lg transition">
                    <div class="text-3xl text-orange-500 mb-4">🔎</div>
                    <h3 class="font-bold text-gray-900 text-lg mb-3">Transparansi Finansial</h3>
                    <p class="text-gray-500 text-xs leading-relaxed">Pelaporan transaksi dan pencatatan rekening nasabah
                        (*segregated account*) secara riil dan terverifikasi di KBI.</p>
                </div>

                <!-- Nilai 3 -->
                <div class="bg-gray-50 rounded-3xl p-8 shadow-sm border border-gray-100 hover:shadow-lg transition">
                    <div class="text-3xl text-orange-500 mb-4">💡</div>
                    <h3 class="font-bold text-gray-900 text-lg mb-3">Inovasi Berkelanjutan</h3>
                    <p class="text-gray-500 text-xs leading-relaxed">Mendorong pengembangan teknologi, produk, dan
                        proses kerja untuk menghasilkan pengalaman transaksi yang semakin efisien.</p>
                </div>

                <!-- Nilai 4 -->
                <div class="bg-gray-50 rounded-3xl p-8 shadow-sm border border-gray-100 hover:shadow-lg transition">
                    <div class="text-3xl text-orange-500 mb-4">🛡️</div>
                    <h3 class="font-bold text-gray-900 text-lg mb-3">Integritas Profesional</h3>
                    <p class="text-gray-500 text-xs leading-relaxed">Menjunjung standar etika yang tinggi serta menjaga
                        konsistensi tindakan dan keputusan dalam setiap aktivitas perusahaan.</p>
                </div>

            </div>
        </div>
    </section>

    <!-- ================= FOOTER ================= -->
    <footer class="bg-gray-100 pt-16 pb-8 border-t border-gray-200">
        <div class="max-w-7xl mx-auto px-4 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12">
            <!-- Brand Info -->
            <div class="space-y-6">
                <div class="flex items-center space-x-3">
                    <img src="{{ asset('assets/logo_ewf-removebg-preview-1.png') }}" alt="Logo PT Equityworld Futures"
                        class="w-8 h-8 object-contain" />
                    <span class="font-bold text-gray-900 text-sm">PT Equityworld Futures</span>
                </div>
                <p class="text-xs text-gray-500 leading-relaxed pr-4">Perusahaan pialang berjangka resmi terkemuka di
                    Indonesia. Kami menyediakan infrastruktur perdagangan komoditi dan derivatif yang transparan, aman,
                    dan berizin penuh, serta didukung kehandalan teknologi sistem informasi terkini.</p>
                <div class="flex flex-wrap gap-2">
                    <span
                        class="bg-white border border-gray-200 text-[9px] px-2 py-1 rounded font-bold text-gray-600">ANGGOTA
                        BBJ</span>
                    <span
                        class="bg-white border border-gray-200 text-[9px] px-2 py-1 rounded font-bold text-gray-600">KLIRING
                        KBI</span>
                    <span
                        class="bg-white border border-gray-200 text-[9px] px-2 py-1 rounded font-bold text-orange-500">BAPPEBTI</span>
                </div>
            </div>

            <!-- Links 1 -->
            <div>
                <h4 class="font-bold text-gray-900 mb-6 text-sm">Tentang EWF</h4>
                <ul class="space-y-3 text-xs font-medium text-gray-500">
                    <li><a href="#" class="hover:text-orange-500 transition">Profil & Legalitas</a></li>
                    <li><a href="#" class="hover:text-orange-500 transition">Produk Komoditi & Valas</a></li>
                    <li><a href="#" class="hover:text-orange-500 transition">Rekening Terpisah (Segregated)</a>
                    </li>
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
                <p class="text-xs text-gray-500 mb-4 leading-relaxed">Trillium Office & Residence,<br>Jl. Pemuda
                    No.108-116, Embong
                    Kaliasin, Surabaya 60271</p>
                <div class="space-y-2">
                    <p class="text-xs text-gray-900 font-bold flex items-center"><span class="mr-2">📞</span>
                        031-XXXX-XXXX</p>
                    <p class="text-xs text-orange-500 font-medium flex items-center"><span class="mr-2">✉️</span>
                        corporate@equityworld-futures.com</p>
                </div>
            </div>
        </div>

        <!-- Footer Bottom -->
        <div
            class="max-w-7xl mx-auto px-4 mt-16 pt-8 border-t border-gray-200 flex flex-col md:flex-row justify-between items-center text-[10px] text-gray-400 font-medium">
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
