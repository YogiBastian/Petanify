<x-app-layout>
    @push('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
    <style>
        .martfury-hero {
            border-radius: 0 0 2rem 2rem;
            overflow: hidden;
            min-height: 320px;
            position: relative;
        }
        .martfury-cat-dropdown {
            position: absolute;
            z-index: 20;
            background: #fff;
            width: 260px;
            box-shadow: 0 2px 24px rgba(0,0,0,.1);
            border-radius: 0 0 18px 18px;
            left: 0; top: 60px;
        }
        .cat-link:hover { background: #F3F4F6; color: #13A34B; }
    </style>
    @endpush

    @push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            new Swiper('.swiper', {
                loop: true,
                autoplay: { delay: 3500, disableOnInteraction: false },
                pagination: { el: '.swiper-pagination', clickable: true }
            });
            // Dropdown category desktop
            const catBtn = document.getElementById('btn-cat-drop');
            const catDrop = document.getElementById('cat-drop');
            if (catBtn && catDrop) {
                catBtn.onclick = function(e) {
                    e.stopPropagation();
                    catDrop.classList.toggle('hidden');
                };
                document.addEventListener('click', () => catDrop.classList.add('hidden'));
            }

            // Fungsi untuk countdown
            const target = new Date();
            // Atur target waktu ke 15 jam, 40 menit, 56 detik dari sekarang
            // Anda bisa mengganti ini dengan waktu spesifik dari backend jika perlu
            target.setHours(target.getHours() + 15, target.getMinutes() + 40, target.getSeconds() + 56, 0);

            function updateCountdown() {
                const now = new Date();
                let diff = Math.max(0, (target - now) / 1000); // detik tersisa

                const d = Math.floor(diff / 86400); // Hari
                diff -= d * 86400;
                const h = Math.floor(diff / 3600); // Jam
                diff -= h * 3600;
                const m = Math.floor(diff / 60); // Menit
                const s = Math.floor(diff - m * 60); // Detik

                // Pastikan elemen dengan ID ini ada di HTML Anda
                const dhodDays = document.getElementById('dhod-days');
                const dhodHours = document.getElementById('dhod-hours');
                const dhodMinutes = document.getElementById('dhod-minutes');
                const dhodSeconds = document.getElementById('dhod-seconds');

                if (dhodDays) dhodDays.innerText = d.toString().padStart(2, '0');
                if (dhodHours) dhodHours.innerText = h.toString().padStart(2, '0');
                if (dhodMinutes) dhodMinutes.innerText = m.toString().padStart(2, '0');
                if (dhodSeconds) dhodSeconds.innerText = s.toString().padStart(2, '0');
            }
            setInterval(updateCountdown, 1000);
            updateCountdown(); // Panggil segera setelah DOM dimuat
        });
    </script>
    @endpush

    <div class="w-full bg-white py-3 shadow-sm border-b">
        <div class="max-w-7xl mx-auto flex items-center gap-2 px-4">
            <form id="searchForm" class="flex-1 flex mx-5" onsubmit="return redirectToMarketplace(event)">
                <input id="searchInput" type="search" placeholder="Cari produk..." class="w-full rounded-l-full px-4 py-2 border-t border-b border-l border-gray-200 focus:outline-none">
                <button type="submit" class="rounded-r-full px-6 py-2 bg-green-600 text-white font-semibold">Cari</button>
            </form>
        </div>
    </div>


<script>
function redirectToMarketplace(event) {
    event.preventDefault();
    const keyword = document.getElementById('searchInput').value.trim();
    if (keyword.length > 0) {
        window.location.href = '/pembeli/marketplace?search=' + encodeURIComponent(keyword);
    }
    return false;
}
</script>

    {{-- Hero Banner --}}
    <section class="martfury-hero max-w-7xl mx-auto mt-4 relative rounded-2xl overflow-hidden shadow-md">
        <div class="swiper w-full h-80">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <img src="https://media.istockphoto.com/id/1303869072/id/foto/ladang-jagung-di-kebun-pertanian-dan-cahaya-bersinar-matahari-terbenam.jpg?s=2048x2048&w=is&k=20&c=KFChBIt1RkKXesSloLQrCtf15FiiPlVZCECGNEyobQc=" class="w-full h-80 object-cover" alt="Jagung" />
                </div>
                <div class="swiper-slide">
                    <img src="https://images.unsplash.com/photo-1506744038136-46273834b3fb?auto=format&fit=crop&w=900&q=80" class="w-full h-80 object-cover" alt="Sawah Indah" />
                </div>
            </div>
            <div class="swiper-pagination absolute bottom-4 left-0 right-0 z-20"></div>
        </div>
        {{-- Overlay (gelap transparan) --}}
        <div class="absolute inset-0 bg-gradient-to-r from-black/50 to-transparent z-10"></div>
        <div class="absolute top-0 left-0 h-full flex flex-col justify-center pl-12 z-20 text-white" style="max-width:520px;">
            <h1 class="text-4xl font-bold mb-2 drop-shadow-xl">Fresh vegetables<br>& fruits basket</h1>
            <p class="text-lg mb-6 drop-shadow font-medium">Discount <span class="text-yellow-300 font-bold">40% Off</span></p>
            <a href="#produk" class="bg-green-600 hover:bg-green-700 text-white px-6 py-2 rounded-full font-semibold shadow transition">Belanja Sekarang</a>
        </div>
    </section>

    {{-- Features row --}}
    <div class="max-w-7xl mx-auto grid grid-cols-2 md:grid-cols-4 gap-4 py-8 px-4">
        <div class="flex items-center gap-4">
            <i class="fas fa-truck text-green-600 text-3xl"></i>
            <span>Free Delivery<br><span class="text-xs text-gray-400">All orders over Rp 99.000</span></span>
        </div>
        <div class="flex items-center gap-4">
            <i class="fas fa-undo text-green-600 text-3xl"></i>
            <span>90 Days Return<br><span class="text-xs text-gray-400">If goods have problems</span></span>
        </div>
        <div class="flex items-center gap-4">
            <i class="fas fa-shield-alt text-green-600 text-3xl"></i>
            <span>Secure Payment<br><span class="text-xs text-gray-400">100% secure payment</span></span>
        </div>
        <div class="flex items-center gap-4">
            <i class="fas fa-headset text-green-600 text-3xl"></i>
            <span>24/7 Support<br><span class="text-xs text-gray-400">Dedicated support</span></span>
        </div>
    </div>

    {{-- Kategori Bulan Ini --}}
    <section class="max-w-7xl mx-auto px-4 mb-10">
        <h2 class="text-lg font-bold mb-4">Kategori Teratas Bulan Ini</h2>
        <div class="grid grid-cols-2 md:grid-cols-6 gap-4">
            @foreach ($categories as $category)
                <a href="{{ route('pembeli.marketplace.index', ['kategori_id' => $category->id]) }}"
                   class="flex flex-col items-center justify-center p-4 bg-white rounded border hover:shadow transition"
                   style="text-decoration: none;">
                    <img src="{{ asset('storage/' . $category->foto) }}"
                        alt="{{ $category->nama_kategori }}"
                        class="w-16 h-16 mb-2 object-contain">
                    <div class="text-sm font-semibold">{{ $category->nama_kategori }}</div>
                </a>
            @endforeach
        </div>
    </section>

        {{-- Deals Hot of The Day & Top 20 Best Seller --}}
        <div class="max-w-7xl mx-auto my-8 grid grid-cols-1 md:grid-cols-3 gap-8">

           <!-- Deals Hot of The Day -->
<div class="col-span-2 border border-green-400 rounded-md p-6 bg-white shadow-sm relative">
    <h3 class="text-lg font-bold mb-3">Penawaran Menarik Hari Ini</h3>
    <hr class="mb-4">

    @if(count($hotDealProducts))
    <div class="swiper" id="hotDealSwiper">
        <div class="swiper-wrapper">
            @foreach($hotDealProducts as $p)
            <div class="swiper-slide">
                <div class="flex flex-col md:flex-row gap-5">
                    <div class="w-full md:w-52 flex-shrink-0 flex flex-col items-center">
                        <img src="{{ filter_var($p->foto, FILTER_VALIDATE_URL) ? $p->foto : asset('storage/' . $p->foto) }}"
                             alt="{{ $p->nama_produk }}"
                             class="w-40 h-40 object-contain rounded bg-gray-50 shadow mb-4">
                    </div>
                    <div class="flex-1">
                        <div class="text-xs text-gray-500 mb-1 uppercase">
                            {{ strtoupper(optional($p->kategori)->nama_kategori ?? 'UMUM') }}
                        </div>
                        <div class="font-bold text-xl mb-2">
                            {{ $p->nama_produk }}
                        </div>
                        <div class="flex items-center gap-2 mb-1">
                            <span class="text-red-500 text-2xl font-bold">
                                Rp {{ number_format($p->harga, 0, ',', '.') }}
                            </span>
                            @if($p->diskon && $p->diskon > 0)
                            <span class="line-through text-gray-400">
                                Rp {{ number_format($p->diskon, 0, ',', '.') }}
                            </span>
                            @endif
                        </div>
                        <div class="flex items-center gap-1 text-yellow-400 mb-1">
                            <i class="fas fa-star"></i><i class="fas fa-star"></i>
                            <i class="fas fa-star"></i><i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                            <span class="text-xs text-gray-600 ml-2">1 Review</span>
                        </div>
                        <div class="mb-2">
                            <span class="text-sm">Status:</span>
                            <span class="text-green-600 font-bold">In stock</span>
                        </div>
                        <hr class="my-3">
                        {{-- Bagian "Berlaku hingga" dan "Terjual" dihilangkan --}}
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <!-- Swiper navigation -->
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-pagination"></div>
    </div>
    @else
        <div class="text-gray-400 italic">Tidak ada produk tersedia untuk hot deals hari ini.</div>
    @endif
</div>

{{-- SwiperJS Init --}}
<script>
    document.addEventListener('DOMContentLoaded', function () {
        new Swiper('#hotDealSwiper', {
            slidesPerView: 1,
            spaceBetween: 20,
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
        });
    });
</script>



            <!-- Top 20 Best Seller -->
                <div class="border rounded-md bg-white shadow-sm p-4 h-fit">
            <h4 class="text-base font-bold mb-3">Top 20 Best Seller</h4>
            <hr class="mb-3">

            <div class="swiper" id="bestSellerSwiper">
                <div class="swiper-wrapper">
                    @foreach($randomProducts->chunk(4) as $chunk)
                    <div class="swiper-slide">
                        <ul class="space-y-3">
                            @foreach($chunk as $product)
                            <li class="flex items-center gap-3">
                                <img src="{{ filter_var($product->foto, FILTER_VALIDATE_URL) ? $product->foto : asset('storage/' . $product->foto) }}"
                                    alt="{{ $product->nama_produk }}" class="w-10 h-10 object-contain rounded">
                                <div>
                                    <div class="text-sm font-semibold text-blue-800 hover:underline cursor-pointer">
                                        {{ $product->nama_produk }}
                                    </div>
                                    <div class="text-sm text-gray-700">
                                        Rp {{ number_format($product->harga, 0, ',', '.') }}
                                    </div>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    @endforeach
                </div>
                <div class="flex justify-center mt-3">
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </div>
        </div>

    {{-- PRODUK TERBARU (New Arrivals) --}}
    <section id="produk" class="max-w-7xl mx-auto py-6 px-4">
        <h2 class="text-2xl font-bold mb-2">New Arrivals</h2>

        {{-- Kategori Tabs (Diperbarui untuk Filter) --}}
        <div class="flex items-center gap-4 border-b pb-2 mb-6 text-sm font-medium">
            {{-- Tombol "View All" (menghapus filter kategori) --}}
            <a href="{{ route('pembeli.dashboard') }}"
               class="text-gray-700 hover:text-green-600
                      {{ !$selectedCategoryId ? 'text-green-600 border-b-2 border-green-600 pb-1' : '' }}">
               View All
            </a>

            {{-- Loop untuk setiap kategori --}}
            @foreach ($categories as $category)
                <a href="{{ route('pembeli.dashboard', ['category_id' => $category->id]) }}"
                   class="text-gray-700 hover:text-green-600
                          {{ $selectedCategoryId == $category->id ? 'text-green-600 border-b-2 border-green-600 pb-1' : '' }}">
                    {{ $category->nama_kategori ?? $category->name }}
                </a>
            @endforeach
        </div>

{{-- Grid Produk --}}
<div class="grid grid-cols-2 md:grid-cols-5 gap-6">
    @forelse ($products as $product)
        <a href="{{ route('pembeli.produk.show', $product->id) }}"
           class="product-card flex flex-col bg-white border border-gray-200 rounded-lg shadow hover:shadow-lg transition p-4 items-center group relative"
           style="text-decoration: none;">
            {{-- Label Diskon / Hot --}}
            @if(isset($product->is_hot) && $product->is_hot)
                <span class="absolute top-3 right-3 bg-orange-400 text-white text-xs px-2 py-0.5 rounded font-semibold">Hot</span>
            @elseif(isset($product->diskon) && $product->diskon > 0)
                <span class="absolute top-3 right-3 bg-red-500 text-white text-xs px-2 py-0.5 rounded font-semibold">-{{ $product->diskon }}%</span>
            @endif

            <img src="{{ filter_var($product->foto, FILTER_VALIDATE_URL) ? $product->foto : asset('storage/' . $product->foto) }}"
                alt="{{ $product->nama_produk }}"
                class="w-28 h-28 object-contain mx-auto mb-3 group-hover:scale-105 transition" />
            <div class="block text-blue-700 hover:underline text-sm font-semibold text-center mb-1">
                {{ $product->nama_produk }}
            </div>

            <div class="text-green-600 font-extrabold text-lg mb-1">
                Rp{{ number_format($product->harga, 0, ',', '.') }}
            </div>

            @if(isset($product->stok) && isset($product->satuan))
                <div class="text-gray-600 text-sm mb-1">
                    {{ $product->stok }} {{ $product->satuan }}
                </div>
            @endif

            @if(isset($product->diskon) && $product->diskon > 0)
                <span class="inline-block px-2 py-0.5 bg-yellow-100 text-yellow-700 text-xs rounded mb-1">
                    -{{ $product->diskon }}%
                </span>
            @endif

            {{-- Rating & Jumlah Review --}}
            <div style="margin-top: 6px; font-size: 0.9rem; color: #f59e0b;">
                ★ {{ number_format($product->reviews_avg_rating ?? 0, 1) }} / 5
                <span style="color: #888;">({{ $product->reviews_count ?? 0 }})</span>
            </div>

            {{-- Jumlah Terjual --}}
            <div style="font-size: 0.85rem; color: #666;">
                {{ $product->order_items_sum_quantity ?? 0 }} terjual
            </div>
        </a>
    @empty
        <p class="col-span-5 text-center text-gray-500">Tidak ada produk ditemukan.</p>
    @endforelse
</div>
    </section>

    {{-- Forum Terbaru --}}
    <section class="max-w-7xl mx-auto py-10 px-4">
        <h2 class="text-2xl font-bold mb-6">Forum Terbaru</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($latestForumPosts as $forum)
                <a href="{{ route('pembeli.forum.show', $forum->id) }}" class="block bg-white rounded-xl shadow hover:shadow-lg p-5 border border-gray-100 transition">
                    <div class="flex items-center gap-3 mb-3">
                        <img src="{{ $forum->user->profile_photo_url ?? asset('img/user-default.png') }}"
                            class="w-10 h-10 object-cover rounded-full border-2 border-green-400" alt="{{ $forum->user->name }}">
                        <div>
                            <div class="font-bold text-base">{{ $forum->user->name }}</div>
                            <div class="text-xs text-gray-500">{{ $forum->created_at->diffForHumans() }}</div>
                        </div>
                    </div>
                    <div class="text-gray-600 text-sm mb-2">
                        {{ \Illuminate\Support\Str::limit(strip_tags($forum->content), 80) }}
                    </div>
                    <div class="flex items-center gap-2 text-xs text-gray-400">
                        <i class="far fa-comments"></i> {{ $forum->comments_count ?? 0 }} Komentar
                    </div>
                </a>
            @empty
                <div class="col-span-3 text-center text-gray-400 italic">Belum ada postingan forum.</div>
            @endforelse
        </div>
    </section>

    @push('scripts')
    <script>
        // Set target waktu countdown
        const target = new Date();
        target.setHours(target.getHours() + 15, target.getMinutes() + 40, target.getSeconds() + 56, 0);

        function updateCountdown() {
            const now = new Date();
            let diff = Math.max(0, (target - now) / 1000); // detik
            const d = Math.floor(diff / 86400);
            diff -= d * 86400;
            const h = Math.floor(diff / 3600);
            diff -= h * 3600;
            const m = Math.floor(diff / 60);
            const s = Math.floor(diff - m * 60);

            // Menargetkan ID yang sudah ditambahkan
            const dhodDays = document.getElementById('dhod-days');
            const dhodHours = document.getElementById('dhod-hours');
            const dhodMinutes = document.getElementById('dhod-minutes');
            const dhodSeconds = document.getElementById('dhod-seconds');

            if (dhodDays) dhodDays.innerText = d.toString().padStart(2, '0');
            if (dhodHours) dhodHours.innerText = h.toString().padStart(2, '0');
            if (dhodMinutes) dhodMinutes.innerText = m.toString().padStart(2, '0');
            if (dhodSeconds) dhodSeconds.innerText = s.toString().padStart(2, '0');
        }
        setInterval(updateCountdown, 1000);
        updateCountdown();
    </script>
    @endpush

</x-app-layout>