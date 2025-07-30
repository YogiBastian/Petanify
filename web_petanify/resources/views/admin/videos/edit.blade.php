@extends('layouts.admin')
@section('title', 'Edit Video Pembelajaran')

@section('content')
<div class="max-w-2xl mx-auto mt-8">
    <div class="card card-body">
        <h2 class="font-bold text-lg mb-4">Edit Video</h2>
        <form action="{{ route('admin.videos.update', $video->id) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')
            <div>
                <label class="font-semibold">Judul Video</label>
                <input type="text" name="title" class="form-control" value="{{ old('title', $video->title) }}" required>
            </div>
            <div>
                <label class="font-semibold">Deskripsi</label>
                <textarea name="description" rows="4" class="form-control" required>{{ old('description', $video->description) }}</textarea>
            </div>
            <div>
                <label class="font-semibold">Link YouTube</label>
                <input type="url" name="youtube_url" class="form-control" value="{{ old('youtube_url', $video->youtube_url) }}" required>
            </div>
            <div>
                <label class="font-semibold">Ditujukan Untuk</label>
                <select name="target_audience" class="form-control" required>
                    <option value="semua" {{ $video->target_audience=='semua' ? 'selected' : '' }}>Semua</option>
                    <option value="petani" {{ $video->target_audience=='petani' ? 'selected' : '' }}>Petani</option>
                    <option value="pembeli" {{ $video->target_audience=='pembeli' ? 'selected' : '' }}>Pembeli</option>
                </select>
            </div>
            <button type="submit" class="btn btn-success px-4">Update</button>
            <a href="{{ route('admin.videos.index') }}" class="btn btn-secondary px-4 ml-2">Batal</a>
        </form>
    </div>
</div>
@endsection
