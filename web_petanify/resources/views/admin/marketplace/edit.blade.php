@extends('layouts.admin')

@section('title', 'Edit Produk')

@section('content')
<div class="container py-4">
    <div class="card shadow-lg rounded-3">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h5 class="mb-0"><i class="fas fa-box-open me-2"></i>Edit Produk</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.produk.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row g-4">
                    {{-- Kiri --}}
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Nama Produk</label>
                            <input type="text" name="nama_produk" class="form-control" required
                                   value="{{ old('nama_produk', $product->nama_produk) }}">
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Harga (Rp)</label>
                            <input type="number" name="harga" class="form-control" required
                                   value="{{ old('harga', $product->harga) }}">
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Stok</label>
                            <input type="number" name="stok" class="form-control" required min="0"
                                   value="{{ old('stok', $product->stok) }}">
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Satuan</label>
                            <input type="text" name="satuan" class="form-control" maxlength="20"
                                   value="{{ old('satuan', $product->satuan) }}" placeholder="Contoh: kg, liter, dus">
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Diskon (Rp)</label>
                            <input type="number" name="diskon" class="form-control" min="0"
                                   value="{{ old('diskon', $product->diskon) }}">
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Deskripsi Produk</label>
                            <textarea name="deskripsi" class="form-control" rows="4">{{ old('deskripsi', $product->deskripsi) }}</textarea>
                        </div>
                    </div>

                    {{-- Kanan --}}
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Kategori</label>
                            <select name="kategori_id" class="form-select">
                                <option value="">-- Pilih Kategori --</option>
                                @foreach ($kategoris as $id => $nama)
                                    <option value="{{ $id }}" {{ old('kategori_id', $product->kategori_id) == $id ? 'selected' : '' }}>
                                        {{ $nama }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Petani Pemilik</label>
                            <select name="user_id" class="form-select">
                                <option value="">-- Admin sebagai pemilik --</option>
                                @foreach($petani as $id => $nama)
                                    <option value="{{ $id }}" {{ old('user_id', $product->user_id) == $id ? 'selected' : '' }}>{{ $nama }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Status</label>
                            <select name="status" class="form-select" required>
                                <option value="aktif" {{ old('status', $product->status) == 'aktif' ? 'selected' : '' }}>Aktif</option>
                                <option value="tidak_aktif" {{ old('status', $product->status) == 'tidak_aktif' ? 'selected' : '' }}>Tidak Aktif</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Verifikasi</label>
                            <select name="is_verified" class="form-select" required>
                                <option value="0" {{ old('is_verified', $product->is_verified) == 0 ? 'selected' : '' }}>Belum Diverifikasi</option>
                                <option value="1" {{ old('is_verified', $product->is_verified) == 1 ? 'selected' : '' }}>Terverifikasi</option>
                            </select>
                        </div>

                        {{-- Foto Produk --}}
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Foto Produk</label><br>
                            @if ($product->foto)
                                <img src="{{ asset('storage/' . $product->foto) }}" alt="Foto Produk"
                                     class="img-thumbnail mb-2" style="max-height: 150px;">
                            @endif
                            <input type="file" name="foto" class="form-control">
                        </div>
                    </div>
                </div>

                <div class="mt-4 d-flex justify-content-between">
                    <a href="{{ route('admin.produk.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left me-1"></i> Kembali
                    </a>
                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-save me-1"></i> Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
