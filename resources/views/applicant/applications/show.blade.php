<div>
    <!-- The biggest battle is the war against ignorance. - Mustafa Kemal Atatürk -->
</div>
@extends('layouts.app')

@section('title', 'Detail Lamaran')

@section('content')
    @php
        $documentLabels = [
            'cv' => 'CV',
            'ktp' => 'KTP',
            'transkrip' => 'Transkrip',
        ];
    @endphp

    <h1>{{ $application->jobOpening->title }}</h1>
    <p>Status: {{ $application->status }}</p>

    @if (session('status'))
        <p>{{ session('status') }}</p>
    @endif

    @if ($errors->any())
        <ul role="alert">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <h2>Berkas Lamaran</h2>
    @foreach ($requiredDocuments as $docType)
        @php
            $document = $application->documents->firstWhere('doc_type', $docType);
        @endphp

        <section>
            <h3>{{ $documentLabels[$docType] ?? $docType }}</h3>

            @if ($document)
                <p>
                    <a href="{{ route('application-documents.download', $document) }}">
                        Unduh {{ $documentLabels[$docType] ?? $docType }}
                    </a>
                </p>
            @else
                <p>Belum diunggah.</p>
            @endif

            @if ($application->status === 'draft')
                <form
                    method="POST"
                    action="{{ route('applicant.applications.documents.store', $application) }}"
                    enctype="multipart/form-data"
                >
                    @csrf
                    <input type="hidden" name="doc_type" value="{{ $docType }}">
                    <label for="file-{{ $docType }}">Pilih {{ $documentLabels[$docType] ?? $docType }} (PDF/JPG/PNG, maks. 2 MB)</label>
                    <input
                        id="file-{{ $docType }}"
                        name="file"
                        type="file"
                        accept=".pdf,.jpg,.jpeg,.png"
                        required
                    >
                    <button type="submit">{{ $document ? 'Ganti berkas' : 'Unggah berkas' }}</button>
                </form>
            @endif
        </section>
    @endforeach

    @if ($application->status === 'draft')
        <form method="POST" action="{{ route('applicant.applications.submit', $application) }}">
            @csrf
            <button type="submit">Kirim lamaran</button>
        </form>
    @else
        <p>Berkas tidak dapat diubah setelah lamaran dikirim.</p>
    @endif

    <h2>Riwayat Status</h2>
    <ol>
        @forelse ($application->statusHistory as $history)
            <li>
                {{ $history->created_at->format('d-m-Y H:i') }}:
                {{ $history->from_status ?? 'dibuat' }} &rarr; {{ $history->to_status }}
            </li>
        @empty
            <li>Belum ada riwayat status.</li>
        @endforelse
    </ol>

    <p><a href="{{ route('applicant.applications.index') }}">Kembali ke daftar lamaran</a></p>
@endsection
