@extends('layouts.admin')
@section('title', isset($kategori) ? 'Edit Kategori' : 'Tambah Kategori')

@section('content')
<form action="{{ isset($kategori) ? route('admin.kategori.update', $kategori->id) : route('admin.kategori.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @if(isset($kategori)) @method('PUT') @endif

    <div class="mb-3">
        <label>Nama Kategori</label>
        <input type="text" name="nama_kategori" class="form-control" value="{{ old('nama_kategori', $kategori->nama_kategori ?? '') }}" required>
    </div>
    <div class="mb-3">
        <label>Foto Kategori</label>
        @if(isset($kategori) && $kategori->foto)
            <img src="{{ asset('storage/'.$kategori->foto) }}" width="80" class="mb-2 d-block">
        @endif
        <input type="file" name="foto" class="form-control">
    </div>
    <button class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
    <a href="{{ route('admin.kategori.index') }}" class="btn btn-secondary">Batal</a>
</form>
@endsection
