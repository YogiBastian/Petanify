@extends('layouts.admin')

@section('title', 'Manajemen Postingan Forum')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8"> {{-- Lebar dikurangi agar lebih kecil --}}

            @forelse ($posts as $post)
                <div class="card mb-4 shadow-sm p-3 rounded">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <strong>{{ $post->user->name }}</strong> –
                            <small class="text-muted">{{ $post->created_at->diffForHumans() }}</small>
                        </div>
                        <form method="POST" action="{{ route('admin.post.delete', $post->id) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-outline-danger"
                                    onclick="return confirm('Hapus postingan ini?')">
                                <i class="fas fa-trash-alt"></i> Hapus
                            </button>
                        </form>
                    </div>
                    <div class="mt-3">
                        <p class="mb-0">{{ $post->content }}</p>
                        @if($post->image)
                            <img src="{{ asset('storage/' . $post->image) }}" class="mt-3 rounded img-fluid d-block mx-auto"
                                 style="max-height: 250px;" />
                        @endif
                    </div>
                </div>
            @empty
                <div class="alert alert-info text-center">
                    Belum ada postingan forum yang tersedia.
                </div>
            @endforelse
        </div>
    </div>
@endsection
