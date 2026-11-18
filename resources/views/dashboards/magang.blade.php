@extends('layouts.app')

@section('title', 'Intern dashboard')

@section('content')
    <h1>Intern dashboard</h1>
    <p>Intern area.</p>
    <nav>
        <a href="{{ route('applicant.profile.edit') }}">Data pribadi</a>
        <a href="{{ route('applicant.jobs.index') }}">Lowongan magang</a>
        <a href="{{ route('applicant.applications.index') }}">Status lamaran</a>
    </nav>
@endsection
