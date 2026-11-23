@if ($errors->any())
    <div class="mb-4 rounded-lg border border-red-200 bg-red-50 p-4 text-sm text-red-700" role="alert">
        <ul class="list-disc pl-5 space-y-1">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="{{ $action }}" class="space-y-4 max-w-xl bg-white border border-orange-100 rounded-2xl p-6 shadow-sm">
    @csrf
    @method($method)

    <div>
        <label for="name" class="block text-sm font-semibold text-gray-700 mb-1">Nama</label>
        <input id="name" name="name" type="text" value="{{ old('name', $admin?->name) }}" required class="w-full rounded-xl border border-gray-300 px-3 py-2.5 text-sm focus:border-orange-500 focus:ring-2 focus:ring-orange-100 outline-none">
    </div>

    <div>
        <label for="email" class="block text-sm font-semibold text-gray-700 mb-1">Email</label>
        <input id="email" name="email" type="email" value="{{ old('email', $admin?->email) }}" required class="w-full rounded-xl border border-gray-300 px-3 py-2.5 text-sm focus:border-orange-500 focus:ring-2 focus:ring-orange-100 outline-none">
    </div>

    <div>
        <label for="password" class="block text-sm font-semibold text-gray-700 mb-1">Password {{ $passwordRequired ? '' : '(kosongkan jika tidak diubah)' }}</label>
        <input id="password" name="password" type="password" @required($passwordRequired) autocomplete="new-password" class="w-full rounded-xl border border-gray-300 px-3 py-2.5 text-sm focus:border-orange-500 focus:ring-2 focus:ring-orange-100 outline-none">
    </div>

    <div>
        <label for="password_confirmation" class="block text-sm font-semibold text-gray-700 mb-1">Konfirmasi password</label>
        <input id="password_confirmation" name="password_confirmation" type="password" @required($passwordRequired) autocomplete="new-password" class="w-full rounded-xl border border-gray-300 px-3 py-2.5 text-sm focus:border-orange-500 focus:ring-2 focus:ring-orange-100 outline-none">
    </div>

    <div class="flex items-center gap-3 pt-2">
        <button type="submit" class="inline-flex items-center justify-center rounded-full bg-orange-500 hover:bg-orange-600 text-white px-5 py-2.5 text-sm font-semibold transition">Simpan admin</button>
        <a href="{{ route('operator.admins.index') }}" class="text-sm font-medium text-gray-600 hover:text-orange-600">Batal</a>
    </div>
</form>
