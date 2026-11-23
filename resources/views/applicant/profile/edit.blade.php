@extends('layouts.app')

@section('title', 'Profil Pelamar')

@section('content')
    <h1>Data Pribadi</h1>

    @if (session('status'))
        <p>{{ session('status') }}</p>
    @endif

    @if (session('error'))
        <p role="alert">{{ session('error') }}</p>
    @endif

    @if ($errors->any())
        <ul role="alert">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form method="POST" action="{{ route('applicant.profile.update') }}">
        @csrf
        @method('PUT')

        <label for="full_name">Nama lengkap</label>
        <input id="full_name" name="full_name" type="text" value="{{ old('full_name', $profile?->full_name) }}" required>

        <label for="nik">NIK</label>
        @if ($profile?->maskedNik())
            <p>NIK tersimpan: {{ $profile->maskedNik() }}</p>
        @endif
        <input id="nik" name="nik" type="text" inputmode="numeric" autocomplete="off" required>

        <label for="phone">No. HP</label>
        @if ($profile?->maskedPhone())
            <p>No. HP tersimpan: {{ $profile->maskedPhone() }}</p>
        @endif
        <input id="phone" name="phone" type="tel" autocomplete="tel" required>

        <label for="birth_place">Tempat lahir</label>
        <input id="birth_place" name="birth_place" type="text" value="{{ old('birth_place', $profile?->birth_place) }}" required>

        <label for="birth_date">Tanggal lahir</label>
        <input
            id="birth_date"
            name="birth_date"
            type="date"
            value="{{ old('birth_date', $profile?->birth_date?->format('Y-m-d')) }}"
            required
        >

        <label for="address">Alamat</label>
        <textarea id="address" name="address" required>{{ old('address', $profile?->address) }}</textarea>

        <label for="last_education">Pendidikan terakhir</label>
        <input id="last_education" name="last_education" type="text" value="{{ old('last_education', $profile?->last_education) }}" required>

        @if ($isMagang)
            <h2>Data Magang</h2>

            <label for="university">Universitas</label>
            <input id="university" name="university" type="text" value="{{ old('university', $internDetail?->university) }}" required>

            <label for="major">Jurusan</label>
            <input id="major" name="major" type="text" value="{{ old('major', $internDetail?->major) }}" required>

            <label for="student_id_number">NIM</label>
            <input id="student_id_number" name="student_id_number" type="text" value="{{ old('student_id_number', $internDetail?->student_id_number) }}" required>

            <label for="semester">Semester</label>
            <input id="semester" name="semester" type="number" min="1" max="14" value="{{ old('semester', $internDetail?->semester) }}" required>
        @endif

        <button type="submit">Simpan Profil</button>
    </form>

    <p><a href="{{ route('applicant.jobs.index') }}">Lihat lowongan</a></p>
@endsection
