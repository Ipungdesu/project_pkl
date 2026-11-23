@extends('layouts.app')

@section('title', 'Kelola Admin')

@section('content')
    <div class="flex items-start justify-between gap-4 mb-6">
        <div>
            <h1 class="text-2xl font-extrabold text-gray-900 tracking-tight">Kelola Admin</h1>
            <p class="text-sm text-gray-500 mt-1">Buat dan kelola akun admin oleh operator.</p>
        </div>
        <a href="{{ route('operator.admins.create') }}" class="inline-flex items-center justify-center rounded-full bg-orange-500 hover:bg-orange-600 text-white px-5 py-2.5 text-sm font-semibold transition">Buat admin</a>
    </div>

    @if (session('status'))
        <div class="mb-4 rounded-lg border border-green-200 bg-green-50 p-4 text-sm text-green-800" role="status">{{ session('status') }}</div>
    @endif

    <div class="bg-white border border-orange-100 rounded-2xl shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full text-sm">
                <thead class="bg-orange-50/60 text-left text-gray-600">
                    <tr>
                        <th class="px-5 py-3 font-semibold">Nama</th>
                        <th class="px-5 py-3 font-semibold">Email</th>
                        <th class="px-5 py-3 font-semibold">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse ($admins as $admin)
                        <tr>
                            <td class="px-5 py-3 font-medium text-gray-900">{{ $admin->name }}</td>
                            <td class="px-5 py-3 text-gray-700">{{ $admin->email }}</td>
                            <td class="px-5 py-3">
                                <div class="flex items-center gap-3">
                                    <a href="{{ route('operator.admins.edit', $admin) }}" class="text-orange-600 hover:text-orange-700 font-semibold">Edit</a>
                                    <form method="POST" action="{{ route('operator.admins.destroy', $admin) }}" onsubmit="return confirm('Hapus admin ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-700 font-semibold">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="px-5 py-6 text-center text-gray-500">Belum ada admin.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
