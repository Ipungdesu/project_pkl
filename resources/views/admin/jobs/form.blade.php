<div>
    <label class="block text-sm font-semibold text-gray-700 mb-1" for="title">Judul</label>
    <input id="title" name="title" type="text" required value="{{ old('title', $jobOpening->title) }}" class="w-full rounded-lg border-gray-200 text-sm focus:border-orange-400 focus:ring-orange-400">
</div>
<div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
    <div>
        <label class="block text-sm font-semibold text-gray-700 mb-1" for="type">Tipe</label>
        <select id="type" name="type" required class="w-full rounded-lg border-gray-200 text-sm focus:border-orange-400 focus:ring-orange-400">
            <option value="magang" @selected(old('type', $jobOpening->type) === 'magang')>Magang</option>
            <option value="kerja" @selected(old('type', $jobOpening->type) === 'kerja')>Kerja</option>
        </select>
    </div>
    <div>
        <label class="block text-sm font-semibold text-gray-700 mb-1" for="deadline">Deadline</label>
        <input id="deadline" name="deadline" type="date" value="{{ old('deadline', optional($jobOpening->deadline)->format('Y-m-d')) }}" class="w-full rounded-lg border-gray-200 text-sm focus:border-orange-400 focus:ring-orange-400">
    </div>
</div>
<div>
    <label class="block text-sm font-semibold text-gray-700 mb-1" for="description">Deskripsi</label>
    <textarea id="description" name="description" rows="4" required class="w-full rounded-lg border-gray-200 text-sm focus:border-orange-400 focus:ring-orange-400">{{ old('description', $jobOpening->description) }}</textarea>
</div>
<div>
    <label class="block text-sm font-semibold text-gray-700 mb-1" for="requirements">Persyaratan</label>
    <textarea id="requirements" name="requirements" rows="4" class="w-full rounded-lg border-gray-200 text-sm focus:border-orange-400 focus:ring-orange-400">{{ old('requirements', $jobOpening->requirements) }}</textarea>
</div>
<div class="flex items-center gap-2">
    <input id="is_active" name="is_active" type="checkbox" value="1" @checked(old('is_active', $jobOpening->is_active ?? true)) class="rounded border-gray-300 text-orange-500 focus:ring-orange-400">
    <label for="is_active" class="text-sm text-gray-700">Aktif</label>
</div>
