@extends('layouts.admin')

@section('title', 'Manajemen & Persetujuan Pendaftar Talenta')

@section('content')
<div class="flex flex-col w-full">
    <!-- Top Ambient Glow Layer -->
    <div class="relative w-full px-space-xl pt-space-xl pb-space-xxl overflow-hidden">
        <div class="absolute -top-24 -right-16 w-96 h-96 rounded-full bg-gradient-to-br from-yellow-saturated/15 via-sunshine-500/10 to-primary/5 blur-3xl pointer-events-none"></div>
        <div class="absolute top-1/2 -left-20 w-80 h-80 rounded-full bg-cream-deeper/40 blur-2xl pointer-events-none"></div>
        <div class="relative z-10 max-w-7xl mx-auto flex flex-col gap-space-xl">
            <!-- Editorial Page Heading & Controls -->
            <div class="flex flex-col lg:flex-row lg:items-end justify-between gap-space-lg pb-space-xs">
                <div class="flex flex-col max-w-3xl">
                    <div class="flex items-center gap-space-xs mb-space-xs">
                        <span class="w-2 h-2 rounded-full bg-primary animate-pulse"></span>
                        <span class="font-micro-uppercase text-micro-uppercase text-primary font-semibold tracking-wider">MODUL REKRUTMEN EIS • VERIFIKASI RESMI</span>
                    </div>
                    <h1 class="font-heading-1 text-heading-1 text-ink tracking-tight">
                        Manajemen &amp; Persetujuan Pendaftar Talenta
                    </h1>
                    <p class="font-subtitle text-subtitle text-slate mt-space-xs leading-relaxed">
                        Kelola, verifikasi berkas kualifikasi, jadwalkan wawancara, dan setujui pendaftar program Magang serta posisi Fulltime Profesional secara terintegrasi dengan regulasi Bappebti.
                    </p>
                </div>
                <!-- Action Buttons -->
                <div class="flex items-center gap-space-sm flex-wrap self-start lg:self-end">
                    <button onclick="alert('Mengekspor data pendaftar (Excel/CSV)...')" class="group flex items-center gap-space-xs px-space-lg py-2.5 rounded-lg bg-surface-container-lowest text-ink font-button-md text-button-md shadow-sm hover:bg-cream-deeper hover:text-charcoal transition-all border-0 cursor-pointer" type="button">
                        <span class="material-symbols-outlined text-[18px] text-stone group-hover:text-primary transition-colors">download</span>
                        <span>Ekspor Data (Excel/CSV)</span>
                    </button>
                    <button onclick="alert('Fitur tambah pelamar manual dibuka untuk sesi wawancara walk-in.')" class="flex items-center gap-space-xs px-space-lg py-2.5 rounded-lg bg-link text-on-primary font-button-md text-button-md shadow-md shadow-link/20 hover:bg-primary-deep transition-all border-0 cursor-pointer" type="button">
                        <span class="material-symbols-outlined text-[18px]">add</span>
                        <span>+ Tambah Pelamar Manual</span>
                    </button>
                </div>
            </div>

            <!-- Top Metric Cards (4 Bento modules) -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-space-md">
                <!-- Metric 1 -->
                <div class="bg-surface-container-lowest rounded-xl p-space-lg shadow-sm flex flex-col justify-between relative overflow-hidden group hover:shadow-md transition-shadow">
                    <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-sunshine-300 to-yellow-saturated"></div>
                    <div class="flex items-center justify-between text-stone mb-space-sm">
                        <span class="font-micro-uppercase text-micro-uppercase tracking-wider text-slate">TOTAL PENGAJUAN MASUK</span>
                        <span class="material-symbols-outlined text-[20px] text-sunshine-700">group_add</span>
                    </div>
                    <div class="flex items-baseline gap-space-sm">
                        <span class="font-stat-display text-stat-display text-ink tracking-tight">{{ number_format($metrics['total_masuk']) }}</span>
                        <span class="font-caption-bold text-caption-bold text-primary bg-primary-fixed/40 px-2 py-0.5 rounded-full">{{ $metrics['total_today'] }}</span>
                    </div>
                    <div class="mt-space-sm pt-space-xs flex items-center justify-between text-stone">
                        <span class="font-caption text-caption">Total antrean kandidat</span>
                        <span class="font-code-md text-code-md text-slate font-medium">94.8% Akurasi</span>
                    </div>
                </div>

                <!-- Metric 2 -->
                <div class="bg-surface-container-lowest rounded-xl p-space-lg shadow-sm flex flex-col justify-between relative overflow-hidden group hover:shadow-md transition-shadow">
                    <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-sunshine-700 to-link"></div>
                    <div class="flex items-center justify-between text-stone mb-space-sm">
                        <span class="font-micro-uppercase text-micro-uppercase tracking-wider text-slate">MENUNGGU REVIEW / APPROVAL</span>
                        <span class="material-symbols-outlined text-[20px] text-primary">pending_actions</span>
                    </div>
                    <div class="flex items-baseline gap-space-sm">
                        <span class="font-stat-display text-stat-display text-ink tracking-tight">{{ number_format($metrics['menunggu_review']) }}</span>
                        <span class="font-caption-bold text-caption-bold text-on-error-container bg-error-container/60 px-2 py-0.5 rounded-full">{{ $metrics['mendesak'] }}</span>
                    </div>
                    <div class="mt-space-sm pt-space-xs flex items-center justify-between text-stone">
                        <span class="font-caption text-caption">SLA Review</span>
                        <span class="font-code-md text-code-md text-primary font-medium">&lt; 24 Jam</span>
                    </div>
                </div>

                <!-- Metric 3 -->
                <div class="bg-surface-container-lowest rounded-xl p-space-lg shadow-sm flex flex-col justify-between relative overflow-hidden group hover:shadow-md transition-shadow">
                    <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-tertiary-fixed-dim to-secondary-container"></div>
                    <div class="flex items-center justify-between text-stone mb-space-sm">
                        <span class="font-micro-uppercase text-micro-uppercase tracking-wider text-slate">DISETUJUI (LOLOS SKRINING)</span>
                        <span class="material-symbols-outlined text-[20px] text-secondary">verified_user</span>
                    </div>
                    <div class="flex items-baseline gap-space-sm">
                        <span class="font-stat-display text-stat-display text-ink tracking-tight">{{ number_format($metrics['disetujui']) }}</span>
                        <span class="font-caption-bold text-caption-bold text-secondary bg-cream-deeper px-2 py-0.5 rounded-full">{{ $metrics['lolos_pct'] }}</span>
                    </div>
                    <div class="mt-space-sm pt-space-xs flex items-center justify-between text-stone">
                        <span class="font-caption text-caption">Terdaftar pada pipeline HR</span>
                        <span class="font-code-md text-code-md text-slate">Valid Bappebti</span>
                    </div>
                </div>

                <!-- Metric 4 -->
                <div class="bg-surface-container-lowest rounded-xl p-space-lg shadow-sm flex flex-col justify-between relative overflow-hidden group hover:shadow-md transition-shadow">
                    <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-yellow-saturated to-primary-container"></div>
                    <div class="flex items-center justify-between text-stone mb-space-sm">
                        <span class="font-micro-uppercase text-micro-uppercase tracking-wider text-slate">DIJADWALKAN WAWANCARA</span>
                        <span class="material-symbols-outlined text-[20px] text-primary-container">video_camera_front</span>
                    </div>
                    <div class="flex items-baseline gap-space-sm">
                        <span class="font-stat-display text-stat-display text-ink tracking-tight">{{ number_format($metrics['wawancara']) }}</span>
                        <span class="font-caption-bold text-caption-bold text-charcoal bg-surface-variant px-2 py-0.5 rounded-full">{{ $metrics['wawancara_week'] }}</span>
                    </div>
                    <div class="mt-space-sm pt-space-xs flex items-center justify-between text-stone">
                        <span class="font-caption text-caption">18 Cyber 2</span>
                        <span class="font-caption text-caption font-medium text-slate">24 Sesi Zoom</span>
                    </div>
                </div>
            </div>

            <!-- Action Banner -->
            <div class="rounded-xl bg-gradient-to-r from-cream to-cream-deeper p-space-lg shadow-sm flex flex-col md:flex-row md:items-center justify-between gap-space-md relative overflow-hidden">
                <div class="flex items-start md:items-center gap-space-md">
                    <div class="w-12 h-12 rounded-xl bg-sunshine-500/20 text-primary flex items-center justify-center shrink-0">
                        <span class="material-symbols-outlined text-[28px]">bolt</span>
                    </div>
                    <div class="flex flex-col">
                        <div class="flex items-center gap-space-xs">
                            <h3 class="font-heading-4 text-heading-4 text-ink font-medium">Aksi Massal Antrean: 38 Berkas Memerlukan Persetujuan</h3>
                            <span class="px-space-xs py-0.5 rounded-full bg-link text-on-primary font-micro-uppercase text-micro-uppercase">Prioritas</span>
                        </div>
                        <p class="font-body-sm text-body-sm text-on-surface-variant mt-0.5">
                            14 berkas telah lulus otomatis algoritma validasi skor kualifikasi di atas 90% (IPK tinggi, kelengkapan CV, dan verifikasi sertifikat penunjang).
                        </p>
                    </div>
                </div>
                <div class="flex items-center gap-space-sm shrink-0 flex-wrap">
                    <button onclick="alert('Mengunduh rekapitulasi berkas batch V...')" class="px-space-md py-2.5 rounded-lg bg-surface-container-lowest text-charcoal font-button-md text-button-md shadow-sm hover:bg-surface-bright transition-colors flex items-center gap-space-xxs border-0 cursor-pointer" type="button">
                        <span class="material-symbols-outlined text-[16px] text-stone">inventory_2</span>
                        <span>Unduh Rekapitulasi Berkas Batch V</span>
                    </button>
                    <button onclick="alert('14 kandidat skor >90% berhasil disetujui massal.')" class="px-space-lg py-2.5 rounded-lg bg-link text-on-primary font-button-md text-button-md shadow-md shadow-link/25 hover:bg-primary-deep transition-all flex items-center gap-space-xs border-0 cursor-pointer" type="button">
                        <span class="material-symbols-outlined text-[18px]">done_all</span>
                        <span>Setujui Semua Skor &gt;90% (14 Kandidat)</span>
                    </button>
                </div>
            </div>

            <!-- TABEL 1: Pelamar Program Magang -->
            <section class="flex flex-col gap-space-md">
                <div class="flex flex-col md:flex-row md:items-end justify-between gap-space-sm">
                    <div>
                        <div class="flex items-center gap-space-sm">
                            <h2 class="font-heading-3 text-heading-3 text-ink">Daftar Pelamar Program Magang</h2>
                            <span class="px-space-sm py-space-xxs rounded-full bg-secondary-fixed text-on-secondary-fixed font-micro-uppercase text-micro-uppercase font-semibold">298 Berkas</span>
                        </div>
                        <p class="font-body-sm text-body-sm text-slate mt-space-xxs">
                            Antrean pelamar magang mahasiswa aktif &amp; fresh graduate untuk rotasi divisi riset, analis, dan settlement.
                        </p>
                    </div>
                    <!-- Quick Filters -->
                    <div class="flex items-center gap-space-xs self-start md:self-auto">
                        <span class="font-micro text-micro text-stone uppercase tracking-wider">Filter Divisi:</span>
                        <span class="px-space-xs py-1 rounded bg-cream-deeper text-secondary font-micro-uppercase text-micro-uppercase cursor-pointer">Semua (298)</span>
                        <span class="px-space-xs py-1 rounded bg-surface-container-lowest text-stone hover:text-ink font-micro-uppercase text-micro-uppercase cursor-pointer transition-colors">Riset &amp; Derivatif</span>
                        <span class="px-space-xs py-1 rounded bg-surface-container-lowest text-stone hover:text-ink font-micro-uppercase text-micro-uppercase cursor-pointer transition-colors">Settlement</span>
                    </div>
                </div>

                <!-- Table Container -->
                <div class="bg-surface-container-lowest rounded-xl shadow-sm overflow-hidden flex flex-col">
                    <div class="overflow-x-auto w-full">
                        <table class="w-full text-left border-collapse">
                            <thead>
                                <tr class="bg-surface-container-low text-stone font-micro-uppercase text-micro-uppercase tracking-wider">
                                    <th class="py-space-sm px-space-lg font-semibold" scope="col">NAMA KANDIDAT &amp; KONTAK</th>
                                    <th class="py-space-sm px-space-md font-semibold" scope="col">KAMPUS / UNIVERSITAS</th>
                                    <th class="py-space-sm px-space-md font-semibold" scope="col">JURUSAN &amp; IPK</th>
                                    <th class="py-space-sm px-space-md font-semibold" scope="col">POSISI MAGANG YANG DILAMAR</th>
                                    <th class="py-space-sm px-space-md font-semibold" scope="col">DURASI MAGANG</th>
                                    <th class="py-space-sm px-space-md font-semibold" scope="col">TANGGAL MASUK</th>
                                    <th class="py-space-sm px-space-md font-semibold text-center" scope="col">STATUS SELEKSI</th>
                                    <th class="py-space-sm px-space-lg text-right font-semibold" scope="col">TINDAKAN</th>
                                </tr>
                            </thead>
                            <tbody class="text-on-surface font-body-sm text-body-sm divide-y divide-hairline-soft">
                                @foreach ($magangApplicants as $app)
                                    <tr class="hover:bg-cream-light/60 transition-colors group">
                                        <td class="py-space-md px-space-lg">
                                            <div class="flex items-center gap-space-sm">
                                                <div class="w-10 h-10 rounded-full bg-cream-deeper text-secondary flex items-center justify-center font-medium text-lg shrink-0">
                                                    {{ $app->initials ?? 'MA' }}
                                                </div>
                                                <div class="flex flex-col min-w-0">
                                                    <span class="font-body-md-medium text-body-md-medium text-ink group-hover:text-primary transition-colors truncate">
                                                        {{ $app->name ?? ($app->applicant->profile->full_name ?? ($app->applicant->name ?? 'Pelamar Magang')) }}
                                                    </span>
                                                    <span class="font-code-md text-code-md text-stone text-xs">
                                                        {{ $app->phone ?? ($app->applicant->email ?? '-') }}
                                                    </span>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="py-space-md px-space-md">
                                            <div class="flex flex-col">
                                                <span class="text-ink font-medium">{{ $app->university ?? ($app->applicant->internDetail->university ?? 'Universitas') }}</span>
                                                <span class="font-caption text-caption text-stone">{{ $app->location ?? 'Indonesia' }}</span>
                                            </div>
                                        </td>
                                        <td class="py-space-md px-space-md">
                                            <div class="flex flex-col">
                                                <span class="text-ink font-medium">{{ $app->major ?? ($app->applicant->internDetail->major ?? 'Jurusan') }}</span>
                                                <div class="flex items-center gap-1.5 mt-0.5">
                                                    <span class="font-code-md text-code-md text-ink font-semibold">IPK {{ $app->gpa ?? '3.80' }}</span>
                                                    @if (!empty($app->tag))
                                                        <span class="px-1.5 py-0.2 rounded bg-tertiary-fixed text-on-tertiary-fixed text-[10px] font-bold">{{ $app->tag }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </td>
                                        <td class="py-space-md px-space-md">
                                            <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-md bg-surface-container text-ink font-medium text-xs">
                                                <span class="w-1.5 h-1.5 rounded-full bg-link"></span>
                                                {{ $app->position ?? ($app->jobOpening->title ?? 'Program Magang EWF') }}
                                            </span>
                                        </td>
                                        <td class="py-space-md px-space-md">
                                            <span class="font-caption-bold text-caption-bold text-charcoal">{{ $app->duration ?? '6 Bulan' }}</span>
                                            <span class="block font-micro text-micro text-stone">{{ $app->batch ?? 'Batch Reguler' }}</span>
                                        </td>
                                        <td class="py-space-md px-space-md font-code-md text-code-md text-stone text-xs">
                                            {{ isset($app->entry_date) && $app->entry_date instanceof \Carbon\Carbon ? $app->entry_date->translatedFormat('d M Y') : '24 Mei 2024' }}
                                        </td>
                                        <td class="py-space-md px-space-md text-center">
                                            @if (($app->status ?? '') === 'interview')
                                                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-cream-deeper text-secondary font-caption-bold text-caption-bold">
                                                    <span class="w-1.5 h-1.5 rounded-full bg-secondary"></span>
                                                    Jadwal Interview
                                                </span>
                                            @elseif (($app->status ?? '') === 'accepted')
                                                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-emerald-100 text-emerald-800 font-caption-bold text-caption-bold">
                                                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-600"></span>
                                                    Disetujui
                                                </span>
                                            @else
                                                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-primary-fixed text-on-primary-fixed-variant font-caption-bold text-caption-bold">
                                                    <span class="w-1.5 h-1.5 rounded-full bg-primary animate-ping"></span>
                                                    Menunggu Persetujuan
                                                </span>
                                            @endif
                                        </td>
                                        <td class="py-space-md px-space-lg text-right">
                                            <div class="flex items-center justify-end gap-1">
                                                @if (isset($app->id) && ! $isUsingFallback)
                                                    <form method="POST" action="{{ route('admin.pendaftar.update-status', $app->id) }}" class="inline">
                                                        @csrf
                                                        @method('PATCH')
                                                        <input type="hidden" name="status" value="accepted">
                                                        <button class="p-1.5 rounded hover:bg-cream-deeper text-primary transition-colors border-0 bg-transparent cursor-pointer" title="Setujui Pelamar" type="submit">
                                                            <span class="material-symbols-outlined text-[20px]">check_circle</span>
                                                        </button>
                                                    </form>
                                                    <form method="POST" action="{{ route('admin.pendaftar.update-status', $app->id) }}" class="inline">
                                                        @csrf
                                                        @method('PATCH')
                                                        <input type="hidden" name="status" value="interview">
                                                        <button class="p-1.5 rounded hover:bg-cream-deeper text-secondary transition-colors border-0 bg-transparent cursor-pointer" title="Jadwalkan Wawancara" type="submit">
                                                            <span class="material-symbols-outlined text-[20px]">calendar_month</span>
                                                        </button>
                                                    </form>
                                                @else
                                                    <button onclick="alert('Kandidat {{ $app->name ?? 'Pelamar' }} disetujui.')" class="p-1.5 rounded hover:bg-cream-deeper text-primary transition-colors border-0 bg-transparent cursor-pointer" title="Setujui Pelamar">
                                                        <span class="material-symbols-outlined text-[20px]">check_circle</span>
                                                    </button>
                                                    <button onclick="alert('Jadwal interview disiapkan untuk {{ $app->name ?? 'Pelamar' }}.')" class="p-1.5 rounded hover:bg-cream-deeper text-secondary transition-colors border-0 bg-transparent cursor-pointer" title="Jadwalkan Wawancara">
                                                        <span class="material-symbols-outlined text-[20px]">calendar_month</span>
                                                    </button>
                                                @endif
                                                <button onclick="alert('Membuka rincian berkas CV & kelengkapan.')" class="p-1.5 rounded hover:bg-surface-container-high text-stone hover:text-ink transition-colors border-0 bg-transparent cursor-pointer" title="Lihat Berkas">
                                                    <span class="material-symbols-outlined text-[20px]">description</span>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination Bar Tabel 1 -->
                    <div class="px-space-lg py-space-sm bg-surface-container-lowest flex flex-col sm:flex-row sm:items-center justify-between gap-space-xs">
                        <span class="font-caption text-caption text-stone">
                            Menampilkan <span class="font-medium text-ink">1 - {{ count($magangApplicants) }}</span> dari <span class="font-medium text-ink">298</span> pelamar program magang.
                        </span>
                        <div class="flex items-center gap-space-xs">
                            <button class="px-2.5 py-1 rounded text-stone/50 bg-surface cursor-not-allowed font-caption text-caption border-0" disabled="">Sebelumnya</button>
                            <span class="px-2.5 py-1 rounded bg-link text-on-primary font-caption-bold text-caption-bold">1</span>
                            <button class="px-2.5 py-1 rounded text-slate hover:bg-cream-deeper font-caption text-caption transition-colors border-0 bg-transparent cursor-pointer">2</button>
                            <button class="px-2.5 py-1 rounded text-slate hover:bg-cream-deeper font-caption text-caption transition-colors border-0 bg-transparent cursor-pointer">3</button>
                            <span class="text-stone px-1">...</span>
                            <button class="px-2.5 py-1 rounded text-slate hover:bg-cream-deeper font-caption text-caption transition-colors border-0 bg-transparent cursor-pointer">Berikutnya</button>
                        </div>
                    </div>
                </div>
            </section>

            <!-- TABEL 2: Pelamar Posisi Fulltime -->
            <section class="flex flex-col gap-space-md pt-space-md">
                <div class="flex flex-col md:flex-row md:items-end justify-between gap-space-sm">
                    <div>
                        <div class="flex items-center gap-space-sm">
                            <h2 class="font-heading-3 text-heading-3 text-ink">Daftar Pelamar Posisi Fulltime</h2>
                            <span class="px-space-sm py-space-xxs rounded-full bg-yellow-saturated/30 text-charcoal font-micro-uppercase text-micro-uppercase font-semibold">184 Berkas</span>
                        </div>
                        <p class="font-body-sm text-body-sm text-slate mt-space-xxs">
                            Kandidat profesional berlisensi WPB, Financial Consultant, dan Management Trainee komoditi berjangka.
                        </p>
                    </div>
                    <div class="flex items-center gap-space-sm">
                        <span class="inline-flex items-center gap-1 font-caption text-caption text-secondary">
                            <span class="material-symbols-outlined text-[16px]">verified</span>
                            Lisensi WPB Prioritas
                        </span>
                    </div>
                </div>

                <!-- Table Container -->
                <div class="bg-surface-container-lowest rounded-xl shadow-sm overflow-hidden flex flex-col">
                    <div class="overflow-x-auto w-full">
                        <table class="w-full text-left border-collapse">
                            <thead>
                                <tr class="bg-surface-container-low text-stone font-micro-uppercase text-micro-uppercase tracking-wider">
                                    <th class="py-space-sm px-space-lg font-semibold" scope="col">NAMA KANDIDAT &amp; KONTAK</th>
                                    <th class="py-space-sm px-space-md font-semibold" scope="col">PENGALAMAN KERJA / EX-PERUSAHAAN</th>
                                    <th class="py-space-sm px-space-md font-semibold" scope="col">POSISI FULLTIME YANG DILAMAR</th>
                                    <th class="py-space-sm px-space-md font-semibold" scope="col">PENDIDIKAN TERAKHIR</th>
                                    <th class="py-space-sm px-space-md font-semibold" scope="col">TANGGAL MASUK</th>
                                    <th class="py-space-sm px-space-md font-semibold text-center" scope="col">STATUS SELEKSI / INTERVIEW</th>
                                    <th class="py-space-sm px-space-lg text-right font-semibold" scope="col">TINDAKAN</th>
                                </tr>
                            </thead>
                            <tbody class="text-on-surface font-body-sm text-body-sm divide-y divide-hairline-soft">
                                @foreach ($fulltimeApplicants as $app)
                                    <tr class="hover:bg-cream-light/60 transition-colors group">
                                        <td class="py-space-md px-space-lg">
                                            <div class="flex items-center gap-space-sm">
                                                <div class="w-10 h-10 rounded-full bg-link/10 text-link flex items-center justify-center font-medium text-lg shrink-0">
                                                    {{ $app->initials ?? 'FT' }}
                                                </div>
                                                <div class="flex flex-col min-w-0">
                                                    <span class="font-body-md-medium text-body-md-medium text-ink group-hover:text-primary transition-colors truncate">
                                                        {{ $app->name ?? ($app->applicant->profile->full_name ?? ($app->applicant->name ?? 'Pelamar Fulltime')) }}
                                                    </span>
                                                    <span class="font-code-md text-code-md text-stone text-xs">
                                                        {{ $app->phone ?? ($app->applicant->email ?? '-') }}
                                                    </span>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="py-space-md px-space-md">
                                            <div class="flex flex-col">
                                                <span class="text-ink font-medium">{{ $app->experience ?? 'Pengalaman Relevan' }}</span>
                                                <span class="font-caption text-caption text-stone">{{ $app->exp_sub ?? '2 Thn Pengalaman Portofolio' }}</span>
                                            </div>
                                        </td>
                                        <td class="py-space-md px-space-md">
                                            <div class="flex items-center gap-1.5">
                                                <span class="px-2.5 py-1 rounded-md bg-secondary-fixed/50 text-on-secondary-fixed font-caption-bold text-caption-bold">
                                                    {{ $app->position ?? ($app->jobOpening->title ?? 'Financial Consultant & WPB') }}
                                                </span>
                                            </div>
                                        </td>
                                        <td class="py-space-md px-space-md">
                                            <div class="flex flex-col">
                                                <span class="text-ink">{{ $app->education ?? 'S1 Ilmu Ekonomi' }}</span>
                                                <span class="font-caption text-caption text-stone">{{ $app->campus ?? 'Universitas' }}</span>
                                            </div>
                                        </td>
                                        <td class="py-space-md px-space-md font-code-md text-code-md text-stone text-xs">
                                            {{ isset($app->entry_date) && $app->entry_date instanceof \Carbon\Carbon ? $app->entry_date->translatedFormat('d M Y') : '24 Mei 2024' }}
                                        </td>
                                        <td class="py-space-md px-space-md text-center">
                                            @if (($app->status ?? '') === 'accepted')
                                                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-cream-deeper text-secondary font-caption-bold text-caption-bold">
                                                    <span class="material-symbols-outlined text-[16px] text-secondary">check</span>
                                                    Disetujui Lolos
                                                </span>
                                            @elseif (($app->status ?? '') === 'interview')
                                                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-cream-deeper text-secondary font-caption-bold text-caption-bold">
                                                    <span class="w-1.5 h-1.5 rounded-full bg-secondary"></span>
                                                    Jadwal Interview
                                                </span>
                                            @else
                                                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-primary-fixed text-on-primary-fixed-variant font-caption-bold text-caption-bold">
                                                    <span class="w-1.5 h-1.5 rounded-full bg-primary animate-ping"></span>
                                                    Menunggu Persetujuan
                                                </span>
                                            @endif
                                        </td>
                                        <td class="py-space-md px-space-lg text-right">
                                            <div class="flex items-center justify-end gap-1">
                                                <button onclick="alert('Persetujuan direksi diproses.')" class="p-1.5 rounded hover:bg-cream-deeper text-primary transition-colors border-0 bg-transparent cursor-pointer" title="Persetujuan Direksi">
                                                    <span class="material-symbols-outlined text-[20px]">thumb_up</span>
                                                </button>
                                                <button onclick="alert('Jadwalkan sesi wawancara profesional.')" class="p-1.5 rounded hover:bg-cream-deeper text-secondary transition-colors border-0 bg-transparent cursor-pointer" title="Jadwalkan Sesi Wawancara">
                                                    <span class="material-symbols-outlined text-[20px]">calendar_month</span>
                                                </button>
                                                <button onclick="alert('Membuka portofolio & berkas WPB kandidat.')" class="p-1.5 rounded hover:bg-surface-container-high text-stone hover:text-ink transition-colors border-0 bg-transparent cursor-pointer" title="CV & Portofolio">
                                                    <span class="material-symbols-outlined text-[20px]">badge</span>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination Bar Tabel 2 -->
                    <div class="px-space-lg py-space-sm bg-surface-container-lowest flex flex-col sm:flex-row sm:items-center justify-between gap-space-xs">
                        <span class="font-caption text-caption text-stone">
                            Menampilkan <span class="font-medium text-ink">1 - {{ count($fulltimeApplicants) }}</span> dari <span class="font-medium text-ink">184</span> pelamar posisi fulltime.
                        </span>
                        <div class="flex items-center gap-space-xs">
                            <button class="px-2.5 py-1 rounded text-stone/50 bg-surface cursor-not-allowed font-caption text-caption border-0" disabled="">Sebelumnya</button>
                            <span class="px-2.5 py-1 rounded bg-link text-on-primary font-caption-bold text-caption-bold">1</span>
                            <button class="px-2.5 py-1 rounded text-slate hover:bg-cream-deeper font-caption text-caption transition-colors border-0 bg-transparent cursor-pointer">2</button>
                            <button class="px-2.5 py-1 rounded text-slate hover:bg-cream-deeper font-caption text-caption transition-colors border-0 bg-transparent cursor-pointer">3</button>
                            <span class="text-stone px-1">...</span>
                            <button class="px-2.5 py-1 rounded text-slate hover:bg-cream-deeper font-caption text-caption transition-colors border-0 bg-transparent cursor-pointer">Berikutnya</button>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
@endsection
