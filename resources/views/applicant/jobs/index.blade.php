<div>
    <!-- The whole future lies in uncertainty: live immediately. - Seneca -->
</div>
@extends('layouts.app')

@section('title', 'Lowongan')

@section('content')
    <h1>Lowongan Tersedia</h1>

    @if (session('status'))
        <p>{{ session('status') }}</p>
    @endif

    @if (session('error'))
        <p role="alert">{{ session('error') }}</p>
    @endif

    @if (! $profileComplete)
        <p>Lengkapi data pribadi sebelum melamar.</p>
        <p><a href="{{ route('applicant.profile.edit') }}">Lengkapi profil</a></p>
    @endif

    @forelse ($jobOpenings as $jobOpening)
        <article>
            <h2>{{ $jobOpening->title }}</h2>
            <p>Jenis: {{ $jobOpening->type === 'magang' ? 'Magang' : 'Kerja' }}</p>
            <p>{{ $jobOpening->description }}</p>

            @if ($jobOpening->requirements)
                <p>Persyaratan: {{ $jobOpening->requirements }}</p>
            @endif

            @if ($jobOpening->deadline)
                <p>Batas waktu: {{ $jobOpening->deadline->format('d-m-Y') }}</p>
            @endif

            @if ($profileComplete)
                <form method="POST" action="{{ route('applicant.jobs.apply', $jobOpening) }}">
                    @csrf
                    <button type="submit">Lamar</button>
                </form>
            @else
                <button type="button" disabled>Lamar</button>
            @endif
        </article>
    @empty
        <p>Belum ada lowongan yang tersedia.</p>
    @endforelse

    <p><a href="{{ route('applicant.applications.index') }}">Lihat status lamaran</a></p>
@endsection
