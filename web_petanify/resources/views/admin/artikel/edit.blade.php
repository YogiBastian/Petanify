@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Edit Artikel</h1>
    <form action="{{ route('admin.artikel.update', $artikel->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="judul" class="form-label">Judul</label>
            <input type="text" name="judul" id="judul" class="form-control" value="{{ old('judul', $artikel->judul) }}" required>
        </div>

        <div class="mb-3">
            <label for="kategori" class="form-label">Kategori</label>
            <input type="text" name="kategori" id="kategori" class="form-control" value="{{ old('kategori', $artikel->kategori) }}" required>
        </div>

        <div class="mb-3">
            <label for="isi" class="form-label">Isi</label>
            <textarea name="isi" id="isi" class="form-control" rows="7" required>{{ old('isi', $artikel->isi) }}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Gambar Saat Ini:</label><br>
            @if($artikel->gambar && Storage::disk('public')->exists($artikel->gambar))
                <img src="{{ asset('storage/' . $artikel->gambar) }}" alt="Gambar Artikel" class="img-thumbnail mb-2" style="max-width: 150px;"><br>
            @else
                <span class="text-muted">Tidak ada gambar.</span><br>
            @endif

            <input type="file" name="gambar" class="form-control mt-2">
            <small class="text-muted">Kosongkan jika tidak ingin mengganti gambar.</small>
        </div>

        <button type="submit" class="btn btn-warning">Update</button>
        <a href="{{ route('admin.artikel.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
