<x-app-layout>
    {{-- Header besar di tengah --}}
    <div class="text-center mt-12 mb-12">
        <div class="inline-flex items-center gap-2 px-3 py-1 mb-4 rounded-full bg-blue-50 text-blue-700 text-sm font-semibold shadow">
            <svg class="w-5 h-5 text-blue-600" fill="currentColor" viewBox="0 0 20 20"><path d="M4 3a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V7.414a1 1 0 0 0-.293-.707l-4.414-4.414A1 1 0 0 0 11.586 2H4zm11 14H5a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h6v5a1 1 0 0 0 1 1h5v8a1 1 0 0 1-1 1z"/></svg>
            Petanify • Video Edukasi
        </div>
        <h1 class="text-4xl md:text-6xl font-extrabold mb-4 tracking-tight">
            Jelajahi <span class="text-green-600">Video Pembelajaran</span> Petanify
        </h1>
        <div class="text-lg text-gray-500 mb-8">
            Temukan, pelajari, dan tingkatkan wawasan pertanian dari para ahli & komunitas terbaik.
        </div>

        {{-- Search Bar --}}
        <form method="GET" action="{{ route('pembeli.videos.index') }}" class="flex justify-center mb-6">
            <input type="text" name="q" value="{{ request('q') }}"
                class="w-full max-w-md px-4 py-2 border border-gray-300 rounded-l-full focus:outline-none focus:ring-2 focus:ring-green-200"
                placeholder="Cari video, topik, atau nama...">
            <button type="submit"
                class="bg-green-600 px-6 py-2 rounded-r-full text-white font-semibold hover:bg-green-700 transition">
                Cari
            </button>
        </form>

        {{-- Kategori Filter --}}
        <div class="flex flex-wrap gap-2 justify-center mb-6">
            <a href="{{ route('pembeli.videos.index', array_merge(request()->except('page'), ['kategori' => 'petani'])) }}"
               class="px-4 py-1 rounded-full border text-green-700 border-green-600 hover:bg-green-50 font-semibold text-sm transition {{ request('kategori') === 'petani' ? 'bg-green-100' : '' }}">
                Untuk Petani
            </a>
            <a href="{{ route('pembeli.videos.index', array_merge(request()->except('page'), ['kategori' => 'pembeli'])) }}"
               class="px-4 py-1 rounded-full border text-blue-700 border-blue-600 hover:bg-blue-50 font-semibold text-sm transition {{ request('kategori') === 'pembeli' ? 'bg-blue-100' : '' }}">
                Untuk Pembeli
            </a>
            <a href="{{ route('pembeli.videos.index', request()->except(['kategori', 'page'])) }}"
               class="px-4 py-1 rounded-full border text-gray-700 border-gray-400 hover:bg-gray-100 font-semibold text-sm transition {{ request('kategori') === null ? 'bg-gray-100' : '' }}">
                Semua Video
            </a>
        </div>
    </div>

    {{-- Grid Card Video --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8 mb-16">
        @forelse($videos as $video)
            <div class="bg-white rounded-xl shadow hover:shadow-2xl transition p-0 flex flex-col overflow-hidden">
                <a href="{{ route('pembeli.videos.show', $video->id) }}">
                    <img src="https://img.youtube.com/vi/{{ $video->youtube_id }}/hqdefault.jpg"
                         alt="Thumbnail"
                         class="w-full h-48 object-cover transition hover:scale-105" />
                </a>
                <div class="flex-1 px-5 py-4 flex flex-col">
                    <h3 class="font-bold text-lg mb-1 line-clamp-2">{{ $video->title }}</h3>
                    <div class="text-gray-600 text-sm mb-2 line-clamp-2">{{ \Str::limit($video->description, 70) }}</div>
                    <a href="{{ route('pembeli.videos.show', $video->id) }}"
                       class="inline-block mt-auto px-4 py-2 bg-green-600 text-white rounded font-semibold text-sm hover:bg-green-700 transition">
                        <i class="fas fa-play"></i> Tonton Video
                    </a>
                </div>
            </div>
        @empty
            <div class="col-span-3 text-center text-gray-500 py-8">
                Belum ada video pembelajaran.
            </div>
        @endforelse
    </div>

    <div class="mt-8">
        {{ $videos->links() }}
    </div>
</x-app-layout>
