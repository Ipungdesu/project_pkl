@extends('layouts.app')

@section('title', 'Dashboard Admin')

@section('content')
    <div class="space-y-6">
        <div class="bg-white border border-orange-100 rounded-2xl p-6 shadow-sm">
            <h1 class="text-2xl font-extrabold text-gray-900 tracking-tight">Admin dashboard</h1>
            <p class="text-sm text-gray-600 mt-2">Ringkasan administrasi lamaran dan akses cepat ke panel admin.</p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
            <div class="bg-white border border-gray-100 rounded-2xl p-5 shadow-sm">
                <p class="text-sm text-gray-500 font-medium">Lamaran menunggu review</p>
                <p class="mt-2 text-3xl font-extrabold text-orange-600">{{ $pendingReviewCount ?? 0 }}</p>
                <p class="text-xs text-gray-400 mt-1">Status: submitted</p>
            </div>
            <div class="bg-white border border-gray-100 rounded-2xl p-5 shadow-sm">
                <p class="text-sm text-gray-500 font-medium">Sedang interview</p>
                <p class="mt-2 text-3xl font-extrabold text-orange-600">{{ $interviewCount ?? 0 }}</p>
                <p class="text-xs text-gray-400 mt-1">Status: interview</p>
            </div>
            <div class="bg-white border border-gray-100 rounded-2xl p-5 shadow-sm">
                <p class="text-sm text-gray-500 font-medium">Diterima bulan ini</p>
                <p class="mt-2 text-3xl font-extrabold text-orange-600">{{ $acceptedThisMonthCount ?? 0 }}</p>
                <p class="text-xs text-gray-400 mt-1">Status accepted, reviewed bulan berjalan</p>
            </div>
        </div>

        <div class="bg-white border border-gray-100 rounded-2xl p-5 shadow-sm">
            <h2 class="text-lg font-bold text-gray-900">Akses cepat</h2>
            <div class="mt-4 flex flex-wrap gap-3">
                <a href="{{ route('admin.applications.index') }}" class="inline-flex items-center justify-center rounded-lg bg-orange-500 hover:bg-orange-600 text-white px-4 py-2 text-sm font-semibold transition">Lamaran</a>
                <a href="{{ route('admin.jobs.index') }}" class="inline-flex items-center justify-center rounded-lg bg-orange-500 hover:bg-orange-600 text-white px-4 py-2 text-sm font-semibold transition">Lowongan</a>
                <a href="{{ route('admin.employees.index') }}" class="inline-flex items-center justify-center rounded-lg bg-orange-500 hover:bg-orange-600 text-white px-4 py-2 text-sm font-semibold transition">Karyawan</a>
                <a href="{{ route('admin.interns.index') }}" class="inline-flex items-center justify-center rounded-lg bg-orange-500 hover:bg-orange-600 text-white px-4 py-2 text-sm font-semibold transition">Magang</a>
            </div>
        </div>
    </div>
@endsection
