@extends('layouts.admin')

@section('title','Daftar Artikel')

@section('content')
<div class="container py-4">

    {{-- Flash Message --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
            <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    {{-- Header --}}
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="mb-0"><i class="fas fa-newspaper me-2 text-primary"></i>Daftar Artikel</h4>
        <a href="{{ route('admin.artikel.create') }}" class="btn btn-success shadow-sm">
            <i class="fas fa-plus-circle me-1"></i> Tambah Artikel
        </a>
    </div>

    {{-- Tabel --}}
    <div class="card shadow-sm border-0">
        <div class="card-body table-responsive p-0">
            <table class="table table-striped table-hover align-middle mb-0 text-center">
                <thead class="table-light">
                    <tr>
                        <th style="width: 50px;">#</th>
                        <th>Judul</th>
                        <th>Kategori</th>
                        <th style="width: 120px;">Gambar</th>
                        <th style="width: 160px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($artikels as $artikel)
                    <tr>
                        <td>{{ $loop->iteration + ($artikels->perPage() * ($artikels->currentPage() - 1)) }}</td>
                        <td class="text-start">{{ $artikel->judul }}</td>
                        <td>{{ $artikel->kategori }}</td>
                        <td>
                            @if($artikel->gambar && Storage::disk('public')->exists($artikel->gambar))
                                <img src="{{ asset('storage/' . $artikel->gambar) }}" alt="Gambar Artikel"
                                     class="rounded shadow-sm border" style="width: 100px; height: 70px; object-fit: cover;">
                            @else
                                <span class="text-muted">Tidak ada</span>
                            @endif
                        </td>
                        <td>
                            <div class="d-flex justify-content-center gap-2">
                                <a href="{{ route('admin.artikel.edit', $artikel->id) }}" class="btn btn-sm btn-warning" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.artikel.destroy', $artikel->id) }}" method="POST" class="d-inline"
                                      onsubmit="return confirm('Yakin hapus artikel ini?')">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" title="Hapus">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-muted py-4">Belum ada artikel.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    {{-- Pagination --}}
    <div class="d-flex justify-content-end mt-3">
        {{ $artikels->onEachSide(1)->links('pagination::bootstrap-5') }}
    </div>

</div>
@endsection
