@extends('layouts.admin')

@section('title', 'Manajemen Komentar Forum')

@section('content')
    <div class="container d-flex justify-content-center">
        <div class="row w-100 justify-content-center">
            @forelse ($comments as $comment)
                <div class="col-md-8 mb-3">
                    <div class="card p-3 shadow-sm rounded">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <div>
                                <strong>{{ $comment->user->name }}</strong> mengomentari:
                                <span class="text-muted">"{{ \Illuminate\Support\Str::limit($comment->post->content, 60) }}"</span>
                            </div>
                            <form method="POST" action="{{ route('admin.comment.delete', $comment->id) }}" onsubmit="return confirm('Yakin ingin hapus komentar ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger">
                                    <i class="fas fa-trash-alt"></i> Hapus
                                </button>
                            </form>
                        </div>
                        <p class="mb-1">{{ $comment->comment }}</p>
                        <small class="text-muted">{{ $comment->created_at->diffForHumans() }}</small>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center">
                    <div class="alert alert-info">
                        Belum ada komentar yang tersedia.
                    </div>
                </div>
            @endforelse
        </div>
    </div>
@endsection
