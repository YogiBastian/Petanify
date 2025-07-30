@extends('layouts.admin')
@section('title', 'Kelola Kategori')

@section('content')
@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif
<a href="{{ route('admin.kategori.create') }}" class="btn btn-success mb-3">
    <i class="fa fa-plus"></i> Tambah Kategori
</a>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>#</th>
            <th>Foto</th>
            <th>Nama Kategori</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($kategoris as $i => $kat)
        <tr>
            <td>{{ $i + $kategoris->firstItem() }}</td>
            <td>
                @if($kat->foto)
                    <img src="{{ asset('storage/'.$kat->foto) }}" width="60">
                @endif
            </td>
            <td>{{ $kat->nama_kategori }}</td>
            <td>
                <a href="{{ route('admin.kategori.edit', $kat->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                <form action="{{ route('admin.kategori.destroy', $kat->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus?')">
                    @csrf @method('DELETE')
                    <button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                </form>
            </td>
        </tr>
        @endforeach
        @if($kategoris->isEmpty())
            <tr><td colspan="4" class="text-center text-muted">Belum ada kategori</td></tr>
        @endif
    </tbody>
</table>
{{ $kategoris->links() }}
@endsection
