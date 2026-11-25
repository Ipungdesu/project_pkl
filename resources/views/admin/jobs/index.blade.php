@extends('layouts.app')

@section('title', 'Kelola Lowongan')

@section('content')
    <div class="space-y-6">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 bg-white border border-orange-100 rounded-2xl p-6 shadow-sm">
            <div>
                <h1 class="text-2xl font-extrabold text-gray-900 tracking-tight">Kelola Lowongan</h1>
                <p class="text-sm text-gray-600 mt-1">Buat, ubah, dan aktif/nonaktifkan lowongan magang & kerja.</p>
            </div>
            <a href="{{ route('admin.jobs.create') }}" class="inline-flex items-center justify-center rounded-full bg-orange-500 hover:bg-orange-600 text-white px-5 py-2.5 text-sm font-semibold transition">Buat Lowongan</a>
        </div>

        @if (session('status'))
            <div class="rounded-xl border border-green-200 bg-green-50 px-4 py-3 text-sm text-green-800">{{ session('status') }}</div>
        @endif
        @if ($errors->any())
            <div class="rounded-xl border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-700" role="alert">
                <ul class="list-disc list-inside">@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
            </div>
        @endif

        <div class="bg-white border border-gray-100 rounded-2xl shadow-sm overflow-hidden">
            <div class="overflow-x-auto">
                <table class="min-w-full text-sm">
                    <thead class="bg-orange-50/60 text-gray-700">
                        <tr>
                            <th class="text-left font-semibold px-4 py-3">Judul</th>
                            <th class="text-left font-semibold px-4 py-3">Tipe</th>
                            <th class="text-left font-semibold px-4 py-3">Deadline</th>
                            <th class="text-left font-semibold px-4 py-3">Status</th>
                            <th class="text-left font-semibold px-4 py-3">Pelamar</th>
                            <th class="text-left font-semibold px-4 py-3">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @forelse ($jobOpenings as $jobOpening)
                            <tr class="hover:bg-orange-50/30">
                                <td class="px-4 py-3 font-medium text-gray-900">{{ $jobOpening->title }}</td>
                                <td class="px-4 py-3">{{ $jobOpening->type === 'magang' ? 'Magang' : 'Kerja' }}</td>
                                <td class="px-4 py-3 text-gray-700">{{ $jobOpening->deadline?->format('d-m-Y') ?? '-' }}</td>
                                <td class="px-4 py-3">
                                    <span class="inline-flex items-center rounded-full px-2.5 py-1 text-xs font-semibold {{ $jobOpening->is_active ? 'bg-green-100 text-green-700' : 'bg-gray-100 text-gray-700' }}">
                                        {{ $jobOpening->is_active ? 'Aktif' : 'Nonaktif' }}
                                    </span>
                                </td>
                                <td class="px-4 py-3">{{ $jobOpening->applications_count }}</td>
                                <td class="px-4 py-3">
                                    <div class="flex flex-wrap items-center gap-2">
                                        <a href="{{ route('admin.jobs.edit', $jobOpening) }}" class="text-orange-600 hover:text-orange-700 font-semibold">Ubah</a>
                                        <form method="POST" action="{{ route('admin.jobs.toggle', $jobOpening) }}">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="text-gray-700 hover:text-orange-700 font-semibold">{{ $jobOpening->is_active ? 'Nonaktifkan' : 'Aktifkan' }}</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr><td colspan="6" class="px-4 py-8 text-center text-gray-500">Belum ada lowongan.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            @if ($jobOpenings->hasPages())
                <div class="px-4 py-3 border-t border-gray-100">{{ $jobOpenings->links() }}</div>
            @endif
        </div>
    </div>
@endsection
