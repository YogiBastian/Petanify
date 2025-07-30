<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-green-700">
            {{ $video->title }}
        </h2>
    </x-slot>

    <section class="flex flex-col md:flex-row gap-8 py-10 bg-gray-50 min-h-[90vh]">
        {{-- MAIN CONTENT --}}
        <div class="flex-1 max-w-3xl mx-auto bg-white rounded-2xl shadow-xl border p-0 overflow-hidden">
            <div class="relative aspect-video w-full bg-black">
                <iframe
                    src="https://www.youtube.com/embed/{{ $video->youtube_id }}"
                    class="w-full h-full rounded-t-2xl"
                    frameborder="0"
                    allowfullscreen>
                </iframe>
            </div>

            <div class="flex items-center gap-3 px-6 py-4 border-b border-gray-100 bg-white">
                <img
                    src="{{ asset('img/Petanify 2.png') }}"  {{-- ganti dengan nama file sesuai yang Anda simpan di /public/img --}}
                    alt="Foto Admin"
                    class="w-12 h-12 rounded-full border object-cover"
                >
                <div>
                    <div class="font-semibold text-gray-700">{{ $video->uploader_name ?? 'Admin Petanify' }}</div>
                    <div class="text-gray-400 text-xs">{{ $video->published_at ? $video->published_at->diffForHumans() : '2025' }}</div>
                </div>
                
            </div>

            <div class="px-6 py-6 bg-white">
                <h1 class="text-2xl md:text-3xl font-extrabold text-green-700 mb-2">{{ $video->title }}</h1>
                <div class="text-gray-700 text-base mb-4">{{ $video->description }}</div>
                
                {{-- Komentar --}}
                <div class="mt-8">
                    <h3 class="text-lg font-bold text-gray-800 mb-3">Komentar</h3>
                    <form action="{{ route('petani.videos.komentar.store', $video->id) }}" method="POST" class="flex gap-2 mb-4">
                        @csrf
                        <input type="text" name="comment" class="flex-1 px-3 py-2 rounded-lg bg-gray-100 text-gray-800 border" placeholder="Tulis komentar...">
                        <button class="px-4 py-2 bg-green-600 rounded-lg text-white font-semibold">Kirim</button>
                    </form>

                    <div class="space-y-3">
                        @foreach($video->comments as $comment)
                            <div class="bg-gray-100 p-3 rounded-lg flex gap-2 items-start">
                                                                <img 
                                    src="{{ $comment->user && $comment->user->foto 
                                        ? asset('storage/foto_profil/' . $comment->user->foto)
                                        : asset('img/default-user.png') 
                                    }}" 
                                    class="w-8 h-8 rounded-full border object-cover"
                                >
                                <div>
                                    <div class="text-gray-700 font-semibold">{{ $comment->user->name ?? 'User' }}</div>
                                    <div class="text-gray-600 text-sm">{{ $comment->content }}</div>
                                    <div class="text-gray-400 text-xs">{{ $comment->created_at->diffForHumans() }}</div>
                                </div>
                            </div>
                        @endforeach
                        @if($video->comments->isEmpty())
                            <div class="text-gray-500 text-sm">Belum ada komentar.</div>
                        @endif
                    </div>
                </div>
                <a href="{{ route('petani.videos.index') }}"
                   class="inline-block mt-8 text-green-700 hover:underline font-semibold">
                    &larr; Kembali ke daftar video
                </a>
            </div>
        </div>

        {{-- SIDEBAR: Related Videos --}}
        <div class="w-full max-w-sm mx-auto md:mx-0 mt-12 md:mt-0">
            <div class="bg-white rounded-2xl shadow border p-4">
                <div class="font-bold text-gray-700 mb-4">Related Videos</div>
                <div class="space-y-3">
                    @foreach($relatedVideos as $related)
                        <a href="{{ route('petani.videos.show', $related->id) }}" class="flex gap-3 hover:bg-gray-100 p-2 rounded-lg transition">
                            <img src="https://img.youtube.com/vi/{{ $related->youtube_id }}/mqdefault.jpg"
                                 class="w-16 h-10 rounded-lg object-cover" />
                            <div>
                                <div class="font-semibold text-gray-800 text-sm mb-1">{{ \Str::limit($related->title, 35) }}</div>
                                <div class="text-gray-500 text-xs">{{ \Str::limit($related->description, 35) }}</div>
                            </div>
                        </a>
                    @endforeach
                </div>
                <a href="{{ route('petani.videos.index') }}"
                   class="block text-center mt-5 px-4 py-2 bg-green-700 text-white rounded-lg font-semibold hover:bg-green-800 transition">
                    Lihat semua video
                </a>
            </div>
        </div>
    </section>
</x-app-layout>
