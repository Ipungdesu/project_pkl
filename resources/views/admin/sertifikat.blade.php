@extends('layouts.admin')

@section('title', 'Manajemen & Penerbitan Sertifikat Peserta Magang')

@section('content')
<div class="flex flex-col w-full">
    <!-- Top Ambient Glow -->
    <div class="relative w-full px-space-xl pt-space-lg pb-space-xxl overflow-hidden">
        <div class="absolute -top-32 right-12 w-96 h-96 rounded-full bg-sunshine-300/20 blur-3xl pointer-events-none"></div>
        <div class="absolute top-1/4 -left-20 w-80 h-80 rounded-full bg-cream-deeper/40 blur-3xl pointer-events-none"></div>
        <div class="max-w-[1400px] mx-auto flex flex-col gap-space-xl relative z-10">
            <!-- Module Header -->
            <section class="flex flex-col lg:flex-row lg:items-end justify-between gap-space-lg pb-space-md">
                <div class="flex flex-col max-w-3xl">
                    <div class="flex items-center gap-space-xs mb-space-xs">
                        <span class="inline-flex items-center gap-1.5 px-space-xs py-0.5 rounded-full bg-cream-deeper font-micro-uppercase text-micro-uppercase text-on-secondary-fixed tracking-wider">
                            <span class="w-1.5 h-1.5 rounded-full bg-link animate-pulse"></span>
                            DIREKTORAT TALENTA &amp; KEPATUHAN
                        </span>
                        <span class="font-caption text-caption text-stone">•</span>
                        <span class="font-code-md text-caption text-stone">REV 2025.Q1</span>
                    </div>
                    <h1 class="font-heading-2 text-heading-2 text-on-surface font-semibold tracking-tight">
                        Manajemen &amp; Penerbitan Sertifikat Peserta Magang
                    </h1>
                    <p class="font-body-md text-body-md text-slate mt-space-xs leading-relaxed max-w-2xl">
                        Pantau durasi masa magang, verifikasi pencapaian kompetensi pialang berjangka, validasi tanda tangan elektronik Bappebti, dan kelola penerbitan sertifikat resmi PT Equityworld Futures.
                    </p>
                </div>
                <div class="flex items-center gap-space-sm shrink-0">
                    <button onclick="alert('Mengunduh rekap kelulusan peserta magang (.PDF)...')" class="inline-flex items-center gap-space-xs px-space-md h-11 rounded-lg bg-surface-container-lowest text-on-surface font-button-md text-button-md shadow-sm hover:bg-cream-light transition-all border-0 cursor-pointer" type="button">
                        <span class="material-symbols-outlined text-[18px] text-stone">download</span>
                        <span>Unduh Rekap Kelulusan</span>
                    </button>
                    <button onclick="alert('Form penerbitan sertifikat batch V dibuka.')" class="inline-flex items-center gap-space-xs px-space-md h-11 rounded-lg bg-link text-canvas font-button-md text-button-md shadow-md shadow-link/20 hover:bg-primary-deep transition-all border-0 cursor-pointer" type="button">
                        <span class="material-symbols-outlined text-[18px]">add_circle</span>
                        <span>+ Buat Sertifikat Baru / Batch</span>
                    </button>
                </div>
            </section>

            <!-- Metric Cards (4 Bento Stats) -->
            <section class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-space-md">
                <!-- Stat 1 -->
                <div class="p-space-lg rounded-xl bg-surface-container-lowest shadow-sm hover:shadow-md transition-shadow relative overflow-hidden group">
                    <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-sunshine-700 to-link"></div>
                    <div class="flex items-center justify-between">
                        <span class="font-micro-uppercase text-micro-uppercase text-stone tracking-wider">TOTAL TERBIT RESMI</span>
                        <span class="material-symbols-outlined text-stone group-hover:text-link transition-colors text-[20px]">verified</span>
                    </div>
                    <div class="mt-space-sm flex items-baseline gap-space-xs">
                        <span class="font-stat-display text-stat-display text-on-surface tracking-tight font-serif">{{ number_format($metrics['total_terbit']) }}</span>
                        <span class="font-caption-bold text-caption-bold text-secondary font-medium">{{ $metrics['terbit_month'] }}</span>
                    </div>
                    <p class="font-caption text-caption text-slate mt-space-xs line-clamp-1">
                        Terdaftar di Bappebti &amp; Mensesneg
                    </p>
                </div>

                <!-- Stat 2 -->
                <div class="p-space-lg rounded-xl bg-surface-cream-soft shadow-sm hover:shadow-md transition-shadow relative overflow-hidden group">
                    <div class="absolute top-0 left-0 right-0 h-1 bg-link"></div>
                    <div class="flex items-center justify-between">
                        <span class="font-micro-uppercase text-micro-uppercase text-on-secondary-fixed tracking-wider">SIAP DITERBITKAN</span>
                        <span class="w-2 h-2 rounded-full bg-link"></span>
                    </div>
                    <div class="mt-space-sm flex items-baseline gap-space-xs">
                        <span class="font-stat-display text-stat-display text-link tracking-tight font-serif">{{ number_format($metrics['siap_terbit']) }}</span>
                        <span class="font-caption-bold text-caption-bold text-on-surface-variant font-medium">Selesai 100%</span>
                    </div>
                    <p class="font-caption text-caption text-on-surface-variant mt-space-xs line-clamp-1">
                        Evaluasi Tuntas, Menunggu Approval HR
                    </p>
                </div>

                <!-- Stat 3 -->
                <div class="p-space-lg rounded-xl bg-surface-container-lowest shadow-sm hover:shadow-md transition-shadow relative overflow-hidden group">
                    <div class="absolute top-0 left-0 right-0 h-1 bg-sunshine-500"></div>
                    <div class="flex items-center justify-between">
                        <span class="font-micro-uppercase text-micro-uppercase text-stone tracking-wider">SEDANG BERJALAN</span>
                        <span class="material-symbols-outlined text-stone group-hover:text-sunshine-700 transition-colors text-[20px]">timelapse</span>
                    </div>
                    <div class="mt-space-sm flex items-baseline gap-space-xs">
                        <span class="font-stat-display text-stat-display text-on-surface tracking-tight font-serif">{{ number_format($metrics['sedang_berjalan']) }}</span>
                        <span class="font-caption-bold text-caption-bold text-stone font-medium">In Progress</span>
                    </div>
                    <p class="font-caption text-caption text-slate mt-space-xs line-clamp-1">
                        Monitoring, Rata-rata 68.4% durasi magang
                    </p>
                </div>

                <!-- Stat 4 -->
                <div class="p-space-lg rounded-xl bg-surface-container-lowest shadow-sm hover:shadow-md transition-shadow relative overflow-hidden group">
                    <div class="absolute top-0 left-0 right-0 h-1 bg-tertiary-fixed-dim"></div>
                    <div class="flex items-center justify-between">
                        <span class="font-micro-uppercase text-micro-uppercase text-stone tracking-wider">KELULUSAN &amp; EVALUASI</span>
                        <span class="material-symbols-outlined text-stone group-hover:text-tertiary transition-colors text-[20px]">workspace_premium</span>
                    </div>
                    <div class="mt-space-sm flex items-baseline gap-space-xs">
                        <span class="font-stat-display text-stat-display text-on-surface tracking-tight font-serif">{{ $metrics['kelulusan_rate'] }}</span>
                        <span class="font-caption-bold text-caption-bold text-secondary font-medium">{{ $metrics['ip_avg'] }}</span>
                    </div>
                    <p class="font-caption text-caption text-slate mt-space-xs line-clamp-1">
                        42 Peserta Lanjut WPB Fulltime
                    </p>
                </div>
            </section>

            <!-- Alert Banner Kelulusan -->
            <section class="rounded-xl bg-gradient-to-r from-cream to-cream-light p-space-lg shadow-sm flex flex-col md:flex-row md:items-center justify-between gap-space-md">
                <div class="flex items-start sm:items-center gap-space-md">
                    <div class="w-12 h-12 rounded-xl bg-link/10 text-link flex items-center justify-center shrink-0">
                        <span class="material-symbols-outlined text-[26px]">verified_user</span>
                    </div>
                    <div class="flex flex-col">
                        <div class="flex items-center gap-space-xs">
                            <span class="font-heading-5 text-heading-5 text-on-surface font-semibold">
                                36 Peserta Magang Telah Memenuhi Kualifikasi Kelulusan 100%
                            </span>
                            <span class="hidden sm:inline-block px-2 py-0.5 rounded-full bg-link text-canvas font-micro-uppercase text-micro-uppercase">Prioritas</span>
                        </div>
                        <p class="font-body-sm text-body-sm text-slate mt-0.5">
                            Seluruh persyaratan modul riset, kehadiran presensi harian, dan evaluasi nilai mentor (&gt;85.0) telah diverifikasi tuntas.
                        </p>
                    </div>
                </div>
                <div class="flex items-center gap-space-sm shrink-0 self-end md:self-auto">
                    <button onclick="alert('Membuka draft batch V untuk diperiksa.')" class="px-space-md py-space-xs rounded-lg bg-surface-container-lowest text-on-surface font-button-md text-button-md shadow-sm hover:bg-cream-deeper transition-colors border-0 cursor-pointer" type="button">
                        Tinjau Draft Batch V
                    </button>
                    <button onclick="alert('36 sertifikat resmi berhasil diterbitkan serentak.')" class="px-space-md py-space-xs rounded-lg bg-link text-canvas font-button-md text-button-md shadow-sm hover:bg-primary-deep transition-colors inline-flex items-center gap-1.5 border-0 cursor-pointer" type="button">
                        <span class="material-symbols-outlined text-[16px]">send</span>
                        <span>Terbitkan Semua (36)</span>
                    </button>
                </div>
            </section>

            <!-- Content Management Container: Tabs + Filter + Table -->
            <section class="bg-surface-container-lowest rounded-xl shadow-sm overflow-hidden flex flex-col">
                <!-- Control Header & Tabs -->
                <div class="p-space-lg bg-canvas flex flex-col gap-space-md">
                    <!-- Status Tabs -->
                    <div class="flex items-center justify-between flex-wrap gap-space-sm pb-space-sm">
                        <div class="flex items-center gap-space-xs overflow-x-auto pb-1 max-w-full">
                            <a href="{{ route('admin.sertifikat.index', ['tab' => 'semua']) }}" class="no-underline px-space-md py-space-xs rounded-lg font-body-sm-medium text-body-sm-medium {{ $statusTab === 'semua' ? 'bg-link text-canvas shadow-sm' : 'text-slate hover:bg-surface-container' }} transition-colors shrink-0">
                                Semua Peserta <span class="ml-1 {{ $statusTab === 'semua' ? 'text-canvas/90 font-bold' : 'text-stone font-mono' }} text-[12px]">(178)</span>
                            </a>
                            <a href="{{ route('admin.sertifikat.index', ['tab' => 'siap']) }}" class="no-underline px-space-md py-space-xs rounded-lg font-body-sm-medium text-body-sm-medium {{ $statusTab === 'siap' ? 'bg-link text-canvas shadow-sm' : 'text-slate hover:bg-surface-container' }} transition-colors shrink-0">
                                Siap Diterbitkan <span class="ml-1 {{ $statusTab === 'siap' ? 'text-canvas/90 font-bold' : 'text-stone font-mono' }} text-[12px]">(36)</span>
                            </a>
                            <a href="{{ route('admin.sertifikat.index', ['tab' => 'terbit']) }}" class="no-underline px-space-md py-space-xs rounded-lg font-body-sm-medium text-body-sm-medium {{ $statusTab === 'terbit' ? 'bg-link text-canvas shadow-sm' : 'text-slate hover:bg-surface-container' }} transition-colors shrink-0">
                                Sudah Diterbitkan <span class="ml-1 {{ $statusTab === 'terbit' ? 'text-canvas/90 font-bold' : 'text-stone font-mono' }} text-[12px]">(248)</span>
                            </a>
                            <a href="{{ route('admin.sertifikat.index', ['tab' => 'berjalan']) }}" class="no-underline px-space-md py-space-xs rounded-lg font-body-sm-medium text-body-sm-medium {{ $statusTab === 'berjalan' ? 'bg-link text-canvas shadow-sm' : 'text-slate hover:bg-surface-container' }} transition-colors shrink-0">
                                Sedang Berjalan <span class="ml-1 {{ $statusTab === 'berjalan' ? 'text-canvas/90 font-bold' : 'text-stone font-mono' }} text-[12px]">(142)</span>
                            </a>
                            <a href="{{ route('admin.sertifikat.index', ['tab' => 'evaluasi']) }}" class="no-underline px-space-md py-space-xs rounded-lg font-body-sm-medium text-body-sm-medium {{ $statusTab === 'evaluasi' ? 'bg-link text-canvas shadow-sm' : 'text-slate hover:bg-surface-container' }} transition-colors shrink-0">
                                Perlu Evaluasi <span class="ml-1 {{ $statusTab === 'evaluasi' ? 'text-canvas/90 font-bold' : 'text-stone font-mono' }} text-[12px]">(4)</span>
                            </a>
                        </div>
                        <div class="flex items-center gap-space-xs">
                            <button onclick="alert('Export Excel kelulusan magang...')" class="p-space-xs rounded-lg bg-surface hover:bg-surface-container text-stone hover:text-on-surface transition-colors border-0 cursor-pointer" title="Export Excel">
                                <span class="material-symbols-outlined text-[18px]">table_view</span>
                            </button>
                            <a href="{{ route('admin.sertifikat.index') }}" class="p-space-xs rounded-lg bg-surface hover:bg-surface-container text-stone hover:text-on-surface transition-colors no-underline inline-flex" title="Refresh Data">
                                <span class="material-symbols-outlined text-[18px]">sync</span>
                            </a>
                        </div>
                    </div>

                    <!-- Search & Secondary Filters -->
                    <div class="flex flex-col md:flex-row items-center justify-between gap-space-md pt-space-xs">
                        <div class="w-full md:max-w-md h-10 bg-surface rounded-lg px-space-md flex items-center gap-space-sm">
                            <span class="material-symbols-outlined text-stone text-[18px]">search</span>
                            <input class="w-full bg-transparent font-body-sm text-body-sm text-on-surface placeholder:text-muted focus:outline-none" placeholder="Cari nama peserta, NIM, nomor sertifikat, kampus..." type="text">
                        </div>
                        <div class="flex items-center gap-space-sm w-full md:w-auto justify-end">
                            <div class="flex items-center gap-2">
                                <span class="font-caption text-caption text-stone">Durasi:</span>
                                <select class="h-10 bg-surface rounded-lg px-space-sm font-body-sm text-body-sm text-on-surface focus:outline-none border-0">
                                    <option>Semua Periode</option>
                                    <option>3 Bulan (Intensif)</option>
                                    <option selected="">6 Bulan (Reguler)</option>
                                </select>
                            </div>
                            <button class="h-10 px-space-sm rounded-lg bg-surface text-stone hover:text-on-surface font-body-sm text-body-sm flex items-center gap-1 transition-colors border-0 cursor-pointer" type="button">
                                <span class="material-symbols-outlined text-[16px]">filter_alt_off</span>
                                <span>Reset</span>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Table View -->
                <div class="w-full overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-surface text-stone font-micro-uppercase text-micro-uppercase tracking-wider">
                                <th class="py-space-sm px-space-lg font-semibold">NAMA PESERTA &amp; NIM</th>
                                <th class="py-space-sm px-space-md font-semibold">KAMPUS &amp; DIVISI</th>
                                <th class="py-space-sm px-space-md font-semibold">DURASI &amp; PROGRESS</th>
                                <th class="py-space-sm px-space-md font-semibold">NILAI &amp; PEMBIMBING</th>
                                <th class="py-space-sm px-space-md font-semibold">NO. SERTIFIKAT DIGITAL</th>
                                <th class="py-space-sm px-space-md font-semibold">STATUS</th>
                                <th class="py-space-sm px-space-lg text-right font-semibold">AKSI</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-hairline-soft font-body-sm text-body-sm text-on-surface">
                            @foreach ($certificates as $cert)
                                <tr class="hover:bg-cream-light/60 transition-colors group">
                                    <td class="py-space-md px-space-lg">
                                        <div class="flex items-center gap-space-sm">
                                            <div class="w-9 h-9 rounded-full bg-cream-deeper text-secondary flex items-center justify-center font-serif text-[15px] font-bold">
                                                {{ $cert->initials ?? 'SM' }}
                                            </div>
                                            <div class="flex flex-col min-w-0">
                                                <span class="font-body-md-medium text-body-md-medium text-on-surface group-hover:text-link transition-colors">
                                                    {{ $cert->name ?? ($cert->placement->application->applicant->profile->full_name ?? ($cert->placement->application->applicant->name ?? 'Peserta Magang')) }}
                                                </span>
                                                <span class="font-code-md text-caption text-stone">
                                                    {{ $cert->nim ?? ($cert->placement->application->applicant->internDetail->student_id_number ?? 'NIM-2024') }}
                                                </span>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="py-space-md px-space-md">
                                        <div class="flex flex-col">
                                            <span class="font-body-sm-medium text-body-sm-medium text-on-surface">
                                                {{ $cert->university ?? ($cert->placement->application->applicant->internDetail->university ?? 'Universitas') }}
                                            </span>
                                            <span class="font-caption text-caption text-stone">
                                                {{ $cert->division ?? ($cert->placement->division ?? 'Riset Pasar & Derivatif') }}
                                            </span>
                                        </div>
                                    </td>
                                    <td class="py-space-md px-space-md">
                                        <div class="flex flex-col gap-1 w-36">
                                            <div class="flex items-center justify-between text-caption font-code-md">
                                                <span class="text-on-surface font-medium">{{ $cert->duration ?? '6 Bulan' }}</span>
                                                <span class="text-link font-semibold">{{ $cert->progress ?? '100%' }}</span>
                                            </div>
                                            <div class="w-full h-1.5 rounded-full bg-surface-container overflow-hidden">
                                                <div class="h-full bg-link rounded-full" style="width: {{ $cert->progress ?? '100%' }};"></div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="py-space-md px-space-md">
                                        <div class="flex flex-col">
                                            <div class="flex items-center gap-1.5">
                                                <span class="font-caption-bold text-caption-bold text-on-surface">{{ $cert->score ?? 'A (94.0)' }}</span>
                                                <span class="font-micro text-micro text-secondary font-medium">{{ $cert->score_label ?? 'Sangat Baik' }}</span>
                                            </div>
                                            <span class="font-caption text-caption text-stone truncate max-w-[170px]" title="{{ $cert->mentor ?? 'Mentor Resmi EWF' }}">
                                                {{ $cert->mentor ?? ($cert->placement->mentor_name ?? 'Mentor Resmi EWF') }}
                                            </span>
                                        </div>
                                    </td>
                                    <td class="py-space-md px-space-md">
                                        <span class="font-code-md text-caption px-2 py-1 rounded bg-cream-deeper text-secondary font-medium">
                                            {{ $cert->cert_number ?? ($cert->doc_number ?? 'Draft: EWF-CERT-0941') }}
                                        </span>
                                    </td>
                                    <td class="py-space-md px-space-md">
                                        @if (($cert->status ?? '') === 'issued')
                                            <span class="inline-flex items-center gap-1.5 px-space-xs py-0.5 rounded-full bg-surface-container text-on-surface font-caption-bold text-caption">
                                                <span class="w-1.5 h-1.5 rounded-full bg-secondary"></span>
                                                Diterbitkan
                                            </span>
                                        @elseif (($cert->status ?? '') === 'in_progress')
                                            <span class="inline-flex items-center gap-1.5 px-space-xs py-0.5 rounded-full bg-surface-container text-stone font-caption-bold text-caption">
                                                <span class="w-1.5 h-1.5 rounded-full bg-stone"></span>
                                                Sedang Berjalan
                                            </span>
                                        @else
                                            <span class="inline-flex items-center gap-1.5 px-space-xs py-0.5 rounded-full bg-cream text-secondary font-caption-bold text-caption">
                                                <span class="w-1.5 h-1.5 rounded-full bg-link"></span>
                                                Siap Terbit
                                            </span>
                                        @endif
                                    </td>
                                    <td class="py-space-md px-space-lg text-right">
                                        <div class="inline-flex items-center gap-1">
                                            @if (($cert->status ?? '') === 'requested')
                                                <form method="POST" action="{{ route('admin.sertifikat.issue', $cert->id ?? 1) }}" class="inline">
                                                    @csrf
                                                    <button class="p-1.5 rounded hover:bg-cream-deeper text-link hover:text-primary-deep transition-colors border-0 bg-transparent cursor-pointer" title="Terbitkan Sekarang" type="submit">
                                                        <span class="material-symbols-outlined text-[18px]">verified</span>
                                                    </button>
                                                </form>
                                            @else
                                                <button onclick="alert('Mengunduh salinan digital e-sertifikat PDF...')" class="p-1.5 rounded hover:bg-surface text-stone hover:text-on-surface transition-colors border-0 bg-transparent cursor-pointer" title="Unduh Sertifikat PDF">
                                                    <span class="material-symbols-outlined text-[18px]">download</span>
                                                </button>
                                            @endif
                                            <button onclick="alert('Menampilkan rincian evaluasi mentor dan jam kerja peserta magang.')" class="p-1.5 rounded hover:bg-surface text-stone hover:text-on-surface transition-colors border-0 bg-transparent cursor-pointer" title="Lihat Detail">
                                                <span class="material-symbols-outlined text-[18px]">more_vert</span>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Pagination & Summary -->
                <div class="px-space-lg py-space-md bg-canvas flex flex-col sm:flex-row items-center justify-between gap-space-sm">
                    <span class="font-body-sm text-body-sm text-stone">
                        Menampilkan <span class="font-medium text-on-surface">1 - {{ count($certificates) }}</span> dari <span class="font-medium text-on-surface">178</span> peserta magang aktif EWF
                    </span>
                    <div class="flex items-center gap-1">
                        <button class="px-space-sm py-1.5 rounded-lg bg-surface text-stone hover:text-on-surface text-caption font-medium disabled:opacity-50 border-0" disabled="">
                            Sebelumnya
                        </button>
                        <button class="w-8 h-8 rounded-lg bg-link text-canvas font-caption-bold text-caption flex items-center justify-center border-0">
                            1
                        </button>
                        <button class="w-8 h-8 rounded-lg hover:bg-surface text-stone hover:text-on-surface font-caption text-caption flex items-center justify-center transition-colors border-0 bg-transparent cursor-pointer">
                            2
                        </button>
                        <button class="w-8 h-8 rounded-lg hover:bg-surface text-stone hover:text-on-surface font-caption text-caption flex items-center justify-center transition-colors border-0 bg-transparent cursor-pointer">
                            3
                        </button>
                        <span class="text-stone px-1">...</span>
                        <button class="px-space-sm py-1.5 rounded-lg bg-surface text-stone hover:text-on-surface text-caption font-medium transition-colors border-0 cursor-pointer">
                            Selanjutnya
                        </button>
                    </div>
                </div>
            </section>

            <!-- Bottom Regulatory Note -->
            <section class="rounded-xl bg-surface-container-low p-space-md flex flex-col md:flex-row items-center justify-between gap-space-md text-stone">
                <div class="flex items-center gap-space-sm">
                    <span class="material-symbols-outlined text-secondary text-[22px]">policy</span>
                    <p class="font-caption text-caption leading-relaxed">
                        <strong class="text-on-surface font-medium">Standar Kepatuhan Regulasi &amp; Akreditasi Magang Nasional:</strong> Sertifikat diterbitkan berdasarkan evaluasi kompetensi Perdagangan Berjangka Komoditi sesuai UU No. 10/2011 dan regulasi Bappebti.
                    </p>
                </div>
                <div class="flex items-center gap-space-md shrink-0 font-micro-uppercase text-micro-uppercase">
                    <span class="flex items-center gap-1 text-on-surface"><span class="w-1.5 h-1.5 rounded-full bg-link"></span> Bappebti Compliant</span>
                    <span class="text-hairline-strong">•</span>
                    <span class="flex items-center gap-1 text-on-surface"><span class="w-1.5 h-1.5 rounded-full bg-secondary"></span> KBI Verified</span>
                </div>
            </section>
        </div>
    </div>
</div>
@endsection
