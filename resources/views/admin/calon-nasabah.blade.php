@extends('layouts.admin')

@section('title', 'Manajemen Data Calon Nasabah')

@section('content')
<div class="flex flex-col w-full">
    <div class="px-space-xl py-space-xl max-w-7xl mx-auto w-full space-y-space-xxl">
        <!-- Top Editorial Header -->
        <div class="relative flex flex-col md:flex-row md:items-end justify-between gap-space-md pb-space-lg">
            <div class="space-y-space-xxs max-w-3xl">
                <div class="flex items-center gap-space-xs mb-space-xxs">
                    <span class="px-space-xs py-space-xxs rounded-full bg-cream-deeper text-secondary font-micro-uppercase text-micro-uppercase">PORTAL KONSULTASI EWF</span>
                    <span class="font-code-md text-code-md text-stone">•</span>
                    <span class="font-micro text-micro text-stone tracking-wide">MODUL PROSPEK RESMI</span>
                </div>
                <h1 class="font-heading-1 text-heading-1 text-on-surface tracking-tight">Manajemen Data Calon Nasabah</h1>
                <p class="font-body-md text-body-md text-slate leading-relaxed">
                    Pantau pertumbuhan prospek calon nasabah, verifikasi kontak awal, dan penugasan konsultasi investasi EWF.
                </p>
            </div>
            <div class="flex items-center gap-space-xs self-start md:self-auto shrink-0">
                <div class="flex items-center gap-space-xs px-space-md py-space-xs rounded-lg bg-surface-container-low shadow-sm">
                    <span class="w-2 h-2 rounded-full bg-yellow-saturated animate-pulse"></span>
                    <span class="font-code-md text-code-md text-on-surface">Data Realtime Calon Nasabah</span>
                </div>
            </div>
        </div>

        <!-- SIE Minimal Summary Card -->
        <div class="relative overflow-hidden rounded-xl bg-surface-container-lowest p-space-xl shadow-sm">
            <div class="absolute -right-16 -top-16 w-64 h-64 rounded-full bg-gradient-to-br from-sunshine-300/10 via-primary/5 to-transparent blur-3xl pointer-events-none"></div>
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-space-lg items-center relative z-10">
                <div class="lg:col-span-7 space-y-space-xs">
                    <div class="flex items-center gap-space-xs text-stone">
                        <span class="material-symbols-outlined text-[18px] text-primary">groups</span>
                        <span class="font-micro-uppercase text-micro-uppercase tracking-wider">SISTEM INFORMASI EKSEKUTIF (SIE)</span>
                    </div>
                    <h2 class="font-heading-4 text-heading-4 text-on-surface">Total Calon Nasabah Terdaftar</h2>
                    <div class="flex flex-wrap items-baseline gap-space-sm pt-space-xxs">
                        <span class="font-stat-display text-stat-display text-on-surface font-serif tracking-tighter">{{ number_format($totalStats) }}</span>
                        <span class="inline-flex items-center gap-1 px-space-xs py-space-xxs rounded-full bg-cream-deeper text-secondary font-caption-bold text-caption-bold">
                            <span class="material-symbols-outlined text-[14px]">trending_up</span>
                            +{{ $newCount }} calon baru bulan ini
                        </span>
                    </div>
                    <p class="font-body-sm text-body-sm text-slate max-w-xl">
                        Calon nasabah terdata yang siap untuk tindak lanjut konsultasi awal pembukaan rekening investasi berjangka.
                    </p>
                </div>
                <div class="lg:col-span-5 flex flex-col sm:flex-row lg:flex-col justify-end gap-space-md">
                    <div class="p-space-md rounded-lg bg-cream-light">
                        <div class="flex items-center justify-between mb-space-xxs">
                            <span class="font-caption-bold text-caption-bold text-on-surface">Kepatuhan KBI: 95.5%</span>
                            <span class="font-micro text-micro text-secondary font-medium">Standar Audit Terpenuhi</span>
                        </div>
                        <div class="w-full h-1.5 bg-surface-container rounded-full overflow-hidden">
                            <div class="h-full bg-gradient-to-r from-yellow-saturated to-sunshine-800 rounded-full" style="width: 95.5%;"></div>
                        </div>
                        <div class="mt-space-xs flex items-center justify-between text-stone font-micro text-micro">
                            <span>Validasi Telepon Aktif</span>
                            <span>Terintegrasi Bappebti</span>
                        </div>
                    </div>
                    <!-- Micro Metric Inline SVG Chart -->
                    <div class="flex items-center justify-between px-space-md py-space-xs rounded-lg bg-surface-container-low">
                        <div class="flex flex-col">
                            <span class="font-micro-uppercase text-micro-uppercase text-stone">TREN AKUISISI 7 HARI</span>
                            <span class="font-body-sm-medium text-body-sm-medium text-on-surface">+18.4% Konversi Kontak</span>
                        </div>
                        <div class="w-28 h-8">
                            <svg class="w-full h-full text-link" fill="none" preserveAspectRatio="none" viewBox="0 0 100 30">
                                <path d="M0,25 Q18,24 30,18 T60,14 T80,8 T100,3" fill="none" stroke="currentColor" stroke-linecap="round" stroke-width="2"></path>
                                <path d="M0,25 Q18,24 30,18 T60,14 T80,8 T100,3 L100,30 L0,30 Z" fill="currentColor" fill-opacity="0.08"></path>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Direktori Calon Nasabah -->
        <div class="space-y-space-md">
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-space-md">
                <div>
                    <h3 class="font-heading-3 text-heading-3 text-on-surface">Direktori Calon Nasabah EWF</h3>
                    <p class="font-caption text-caption text-stone">Menampilkan prospek resmi tanpa data cabang operasional</p>
                </div>
                <!-- Controls -->
                <div class="flex flex-wrap items-center gap-space-xs">
                    <form method="GET" action="{{ route('admin.calon-nasabah.index') }}" class="flex items-center gap-space-xs flex-wrap">
                        <div class="relative min-w-[220px]">
                            <input class="w-full h-11 pl-9 pr-space-md bg-surface-container-lowest text-on-surface rounded-lg font-body-sm text-body-sm placeholder:text-muted focus:outline-none focus:ring-1 focus:ring-link shadow-sm" 
                                   id="search-calon" 
                                   name="search"
                                   value="{{ $search }}"
                                   placeholder="Cari Nama, No. HP..." 
                                   type="text">
                            <span class="material-symbols-outlined text-stone absolute left-3 top-3 text-[18px]">search</span>
                        </div>
                        <div class="relative">
                            <select class="h-11 px-space-md bg-surface-container-lowest text-on-surface rounded-lg font-body-sm text-body-sm focus:outline-none focus:ring-1 focus:ring-link shadow-sm cursor-pointer pr-8 appearance-none" 
                                    name="sort"
                                    onchange="this.form.submit()">
                                <option value="terbaru" {{ $sort === 'terbaru' ? 'selected' : '' }}>Terbaru Registrasi</option>
                                <option value="terlama" {{ $sort === 'terlama' ? 'selected' : '' }}>Terlama Registrasi</option>
                                <option value="abjad" {{ $sort === 'abjad' ? 'selected' : '' }}>Nama (A - Z)</option>
                            </select>
                            <span class="material-symbols-outlined text-stone absolute right-2.5 top-3 text-[18px] pointer-events-none">expand_more</span>
                        </div>
                    </form>
                    <button onclick="alert('Mengunduh data Calon Nasabah EWF dalam format CSV...')" class="h-11 px-space-md bg-surface-container-lowest hover:bg-cream-deeper text-ink rounded-lg font-button-md text-button-md transition-colors shadow-sm flex items-center gap-1.5 cursor-pointer border-0">
                        <span class="material-symbols-outlined text-[18px] text-stone">download</span>
                        <span>Ekspor CSV/Excel</span>
                    </button>
                    <a class="h-11 px-space-md bg-link hover:bg-primary-deep text-on-primary rounded-lg font-button-md text-button-md transition-colors shadow-sm flex items-center gap-1.5 no-underline" href="#form-entri-calon">
                        <span class="material-symbols-outlined text-[18px]">person_add</span>
                        <span>+ Tambah Calon Nasabah</span>
                    </a>
                </div>
            </div>

            <!-- Table Container -->
            <div class="bg-surface-container-lowest rounded-xl shadow-sm overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse" id="table-calon-nasabah">
                        <thead>
                            <tr class="bg-surface-container-low text-on-surface-variant font-micro-uppercase text-micro-uppercase tracking-wider">
                                <th class="py-space-md px-space-lg">NAMA CALON NASABAH</th>
                                <th class="py-space-md px-space-lg">NOMOR TELEPON</th>
                                <th class="py-space-md px-space-lg">TANGGAL REGISTRASI</th>
                                <th class="py-space-md px-space-lg text-right">AKSI CEPAT</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-hairline-soft" id="candidate-rows">
                            @forelse ($calonNasabahs as $calon)
                                <tr class="hover:bg-cream-light/60 transition-colors group">
                                    <td class="py-space-md px-space-lg">
                                        <div class="flex items-center gap-space-sm">
                                            <div class="w-8 h-8 rounded-full bg-cream-deeper text-secondary flex items-center justify-center font-caption-bold text-caption-bold">
                                                {{ $calon->initials ?? 'CN' }}
                                            </div>
                                            <div>
                                                <span class="font-body-md-medium text-body-md-medium text-on-surface block">{{ $calon->nama }}</span>
                                                <span class="font-micro text-micro text-stone">Calon Nasabah {{ $calon->status ?? 'Reguler' }}</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="py-space-md px-space-lg">
                                        <span class="font-code-md text-code-md text-on-surface tracking-tight bg-surface-container-low px-2 py-1 rounded">
                                            {{ $calon->telepon }}
                                        </span>
                                    </td>
                                    <td class="py-space-md px-space-lg font-body-sm text-body-sm text-slate">
                                        {{ $calon->tanggal_registrasi instanceof \Carbon\Carbon ? $calon->tanggal_registrasi->translatedFormat('d F Y') : $calon->tanggal_registrasi }}
                                    </td>
                                    <td class="py-space-md px-space-lg text-right">
                                        <a href="https://wa.me/{{ preg_replace('/\D/', '', $calon->telepon) }}" target="_blank" class="inline-block px-space-xs py-space-xxs rounded bg-cream hover:bg-cream-deeper text-secondary font-button-md text-button-md transition-colors no-underline" title="Hubungi WhatsApp">
                                            Hubungi
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="py-8 text-center text-stone font-body-sm">
                                        Belum ada data calon nasabah yang cocok dengan pencarian.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Clean Pagination Footer -->
                <div class="p-space-md bg-surface-container-low flex flex-col sm:flex-row items-center justify-between gap-space-sm">
                    <span class="font-caption text-caption text-slate">
                        Menampilkan <span class="font-semibold text-on-surface">1 - {{ count($calonNasabahs) }}</span> dari <span class="font-semibold text-on-surface">{{ number_format($totalStats) }}</span> calon nasabah EWF
                    </span>
                    <div class="flex items-center gap-space-xs">
                        <button class="px-space-sm py-space-xs rounded bg-surface-container-lowest text-stone hover:text-on-surface font-body-sm text-body-sm shadow-sm transition-colors disabled:opacity-50" disabled="">
                            Sebelumnya
                        </button>
                        <button class="w-8 h-8 rounded bg-link text-on-primary font-body-sm-medium text-body-sm-medium flex items-center justify-center">
                            1
                        </button>
                        <button class="w-8 h-8 rounded bg-surface-container-lowest hover:bg-cream-deeper text-on-surface font-body-sm text-body-sm flex items-center justify-center transition-colors">
                            2
                        </button>
                        <button class="w-8 h-8 rounded bg-surface-container-lowest hover:bg-cream-deeper text-on-surface font-body-sm text-body-sm flex items-center justify-center transition-colors">
                            3
                        </button>
                        <span class="text-stone px-1">...</span>
                        <button class="px-space-sm py-space-xs rounded bg-surface-container-lowest text-on-surface hover:bg-cream-deeper font-body-sm text-body-sm shadow-sm transition-colors">
                            Berikutnya
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Warm Cream Entry Form Card -->
        <div class="rounded-xl bg-surface-cream p-space-xl shadow-sm relative overflow-hidden" id="form-entri-calon">
            <div class="absolute -right-20 -bottom-20 w-72 h-72 rounded-full bg-sunshine-500/10 blur-3xl pointer-events-none"></div>
            <div class="max-w-4xl space-y-space-lg relative z-10">
                <div class="space-y-space-xxs">
                    <div class="flex items-center gap-space-xs">
                        <span class="w-2.5 h-2.5 rounded-full bg-link"></span>
                        <span class="font-micro-uppercase text-micro-uppercase text-secondary tracking-wider">REGISTRASI PROSPEK BARU</span>
                    </div>
                    <h3 class="font-heading-3 text-heading-3 text-on-surface">Formulir Entri Calon Nasabah Baru</h3>
                    <p class="font-body-sm text-body-sm text-slate">
                        Pendaftaran cepat calon nasabah baru untuk penugasan tim konsultan dan tindak lanjut pembukaan rekening resmi.
                    </p>
                </div>
                
                <form action="{{ route('admin.calon-nasabah.store') }}" method="POST" class="space-y-space-lg" id="entry-form">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-space-md">
                        <!-- Field 1: Nama Calon Nasabah -->
                        <div class="space-y-space-xxs">
                            <label class="block font-caption-bold text-caption-bold text-on-surface" for="nama-calon">
                                Nama Calon Nasabah <span class="text-primary">*</span>
                            </label>
                            <input class="w-full h-11 px-space-md bg-canvas rounded-lg font-body-sm text-body-sm text-on-surface placeholder:text-muted focus:outline-none focus:ring-1.5 focus:ring-link shadow-sm border-0" 
                                   id="nama-calon" 
                                   name="nama" 
                                   placeholder="Nama lengkap calon nasabah" 
                                   required 
                                   type="text">
                            <span class="font-micro text-micro text-stone">Contoh: Budi Santoso, S.H.</span>
                        </div>

                        <!-- Field 2: Nomor Telepon / HP -->
                        <div class="space-y-space-xxs">
                            <label class="block font-caption-bold text-caption-bold text-on-surface" for="telepon-calon">
                                Nomor Telepon / HP <span class="text-primary">*</span>
                            </label>
                            <input class="w-full h-11 px-space-md bg-canvas rounded-lg font-body-sm text-body-sm text-on-surface placeholder:text-muted focus:outline-none focus:ring-1.5 focus:ring-link font-code-md shadow-sm border-0" 
                                   id="telepon-calon" 
                                   name="telepon" 
                                   placeholder="+62 812-xxxx-xxxx" 
                                   required 
                                   type="tel">
                            <span class="font-micro text-micro text-stone">Dapat dihubungi via WA &amp; Telepon</span>
                        </div>

                        <!-- Field 3: Tanggal Registrasi -->
                        <div class="space-y-space-xxs">
                            <label class="block font-caption-bold text-caption-bold text-on-surface" for="tanggal-calon">
                                Tanggal Registrasi / Bergabung <span class="text-primary">*</span>
                            </label>
                            <input class="w-full h-11 px-space-md bg-canvas rounded-lg font-body-sm text-body-sm text-on-surface focus:outline-none focus:ring-1.5 focus:ring-link shadow-sm border-0" 
                                   id="tanggal-calon" 
                                   name="tanggal" 
                                   required 
                                   type="date"
                                   value="{{ date('Y-m-d') }}">
                            <span class="font-micro text-micro text-stone">Tanggal registrasi resmi sistem</span>
                        </div>
                    </div>

                    <div class="flex flex-wrap items-center justify-between gap-space-md pt-space-xs">
                        <div class="flex items-center gap-space-xs text-stone">
                            <span class="material-symbols-outlined text-[16px] text-secondary">verified_user</span>
                            <span class="font-caption text-caption">Data tersimpan langsung pada pelaporan prospek EWF</span>
                        </div>
                        <div class="flex items-center gap-space-sm">
                            <button class="h-11 px-space-lg bg-surface-container-lowest hover:bg-cream-deeper text-ink rounded-lg font-button-md text-button-md transition-colors shadow-sm cursor-pointer border-0" type="reset">
                                Batal &amp; Bersihkan
                            </button>
                            <button class="h-11 px-space-xl bg-link hover:bg-primary-deep text-on-primary rounded-lg font-button-md text-button-md transition-colors shadow-sm flex items-center gap-space-xs cursor-pointer border-0" type="submit">
                                <span class="material-symbols-outlined text-[18px]">save</span>
                                <span>Simpan Data Calon Nasabah</span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Regulatory note -->
        <div class="grid grid-cols-1 md:grid-cols-12 gap-space-md items-center bg-surface-container-lowest p-space-lg rounded-xl shadow-sm">
            <div class="md:col-span-8 flex items-center gap-space-md">
                <div class="w-12 h-12 rounded-lg bg-cream-deeper text-secondary flex items-center justify-center shrink-0">
                    <span class="material-symbols-outlined text-[24px]">gavel</span>
                </div>
                <div class="space-y-space-xxs">
                    <span class="font-micro-uppercase text-micro-uppercase text-secondary tracking-wider block">KEPATUHAN &amp; REGULASI INDUSTRI</span>
                    <p class="font-body-sm text-body-sm text-slate">
                        PT Equityworld Futures beroperasi di bawah payung hukum berjangka komoditi resmi. Penanganan prospek calon nasabah wajib tunduk pada kode etik transparansi dan edukasi risiko Bappebti.
                    </p>
                </div>
            </div>
            <div class="md:col-span-4 flex justify-start md:justify-end gap-space-xs">
                <div class="px-space-sm py-space-xs rounded bg-surface-container-low text-center">
                    <span class="font-micro-uppercase text-micro-uppercase text-stone block">BAPPEBTI</span>
                    <span class="font-caption-bold text-caption-bold text-on-surface">Izin No. 549</span>
                </div>
                <div class="px-space-sm py-space-xs rounded bg-surface-container-low text-center">
                    <span class="font-micro-uppercase text-micro-uppercase text-stone block">KLIRING KBI</span>
                    <span class="font-caption-bold text-caption-bold text-on-surface">Anggota Resmi</span>
                </div>
                <div class="px-space-sm py-space-xs rounded bg-surface-container-low text-center">
                    <span class="font-micro-uppercase text-micro-uppercase text-stone block">BURSA BBJ</span>
                    <span class="font-caption-bold text-caption-bold text-on-surface">Pialang Berizin</span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
