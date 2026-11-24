@extends('layouts.app')

@section('title', 'Kelola Magang')

@section('content')
    <div class="space-y-6">
        <div class="bg-white border border-orange-100 rounded-2xl p-6 shadow-sm">
            <h1 class="text-2xl font-extrabold text-gray-900 tracking-tight">Kelola Magang</h1>
            <p class="text-sm text-gray-600 mt-1">Daftar pengguna magang beserta penempatan (intern placement).</p>
        </div>

        @if (session('status'))
            <div class="rounded-xl border border-green-200 bg-green-50 px-4 py-3 text-sm text-green-800">{{ session('status') }}</div>
        @endif

        <div class="bg-white border border-gray-100 rounded-2xl shadow-sm overflow-hidden">
            <div class="overflow-x-auto">
                <table class="min-w-full text-sm">
                    <thead class="bg-orange-50/60 text-gray-700">
                        <tr>
                            <th class="text-left font-semibold px-4 py-3">Nama</th>
                            <th class="text-left font-semibold px-4 py-3">Email</th>
                            <th class="text-left font-semibold px-4 py-3">Lowongan / Lamaran</th>
                            <th class="text-left font-semibold px-4 py-3">Penempatan</th>
                            <th class="text-left font-semibold px-4 py-3">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @forelse ($interns as $intern)
                            @php($latestApplication = $intern->applications->first())
                            @php($placement = $latestApplication?->internPlacement)
                            <tr class="hover:bg-orange-50/30 align-top">
                                <td class="px-4 py-3 font-medium text-gray-900">{{ $intern->profile?->full_name ?? $intern->name }}</td>
                                <td class="px-4 py-3 text-gray-700">{{ $intern->email }}</td>
                                <td class="px-4 py-3 text-gray-700">
                                    @if ($latestApplication)
                                        <div>{{ $latestApplication->jobOpening?->title ?? '-' }}</div>
                                        <div class="text-xs text-gray-500">Status: {{ $latestApplication->status }}</div>
                                    @else
                                        <span class="text-gray-400">-</span>
                                    @endif
                                </td>
                                <td class="px-4 py-3 text-gray-700">
                                    @if ($placement)
                                        <div><span class="text-gray-500">Divisi:</span> {{ $placement->division ?? '-' }}</div>
                                        <div><span class="text-gray-500">Mentor:</span> {{ $placement->mentor_name ?? '-' }}</div>
                                        <div><span class="text-gray-500">Periode:</span> {{ $placement->start_date?->format('d-m-Y') ?? '-' }} s/d {{ $placement->end_date?->format('d-m-Y') ?? '-' }}</div>
                                        <div class="mt-1"><span class="inline-flex items-center rounded-full px-2.5 py-0.5 text-xs font-semibold bg-orange-100 text-orange-700">{{ $placement->status }}</span></div>
                                    @else
                                        <span class="text-gray-400">Belum ada penempatan</span>
                                    @endif
                                </td>
                                <td class="px-4 py-3 space-y-1">
                                    @if ($latestApplication && $latestApplication->status !== 'draft')
                                        <div><a href="{{ route('admin.applications.show', $latestApplication) }}" class="text-orange-600 hover:text-orange-700 font-semibold">Detail Lamaran</a></div>
                                    @endif
                                    @if ($placement)
                                        <div><a href="{{ route('admin.interns.placements.edit', $placement) }}" class="text-orange-600 hover:text-orange-700 font-semibold">Ubah Penempatan</a></div>
                                    @endif
                                    @if (! $latestApplication)
                                        <span class="text-gray-400">-</span>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr><td colspan="5" class="px-4 py-8 text-center text-gray-500">Belum ada pengguna magang terdaftar.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            @if ($interns->hasPages())
                <div class="px-4 py-3 border-t border-gray-100">{{ $interns->links() }}</div>
            @endif
        </div>
    </div>
@endsection
