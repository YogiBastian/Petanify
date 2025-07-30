@extends('layouts.admin')
@section('title', 'Video Pembelajaran')

@section('content')
@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<a href="{{ route('admin.videos.create') }}" class="btn btn-success mb-3">
    <i class="fas fa-plus-circle"></i> Tambah Video
</a>

<div class="table-responsive">
    <table class="table table-bordered table-hover align-middle">
        <thead class="table-light">
            <tr>
                <th>#</th>
                <th>Thumbnail</th>
                <th>Judul</th>
                <th>Deskripsi</th>
                <th>Untuk</th>
                <th>Link</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($videos as $i => $video)
                <tr>
                    <td>{{ $i + 1 }}</td>
                    <td>
                        <div class="d-flex justify-content-center align-items-center" style="min-width:120px;">
                            <img src="https://img.youtube.com/vi/{{ $video->youtube_id }}/hqdefault.jpg"
                                 alt="Thumbnail"
                                 width="120"
                                 class="rounded shadow-sm border"
                                 style="aspect-ratio:16/9;object-fit:cover;">
                        </div>
                    </td>
                    <td class="fw-bold">{{ $video->title }}</td>
                    <td>{{ \Str::limit($video->description, 40) }}</td>
                    <td>
                        @if($video->target_audience == 'petani')
                            <span class="badge bg-success">Petani</span>
                        @elseif($video->target_audience == 'pembeli')
                            <span class="badge bg-info">Pembeli</span>
                        @else
                            <span class="badge bg-secondary">Semua</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ $video->youtube_url }}" target="_blank" class="btn btn-sm btn-outline-primary">
                            <i class="fab fa-youtube"></i> Lihat Video
                        </a>
                    </td>
                    <td>
                        <a href="{{ route('admin.videos.edit', $video->id) }}" class="btn btn-sm btn-primary mb-1" title="Edit">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('admin.videos.destroy', $video->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus video ini?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" title="Hapus">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center text-muted">Belum ada video pembelajaran.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

{{-- Pagination jika pakai paginate --}}
{{-- {{ $videos->links() }} --}}
@endsection
