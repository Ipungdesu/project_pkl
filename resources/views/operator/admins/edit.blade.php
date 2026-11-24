@extends('layouts.app')

@section('title', 'Edit Admin')

@section('content')
    <div class="mb-6">
        <h1 class="text-2xl font-extrabold text-gray-900 tracking-tight">Edit Admin</h1>
        <p class="text-sm text-gray-500 mt-1">Perbarui data akun admin.</p>
    </div>

    @include('operator.admins.form', [
        'action' => route('operator.admins.update', $admin),
        'method' => 'PUT',
        'admin' => $admin,
        'passwordRequired' => false,
    ])
@endsection
