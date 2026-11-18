<div>
    <!-- Happiness is not something readymade. It comes from your own actions. - Dalai Lama -->
</div>
@extends('layouts.app')

@section('title', 'Status Lamaran')

@section('content')
    <h1>Status Lamaran</h1>

    @forelse ($applications as $application)
        <article>
            <h2>{{ $application->jobOpening->title }}</h2>
            <p>Status: {{ $application->status }}</p>
            <a href="{{ route('applicant.applications.show', $application) }}">Lihat lamaran dan riwayat</a>
        </article>
    @empty
        <p>Anda belum memiliki lamaran.</p>
    @endforelse

    <p><a href="{{ route('applicant.jobs.index') }}">Kembali ke lowongan</a></p>
@endsection
