<x-app-layout>
    @push('styles')
    <style>
        .marketplace-container {
            display: flex;
            gap: 2rem;
        }
        .marketplace-sidebar {
            width: 240px;
            background: #fff;
            padding: 24px 16px;
            border-radius: 12px;
            box-shadow: 0 2px 24px rgba(0,0,0,.06);
            min-height: 600px;
        }
        .marketplace-content {
            flex: 1;
        }
        .product-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 32px 20px;
        }
        .product-card {
            background: #fff;
            border-radius: 14px;
            box-shadow: 0 2px 12px rgba(0,0,0,0.05);
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
            transition: box-shadow .2s;
        }
        .product-card:hover {
            box-shadow: 0 8px 32px rgba(0,0,0,0.09);
        }
        .product-card img {
            width: 120px;
            height: 120px;
            object-fit: cover;
            border-radius: 8px;
            margin-bottom: 12px;
        }
        .product-name {
            font-size: 1.05rem;
            font-weight: 600;
            margin-bottom: 5px;
            text-align: center;
        }
        .product-price {
            color: #13A34B;
            font-size: 1.05rem;
            font-weight: bold;
        }
        .product-unit {
            color: #666;
            font-size: 0.93rem;
            margin-bottom: 6px;
        }
        .badge {
            display: inline-block;
            background: #ffe082;
            color: #d84315;
            font-size: 0.78rem;
            border-radius: 6px;
            padding: 3px 7px;
            margin-bottom: 6px;
        }
        .w-full.bg-white.py-3.shadow-sm.border-b {
            margin-bottom: 32px;
        }
    </style>
    @endpush

    <div class="w-full bg-white py-3 shadow-sm border-b">
        <div class="max-w-7xl mx-auto flex items-center gap-2 px-4">
            <form class="flex-1 flex" action="{{ route('pembeli.marketplace.index') }}" method="GET">
                <input type="search" name="search" value="{{ request('search') }}"
                    placeholder="Cari produk..."
                    class="w-full rounded-l-full px-4 py-2 border-t border-b border-l border-gray-200 focus:outline-none"
                    autocomplete="off">
                <button class="rounded-r-full px-6 py-2 bg-green-600 text-white font-semibold">Search</button>
            </form>
        </div>
    </div>

    <div class="marketplace-container">
        <!-- Sidebar -->
        <aside class="marketplace-sidebar" style="background: #f8f8f8;">
            <h3 style="font-size:1.08rem;font-weight:600;margin-bottom:18px;">CATEGORIES</h3>
            <ul style="list-style:none;padding:0 0 12px 0;margin:0 0 28px 0;">
                <li style="margin-bottom:8px;">
                    <a href="{{ route('pembeli.marketplace.index') }}"
                        style="color:{{ empty($kategoriId) ? '#13A34B' : '#111' }};font-weight:bold;text-decoration:none;">
                        All Categories
                    </a>
                </li>
                @foreach($categories as $cat)
                    <li style="margin-bottom:8px;">
                        <a href="{{ route('pembeli.marketplace.index', ['kategori_id' => $cat->id]) }}"
                            style="color:{{ $kategoriId == $cat->id ? '#13A34B' : '#111' }};text-decoration:none;">
                            {{ $cat->nama_kategori }}
                        </a>
                    </li>
                @endforeach
            </ul>
            <hr>
            <h4 style="font-size:1.01rem;margin:18px 0 8px 0;font-weight:500;">By Price</h4>
            <input type="range" min="0" max="100000" value="0" style="width:100%;">
            <hr>
            <h4 style="font-size:1.01rem;margin:18px 0 8px 0;font-weight:500;">By Reviews</h4>
            <div style="color:#ffd700;font-size:1.3rem;">★★★★★</div>
        </aside>

        <!-- Produk -->
        <main class="marketplace-content">
            <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:18px;">
                <div><b>{{ $products->total() }}</b> Produk ditemukan</div>
                <div>
                    <!-- Dropdown Sorting -->
                    <div x-data="{ open: false }" class="relative">
                        <button @click="open = !open"
                            class="border rounded px-4 py-2 bg-white shadow-sm flex items-center gap-2"
                            style="min-width:170px;">
                            {{
                                match(request('sort')) {
                                    'price' => 'Sort by price',
                                    'name' => 'Sort by name',
                                    'rating' => 'Sort by rating',
                                    'sold' => 'Sort by sold',
                                    default => 'Sort by latest',
                                }
                            }}
                            <svg style="width:1rem;" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        <div x-show="open" @click.away="open = false" x-transition
                            class="absolute z-20 mt-2 w-full bg-white border border-gray-200 rounded shadow-md">
                            <form id="sortForm" action="{{ route('pembeli.marketplace.index') }}" method="GET">
                                @if(request('search'))
                                    <input type="hidden" name="search" value="{{ request('search') }}">
                                @endif
                                @if(request('kategori_id'))
                                    <input type="hidden" name="kategori_id" value="{{ request('kategori_id') }}">
                                @endif

                                @foreach([
                                    'latest' => 'Sort by latest',
                                    'price' => 'Sort by price',
                                    'name' => 'Sort by name',
                                    'rating' => 'Sort by rating',
                                    'sold' => 'Sort by sold'
                                ] as $value => $label)
                                    <button type="submit" name="sort" value="{{ $value }}"
                                        class="block w-full text-left px-4 py-2 hover:bg-green-50 {{ request('sort') == $value ? 'text-green-700 font-semibold' : '' }}">
                                        {{ $label }}
                                    </button>
                                @endforeach
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Produk Grid -->
            <div class="product-grid">
                @forelse($products as $product)
                    <a href="{{ route('pembeli.produk.show', $product->id) }}" class="product-card" style="text-decoration:none;">
                        <img src="{{ $product->foto ? asset('storage/'.$product->foto) : asset('images/no-image.png') }}"
                            alt="{{ $product->nama_produk }}">
                        <div class="product-name">{{ $product->nama_produk }}</div>
                        <div class="product-price">Rp{{ number_format($product->harga, 0, ',', '.') }}</div>
                        <div class="product-unit">{{ $product->stok }} {{ $product->satuan }}</div>

                        @if($product->diskon > 0)
                            <span class="badge">-{{ $product->diskon }}%</span>
                        @endif

                        <div style="margin-top: 6px; font-size: 0.9rem; color: #f59e0b;">
                            ★ {{ number_format($product->reviews_avg_rating ?? 0, 1) }} / 5
                            <span style="color: #888;">({{ $product->reviews_count }})</span>
                        </div>

                        <div style="font-size: 0.85rem; color: #666;">
                            {{ $product->order_items_sum_quantity ?? 0 }} terjual
                        </div>
                    </a>
                @empty
                    <p>Tidak ada produk ditemukan.</p>
                @endforelse
            </div>
        </main>
    </div>

    <!-- Pagination -->
    <div class="mt-6">
        {{ $products->withQueryString()->links() }}
    </div>

    @push('scripts')
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('dropdown', () => ({
                open: false
            }))
        })
    </script>
    @endpush
</x-app-layout>
