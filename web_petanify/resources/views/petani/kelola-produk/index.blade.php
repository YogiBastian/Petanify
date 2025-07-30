<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800">
            🧺 Manajemen Produk Saya
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto mt-10 px-4">
        {{-- Alert Sukses --}}
        @if(session('success'))
            <div class="bg-green-100 border border-green-300 text-green-800 px-6 py-4 rounded-lg mb-6 text-center font-medium shadow">
                {{ session('success') }}
            </div>
        @endif

        {{-- Header dan Tombol Tambah --}}
        <div class="flex justify-between items-center mb-8">
            <h3 class="text-xl font-bold text-gray-700">📦 Daftar Produk</h3>
            <a href="{{ route('petani.kelola-produk.create') }}"
               class="inline-flex items-center gap-2 px-5 py-2 bg-green-600 text-white font-medium rounded-xl shadow-md hover:bg-green-700 transition duration-200">
                <i class="fas fa-plus"></i> Tambah Produk
            </a>
        </div>

        {{-- Daftar Produk --}}
        @if ($products->count() > 0)
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-4 gap-6">
                @foreach ($products as $p)
                    <div class="bg-white border border-gray-200 rounded-2xl shadow-sm hover:shadow-lg transition duration-300 flex flex-col p-4 group relative">
                        {{-- Gambar Produk --}}
                        @if($p->foto)
                            <img src="{{ asset('storage/'.$p->foto) }}"
                                 class="w-full h-40 object-cover rounded-xl mb-4 group-hover:scale-[1.03] transition-transform duration-200"
                                 alt="{{ $p->nama_produk }}">
                        @else
                            <div class="w-full h-40 flex items-center justify-center bg-gray-100 rounded-xl mb-4">
                                <span class="text-gray-400">No Image</span>
                            </div>
                        @endif

                        {{-- Status dan Kategori --}}
                        <div class="flex justify-between items-center text-xs font-semibold mb-2">
                            <span class="{{ $p->status === 'aktif' ? 'bg-green-100 text-green-700' : 'bg-gray-200 text-gray-600' }} px-3 py-0.5 rounded-full">
                                {{ ucfirst($p->status) }}
                            </span>
                            <span class="bg-blue-100 text-blue-700 px-3 py-0.5 rounded-full">
                                {{ $p->kategori->nama_kategori ?? '-' }}
                            </span>
                        </div>

                        {{-- Nama Produk --}}
                        <h4 class="text-base font-bold text-gray-900 truncate mb-1">
                            {{ $p->nama_produk }}
                        </h4>

                        {{-- Harga --}}
                        <div class="text-green-600 font-bold text-sm mb-1">
                            Rp{{ number_format($p->harga, 0, ',', '.') }}
                        </div>

                        {{-- Stok dan Diskon --}}
                        <div class="text-xs text-gray-600 mb-2">
                            Stok: <b>{{ $p->stok }}</b> {{ $p->satuan }}
                            @if($p->diskon && $p->diskon > 0)
                                <span class="ml-2 bg-yellow-100 text-yellow-700 px-2 py-0.5 rounded-full">
                                    Diskon: Rp{{ number_format($p->diskon, 0, ',', '.') }}
                                </span>
                            @endif
                        </div>

                        {{-- Deskripsi Singkat --}}
                        <div class="text-xs text-gray-500 mb-4 line-clamp-3">
                            {!! \Illuminate\Support\Str::limit(strip_tags($p->deskripsi), 70) !!}
                        </div>

                        {{-- Aksi --}}
                        <div class="flex gap-2 mt-auto">
                            <a href="{{ route('petani.kelola-produk.edit', $p->id) }}"
                               class="flex-1 text-center px-4 py-1 rounded bg-blue-50 text-blue-700 hover:bg-blue-100 text-xs font-semibold transition">
                                Edit
                            </a>
                            <form action="{{ route('petani.kelola-produk.destroy', $p->id) }}" method="POST" onsubmit="return confirm('Hapus produk ini?')" class="flex-1">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="w-full px-4 py-1 rounded bg-red-50 text-red-700 hover:bg-red-100 text-xs font-semibold transition">
                                    Hapus
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            {{-- Empty State --}}
            <div class="text-center py-24 text-gray-400 text-lg font-medium">
                Belum ada produk.<br>
                <a href="{{ route('petani.kelola-produk.create') }}"
                   class="text-green-600 hover:underline font-semibold mt-2 inline-block">
                    Tambah produk sekarang →
                </a>
            </div>
        @endif
    </div>
</x-app-layout>
