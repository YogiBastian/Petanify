@extends('layouts.app')

@section('title', $artikel->judul)

@push('styles')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&family=Lora:wght@400;600&display=swap');

    body {
        background-color: #f9fafb;
    }
    .article-main {
        background-color: #fff;
        border: 1px solid #e5e7eb;
        border-radius: 12px;
        padding: 2rem 2.5rem;
    }
    .article-kategori {
        color: #ef4444;
        font-weight: 700;
        text-transform: uppercase;
        font-family: 'Inter', sans-serif;
        font-size: 0.85rem;
    }
    .article-title {
        font-family: 'Inter', sans-serif;
        font-size: 2.25rem;
        font-weight: 700;
        line-height: 1.3;
        color: #111827;
    }
    .article-meta {
        font-family: 'Inter', sans-serif;
        color: #6b7280;
        font-size: 0.9rem;
        margin-bottom: 1.5rem;
    }
    .article-image {
        width: 100%;
        border-radius: 12px;
        margin-bottom: 2rem;
    }
    .article-body {
        font-family: 'Lora', serif;
        font-size: 1.1rem;
        line-height: 1.8;
        color: #374151;
    }
    .sidebar-title {
        font-family: 'Inter', sans-serif;
        font-weight: 700;
        font-size: 1.2rem;
    }
    .related-item img {
        width: 80px;
        height: 65px;
        object-fit: cover;
        border-radius: 8px;
    }
    .related-item-title {
        font-family: 'Inter', sans-serif;
        font-weight: 600;
        font-size: 0.95rem;
        color: #1f2937;
    }
</style>
@endpush

@section('content')
<div class="container my-5">
    <div class="row g-5">
        <div class="col-lg-8">
            <div class="article-main">
                <p class="article-kategori">{{ $artikel->kategori }}</p>
                <h1 class="article-title mb-2">{{ $artikel->judul }}</h1>
                <div class="article-meta">
                    <span>Oleh Admin Petanify</span>
                    <span class="mx-2">•</span>
                    <span>{{ $artikel->created_at->format('d F Y') }}</span>
                </div>
                <img src="{{ asset('img/' . $artikel->gambar) }}" alt="{{ $artikel->judul }}" class="article-image">
                <div class="article-body">
                    {!! nl2br(e($artikel->isi)) !!}
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="position-sticky" style="top: 2rem;">
                <h5 class="sidebar-title mb-4">Baca Juga</h5>
                @forelse($relatedArtikels as $related)
                    <a href="{{ route('petani.artikel.show', $related->id) }}" class="d-flex align-items-center text-decoration-none mb-3">
                        <img src="{{ asset('img/' . $related->gambar) }}" alt="{{ $related->judul }}" class="related-item img-fluid me-3">
                        <h6 class="related-item-title">{{ $related->judul }}</h6>
                    </a>
                @empty
                    <p class="text-muted">Tidak ada berita terkait.</p>
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection
