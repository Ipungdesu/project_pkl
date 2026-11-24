@extends('layouts.app')

@section('title', 'Employee dashboard')

@section('content')
    <h1>Employee dashboard</h1>
    <p>Employee area.</p>
    <nav>
        <a href="{{ route('applicant.profile.edit') }}">Data pribadi</a>
        <a href="{{ route('applicant.jobs.index') }}">Lowongan kerja</a>
        <a href="{{ route('applicant.applications.index') }}">Status lamaran</a>
    </nav>
@endsection
