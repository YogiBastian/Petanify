@extends('layouts.admin')

@section('title', 'Produk Marketplace')

@section('content')
<div class="container py-3">

    {{-- Flash Message --}}
    @if(session('success'))
        <div class="alert alert-success shadow-sm">{{ session('success') }}</div>
    @endif

    {{-- Header & Button --}}
    <div class="d-flex justify-content-between align-items-center mb-3">
        <a href="{{ route('admin.produk.create') }}" class="btn btn-success">
            <i class="fas fa-plus-circle me-1"></i> Tambah Produk
        </a>
    </div>

    {{-- Table Produk --}}
    <div class="table-responsive shadow-sm rounded">
        <table class="table table-bordered table-hover align-middle bg-white">
            <thead class="table-light text-center">
                <tr>
                    <th>#</th>
                    <th>Foto</th>
                    <th>Nama</th>
                    <th>Harga</th>
                    <th>Diskon</th>
                    <th>Stok</th>
                    <th>Satuan</th>
                    <th>Status</th>
                    <th>Verifikasi</th>
                    <th>Petani</th>
                    <th>Kategori</th>
                    <th>Hot Deal</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($products as $i => $p)
                    <tr>
                        <td class="text-center">{{ $products->firstItem() + $i }}</td>
                        <td class="text-center">
                            @if($p->foto)
                                <img src="{{ asset('storage/' . $p->foto) }}" width="70" class="rounded shadow-sm">
                            @else
                                <span class="text-muted">-</span>
                            @endif
                        </td>
                        <td>{{ $p->nama_produk }}</td>
                        <td>Rp{{ number_format($p->harga, 0, ',', '.') }}</td>
                        <td class="text-center">
                            @if($p->diskon && $p->diskon > 0)
                                <span class="badge bg-warning text-dark">-Rp{{ number_format($p->diskon, 0, ',', '.') }}</span>
                            @else
                                <span class="text-muted">-</span>
                            @endif
                        </td>
                        <td class="text-center">{{ $p->stok }}</td>
                        <td class="text-center">{{ $p->satuan ?? '-' }}</td>
                        <td class="text-center">
                            <span class="badge bg-{{ $p->status == 'aktif' ? 'success' : 'secondary' }}">
                                {{ ucfirst($p->status) }}
                            </span>
                        </td>
                        <td class="text-center">
                            <span class="badge bg-{{ $p->is_verified ? 'primary' : 'danger' }}">
                                {{ $p->is_verified ? 'Terverifikasi' : 'Belum' }}
                            </span>
                        </td>
                        <td>{{ $p->user->name ?? '-' }}</td>
                        <td>{{ $p->kategori->nama_kategori ?? '-' }}</td>
                        <td class="text-center">
                            @if($p->is_hot_deal)
                                <span class="badge bg-success">Hot Deal</span>
                                <form action="{{ route('admin.produk.hotdeal.disable', $p->id) }}" method="POST" class="d-inline">
                                    @csrf @method('PATCH')
                                    <button class="btn btn-sm btn-warning mt-1" title="Nonaktifkan Hot Deal">
                                        Nonaktifkan
                                    </button>
                                </form>
                            @else
                                <form action="{{ route('admin.produk.hotdeal.enable', $p->id) }}" method="POST" class="d-inline">
                                    @csrf @method('PATCH')
                                    <button class="btn btn-sm btn-outline-success" title="Jadikan Hot Deal">
                                        Aktifkan
                                    </button>
                                </form>
                            @endif
                        </td>
                        <td class="text-center">
                            <a href="{{ route('admin.produk.edit', $p->id) }}" class="btn btn-sm btn-primary mb-1" title="Edit">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('admin.produk.destroy', $p->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus produk ini?')">
                                @csrf @method('DELETE')
                                <button class="btn btn-sm btn-danger" title="Hapus"><i class="fas fa-trash-alt"></i></button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="13" class="text-center text-muted">Belum ada produk</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Pagination --}}
    <div class="d-flex justify-content-end mt-3">
        {{ $products->links('pagination::bootstrap-5') }}
    </div>

</div>
@endsection
