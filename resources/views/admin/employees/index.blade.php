@extends('layouts.app')

@section('title', 'Kelola Karyawan')

@section('content')
    <div class="space-y-6">
        <div class="bg-white border border-orange-100 rounded-2xl p-6 shadow-sm">
            <h1 class="text-2xl font-extrabold text-gray-900 tracking-tight">Kelola Karyawan</h1>
            <p class="text-sm text-gray-600 mt-1">Daftar pengguna dengan role karyawan dan status lamaran terakhir.</p>
        </div>

        <div class="bg-white border border-gray-100 rounded-2xl shadow-sm overflow-hidden">
            <div class="overflow-x-auto">
                <table class="min-w-full text-sm">
                    <thead class="bg-orange-50/60 text-gray-700">
                        <tr>
                            <th class="text-left font-semibold px-4 py-3">Nama</th>
                            <th class="text-left font-semibold px-4 py-3">Email</th>
                            <th class="text-left font-semibold px-4 py-3">Lamaran Terakhir</th>
                            <th class="text-left font-semibold px-4 py-3">Status</th>
                            <th class="text-left font-semibold px-4 py-3">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @forelse ($employees as $employee)
                            @php($latestApplication = $employee->applications->first())
                            <tr class="hover:bg-orange-50/30">
                                <td class="px-4 py-3 font-medium text-gray-900">{{ $employee->profile?->full_name ?? $employee->name }}</td>
                                <td class="px-4 py-3 text-gray-700">{{ $employee->email }}</td>
                                <td class="px-4 py-3 text-gray-700">{{ $latestApplication?->jobOpening?->title ?? '-' }}</td>
                                <td class="px-4 py-3">
                                    @if ($latestApplication)
                                        <span class="inline-flex items-center rounded-full px-2.5 py-1 text-xs font-semibold bg-orange-100 text-orange-700">{{ $latestApplication->status }}</span>
                                    @else
                                        <span class="text-gray-400">-</span>
                                    @endif
                                </td>
                                <td class="px-4 py-3">
                                    @if ($latestApplication && $latestApplication->status !== 'draft')
                                        <a href="{{ route('admin.applications.show', $latestApplication) }}" class="text-orange-600 hover:text-orange-700 font-semibold">Detail Lamaran</a>
                                    @else
                                        <span class="text-gray-400">-</span>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr><td colspan="5" class="px-4 py-8 text-center text-gray-500">Belum ada karyawan terdaftar.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            @if ($employees->hasPages())
                <div class="px-4 py-3 border-t border-gray-100">{{ $employees->links() }}</div>
            @endif
        </div>
    </div>
@endsection
