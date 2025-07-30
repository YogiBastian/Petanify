{{-- resources/views/pembeli/forum/show.blade.php --}}
<x-app-layout>
    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        {{-- Judul Postingan Forum --}}
        <h1 class="text-3xl font-bold mb-4">
            {{ $post->title ?? \Illuminate\Support\Str::limit($post->content, 50) }}
        </h1>

        {{-- Informasi Penulis Post --}}
        <div class="flex items-center mb-4">
            <img src="{{ $post->user->profile_photo_url }}" class="w-10 h-10 rounded-full mr-3 object-cover" alt="{{ $post->user->name }}">
            <div>
                <p class="font-semibold">{{ $post->user->name }}</p>
                <p class="text-sm text-gray-500">{{ $post->created_at->diffForHumans() }}</p>
            </div>
        </div>

        {{-- Konten Postingan Forum --}}
        <div class="prose max-w-none mb-6">
            {!! nl2br(e($post->content)) !!}
        </div>

        {{-- Menampilkan gambar postingan (jika ada) --}}
        @if ($post->image)
            <img src="{{ asset('storage/' . $post->image) }}" alt="Gambar Postingan" class="mt-4 max-w-full h-auto rounded-lg">
        @endif

        {{-- Bagian Komentar --}}
        {{-- Jika Anda tidak membuat Blade Component 'comment-section', gunakan kode ini: --}}
        @if($post->comments->count() > 0)
            <h2 class="text-xl font-bold mt-8 mb-4">Komentar</h2>
            <div class="space-y-4">
                @foreach($post->comments as $comment)
                    <div class="flex items-start gap-3 p-3 bg-gray-50 rounded-lg">
                        <img src="{{ $comment->user->profile_photo_url }}" class="w-8 h-8 rounded-full object-cover" alt="{{ $comment->user->name }}">
                        <div>
                            <p class="font-semibold text-sm">{{ $comment->user->name }} <span class="text-xs text-gray-500 ml-2">{{ $comment->created_at->diffForHumans() }}</span></p>
                            <p class="text-gray-700 text-sm">{!! nl2br(e($comment->comment)) !!}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <p class="text-gray-500 italic mt-8">Belum ada komentar.</p>
        @endif

        {{-- Form Komentar --}}
        <form method="POST" action="{{ route('pembeli.comment.store', $post->id) }}" class="mt-4 flex gap-2">
            @csrf
            <input type="text" name="comment" placeholder="Tulis komentar..." required class="flex-1 border-gray-300 rounded-md shadow-sm focus:border-green-300 focus:ring focus:ring-green-200 focus:ring-opacity-50">
            <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-md font-semibold"><i class="fa fa-paper-plane"></i> Kirim</button>
        </form>

        {{-- Tombol Kembali --}}
        <a href="{{ route('pembeli.dashboard') }}" class="text-green-600 hover:underline mt-6 inline-block">
            &larr; Kembali ke Dashboard Pembeli
        </a>
    </div>
</x-app-layout>