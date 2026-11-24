@extends('layouts.app')

@section('title', 'Buat Admin')

@section('content')
    <div class="mb-6">
        <h1 class="text-2xl font-extrabold text-gray-900 tracking-tight">Buat Admin</h1>
        <p class="text-sm text-gray-500 mt-1">Tambahkan akun admin baru.</p>
    </div>

    @include('operator.admins.form', [
        'action' => route('operator.admins.store'),
        'method' => 'POST',
        'admin' => null,
        'passwordRequired' => true,
    ])
@endsection
