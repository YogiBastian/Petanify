<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">Tambah Produk Baru</h2>
    </x-slot>

    <div class="max-w-2xl mx-auto mt-10">
        @if(session('success'))
            <div class="bg-green-100 text-green-700 p-4 rounded mb-6 text-center font-semibold">{{ session('success') }}</div>
        @endif

        <div class="bg-white rounded-2xl shadow-lg p-8 border border-gray-100">
            <form action="{{ route('petani.kelola-produk.store') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
                @csrf

                <div>
                    <label class="block font-semibold mb-1">Nama Produk <span class="text-red-500">*</span></label>
                    <input type="text" name="nama_produk" class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-green-200 focus:outline-none" required value="{{ old('nama_produk') }}">
                    @error('nama_produk') <small class="text-red-500">{{ $message }}</small>@enderror
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block font-semibold mb-1">Harga (Rp) <span class="text-red-500">*</span></label>
                        <input type="number" name="harga" class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-green-200 focus:outline-none" required value="{{ old('harga') }}">
                        @error('harga') <small class="text-red-500">{{ $message }}</small>@enderror
                    </div>
                    <div>
                        <label class="block font-semibold mb-1">Stok <span class="text-red-500">*</span></label>
                        <input type="number" name="stok" class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-green-200 focus:outline-none" required min="0" value="{{ old('stok', 0) }}">
                        @error('stok') <small class="text-red-500">{{ $message }}</small>@enderror
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block font-semibold mb-1">Satuan</label>
                        <input type="text" name="satuan" class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-green-200 focus:outline-none" maxlength="20" value="{{ old('satuan') }}" placeholder="Contoh: kg, liter, dus">
                        @error('satuan') <small class="text-red-500">{{ $message }}</small>@enderror
                    </div>
                    <div>
                        <label class="block font-semibold mb-1">Diskon (Rp)</label>
                        <input type="number" name="diskon" class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-green-200 focus:outline-none" min="0" value="{{ old('diskon') }}">
                        @error('diskon') <small class="text-red-500">{{ $message }}</small>@enderror
                    </div>
                </div>

                <div>
                    <label class="block font-semibold mb-1">Deskripsi</label>
                    <textarea name="deskripsi" rows="4" class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-green-200 focus:outline-none">{{ old('deskripsi') }}</textarea>
                    @error('deskripsi') <small class="text-red-500">{{ $message }}</small>@enderror
                </div>

                <div>
                    <label class="block font-semibold mb-1">Kategori <span class="text-red-500">*</span></label>
                    <select name="kategori_id" class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-green-200 focus:outline-none" required>
                        <option value="">-- Pilih Kategori --</option>
                        @foreach ($kategoris as $id => $nama)
                            <option value="{{ $id }}" {{ old('kategori_id') == $id ? 'selected' : '' }}>{{ $nama }}</option>
                        @endforeach
                    </select>
                    @error('kategori_id') <small class="text-red-500">{{ $message }}</small>@enderror
                </div>

                <div>
                    <label class="block font-semibold mb-1">Foto Produk</label>
                    <input type="file" name="foto" class="w-full border border-gray-300 rounded-lg px-4 py-2 file:bg-green-100 file:rounded file:px-3 file:py-2 file:mr-3">
                    @error('foto') <small class="text-red-500">{{ $message }}</small>@enderror
                </div>

                <div class="flex gap-4 pt-3">
                    <button class="px-6 py-2 rounded-lg bg-green-600 hover:bg-green-700 text-white font-semibold transition shadow" type="submit">
                        Simpan
                    </button>
                    <a href="{{ route('petani.kelola-produk.index') }}" class="px-6 py-2 rounded-lg bg-gray-200 text-gray-700 font-semibold hover:bg-gray-300 transition shadow">Batal</a>
                </div>
            </form>
        </div>
    </div>

</x-app-layout>
