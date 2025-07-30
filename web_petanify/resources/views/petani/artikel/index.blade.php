@extends('layouts.app')

@section('title', 'Info Tani - Berita & Harga Terbaru')

@push('styles')
    {{-- PENTING: Menambahkan Bootstrap 5 untuk memastikan layout tidak rusak --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" xintegrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap');

        body {
            background-color: #f3f4f6;
            font-family: 'Inter', sans-serif;
        }

        /* -- [REVISED] SEARCH SECTION -- */
        .search-section {
            background-color: #fff;
            padding: 2.5rem 1.5rem;
            border-radius: 16px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.07);
        }
        .search-section-title {
            font-weight: 700;
            color: #111827;
        }
        .search-section-subtitle {
            max-width: 500px;
            margin-left: auto;
            margin-right: auto;
            margin-bottom: 1.5rem;
            color: #4b5563;
        }
        .search-wrapper {
            max-width: 600px;
        }
        .search-input {
            padding: 0.9rem 1.25rem;
            font-size: 1rem;
            border: 1px solid #d1d5db;
            box-shadow: none;
            border-radius: 50px 0 0 50px !important; /* Membuat ujung kiri bulat */
        }
        .search-input:focus {
            border-color: #ef4444;
            box-shadow: 0 0 0 4px rgba(239, 68, 68, 0.15);
            z-index: 10;
        }
        .search-button {
            border-radius: 0 50px 50px 0 !important; /* Membuat ujung kanan bulat */
            background-color: #ef4444;
            border-color: #ef4444;
            color: white;
            font-weight: 600;
            padding: 0.6rem 1.5rem;
            transition: background-color 0.2s ease;
        }
        .search-button:hover {
            background-color: #dc2626;
        }


        /* -- SLIDESHOW -- */
        .swiper { width: 100%; height: 450px; border-radius: 16px; }
        .swiper-slide { position: relative; background: #fff; display: flex; justify-content: center; align-items: center; overflow: hidden; }
        .swiper-slide img { width: 100%; height: 100%; object-fit: cover; filter: brightness(0.7); transition: transform 0.5s ease; }
        .swiper-slide:hover img { transform: scale(1.08); }
        .slide-content { position: absolute; bottom: 0; left: 0; width: 100%; padding: 40px 30px; box-sizing: border-box; background: linear-gradient(to top, rgba(0,0,0,0.8), transparent); text-align: left; color: #fff; }
        .slide-content .badge { background-color: #ef4444; font-weight: 600; }
        .slide-content h2 { font-size: 1.75rem; font-weight: 700; margin-top: 10px; line-height: 1.3; }
        .swiper-pagination-bullet-active { background-color: #ef4444 !important; }
        .swiper-button-next, .swiper-button-prev { color: #fff !important; background-color: rgba(0,0,0,0.3); width: 44px; height: 44px; border-radius: 50%; }
        .swiper-button-next:after, .swiper-button-prev:after { font-size: 18px !important; font-weight: 800; }

        /* -- SECTION TITLE -- */
        .section-title {
            font-weight: 700; font-size: 1.5rem; color: #111827;
            border-bottom: 3px solid #ef4444; padding-bottom: 8px;
            display: inline-block;
        }

        /* -- GRID NEWS CARD -- */
        .grid-news-card {
            background-color: #fff;
            border: 1px solid #e5e7eb;
            border-radius: 16px;
            box-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1), 0 2px 4px -2px rgb(0 0 0 / 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            overflow: hidden;
            height: 100%;
            display: flex;
            flex-direction: column;
        }
        .grid-news-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 25px -5px rgb(0 0 0 / 0.1), 0 8px 10px -6px rgb(0 0 0 / 0.1);
        }
        .grid-news-card-img-wrapper {
            display: block;
            width: 100%;
            padding-top: 60%; /* Aspect Ratio 5:3 */
            position: relative;
            overflow: hidden;
        }
        .grid-news-card-img {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .grid-news-card .card-body {
            padding: 1.25rem;
            display: flex;
            flex-direction: column;
            flex-grow: 1;
        }
        .grid-news-card .card-kategori {
            color: #ef4444;
            font-size: 0.8rem;
            font-weight: 700;
            margin-bottom: 0.75rem;
            display: inline-block;
            text-transform: uppercase;
        }
        .grid-news-card .card-title {
            font-size: 1.2rem;
            font-weight: 700;
            color: #1f2937;
            text-decoration: none;
            line-height: 1.4;
            flex-grow: 1;
            margin-bottom: 1rem;
        }
        .grid-news-card .card-meta {
            font-size: 0.85rem;
            color: #6b7280;
            margin-top: auto; /* Mendorong meta ke bawah */
        }

        /* -- SIDEBAR REKOMENDASI -- */
        .sidebar-widget {
            background-color: #fff; border: 1px solid #e5e7eb;
            border-radius: 16px; padding: 1.5rem;
        }
        .rekomendasi-item {
            display: flex; align-items: flex-start;
            text-decoration: none; color: #1f2937;
            transition: background-color 0.2s ease;
        }
        .rekomendasi-item:hover { background-color: #f9fafb; }
        .rekomendasi-item-img {
            width: 80px; height: 65px; object-fit: cover;
            border-radius: 8px; flex-shrink: 0;
        }
        .rekomendasi-item-title {
            font-weight: 600; font-size: 0.9rem; line-height: 1.4;
        }

        .pagination .page-item.active .page-link { background-color: #ef4444; border-color: #ef4444; }
        .pagination .page-link { color: #ef4444; }
    </style>
@endpush

@section('content')
<div class="container my-5">

    <!-- Search Bar Section -->
    <div class="search-section mb-5">
        <h2 class="search-section-title text-center">Temukan Informasi Tani Terkini</h2>
        <p class="search-section-subtitle text-center">Dapatkan berita terbaru, panduan budidaya, dan informasi harga pasar.</p>
        <div class="search-wrapper mx-auto">
            <form action="{{ route('petani.artikel.index') }}" method="GET">
                <div class="input-group">
                    <input type="text" name="search" class="form-control search-input" placeholder="Ketik kata kunci di sini..." value="{{ request('search') }}">
                    <button class="btn search-button" type="submit">
                        <i class="bi bi-search me-1"></i>
                        Cari
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Slideshow Section -->
    @if($slideshowArtikels->count() > 0 && !request()->filled('search'))
    <div class="swiper mySwiper mb-5">
        <div class="swiper-wrapper">
            @foreach ($slideshowArtikels as $slide)
            <div class="swiper-slide">
                <a href="{{ route('petani.artikel.show', $slide->id) }}" class="w-100 h-100">
                    <img src="{{ asset('img/' . $slide->gambar) }}" alt="{{ $slide->judul }}" />
                    <div class="slide-content">
                        <span class="badge">{{ $slide->kategori }}</span>
                        <h2>{{ $slide->judul }}</h2>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-pagination"></div>
    </div>
    @endif

  <!-- Main Content Layout -->
    <div class="row g-5">
        <!-- Kolom Berita Utama (Kiri) -->
        <div class="col-lg-8">
            <h3 class="section-title mb-4">
                {{ request()->filled('search') ? 'Hasil Pencarian' : 'Berita Terbaru' }}
            </h3>
            <div class="row g-4">
                @forelse ($artikels as $artikel)
                    <div class="col-md-6">
                        <div class="card grid-news-card">
                            <a href="{{ route('petani.artikel.show', $artikel->id) }}" class="grid-news-card-img-wrapper">
                                <img src="{{ asset('img/' . $artikel->gambar) }}" class="grid-news-card-img" alt="{{ $artikel->judul }}">
                            </a>
                            <div class="card-body">
                                <div>
                                    <span class="card-kategori">{{ $artikel->kategori }}</span>
                                    <a href="{{ route('petani.artikel.show', $artikel->id) }}" class="text-decoration-none">
                                        <h5 class="card-title">{{ $artikel->judul }}</h5>
                                    </a>
                                </div>
                                <p class="card-meta">
                                    <i class="bi bi-calendar-event"></i> {{ $artikel->created_at->format('d F Y') }}
                                </p>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <div class="text-center py-5 px-3 bg-white rounded-3">
                            <h4 class="fw-bold">Oops! Berita tidak ditemukan.</h4>
                            <p class="text-muted">Coba gunakan kata kunci lain pada kolom pencarian.</p>
                        </div>
                    </div>
                @endforelse
            </div>
            <!-- Paginasi -->
            <div class="d-flex justify-content-center mt-5">
                {{ $artikels->links() }}
            </div>
        </div>

        <!-- Kolom Sidebar (Kanan) -->
        <div class="col-lg-4">
            <div class="sidebar-widget position-sticky" style="top: 2rem;">
                <h4 class="section-title mb-4">Rekomendasi</h4>
                <div class="vstack gap-4">
                    @forelse ($rekomendasiArtikels as $rekomendasi)
                        <a href="{{ route('petani.artikel.show', $rekomendasi->id) }}" class="rekomendasi-item">
                            <img src="{{ asset('img/' . $rekomendasi->gambar) }}" class="rekomendasi-item-img me-3" alt="{{ $rekomendasi->judul }}">
                            <div>
                                <h6 class="rekomendasi-item-title">{{ $rekomendasi->judul }}</h6>
                            </div>
                        </a>
                    @empty
                        <p class="text-muted">Tidak ada rekomendasi.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script>
      var swiper = new Swiper(".mySwiper", {
        cssMode: true,
        navigation: { nextEl: ".swiper-button-next", prevEl: ".swiper-button-prev" },
        pagination: { el: ".swiper-pagination", clickable: true },
        mousewheel: true, keyboard: true, loop: true,
        autoplay: { delay: 5000, disableOnInteraction: false },
      });
    </script>
@endpush