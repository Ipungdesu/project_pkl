@extends('layouts.app')

@section('title', 'Ubah Penempatan Magang')

@section('content')
    @php($application = $placement->application)
    @php($intern = $application?->applicant)
    @php($internName = $intern?->profile?->full_name ?? $intern?->name ?? '-')

    <div class="max-w-3xl space-y-6">
        <div>
            <a href="{{ route('admin.interns.index') }}" class="text-sm text-orange-600 hover:text-orange-700 font-medium">&larr; Kembali ke daftar magang</a>
            <h1 class="text-2xl font-extrabold text-gray-900 tracking-tight mt-1">Ubah Penempatan Magang</h1>
            <p class="text-sm text-gray-600 mt-1">{{ $internName }} &middot; {{ $application?->jobOpening?->title ?? '-' }}</p>
        </div>

        <div class="bg-white border border-gray-100 rounded-2xl p-6 shadow-sm">
            @if ($errors->any())
                <div class="mb-4 rounded-xl border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-700" role="alert">
                    <ul class="list-disc list-inside space-y-1">@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
                </div>
            @endif

            <form method="POST" action="{{ route('admin.interns.placements.update', $placement) }}" class="space-y-4">
                @csrf
                @method('PUT')

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1" for="division">Divisi</label>
                    <input id="division" name="division" type="text" value="{{ old('division', $placement->division) }}" class="w-full rounded-lg border-gray-200 text-sm focus:border-orange-400 focus:ring-orange-400">
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1" for="mentor_name">Nama Mentor</label>
                    <input id="mentor_name" name="mentor_name" type="text" value="{{ old('mentor_name', $placement->mentor_name) }}" class="w-full rounded-lg border-gray-200 text-sm focus:border-orange-400 focus:ring-orange-400">
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1" for="start_date">Tanggal Mulai</label>
                        <input id="start_date" name="start_date" type="date" value="{{ old('start_date', optional($placement->start_date)->format('Y-m-d')) }}" class="w-full rounded-lg border-gray-200 text-sm focus:border-orange-400 focus:ring-orange-400">
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1" for="end_date">Tanggal Selesai</label>
                        <input id="end_date" name="end_date" type="date" value="{{ old('end_date', optional($placement->end_date)->format('Y-m-d')) }}" class="w-full rounded-lg border-gray-200 text-sm focus:border-orange-400 focus:ring-orange-400">
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1" for="status">Status Penempatan</label>
                    <select id="status" name="status" required class="w-full rounded-lg border-gray-200 text-sm focus:border-orange-400 focus:ring-orange-400">
                        @foreach (['active' => 'Active', 'completed' => 'Completed', 'cancelled' => 'Cancelled'] as $value => $label)
                            <option value="{{ $value }}" @selected(old('status', $placement->status) === $value)>{{ $label }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="flex gap-3 pt-2">
                    <button type="submit" class="inline-flex items-center justify-center rounded-lg bg-orange-500 hover:bg-orange-600 text-white px-5 py-2.5 text-sm font-semibold transition">Simpan Perubahan</button>
                    <a href="{{ route('admin.interns.index') }}" class="inline-flex items-center justify-center rounded-lg border border-gray-200 hover:bg-gray-50 text-gray-700 px-5 py-2.5 text-sm font-semibold transition">Batal</a>
                </div>
            </form>
        </div>
    </div>
@endsection
