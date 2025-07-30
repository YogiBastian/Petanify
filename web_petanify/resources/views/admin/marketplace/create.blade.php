@extends('layouts.admin')

@section('title','Tambah Produk')

@section('content')
<div class="container py-4">
    <div class="card shadow-sm">
        <div class="card-header bg-success text-white">
            <h5 class="mb-0"><i class="fas fa-box-open me-2"></i> Tambah Produk Baru</h5>
        </div>
        <div class="card-body">

            <form action="{{ route('admin.produk.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Nama Produk</label>
                        <input type="text" name="nama_produk" class="form-control" required value="{{ old('nama_produk') }}">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Harga (Rp)</label>
                        <input type="number" name="harga" class="form-control" required value="{{ old('harga') }}">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Stok</label>
                        <input type="number" name="stok" class="form-control" required min="0" value="{{ old('stok', 0) }}">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-4">
                        <label class="form-label">Satuan</label>
                        <input type="text" name="satuan" class="form-control" maxlength="20" value="{{ old('satuan') }}" placeholder="Contoh: kg, liter, dus">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Diskon (Rp)</label>
                        <input type="number" name="diskon" class="form-control" min="0" value="{{ old('diskon') }}">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Status</label>
                        <select name="status" class="form-select" required>
                            <option value="aktif" {{ old('status') == 'aktif' ? 'selected' : '' }}>Aktif</option>
                            <option value="tidak_aktif" {{ old('status') == 'tidak_aktif' ? 'selected' : '' }}>Tidak Aktif</option>
                        </select>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Deskripsi</label>
                    <textarea name="deskripsi" class="form-control" rows="4" placeholder="Tuliskan deskripsi produk...">{{ old('deskripsi') }}</textarea>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Foto Produk</label>
                        <input type="file" name="foto" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Verifikasi Produk</label>
                        <select name="is_verified" class="form-select" required>
                            <option value="0" {{ old('is_verified', '0') == '0' ? 'selected' : '' }}>Belum Diverifikasi</option>
                            <option value="1" {{ old('is_verified') == '1' ? 'selected' : '' }}>Terverifikasi</option>
                        </select>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Petani Pemilik (opsional)</label>
                        <select name="user_id" class="form-select">
                            <option value="">-- Admin sebagai pemilik --</option>
                            @foreach($petani as $id => $nama)
                                <option value="{{ $id }}" {{ old('user_id') == $id ? 'selected' : '' }}>{{ $nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Kategori (opsional)</label>
                        <select name="kategori_id" class="form-select">
                            <option value="">-- Pilih Kategori --</option>
                            @foreach($kategoris as $id => $nama)
                                <option value="{{ $id }}" {{ old('kategori_id') == $id ? 'selected' : '' }}>{{ $nama }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="d-flex justify-content-between mt-4">
                    <a href="{{ route('admin.produk.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left me-1"></i> Batal
                    </a>
                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-save me-1"></i> Simpan Produk
                    </button>
                </div>
            </form>

        </div>
    </div>
</div>
@endsection
