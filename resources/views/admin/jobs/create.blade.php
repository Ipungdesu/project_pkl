@extends('layouts.app')

@section('title', 'Buat Lowongan')

@section('content')
    <div class="max-w-3xl space-y-6">
        <div>
            <a href="{{ route('admin.jobs.index') }}" class="text-sm text-orange-600 hover:text-orange-700 font-medium">&larr; Kembali</a>
            <h1 class="text-2xl font-extrabold text-gray-900 tracking-tight mt-1">Buat Lowongan</h1>
        </div>
        <div class="bg-white border border-gray-100 rounded-2xl p-6 shadow-sm">
            @if ($errors->any())
                <div class="mb-4 rounded-xl border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-700" role="alert">
                    <ul class="list-disc list-inside">@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
                </div>
            @endif
            <form method="POST" action="{{ route('admin.jobs.store') }}" class="space-y-4">
                @csrf
                @include('admin.jobs.form')
                <div class="flex gap-3 pt-2">
                    <button type="submit" class="inline-flex items-center justify-center rounded-lg bg-orange-500 hover:bg-orange-600 text-white px-5 py-2.5 text-sm font-semibold transition">Simpan</button>
                    <a href="{{ route('admin.jobs.index') }}" class="inline-flex items-center justify-center rounded-lg border border-gray-200 hover:bg-gray-50 text-gray-700 px-5 py-2.5 text-sm font-semibold transition">Batal</a>
                </div>
            </form>
        </div>
    </div>
@endsection
