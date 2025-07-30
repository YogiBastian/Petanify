@extends('layouts.app')
@section('title', $product->nama_produk)

@section('content')
<div class="max-w-5xl mx-auto py-8 px-2">
    <div class="bg-white rounded-lg shadow flex flex-col md:flex-row gap-8 p-6">
        {{-- Gambar Produk --}}
        <div class="flex-shrink-0 w-full md:w-1/3 flex justify-center items-start">
            <img src="{{ asset('storage/' . $product->foto) }}"
                 alt="{{ $product->nama_produk }}"
                 class="rounded-lg shadow-lg w-full object-contain max-h-80 bg-white">
        </div>

        {{-- Detail Produk --}}
        <div class="flex-1">
            <h2 class="text-2xl font-bold mb-1">{{ $product->nama_produk }}</h2>

            <div class="flex items-center gap-3 mb-2">
                <div class="flex gap-0.5">
                    @for ($i = 1; $i <= 5; $i++)
                        <svg class="w-5 h-5 {{ $i <= round($averageRating) ? 'text-yellow-400' : 'text-gray-300' }}"
                             fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.518 4.674a1 1 0 00.95.69h4.917c.969 0 1.371 1.24.588 1.81l-3.976 2.89a1 1 0 00-.364 1.118l1.518 4.674c.3.921-.755 1.688-1.538 1.118l-3.976-2.89a1 1 0 00-1.176 0l-3.976 2.89c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.364-1.118L2.025 10.1c-.783-.57-.38-1.81.588-1.81h4.917a1 1 0 00.95-.69l1.518-4.674z"/>
                        </svg>
                    @endfor
                </div>
                <span class="text-sm text-gray-700 font-medium">
                    {{ number_format($averageRating, 1) }} / 5
                    ({{ $product->reviews_count }} {{ Str::plural('Review', $product->reviews_count) }})
                </span>
                <span class="mx-2 text-gray-300">|</span>
                <span class="text-sm text-gray-500">SKU: #{{ $product->id }}</span>
            </div>

            <div class="text-green-700 text-2xl font-bold mb-1">
                Rp {{ number_format($product->harga, 0, ',', '.') }}
            </div>

            <div class="mb-2 text-sm">
                Status:
                <span class="font-semibold {{ $product->stok > 0 ? 'text-green-700' : 'text-red-500' }}">
                    {{ $product->stok > 0 ? 'In stock' : 'Out of stock' }}
                </span>
            </div>

            <div class="mb-3 text-sm text-gray-700">
                Stok: {{ $product->stok }} {{ $product->satuan }}
            </div>

            {{-- Deskripsi Singkat + Toggle --}}
            <div class="product-description mb-4">
                <p class="text-gray-800 font-semibold mb-1">Deskripsi Produk:</p>
                <p class="short-description text-gray-700">
                    {{ Str::limit(strip_tags($product->deskripsi), 150) }}
                </p>
                <p class="full-description text-gray-700 hidden">
                    {{ $product->deskripsi }}
                </p>
                <button class="toggle-description text-green-700 font-semibold mt-1 underline text-sm">
                    Read more
                </button>
            </div>

            <form action="{{ route('pembeli.keranjang.add') }}" method="POST" class="flex items-center gap-3 mb-6">
                @csrf
                <label>Quantity:</label>
                <input type="number" name="quantity" value="1" min="1" max="{{ $product->stok }}"
                       class="border rounded px-2 py-1 w-16" required>
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                <button class="bg-green-600 hover:bg-green-700 text-white font-bold px-6 py-2 rounded" type="submit">
                    Add to cart
                </button>
            </form>

            @if(session('success'))
                <div class="text-green-700 font-semibold mt-2">{{ session('success') }}</div>
            @endif

            <div class="mb-2">
                <strong>Kategori:</strong>
                @if($product->kategori)
                    <span class="inline-block bg-green-50 text-green-700 rounded px-2 py-1 ml-1 font-semibold">
                        {{ $product->kategori->nama_kategori }}
                    </span>
                @endif
            </div>
        </div>
    </div>
</div>

{{-- Card Profil Penjual - Proporsional dan Modern --}}
{{-- Card Profil Penjual - Rata Lebar Card Produk --}}
<div class="mb-6 max-w-5xl mx-auto border border-green-100 rounded-xl bg-white shadow flex items-center gap-4 p-6">
    {{-- Foto Profil --}}
    <div class="w-16 h-16 rounded-full overflow-hidden border-4 border-green-500 bg-gray-100 flex-shrink-0 shadow">
        <img src="{{ $product->user->profile_photo_url ?? asset('img/default-user.png') }}">

    </div>
    {{-- Info Penjual --}}
    <div class="flex-1 flex flex-col justify-center">
        <a href="{{ route('petani.etalase', $product->user_id) }}"
           class="text-green-700 font-bold hover:underline text-lg mb-1 leading-tight">
            {{ $product->user->name }}
        </a>
        @if(!empty($product->user->email))
            <span class="inline-block bg-green-100 text-green-800 text-sm px-3 py-1 rounded-full mb-1">
                {{ $product->user->email }}
            </span>
        @endif
        <span class="text-xs text-gray-500">Klik untuk lihat produk lainnya</span>
    </div>
</div>

{{-- Tab Section --}}
<div class="max-w-5xl mx-auto mt-10 bg-white rounded shadow p-6">
    <div class="border-b flex gap-8">
        <button type="button" id="descTab"
                class="tab-btn font-bold px-2 pb-3 border-b-2 border-green-500 text-green-700"
                onclick="showTab('desc')">
            Description
        </button>
        <button id="reviewTab"
                class="tab-btn font-bold px-2 pb-3 border-b-2 border-transparent text-gray-500"
                onclick="showTab('review')">
            Reviews ({{ $product->reviews_count }})
        </button>
    </div>

    {{-- Deskripsi Lengkap --}}
    <div id="descContent" class="tab-content mt-6">
        <h3 class="font-bold text-lg mb-3">Deskripsi Lengkap Produk</h3>
        <p class="mb-3">{{ $product->deskripsi }}</p>
        <h4 class="font-semibold mt-5 mb-2">Informasi Tambahan</h4>
        <ul class="list-disc ml-6 mt-2 text-sm text-gray-700">
            <li>Harga: Rp {{ number_format($product->harga, 0, ',', '.') }}</li>
            <li>Stok: {{ $product->stok }} {{ $product->satuan }}</li>
            <li>Kategori: {{ $product->kategori->nama_kategori ?? '-' }}</li>
        </ul>
    </div>

    {{-- Review Section --}}
    <div id="reviewContent" class="tab-content mt-6 hidden">
        @forelse($product->reviews as $review)
            <div class="border-b pb-4 mb-4">
                <div class="flex items-center justify-between mb-1">
                    <div class="flex items-center gap-2">
                        <div class="font-bold text-green-700">{{ $review->user->name }}</div>
                        <div class="flex text-yellow-400">
                            @for ($i = 1; $i <= 5; $i++)
                                <svg class="w-4 h-4 {{ $i <= $review->rating ? 'text-yellow-400' : 'text-gray-300' }}" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.518 4.674a1 1 0 00.95.69h4.917c.969 0 1.371 1.24.588 1.81l-3.976 2.89a1 1 0 00-.364 1.118l1.518 4.674c.3.921-.755 1.688-1.538 1.118l-3.976-2.89a1 1 0 00-1.176 0l-3.976 2.89c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.364-1.118L2.025 10.1c-.783-.57-.38-1.81.588-1.81h4.917a1 1 0 00.95-.69l1.518-4.674z"/>
                                </svg>
                            @endfor
                        </div>
                    </div>
                    <span class="text-xs text-gray-400">{{ $review->created_at->diffForHumans() }}</span>
                </div>
                <p class="text-gray-700 text-sm">{{ $review->content }}</p>
            </div>
        @empty
            <p class="text-gray-500">Belum ada review untuk produk ini.</p>
        @endforelse
    </div>
</div>

@push('scripts')
<script>
    function showTab(tab) {
        const descTab = document.getElementById('descTab');
        const reviewTab = document.getElementById('reviewTab');
        const descContent = document.getElementById('descContent');
        const reviewContent = document.getElementById('reviewContent');

        descTab.classList.toggle('border-green-500', tab === 'desc');
        descTab.classList.toggle('text-green-700', tab === 'desc');
        descTab.classList.toggle('text-gray-500', tab !== 'desc');
        descTab.classList.toggle('border-transparent', tab !== 'desc');

        reviewTab.classList.toggle('border-green-500', tab === 'review');
        reviewTab.classList.toggle('text-green-700', tab === 'review');
        reviewTab.classList.toggle('text-gray-500', tab !== 'review');
        reviewTab.classList.toggle('border-transparent', tab !== 'review');

        descContent.classList.toggle('hidden', tab !== 'desc');
        reviewContent.classList.toggle('hidden', tab !== 'review');
    }

    document.addEventListener('DOMContentLoaded', function () {
        showTab('desc');

        // Toggle deskripsi
        const toggleButtons = document.querySelectorAll(".toggle-description");

        toggleButtons.forEach(button => {
            button.addEventListener("click", () => {
                const container = button.closest(".product-description");
                const shortDesc = container.querySelector(".short-description");
                const fullDesc = container.querySelector(".full-description");

                if (fullDesc.classList.contains("hidden")) {
                    fullDesc.classList.remove("hidden");
                    shortDesc.classList.add("hidden");
                    button.textContent = "Show less";
                } else {
                    fullDesc.classList.add("hidden");
                    shortDesc.classList.remove("hidden");
                    button.textContent = "Read more";
                }
            });
        });
    });
</script>
@endpush

<style>
    .tab-btn { transition: all .2s; }
    .tab-content { min-height: 180px; }
    .hidden { display: none; }
</style>
@endsection
