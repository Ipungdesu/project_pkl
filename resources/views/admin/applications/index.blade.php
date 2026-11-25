@extends('layouts.app')

@section('title', 'Daftar Lamaran')

@section('content')
    <div class="space-y-6">
        <div class="bg-white border border-orange-100 rounded-2xl p-6 shadow-sm">
            <h1 class="text-2xl font-extrabold text-gray-900 tracking-tight">Daftar Lamaran</h1>
            <p class="text-sm text-gray-600 mt-1">Kelola lamaran masuk (selain draft), filter, dan tinjau detail pelamar.</p>
        </div>

        <div class="bg-white border border-gray-100 rounded-2xl p-5 shadow-sm">
            <form method="GET" action="{{ route('admin.applications.index') }}" class="grid grid-cols-1 md:grid-cols-5 gap-3 items-end">
                <div>
                    <label class="block text-xs font-semibold text-gray-600 mb-1">Tipe</label>
                    <select name="type" class="w-full rounded-lg border-gray-200 text-sm focus:border-orange-400 focus:ring-orange-400">
                        <option value="">Semua</option>
                        <option value="magang" @selected(($filters['type'] ?? '') === 'magang')>Magang</option>
                        <option value="kerja" @selected(($filters['type'] ?? '') === 'kerja')>Kerja</option>
                    </select>
                </div>
                <div>
                    <label class="block text-xs font-semibold text-gray-600 mb-1">Status</label>
                    <select name="status" class="w-full rounded-lg border-gray-200 text-sm focus:border-orange-400 focus:ring-orange-400">
                        <option value="">Semua</option>
                        @foreach (['submitted' => 'Submitted', 'in_review' => 'In Review', 'interview' => 'Interview', 'accepted' => 'Accepted', 'rejected' => 'Rejected'] as $value => $label)
                            <option value="{{ $value }}" @selected(($filters['status'] ?? '') === $value)>{{ $label }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="block text-xs font-semibold text-gray-600 mb-1">Lowongan</label>
                    <select name="job_opening_id" class="w-full rounded-lg border-gray-200 text-sm focus:border-orange-400 focus:ring-orange-400">
                        <option value="">Semua</option>
                        @foreach ($jobOpenings as $job)
                            <option value="{{ $job->id }}" @selected((string) ($filters['job_opening_id'] ?? '') === (string) $job->id)>{{ $job->title }} ({{ $job->type }})</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="block text-xs font-semibold text-gray-600 mb-1">Cari nama/email</label>
                    <input type="text" name="search" value="{{ $filters['search'] ?? '' }}" placeholder="Nama atau email" class="w-full rounded-lg border-gray-200 text-sm focus:border-orange-400 focus:ring-orange-400">
                </div>
                <div class="flex gap-2">
                    <button type="submit" class="inline-flex items-center justify-center rounded-lg bg-orange-500 hover:bg-orange-600 text-white px-4 py-2 text-sm font-semibold transition w-full">Filter</button>
                    <a href="{{ route('admin.applications.index') }}" class="inline-flex items-center justify-center rounded-lg border border-gray-200 hover:bg-gray-50 text-gray-700 px-4 py-2 text-sm font-semibold transition">Reset</a>
                </div>
            </form>
        </div>

        <div class="bg-white border border-gray-100 rounded-2xl shadow-sm overflow-hidden">
            <div class="overflow-x-auto">
                <table class="min-w-full text-sm">
                    <thead class="bg-orange-50/60 text-gray-700">
                        <tr>
                            <th class="text-left font-semibold px-4 py-3">Nama</th>
                            <th class="text-left font-semibold px-4 py-3">Lowongan</th>
                            <th class="text-left font-semibold px-4 py-3">Status</th>
                            <th class="text-left font-semibold px-4 py-3">Tanggal Submit</th>
                            <th class="text-left font-semibold px-4 py-3">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @forelse ($applications as $application)
                            @php($applicantName = $application->applicant?->profile?->full_name ?? $application->applicant?->name ?? '-')
                            <tr class="hover:bg-orange-50/30">
                                <td class="px-4 py-3">
                                    <div class="font-medium text-gray-900">{{ $applicantName }}</div>
                                    <div class="text-xs text-gray-500">{{ $application->applicant?->email }}</div>
                                </td>
                                <td class="px-4 py-3">
                                    <div class="text-gray-900">{{ $application->jobOpening?->title ?? '-' }}</div>
                                    <div class="text-xs text-gray-500">{{ $application->jobOpening?->type === 'magang' ? 'Magang' : 'Kerja' }}</div>
                                </td>
                                <td class="px-4 py-3">
                                    <span class="inline-flex items-center rounded-full px-2.5 py-1 text-xs font-semibold bg-orange-100 text-orange-700">{{ $application->status }}</span>
                                </td>
                                <td class="px-4 py-3 text-gray-700">{{ $application->submitted_at?->format('d-m-Y H:i') ?? '-' }}</td>
                                <td class="px-4 py-3">
                                    <a href="{{ route('admin.applications.show', $application) }}" class="text-orange-600 hover:text-orange-700 font-semibold">Detail</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-4 py-8 text-center text-gray-500">Tidak ada lamaran yang sesuai filter.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            @if ($applications->hasPages())
                <div class="px-4 py-3 border-t border-gray-100">{{ $applications->links() }}</div>
            @endif
        </div>
    </div>
@endsection
