@extends('layouts.app')

@section('title', 'Dashboard Operator')

@section('content')
    <div class="bg-white border border-orange-100 rounded-2xl p-6 shadow-sm">
        <h1 class="text-2xl font-extrabold text-gray-900 tracking-tight">Operator dashboard</h1>
        <p class="text-sm text-gray-600 mt-2">Kelola area operator dan administrasi akun admin.</p>
        <div class="mt-5 flex flex-wrap gap-3">
            <a href="{{ route('operator.admins.index') }}" class="inline-flex items-center justify-center rounded-full bg-orange-500 hover:bg-orange-600 text-white px-5 py-2.5 text-sm font-semibold transition">Kelola Admin</a>
        </div>
    </div>
@endsection
