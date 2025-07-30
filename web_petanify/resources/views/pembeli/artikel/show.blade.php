@extends('layouts.app')

@section('title', $artikel->judul)

@push('styles')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&family=Lora:wght@400;600&display=swap');

    body { background-color: #f9fafb; }
    .article-main {
        background-color: #fff; border: 1px solid #e5e7eb;
        border-radius: 12px; padding: 2rem 2.5rem;
    }
    .article-kategori {
        color: #ef4444; font-weight: 700; text-transform: uppercase;
        font-family: 'Inter', sans-serif; font-size: 0.85rem;
    }
    .article-title {
        font-family: 'Inter', sans-serif; font-size: 2.25rem;
        font-weight: 700; line-height: 1.3; color: #111827;
    }
    .article-meta {
        font-family: 'Inter', sans-serif; color: #6b7280;
        font-size: 0.9rem; margin-bottom: 1.5rem;
    }
    .article-image {
        width: 100%; border-radius: 12px; margin-bottom: 2rem;
        object-fit: cover; max-height: 500px;
    }
    .article-body {
        font-family: 'Lora', serif; font-size: 1.1rem;
        line-height: 1.8; color: #374151;
    }
    .sidebar-title {
        font-family: 'Inter', sans-serif; font-weight: 700; font-size: 1.2rem;
    }
    /* Related Article */
    .related-article-link {
        display: flex; align-items: center; gap: 18px;
        text-decoration: none; margin-bottom: 20px;
        border: 1px solid #e5e7eb; border-radius: 10px;
        background: #fff; padding: 10px 12px;
        box-shadow: 0 2px 6px 0 #0001;
        transition: background 0.2s, box-shadow 0.2s;
    }
    .related-article-link:hover {
        background: #f3faf7; box-shadow: 0 4px 16px 0 #19773e18;
    }
    .related-item-img {
        width: 120px; height: 85px; object-fit: cover;
        border-radius: 10px; flex-shrink: 0;
    }
    .related-item-title {
        font-family: 'Inter', sans-serif; font-weight: 600;
        font-size: 1.06rem; color: #19773e;
        margin-bottom: 0; line-height: 1.25;
    }
    @media (max-width: 992px) {
        .related-item-img { width: 100px; height: 70px; }
    }
    @media (max-width: 767px) {
        .article-main { padding: 1rem; }
        .related-item-img { width: 70px; height: 50px; }
        .related-item-title { font-size: 0.95rem; }
    }
</style>
@endpush

@section('content')
<div class="container my-5">
    <div class="row g-5">
        <!-- Artikel Utama -->
        <div class="col-lg-8">
            <div class="article-main">
                <p class="article-kategori">{{ $artikel->kategori }}</p>
                <h1 class="article-title mb-2">{{ $artikel->judul }}</h1>
                <div class="article-meta">
                    <span>Oleh Tim Info Tani</span>
                    <span class="mx-2">•</span>
                    <span>{{ $artikel->created_at->format('d F Y') }}</span>
                </div>
                <img src="{{ $artikel->gambar ? asset('storage/' . $artikel->gambar) : asset('images/default.jpg') }}"
                     alt="{{ $artikel->judul }}" class="article-image">
                <div class="article-body">
                    {!! nl2br(e($artikel->isi)) !!}
                </div>
            </div>
        </div>

        <!-- Sidebar Related Artikel -->
        <div class="col-lg-4">
            <div class="position-sticky" style="top: 2rem;">
                <h5 class="sidebar-title mb-4">Baca Juga</h5>
                @forelse($relatedArtikels as $related)
                    <a href="{{ route('pembeli.artikel.show', $related->id) }}" class="related-article-link">
                        <img src="{{ $related->gambar ? asset('storage/' . $related->gambar) : asset('images/default.jpg') }}"
                             alt="{{ $related->judul }}" class="related-item-img">
                        <h6 class="related-item-title">
                            {{ \Illuminate\Support\Str::limit($related->judul, 60) }}
                        </h6>
                    </a>
                @empty
                    <p class="text-muted">Tidak ada berita terkait.</p>
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection
