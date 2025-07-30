<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">Tambah Video Pembelajaran</h2>
    </x-slot>

    <div class="max-w-2xl mx-auto mt-8">
        <form action="{{ route('admin.videos.store') }}" method="POST" class="space-y-6">
            @csrf

            <div>
                <label for="title" class="block font-semibold mb-1">Judul Video</label>
                <input type="text" name="title" id="title"
                    class="w-full rounded border px-3 py-2" required autofocus
                    value="{{ old('title') }}">
                @error('title')
                    <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label for="description" class="block font-semibold mb-1">Deskripsi</label>
                <textarea name="description" id="description" rows="4"
                    class="w-full rounded border px-3 py-2" required>{{ old('description') }}</textarea>
                @error('description')
                    <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label for="youtube_url" class="block font-semibold mb-1">Link YouTube</label>
                <input type="url" name="youtube_url" id="youtube_url"
                    class="w-full rounded border px-3 py-2" required
                    placeholder="https://www.youtube.com/watch?v=xxxxxx"
                    value="{{ old('youtube_url') }}">
                <div class="text-xs text-gray-500">Contoh: https://www.youtube.com/watch?v=XXXXXX</div>
                @error('youtube_url')
                    <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label for="target_audience" class="block font-semibold mb-1">Ditujukan Untuk</label>
                <select name="target_audience" id="target_audience" class="w-full rounded border px-3 py-2" required>
                    <option value="semua" {{ old('target_audience') == 'semua' ? 'selected' : '' }}>Semua</option>
                    <option value="petani" {{ old('target_audience') == 'petani' ? 'selected' : '' }}>Petani</option>
                    <option value="pembeli" {{ old('target_audience') == 'pembeli' ? 'selected' : '' }}>Pembeli</option>
                </select>
                @error('target_audience')
                    <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded font-semibold">
                    Simpan Video
                </button>
                <a href="{{ route('admin.videos.index') }}" class="ml-4 text-gray-600 hover:underline">Batal</a>
            </div>
        </form>
    </div>
</x-app-layout>
