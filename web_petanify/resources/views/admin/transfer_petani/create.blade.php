@extends('layouts.admin')
@section('title', 'Transfer ke Petani')

@section('content')
<div class="container">
    <h3>Input Transfer Petani</h3>
    <form action="{{ route('admin.transfer_petani.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="petani_id" class="form-label">Pilih Petani</label>
            <select name="petani_id" class="form-control" required>
                <option value="">-- Pilih Petani --</option>
                @foreach ($petaniList as $petani)
                    <option value="{{ $petani->id }}">{{ $petani->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="nominal" class="form-label">Nominal Transfer</label>
            <input type="number" name="nominal" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Foto Transfer (jpg/png/pdf)</label>
                <input type="file" class="form-control" name="foto_transfer" accept="image/*,.pdf">

        </div>
        <div class="mb-3">
            <label for="catatan" class="form-label">Catatan (opsional)</label>
            <textarea name="catatan" class="form-control"></textarea>
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
    </form>
</div>
@endsection
