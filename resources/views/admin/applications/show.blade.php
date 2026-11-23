@extends('layouts.app')

@section('title', 'Detail Lamaran')

@section('content')
    @php
        $profile = $application->applicant?->profile;
        $internDetail = $application->applicant?->internDetail;
        $applicantName = $profile?->full_name ?? $application->applicant?->name ?? '-';
        $docLabels = ['cv' => 'CV', 'ktp' => 'KTP', 'transkrip' => 'Transkrip', 'surat_pengantar' => 'Surat Pengantar'];
        $canReview = in_array($application->status, \App\Models\Application::REVIEWABLE_STATUSES, true);
        $transitions = \App\Models\Application::STATUS_TRANSITIONS[$application->status] ?? [];
        $waNumber = $profile ? preg_replace('/\D+/', '', (string) $profile->phone_encrypted) : null;
    @endphp

    <div class="space-y-6">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
            <div>
                <a href="{{ route('admin.applications.index') }}" class="text-sm text-orange-600 hover:text-orange-700 font-medium">&larr; Kembali ke daftar lamaran</a>
                <h1 class="text-2xl font-extrabold text-gray-900 tracking-tight mt-1">Detail Lamaran</h1>
                <p class="text-sm text-gray-600">{{ $applicantName }} &middot; {{ $application->jobOpening?->title }} ({{ $application->jobOpening?->type === 'magang' ? 'Magang' : 'Kerja' }})</p>
            </div>
            <span class="inline-flex items-center self-start rounded-full px-3 py-1.5 text-sm font-semibold bg-orange-100 text-orange-700">Status: {{ $application->status }}</span>
        </div>

        @if (session('status'))
            <div class="rounded-xl border border-green-200 bg-green-50 px-4 py-3 text-sm text-green-800">{{ session('status') }}</div>
        @endif

        @if ($errors->any())
            <div class="rounded-xl border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-700" role="alert">
                <ul class="list-disc list-inside space-y-1">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <div class="lg:col-span-2 space-y-6">
                <section class="bg-white border border-gray-100 rounded-2xl p-5 shadow-sm">
                    <h2 class="text-lg font-bold text-gray-900 mb-4">Profil Pelamar</h2>
                    <dl class="grid grid-cols-1 sm:grid-cols-2 gap-x-6 gap-y-3 text-sm">
                        <div><dt class="text-gray-500">Nama Lengkap</dt><dd class="font-medium text-gray-900">{{ $applicantName }}</dd></div>
                        <div><dt class="text-gray-500">Email</dt><dd class="font-medium text-gray-900">{{ $application->applicant?->email ?? '-' }}</dd></div>
                        <div>
                            <dt class="text-gray-500">NIK</dt>
                            <dd class="font-medium text-gray-900">
                                @if ($profile)
                                    @if ($nikRevealed)
                                        <span class="font-mono">{{ $profile->nik_encrypted ?? '-' }}</span>
                                        <span class="ml-2 text-xs text-green-700">(ditampilkan)</span>
                                    @else
                                        <span class="font-mono">{{ $profile->maskedNik() ?? '-' }}</span>
                                        <form method="POST" action="{{ route('admin.applications.reveal-nik', $application) }}" class="inline ml-2">
                                            @csrf
                                            <button type="submit" class="text-xs font-semibold text-orange-600 hover:text-orange-700 underline">Tampilkan NIK</button>
                                        </form>
                                    @endif
                                @else
                                    -
                                @endif
                            </dd>
                        </div>
                        <div><dt class="text-gray-500">No. HP</dt><dd class="font-medium text-gray-900 font-mono">{{ $profile?->maskedPhone() ?? '-' }}</dd></div>
                        <div><dt class="text-gray-500">Tempat, Tanggal Lahir</dt><dd class="font-medium text-gray-900">{{ $profile?->birth_place ?? '-' }}, {{ $profile?->birth_date?->format('d-m-Y') ?? '-' }}</dd></div>
                        <div><dt class="text-gray-500">Pendidikan Terakhir</dt><dd class="font-medium text-gray-900">{{ $profile?->last_education ?? '-' }}</dd></div>
                        <div class="sm:col-span-2"><dt class="text-gray-500">Alamat</dt><dd class="font-medium text-gray-900">{{ $profile?->address ?? '-' }}</dd></div>
                    </dl>

                    @if ($application->jobOpening?->type === 'magang')
                        <div class="mt-5 pt-4 border-t border-gray-100">
                            <h3 class="text-sm font-bold text-gray-900 mb-3">Data Kampus (Magang)</h3>
                            <dl class="grid grid-cols-1 sm:grid-cols-2 gap-x-6 gap-y-3 text-sm">
                                <div><dt class="text-gray-500">Universitas</dt><dd class="font-medium text-gray-900">{{ $internDetail?->university ?? '-' }}</dd></div>
                                <div><dt class="text-gray-500">Jurusan</dt><dd class="font-medium text-gray-900">{{ $internDetail?->major ?? '-' }}</dd></div>
                                <div><dt class="text-gray-500">NIM</dt><dd class="font-medium text-gray-900">{{ $internDetail?->student_id_number ?? '-' }}</dd></div>
                                <div><dt class="text-gray-500">Semester</dt><dd class="font-medium text-gray-900">{{ $internDetail?->semester ?? '-' }}</dd></div>
                            </dl>
                        </div>
                    @endif

                    @if ($waNumber)
                        <div class="mt-5 pt-4 border-t border-gray-100">
                            <a href="{{ route('admin.applications.whatsapp', $application) }}" target="_blank" rel="noopener"
                               class="inline-flex items-center justify-center rounded-lg bg-green-600 hover:bg-green-700 text-white px-4 py-2 text-sm font-semibold transition">
                                Hubungi via WhatsApp
                            </a>
                            <p class="text-xs text-gray-500 mt-1">Membuka WhatsApp di tab baru dan mencatat aktivitas kontak.</p>
                        </div>
                    @endif
                </section>

                <section class="bg-white border border-gray-100 rounded-2xl p-5 shadow-sm">
                    <h2 class="text-lg font-bold text-gray-900 mb-4">Berkas Lamaran</h2>
                    @if ($application->documents->isEmpty())
                        <p class="text-sm text-gray-500">Belum ada berkas yang diunggah.</p>
                    @else
                        <ul class="divide-y divide-gray-100">
                            @foreach ($application->documents as $document)
                                <li class="py-3 flex items-center justify-between gap-3">
                                    <div>
                                        <p class="font-medium text-gray-900 text-sm">{{ $docLabels[$document->doc_type] ?? $document->doc_type }}</p>
                                        <p class="text-xs text-gray-500">{{ $document->original_name ?? basename($document->file_path) }}</p>
                                    </div>
                                    <a href="{{ route('application-documents.download', $document) }}" class="text-sm font-semibold text-orange-600 hover:text-orange-700">Unduh</a>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </section>

                <section class="bg-white border border-gray-100 rounded-2xl p-5 shadow-sm">
                    <h2 class="text-lg font-bold text-gray-900 mb-4">Timeline Riwayat Status</h2>
                    <ol class="space-y-3">
                        @forelse ($application->statusHistory as $history)
                            <li class="relative pl-4 border-l-2 border-orange-200">
                                <div class="text-sm font-medium text-gray-900">
                                    {{ $history->from_status ?? 'dibuat' }} &rarr; {{ $history->to_status }}
                                </div>
                                <div class="text-xs text-gray-500 mt-0.5">
                                    {{ $history->created_at?->format('d-m-Y H:i') ?? '-' }}
                                    @if ($history->changedBy)
                                        &middot; oleh {{ $history->changedBy->name }}
                                    @endif
                                </div>
                                @if ($history->note)
                                    <div class="text-xs text-gray-700 mt-1">Catatan: {{ $history->note }}</div>
                                @endif
                            </li>
                        @empty
                            <li class="text-sm text-gray-500">Belum ada riwayat status.</li>
                        @endforelse
                    </ol>
                </section>
            </div>

            <div class="space-y-6">
                <section class="bg-white border border-gray-100 rounded-2xl p-5 shadow-sm">
                    <h2 class="text-lg font-bold text-gray-900 mb-4">Aksi Status</h2>
                    @if (! $canReview)
                        <p class="text-sm text-gray-500">Lamaran ini sudah berstatus <strong>{{ $application->status }}</strong> dan tidak dapat diproses lebih lanjut.</p>
                    @else
                        <div class="space-y-4">
                            @if (in_array('in_review', $transitions, true))
                                <form method="POST" action="{{ route('admin.applications.transition', $application) }}" class="space-y-2">
                                    @csrf
                                    <input type="hidden" name="status" value="in_review">
                                    <label class="block text-xs font-semibold text-gray-600">Catatan (opsional)</label>
                                    <textarea name="admin_note" rows="2" class="w-full rounded-lg border-gray-200 text-sm focus:border-orange-400 focus:ring-orange-400" placeholder="Catatan review...">{{ old('status') === 'in_review' ? old('admin_note') : '' }}</textarea>
                                    <button type="submit" class="w-full rounded-lg bg-orange-500 hover:bg-orange-600 text-white px-4 py-2 text-sm font-semibold transition">Tandai In Review</button>
                                </form>
                            @endif

                            @if (in_array('interview', $transitions, true))
                                <form method="POST" action="{{ route('admin.applications.transition', $application) }}" class="space-y-2">
                                    @csrf
                                    <input type="hidden" name="status" value="interview">
                                    <label class="block text-xs font-semibold text-gray-600">Catatan (opsional)</label>
                                    <textarea name="admin_note" rows="2" class="w-full rounded-lg border-gray-200 text-sm focus:border-orange-400 focus:ring-orange-400" placeholder="Catatan interview...">{{ old('status') === 'interview' ? old('admin_note') : '' }}</textarea>
                                    <button type="submit" class="w-full rounded-lg bg-orange-500 hover:bg-orange-600 text-white px-4 py-2 text-sm font-semibold transition">Tandai Interview</button>
                                </form>
                            @endif

                            @if (in_array('accepted', $transitions, true))
                                <form method="POST" action="{{ route('admin.applications.transition', $application) }}" class="space-y-2">
                                    @csrf
                                    <input type="hidden" name="status" value="accepted">
                                    <label class="block text-xs font-semibold text-gray-600">Catatan (opsional)</label>
                                    <textarea name="admin_note" rows="2" class="w-full rounded-lg border-gray-200 text-sm focus:border-orange-400 focus:ring-orange-400" placeholder="Catatan penerimaan...">{{ old('status') === 'accepted' ? old('admin_note') : '' }}</textarea>
                                    <button type="submit" class="w-full rounded-lg bg-green-600 hover:bg-green-700 text-white px-4 py-2 text-sm font-semibold transition">Terima Lamaran</button>
                                </form>
                            @endif

                            @if (in_array('rejected', $transitions, true))
                                <div class="pt-2 border-t border-gray-100">
                                    <form method="POST" action="{{ route('admin.applications.reject', $application) }}" class="space-y-2">
                                        @csrf
                                        <label class="block text-xs font-semibold text-gray-600">Alasan penolakan <span class="text-red-600">*</span></label>
                                        <textarea name="admin_note" rows="3" required class="w-full rounded-lg border-gray-200 text-sm focus:border-orange-400 focus:ring-orange-400" placeholder="Wajib diisi...">{{ old('admin_note') }}</textarea>
                                        <button type="submit" class="w-full rounded-lg bg-red-600 hover:bg-red-700 text-white px-4 py-2 text-sm font-semibold transition">Tolak Lamaran</button>
                                    </form>
                                </div>
                            @endif
                        </div>
                    @endif
                </section>

                @if ($application->internPlacement)
                    <section class="bg-white border border-gray-100 rounded-2xl p-5 shadow-sm">
                        <h2 class="text-lg font-bold text-gray-900 mb-3">Penempatan Magang</h2>
                        <dl class="text-sm space-y-2">
                            <div><dt class="text-gray-500">Divisi</dt><dd class="font-medium text-gray-900">{{ $application->internPlacement->division ?? '-' }}</dd></div>
                            <div><dt class="text-gray-500">Mentor</dt><dd class="font-medium text-gray-900">{{ $application->internPlacement->mentor_name ?? '-' }}</dd></div>
                            <div><dt class="text-gray-500">Status</dt><dd class="font-medium text-gray-900">{{ $application->internPlacement->status }}</dd></div>
                        </dl>
                    </section>
                @endif
            </div>
        </div>
    </div>
@endsection
