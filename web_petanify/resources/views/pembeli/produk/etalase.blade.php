<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800">
            🛒 Etalase Produk Petani - {{ $petani->name }}
        </h2>
    </x-slot>

    <div class="max-w-6xl mx-auto py-8 px-4">
        {{-- Informasi Petani --}}
        <div class="bg-white p-6 rounded-2xl shadow-lg flex items-center gap-5 mb-10 border border-green-100">
            <img src="{{ $petani->foto ? asset('storage/foto_profil/' . $petani->foto) : asset('img/default-user.png') }}"
                alt="Foto Petani"
                class="w-20 h-20 rounded-full border-4 border-green-500 object-cover shadow-md">

            <div>
                <h3 class="text-2xl font-extrabold text-gray-900">{{ $petani->name }}</h3>
                <div class="mt-1">
                    <span class="inline-block bg-green-100 text-green-800 text-sm px-3 py-1 rounded-full">
                        {{ $petani->email }}
                    </span>
                </div>
            </div>
        </div>

        {{-- Daftar Produk --}}
        <h4 class="font-semibold text-xl text-gray-700 mb-6">🛍️ Daftar Produk</h4>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-4 gap-6">
            @forelse($products as $product)
                <div class="bg-white border border-gray-200 rounded-xl overflow-hidden shadow-sm hover:shadow-xl transition duration-300">
                    <img src="{{ $product->foto ? asset('storage/' . $product->foto) : asset('img/default-product.png') }}"
                        alt="Foto Produk"
                        class="w-full h-40 object-cover">

                    <div class="p-4">
                        <div class="font-semibold text-lg text-gray-800 mb-1 truncate">
                            {{ $product->nama_produk }}
                        </div>

                        <div class="text-green-600 font-bold text-sm mb-3">
                            Rp {{ number_format($product->harga, 0, ',', '.') }}
                        </div>

                        <a href="{{ route('pembeli.produk.show', $product->id) }}"
                            class="inline-block bg-green-600 hover:bg-green-700 text-white text-sm font-medium px-4 py-2 rounded-lg transition">
                            Lihat Detail
                        </a>
                    </div>
                </div>
            @empty
                <div class="col-span-full text-center text-gray-500 text-lg font-medium">
                    Belum ada produk yang ditampilkan.
                </div>
            @endforelse
        </div>
    </div>
</x-app-layout>
