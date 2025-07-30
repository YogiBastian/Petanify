@extends('layouts.admin')
@section('title', 'Edit Transfer Petani')

@section('content')
<div class="container">
    <h3>Edit Transfer Petani</h3>
    <form action="{{ route('admin.transfer_petani.update', $transfer->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="petani_id" class="form-label">Pilih Petani</label>
            <select name="petani_id" class="form-control" required>
                @foreach ($petaniList as $petani)
                    <option value="{{ $petani->id }}" {{ $transfer->petani_id == $petani->id ? 'selected' : '' }}>{{ $petani->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="nominal" class="form-label">Nominal Transfer</label>
            <input type="number" name="nominal" class="form-control" value="{{ $transfer->nominal }}" required>
        </div>
        <div class="mb-3">
            <label>Foto Transfer (jpg/png/pdf)</label>
            <input type="file" class="form-control" name="foto_transfer" accept="image/*,.pdf">
            @if($transfer->foto_transfer)
                <p class="mt-2">File saat ini: <a href="{{ asset('storage/' . $transfer->foto_transfer) }}" target="_blank">Lihat Foto</a></p>
            @endif
        </div>
        <div class="mb-3">
            <label for="catatan" class="form-label">Catatan (opsional)</label>
            <textarea name="catatan" class="form-control">{{ $transfer->catatan }}</textarea>
        </div>
        <button type="submit" class="btn btn-success">Update</button>
    </form>
</div>
@endsection
