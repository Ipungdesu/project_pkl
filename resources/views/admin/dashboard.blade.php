@extends('layouts.admin')

@section('title', 'Beranda Eksekutif (EIS)')

@section('content')
<div class="flex flex-col w-full">
    <!-- Top Ambient Highlight / Editorial Banner Ribbon -->
    <div class="w-full bg-cream-light py-space-sm px-space-xl flex flex-wrap items-center justify-between gap-space-sm">
        <div class="flex items-center gap-space-sm">
            <span class="inline-flex items-center justify-center w-5 h-5 rounded-full bg-sunshine-700 text-on-primary">
                <span class="material-symbols-outlined text-[14px]">verified</span>
            </span>
            <span class="font-micro-uppercase text-micro-uppercase text-charcoal">Sistem Informasi Eksekutif (SIE) Terpadu — Audit Konsolidasi Harian</span>
            <span class="font-code-md text-code-md text-slate text-xs hidden md:inline">REF: EWF-JKT/2024-Q3</span>
        </div>
        <div class="flex items-center gap-space-md">
            <span class="inline-flex items-center gap-1 font-micro text-micro text-charcoal">
                <span class="w-1.5 h-1.5 rounded-full bg-yellow-saturated animate-pulse"></span>
                Feed Transmisi Kliring Normal
            </span>
            <span class="font-caption text-caption text-slate hidden sm:inline">Sinkronisasi: Real-time</span>
        </div>
    </div>

    <div class="w-full px-space-xl py-space-xl flex flex-col gap-space-xxl max-w-[1400px] mx-auto">
        <!-- Editorial Title & Status Header -->
        <div class="flex flex-col lg:flex-row lg:items-end justify-between gap-space-lg">
            <div class="flex flex-col gap-space-xs max-w-3xl">
                <div class="flex items-center gap-space-xs">
                    <span class="px-space-xs py-space-xxs rounded-full bg-cream-deeper text-secondary font-micro-uppercase text-micro-uppercase">PT EQUITYWORLD FUTURES</span>
                    <span class="text-stone font-caption">•</span>
                    <span class="font-micro-uppercase text-micro-uppercase text-stone">KANTOR PUSAT CYBER 2 TOWER</span>
                </div>
                <h1 class="font-heading-1 text-heading-1 text-ink tracking-tight">
                    Eksekutif Dashboard &amp; Sistem Informasi Eksekutif (SIE)
                </h1>
                <p class="font-subtitle text-subtitle text-slate leading-relaxed">
                    Ringkasan performa pertumbuhan calon nasabah, pendaftar talenta magang, serta akuntabilitas regulasi Bappebti secara real-time.
                </p>
            </div>
            <div class="flex items-center gap-space-sm flex-wrap self-start lg:self-auto">
                <button onclick="alert('Laporan bulanan EIS berhasil diekspor (.PDF).')" class="inline-flex items-center gap-space-xs px-space-md py-space-xs rounded-lg bg-surface-cream text-ink shadow-sm hover:bg-cream-deeper transition-colors font-button-md text-button-md cursor-pointer">
                    <span class="material-symbols-outlined text-[18px] text-secondary">file_download</span>
                    <span>Ekspor Lap. Bulanan</span>
                </button>
                <a href="{{ route('admin.calon-nasabah.index') }}#form-entri-calon" class="inline-flex items-center gap-space-xs px-space-md py-space-xs rounded-lg bg-link text-on-primary shadow-sm hover:bg-primary-deep transition-all font-button-md text-button-md no-underline">
                    <span class="material-symbols-outlined text-[18px]">add_circle</span>
                    <span>Registrasi Nasabah Cepat</span>
                </a>
            </div>
        </div>

        <!-- 4 KPI Cards Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-space-md">
            <!-- KPI 1 -->
            <div class="relative bg-surface rounded-xl p-space-lg shadow-sm hover:shadow-md transition-shadow flex flex-col justify-between overflow-hidden group">
                <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-yellow-saturated to-sunshine-700"></div>
                <div class="flex flex-col gap-space-xs">
                    <div class="flex items-center justify-between">
                        <span class="font-micro-uppercase text-micro-uppercase text-stone">Talenta &amp; Karir</span>
                        <span class="px-space-xs py-space-xxs rounded-full bg-cream-deeper text-secondary font-micro text-micro font-medium">Pipeline Batch V</span>
                    </div>
                    <span class="font-body-sm-medium text-body-sm-medium text-slate">Pendaftar Magang &amp; Fulltime</span>
                    <div class="flex items-baseline gap-space-xs mt-space-xs">
                        <span class="font-stat-display text-stat-display text-ink leading-none">{{ number_format($kpi['total_pelamar']) }}</span>
                        <span class="font-caption-bold text-caption-bold text-primary-deep">{{ $kpi['pelamar_growth'] }}</span>
                    </div>
                </div>
                <div class="mt-space-md pt-space-xs flex items-center justify-between text-stone font-caption">
                    <span class="flex items-center gap-1">
                        <span class="material-symbols-outlined text-[16px] text-sunshine-800">north_east</span>
                        {{ $kpi['pelamar_today'] }}
                    </span>
                    <span class="font-code-md text-code-md text-xs text-charcoal">98.4% Berkas Lengkap</span>
                </div>
            </div>

            <!-- KPI 2 -->
            <div class="relative bg-surface rounded-xl p-space-lg shadow-sm hover:shadow-md transition-shadow flex flex-col justify-between overflow-hidden group">
                <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-sunshine-700 to-primary"></div>
                <div class="flex flex-col gap-space-xs">
                    <div class="flex items-center justify-between">
                        <span class="font-micro-uppercase text-micro-uppercase text-stone">Akuisisi Bisnis</span>
                        <span class="px-space-xs py-space-xxs rounded-full bg-surface-variant text-slate font-micro text-micro font-medium">Nasabah Baru</span>
                    </div>
                    <span class="font-body-sm-medium text-body-sm-medium text-slate">Calon Nasabah Terdaftar</span>
                    <div class="flex items-baseline gap-space-xs mt-space-xs">
                        <span class="font-stat-display text-stat-display text-ink leading-none">{{ number_format($kpi['total_nasabah']) }}</span>
                        <span class="font-caption-bold text-caption-bold text-primary-deep">{{ $kpi['nasabah_growth'] }}</span>
                    </div>
                </div>
                <div class="mt-space-md pt-space-xs flex items-center justify-between text-stone font-caption">
                    <span class="flex items-center gap-1">
                        <span class="material-symbols-outlined text-[16px] text-primary">person_add</span>
                        {{ $kpi['nasabah_today'] }}
                    </span>
                    <span class="font-code-md text-code-md text-xs text-charcoal">Akun Real &amp; Demo</span>
                </div>
            </div>

            <!-- KPI 3 -->
            <div class="relative bg-surface rounded-xl p-space-lg shadow-sm hover:shadow-md transition-shadow flex flex-col justify-between overflow-hidden group">
                <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-secondary-container to-sunshine-800"></div>
                <div class="flex flex-col gap-space-xs">
                    <div class="flex items-center justify-between">
                        <span class="font-micro-uppercase text-micro-uppercase text-stone">Kredensial Resmi</span>
                        <span class="px-space-xs py-space-xxs rounded-full bg-cream-deeper text-secondary font-micro text-micro font-medium">Validasi QR</span>
                    </div>
                    <span class="font-body-sm-medium text-body-sm-medium text-slate">Sertifikat Magang &amp; WPB</span>
                    <div class="flex items-baseline gap-space-xs mt-space-xs">
                        <span class="font-stat-display text-stat-display text-ink leading-none">{{ number_format($kpi['total_sertifikat']) }}</span>
                        <span class="font-caption-bold text-caption-bold text-secondary">Siap Terbit</span>
                    </div>
                </div>
                <div class="mt-space-md pt-space-xs flex items-center justify-between text-stone font-caption">
                    <span class="flex items-center gap-1">
                        <span class="material-symbols-outlined text-[16px] text-secondary">pending_actions</span>
                        {{ $kpi['sertifikat_ready'] }} approval akhir mentor
                    </span>
                    <span class="font-code-md text-code-md text-xs text-charcoal">E-Sign Siap</span>
                </div>
            </div>

            <!-- KPI 4 -->
            <div class="relative bg-surface rounded-xl p-space-lg shadow-sm hover:shadow-md transition-shadow flex flex-col justify-between overflow-hidden group">
                <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-primary to-charcoal"></div>
                <div class="flex flex-col gap-space-xs">
                    <div class="flex items-center justify-between">
                        <span class="font-micro-uppercase text-micro-uppercase text-stone">Efisiensi Operasional</span>
                        <span class="px-space-xs py-space-xxs rounded-full bg-cream-deeper text-secondary font-micro text-micro font-medium">SLA Kepatuhan</span>
                    </div>
                    <span class="font-body-sm-medium text-body-sm-medium text-slate">Tingkat Konversi &amp; Seleksi</span>
                    <div class="flex items-baseline gap-space-xs mt-space-xs">
                        <span class="font-stat-display text-stat-display text-ink leading-none">{{ $kpi['sla_efficiency'] }}</span>
                        <span class="font-caption-bold text-caption-bold text-primary-deep">{{ $kpi['sla_note'] }}</span>
                    </div>
                </div>
                <div class="mt-space-md pt-space-xs flex items-center justify-between text-stone font-caption">
                    <span class="flex items-center gap-1">
                        <span class="material-symbols-outlined text-[16px] text-sunshine-700">bolt</span>
                        Percepatan SLA verifikasi
                    </span>
                    <span class="font-code-md text-code-md text-xs text-charcoal">Audit Bappebti A+</span>
                </div>
            </div>
        </div>

        <!-- Aksi Cepat Manajemen -->
        <div class="flex flex-col gap-space-md">
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-space-sm">
                    <span class="w-2.5 h-2.5 bg-primary rounded-full"></span>
                    <h2 class="font-heading-4 text-heading-4 text-ink">Aksi Cepat Manajemen</h2>
                    <span class="text-stone font-caption">• Prioritas Tindakan Hari Ini</span>
                </div>
                <span class="font-micro-uppercase text-micro-uppercase text-stone hidden sm:inline">4 Modul Terintegrasi</span>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-space-md">
                <!-- Action 1 -->
                <a class="p-space-lg rounded-xl bg-surface-cream hover:bg-cream-deeper transition-all shadow-sm group flex flex-col justify-between no-underline" href="{{ route('admin.pendaftar.index') }}">
                    <div>
                        <div class="w-10 h-10 rounded-lg bg-surface-container-lowest flex items-center justify-center text-primary group-hover:bg-primary group-hover:text-on-primary transition-colors mb-space-sm shadow-sm">
                            <span class="material-symbols-outlined text-[22px]">assignment_ind</span>
                        </div>
                        <h3 class="font-heading-5 text-heading-5 text-ink group-hover:text-primary-deep transition-colors">Review Pendaftar</h3>
                        <p class="font-body-sm text-body-sm text-slate mt-space-xxs">38 berkas pelamar memerlukan keputusan interview &amp; screening kualifikasi.</p>
                    </div>
                    <div class="mt-space-md pt-space-xs flex items-center justify-between text-secondary font-button-md text-button-md">
                        <span>Buka Antrean</span>
                        <span class="material-symbols-outlined text-[18px] group-hover:translate-x-1 transition-transform">arrow_forward</span>
                    </div>
                </a>

                <!-- Action 2 -->
                <a class="p-space-lg rounded-xl bg-surface-cream hover:bg-cream-deeper transition-all shadow-sm group flex flex-col justify-between no-underline" href="{{ route('admin.calon-nasabah.index') }}">
                    <div>
                        <div class="w-10 h-10 rounded-lg bg-surface-container-lowest flex items-center justify-center text-primary group-hover:bg-primary group-hover:text-on-primary transition-colors mb-space-sm shadow-sm">
                            <span class="material-symbols-outlined text-[22px]">person_add</span>
                        </div>
                        <h3 class="font-heading-5 text-heading-5 text-ink group-hover:text-primary-deep transition-colors">Input Data Calon Nasabah</h3>
                        <p class="font-body-sm text-body-sm text-slate mt-space-xxs">Form registrasi cepat walk-in &amp; rujukan Wakil Pialang Berjangka (WPB).</p>
                    </div>
                    <div class="mt-space-md pt-space-xs flex items-center justify-between text-secondary font-button-md text-button-md">
                        <span>Input Nasabah</span>
                        <span class="material-symbols-outlined text-[18px] group-hover:translate-x-1 transition-transform">arrow_forward</span>
                    </div>
                </a>

                <!-- Action 3 -->
                <a class="p-space-lg rounded-xl bg-surface-cream hover:bg-cream-deeper transition-all shadow-sm group flex flex-col justify-between no-underline" href="{{ route('admin.sertifikat.index') }}">
                    <div>
                        <div class="w-10 h-10 rounded-lg bg-surface-container-lowest flex items-center justify-center text-primary group-hover:bg-primary group-hover:text-on-primary transition-colors mb-space-sm shadow-sm">
                            <span class="material-symbols-outlined text-[22px]">workspace_premium</span>
                        </div>
                        <h3 class="font-heading-5 text-heading-5 text-ink group-hover:text-primary-deep transition-colors">Cetak Sertifikat Batch</h3>
                        <p class="font-body-sm text-body-sm text-slate mt-space-xxs">Generate 96 e-sertifikat bertandatangan QR kode tervalidasi database pusat.</p>
                    </div>
                    <div class="mt-space-md pt-space-xs flex items-center justify-between text-secondary font-button-md text-button-md">
                        <span>Proses Terbit</span>
                        <span class="material-symbols-outlined text-[18px] group-hover:translate-x-1 transition-transform">arrow_forward</span>
                    </div>
                </a>

                <!-- Action 4 -->
                <a class="p-space-lg rounded-xl bg-surface-cream hover:bg-cream-deeper transition-all shadow-sm group flex flex-col justify-between no-underline" href="{{ route('admin.pengaturan.index') }}">
                    <div>
                        <div class="w-10 h-10 rounded-lg bg-surface-container-lowest flex items-center justify-center text-primary group-hover:bg-primary group-hover:text-on-primary transition-colors mb-space-sm shadow-sm">
                            <span class="material-symbols-outlined text-[22px]">policy</span>
                        </div>
                        <h3 class="font-heading-5 text-heading-5 text-ink group-hover:text-primary-deep transition-colors">Audit &amp; Kepatuhan Bappebti</h3>
                        <p class="font-body-sm text-body-sm text-slate mt-space-xxs">Pantau access trail, verifikasi SID nasabah, &amp; integritas rekening terpisah.</p>
                    </div>
                    <div class="mt-space-md pt-space-xs flex items-center justify-between text-secondary font-button-md text-button-md">
                        <span>Periksa Audit Trail</span>
                        <span class="material-symbols-outlined text-[18px] group-hover:translate-x-1 transition-transform">arrow_forward</span>
                    </div>
                </a>
            </div>
        </div>

        <!-- Visual Analytics Section (Two Columns) -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-space-lg">
            <!-- Left (8 cols): Trend Chart Visualization -->
            <div class="lg:col-span-8 bg-surface rounded-xl p-space-lg shadow-sm flex flex-col justify-between">
                <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-space-sm mb-space-md">
                    <div class="flex flex-col">
                        <span class="font-micro-uppercase text-micro-uppercase text-stone">Analitik Pertumbuhan Portofolio &amp; Rekrutmen</span>
                        <h3 class="font-heading-4 text-heading-4 text-ink">Tren Calon Nasabah Baru vs Pendaftar Talenta</h3>
                        <span class="font-caption text-caption text-slate">Semester 1 - 2024 (Januari - Juni 2024)</span>
                    </div>
                    <div class="flex items-center gap-space-xs">
                        <span class="px-space-xs py-space-xxs rounded-full bg-cream font-code-md text-code-md text-xs text-charcoal">
                            +84 Baru Jun
                        </span>
                        <div class="flex items-center gap-space-xs text-xs font-caption text-stone">
                            <span class="inline-block w-3 h-3 rounded-full bg-link"></span> Nasabah
                            <span class="inline-block w-3 h-3 rounded-full bg-charcoal ml-2"></span> Talenta
                        </div>
                    </div>
                </div>

                <!-- Inline SVG Visualization -->
                <div class="w-full bg-surface-container-lowest rounded-lg p-space-md shadow-sm relative overflow-hidden">
                    <div class="absolute top-2 right-4 text-right">
                        <span class="font-micro-uppercase text-micro-uppercase text-stone">Target Q2 Terlampaui</span>
                        <div class="font-heading-5 text-heading-5 text-primary">118.4%</div>
                    </div>
                    <svg class="w-full h-64 overflow-visible" fill="none" viewBox="0 0 680 240" xmlns="http://www.w3.org/2000/svg">
                        <defs>
                            <linearGradient id="sunsetCurveGrad" x1="0" x2="0" y1="0" y2="1">
                                <stop offset="0%" stop-color="#fa520f" stop-opacity="0.32"></stop>
                                <stop offset="50%" stop-color="#ffd06a" stop-opacity="0.10"></stop>
                                <stop offset="100%" stop-color="#fff8e0" stop-opacity="0"></stop>
                            </linearGradient>
                            <linearGradient id="lineGrad" x1="0" x2="1" y1="0" y2="0">
                                <stop offset="0%" stop-color="#ffd900"></stop>
                                <stop offset="50%" stop-color="#ffa110"></stop>
                                <stop offset="100%" stop-color="#fa520f"></stop>
                            </linearGradient>
                        </defs>
                        <!-- Grid lines -->
                        <line stroke="#f0eded" stroke-dasharray="4 4" stroke-width="1" x1="40" x2="650" y1="30" y2="30"></line>
                        <line stroke="#f0eded" stroke-dasharray="4 4" stroke-width="1" x1="40" x2="650" y1="80" y2="80"></line>
                        <line stroke="#f0eded" stroke-dasharray="4 4" stroke-width="1" x1="40" x2="650" y1="130" y2="130"></line>
                        <line stroke="#f0eded" stroke-width="1" x1="40" x2="650" y1="180" y2="180"></line>
                        <!-- Y Labels -->
                        <text fill="#a8a8a8" font-family="JetBrains Mono" font-size="11" text-anchor="end" x="32" y="34">300</text>
                        <text fill="#a8a8a8" font-family="JetBrains Mono" font-size="11" text-anchor="end" x="32" y="84">200</text>
                        <text fill="#a8a8a8" font-family="JetBrains Mono" font-size="11" text-anchor="end" x="32" y="134">100</text>
                        <text fill="#a8a8a8" font-family="JetBrains Mono" font-size="11" text-anchor="end" x="32" y="184">0</text>
                        <!-- Line Talenta -->
                        <path d="M 60 160 C 130 150, 180 135, 230 120 C 290 105, 340 125, 410 95 C 470 70, 540 85, 630 55" fill="none" stroke="#2c2c2c" stroke-dasharray="5 5" stroke-linecap="round" stroke-width="2"></path>
                        <!-- Area Calon Nasabah -->
                        <path d="M 60 170 C 140 165, 180 145, 240 130 C 310 110, 360 85, 430 75 C 500 65, 560 45, 630 35 L 630 180 L 60 180 Z" fill="url(#sunsetCurveGrad)"></path>
                        <!-- Curve Stroke Calon Nasabah -->
                        <path d="M 60 170 C 140 165, 180 145, 240 130 C 310 110, 360 85, 430 75 C 500 65, 560 45, 630 35" fill="none" stroke="url(#lineGrad)" stroke-linecap="round" stroke-width="3"></path>
                        <!-- Data Dots -->
                        <circle cx="60" cy="170" fill="#2c2c2c" r="4" stroke="#ffffff" stroke-width="2"></circle>
                        <circle cx="240" cy="130" fill="#ffa110" r="4" stroke="#ffffff" stroke-width="2"></circle>
                        <circle cx="430" cy="75" fill="#ff8105" r="4" stroke="#ffffff" stroke-width="2"></circle>
                        <circle cx="630" cy="35" fill="#fa520f" r="6" stroke="#ffffff" stroke-width="3"></circle>
                        <!-- Tooltip -->
                        <g transform="translate(560, 10)">
                            <rect fill="#1c1c1e" height="22" rx="4" width="84"></rect>
                            <text fill="#ffffff" font-family="Inter" font-size="10" font-weight="600" text-anchor="middle" x="42" y="15">+84 Nasabah</text>
                        </g>
                        <!-- X Labels -->
                        <text fill="#8a8a8a" font-family="Inter" font-size="12" text-anchor="middle" x="60" y="206">Jan</text>
                        <text fill="#8a8a8a" font-family="Inter" font-size="12" text-anchor="middle" x="174" y="206">Feb</text>
                        <text fill="#8a8a8a" font-family="Inter" font-size="12" text-anchor="middle" x="288" y="206">Mar</text>
                        <text fill="#8a8a8a" font-family="Inter" font-size="12" text-anchor="middle" x="402" y="206">Apr</text>
                        <text fill="#8a8a8a" font-family="Inter" font-size="12" text-anchor="middle" x="516" y="206">Mei</text>
                        <text fill="#1f1f1f" font-family="Inter" font-size="12" font-weight="600" text-anchor="middle" x="630" y="206">Jun</text>
                    </svg>
                </div>
                <div class="mt-space-md flex flex-wrap items-center justify-between gap-space-sm pt-space-xs">
                    <div class="flex items-center gap-space-xs text-xs font-caption text-slate">
                        <span class="material-symbols-outlined text-[16px] text-primary">insights</span>
                        <span>Korelasi Rekrutmen Terhadap Akun Calon Nasabah Baru: <strong>R² = 0.88 (Kuat)</strong></span>
                    </div>
                    <span class="font-code-md text-code-md text-xs text-stone">Sumber Data: SIE Core Aggregator API</span>
                </div>
            </div>

            <!-- Right (4 cols): Donut Visual & Composition -->
            <div class="lg:col-span-4 bg-surface rounded-xl p-space-lg shadow-sm flex flex-col justify-between">
                <div>
                    <div class="flex items-center justify-between mb-space-xs">
                        <span class="font-micro-uppercase text-micro-uppercase text-stone">Distribusi Pipeline</span>
                        <span class="material-symbols-outlined text-stone text-[18px]">pie_chart</span>
                    </div>
                    <h3 class="font-heading-4 text-heading-4 text-ink">Komposisi Talenta</h3>
                    <p class="font-caption text-caption text-slate">Sebaran pendaftar aktif periode Q2-2024</p>
                </div>

                <!-- Donut Chart -->
                <div class="my-space-md flex items-center justify-center relative">
                    <svg class="w-48 h-48 -rotate-90" viewBox="0 0 100 100">
                        <circle cx="50" cy="50" fill="transparent" r="38" stroke="#f0eded" stroke-width="12"></circle>
                        <circle cx="50" cy="50" fill="transparent" r="38" stroke="#fa520f" stroke-dasharray="148 90.7" stroke-dashoffset="0" stroke-linecap="round" stroke-width="12"></circle>
                        <circle cx="50" cy="50" fill="transparent" r="38" stroke="#ffb83e" stroke-dasharray="57.3 181.4" stroke-dashoffset="-150" stroke-linecap="round" stroke-width="12"></circle>
                        <circle cx="50" cy="50" fill="transparent" r="38" stroke="#2c2c2c" stroke-dasharray="33.4 205.3" stroke-dashoffset="-210" stroke-linecap="round" stroke-width="12"></circle>
                    </svg>
                    <div class="absolute flex flex-col items-center justify-center pointer-events-none text-center">
                        <span class="font-stat-display text-stat-display text-ink leading-none text-2xl font-serif">482</span>
                        <span class="font-micro-uppercase text-micro-uppercase text-stone">Total Pelamar</span>
                    </div>
                </div>

                <!-- Breakdown List -->
                <div class="flex flex-col gap-space-xs font-body-sm text-body-sm">
                    <div class="flex items-center justify-between p-space-xs rounded bg-surface-container-low">
                        <div class="flex items-center gap-2">
                            <span class="w-3 h-3 rounded-full bg-link"></span>
                            <span class="text-charcoal">Magang Kampus Merdeka</span>
                        </div>
                        <span class="font-body-sm-medium text-body-sm-medium text-ink">62% (298)</span>
                    </div>
                    <div class="flex items-center justify-between p-space-xs rounded bg-surface-container-low">
                        <div class="flex items-center gap-2">
                            <span class="w-3 h-3 rounded-full bg-sunshine-500"></span>
                            <span class="text-charcoal">Analis &amp; Fin. Consultant</span>
                        </div>
                        <span class="font-body-sm-medium text-body-sm-medium text-ink">24% (116)</span>
                    </div>
                    <div class="flex items-center justify-between p-space-xs rounded bg-surface-container-low">
                        <div class="flex items-center gap-2">
                            <span class="w-3 h-3 rounded-full bg-charcoal"></span>
                            <span class="text-charcoal">Mgmt Trainee / Calon WPB</span>
                        </div>
                        <span class="font-body-sm-medium text-body-sm-medium text-ink">14% (68)</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Operational Queues: 2 Columns (Candidates Review vs Live Audit Log) -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-space-lg">
            <!-- Candidates Table Queue (7 cols) -->
            <div class="lg:col-span-7 bg-surface rounded-xl p-space-lg shadow-sm flex flex-col justify-between">
                <div>
                    <div class="flex items-center justify-between mb-space-sm">
                        <div class="flex items-center gap-space-xs">
                            <h3 class="font-heading-4 text-heading-4 text-ink">Pendaftar Membutuhkan Persetujuan</h3>
                            <span class="px-space-xs py-space-xxs rounded-full bg-error-container text-on-error-container font-caption-bold text-caption-bold">38 Antrean</span>
                        </div>
                        <a class="text-link hover:text-primary-deep font-body-sm-medium text-body-sm-medium flex items-center gap-0.5 no-underline" href="{{ route('admin.pendaftar.index') }}">
                            <span>Semua</span>
                            <span class="material-symbols-outlined text-[16px]">chevron_right</span>
                        </a>
                    </div>
                    <p class="font-caption text-caption text-slate mb-space-md">Daftar kandidat magang &amp; posisi fulltime yang telah lolos validasi berkas otomatis.</p>
                    <div class="w-full overflow-x-auto">
                        <table class="w-full text-left border-collapse">
                            <thead>
                                <tr class="bg-surface-container-low text-stone font-micro-uppercase text-micro-uppercase">
                                    <th class="py-space-xs px-space-sm rounded-l">Kandidat</th>
                                    <th class="py-space-xs px-space-sm">Posisi Diajukan</th>
                                    <th class="py-space-xs px-space-sm">Institusi / Univ</th>
                                    <th class="py-space-xs px-space-sm text-right rounded-r">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y-0 font-body-sm text-body-sm">
                                @foreach ($pendingReviews as $candidate)
                                    <tr class="hover:bg-cream-light/60 transition-colors">
                                        <td class="py-space-sm px-space-sm flex items-center gap-space-xs">
                                            <div class="w-8 h-8 rounded-full bg-cream-deeper text-secondary flex items-center justify-center font-heading-5 text-heading-5 font-serif font-bold">
                                                {{ $candidate->initial ?? (isset($candidate->applicant->name) ? substr($candidate->applicant->name, 0, 1) : 'K') }}
                                            </div>
                                            <div class="flex flex-col">
                                                <span class="font-body-sm-medium text-body-sm-medium text-ink">
                                                    {{ $candidate->name ?? ($candidate->applicant->profile->full_name ?? ($candidate->applicant->name ?? 'Kandidat')) }}
                                                </span>
                                                <span class="font-micro text-micro text-stone">
                                                    {{ $candidate->email ?? ($candidate->applicant->email ?? '-') }}
                                                </span>
                                            </div>
                                        </td>
                                        <td class="py-space-sm px-space-sm">
                                            <span class="px-space-xs py-space-xxs rounded-full text-charcoal font-micro text-micro {{ $candidate->badge_class ?? 'bg-surface-container' }}">
                                                {{ $candidate->position ?? ($candidate->jobOpening->title ?? 'Pelamar') }}
                                            </span>
                                        </td>
                                        <td class="py-space-sm px-space-sm text-slate">
                                            {{ $candidate->institution ?? ($candidate->applicant->internDetail->university ?? 'Universitas') }}
                                        </td>
                                        <td class="py-space-sm px-space-sm text-right">
                                            <a href="{{ route('admin.pendaftar.index') }}" class="inline-block px-space-xs py-space-xxs rounded bg-link hover:bg-primary-deep text-on-primary font-micro text-micro transition-colors no-underline">
                                                Review
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="mt-space-md pt-space-xs flex items-center justify-between text-xs text-stone">
                    <span>Menampilkan {{ count($pendingReviews) }} dari 38 berkas prioritas</span>
                    <a href="{{ route('admin.pendaftar.index') }}" class="px-space-sm py-space-xs rounded bg-surface-container-low hover:bg-surface-variant text-ink font-button-md text-button-md transition-colors no-underline">
                        Proses Batch (38 Kandidat)
                    </a>
                </div>
            </div>

            <!-- Live Audit Log (5 cols) -->
            <div class="lg:col-span-5 bg-surface rounded-xl p-space-lg shadow-sm flex flex-col justify-between">
                <div>
                    <div class="flex items-center justify-between mb-space-xs">
                        <span class="font-micro-uppercase text-micro-uppercase text-stone">Audit Sesi &amp; Otentikasi</span>
                        <span class="inline-flex items-center gap-1 font-micro text-micro text-link">
                            <span class="w-2 h-2 rounded-full bg-link animate-ping"></span>
                            Live Stream
                        </span>
                    </div>
                    <h3 class="font-heading-4 text-heading-4 text-ink">Aktivitas Sistem Terkini</h3>
                    <p class="font-caption text-caption text-slate mb-space-md">Pencatatan kepatuhan transaksi &amp; persetujuan internal sesuai regulasi Bappebti.</p>
                    <div class="space-y-space-sm">
                        @foreach ($recentActivities as $log)
                            <div class="flex gap-space-sm p-space-xs rounded-lg hover:bg-surface-container-low transition-colors">
                                <div class="w-8 h-8 rounded-full flex-shrink-0 flex items-center justify-center {{ $log->bg ?? 'bg-cream text-secondary' }}">
                                    <span class="material-symbols-outlined text-[18px]">{{ $log->icon ?? 'verified_user' }}</span>
                                </div>
                                <div class="flex flex-col flex-1 min-w-0">
                                    <div class="flex items-center justify-between">
                                        <span class="font-body-sm-medium text-body-sm-medium text-ink truncate">
                                            {{ $log->title ?? ($log->action ?? 'Aktivitas Tercatat') }}
                                        </span>
                                        <span class="font-code-md text-code-md text-xs text-stone flex-shrink-0">
                                            {{ $log->time ?? ($log->created_at ? $log->created_at->format('H:i') : '14:00') }}
                                        </span>
                                    </div>
                                    <p class="font-caption text-caption text-slate truncate">
                                        {{ $log->desc ?? ($log->category ?? 'Compliance Log EWF') }}
                                    </p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="mt-space-md pt-space-xs">
                    <button onclick="alert('Mengunduh audit trail lengkap (.CSV)...')" class="w-full py-space-xs px-space-md rounded bg-surface-container-low hover:bg-surface-cream text-charcoal font-button-md text-button-md text-center block transition-colors border-0 cursor-pointer">
                        Unduh Audit Trail Lengkap (.CSV)
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Compliance & Legal Information Bar -->
    <div class="w-full bg-footer-cream py-space-lg px-space-xl text-ink mt-space-xl">
        <div class="max-w-[1400px] mx-auto flex flex-col md:flex-row items-center justify-between gap-space-md">
            <div class="flex flex-col gap-1 text-center md:text-left">
                <span class="font-caption-bold text-caption-bold text-ink">
                    PT EQUITYWORLD FUTURES — Pialang Berjangka Resmi Berizin
                </span>
                <p class="font-caption text-caption text-slate max-w-3xl">
                    Izin Pialang Berjangka Bappebti No. <strong>82/BAPPEBTI/SI/9/2004</strong>. Anggota resmi PT Kliring Berjangka Indonesia (Persero) &amp; PT Bursa Berjangka Jakarta (BBJ). Sistem Informasi tersertifikasi ISO 27001:2022.
                </p>
            </div>
            <div class="flex items-center gap-space-md flex-shrink-0">
                <div class="flex items-center gap-space-xs px-space-sm py-space-xxs rounded bg-cream-deeper text-secondary font-micro-uppercase text-micro-uppercase">
                    <span class="material-symbols-outlined text-[16px]">gavel</span>
                    <span>Bappebti Terdaftar</span>
                </div>
                <div class="flex items-center gap-space-xs px-space-sm py-space-xxs rounded bg-cream-deeper text-secondary font-micro-uppercase text-micro-uppercase">
                    <span class="material-symbols-outlined text-[16px]">lock</span>
                    <span>ISO 27001:2022</span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
