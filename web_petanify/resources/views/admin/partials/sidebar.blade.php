<aside class="w-64 fixed md:relative inset-y-0 left-0 bg-white border-r shadow-sm z-20">
    <div class="p-6 font-bold text-green-600 text-xl">
        Petanify Admin
    </div>

    <nav class="space-y-2 px-6">
        {{-- Dashboard --}}
        <a href="{{ route('admin.dashboard') }}"
           class="flex items-center space-x-2 p-2 rounded transition
                  {{ request()->routeIs('admin.dashboard') 
                       ? 'bg-green-50 font-semibold text-green-700' 
                       : 'hover:bg-green-100 text-gray-700' }}">
            <span>📊</span><span>Dashboard</span>
        </a>

        {{-- Post --}}
        <a href="{{ route('admin.post.manage') }}"
           class="flex items-center space-x-2 p-2 rounded transition
                  {{ request()->routeIs('admin.post.manage') 
                       ? 'bg-green-50 font-semibold text-green-700' 
                       : 'hover:bg-green-100 text-gray-700' }}">
            <span>📝</span><span>Kelola Postingan</span>
        </a>

        {{-- Comment --}}
        <a href="{{ route('admin.comment.manage') }}"
           class="flex items-center space-x-2 p-2 rounded transition
                  {{ request()->routeIs('admin.comment.manage') 
                       ? 'bg-green-50 font-semibold text-green-700' 
                       : 'hover:bg-green-100 text-gray-700' }}">
            <span>💬</span><span>Kelola Komentar</span>
        </a>

        {{-- Produk --}}
        <a href="{{ route('admin.marketplace.index') }}"
        class="flex items-center space-x-2 p-2 rounded transition
                {{ request()->routeIs('admin.produk.*') 
                    ? 'bg-green-50 font-semibold text-green-700' 
                    : 'hover:bg-green-100 text-gray-700' }}">
            <span>📦</span><span>Kelola Produk</span>
        </a>

        {{-- Kategori --}}
        <a href="{{ route('admin.kategori.index') }}"
        class="flex items-center space-x-2 p-2 rounded transition
                {{ request()->routeIs('admin.kategori.*') 
                    ? 'bg-green-50 font-semibold text-green-700' 
                    : 'hover:bg-green-100 text-gray-700' }}">
            <span>🏷️</span><span>Kelola Kategori</span>
        </a>

        {{-- Pesanan --}}
        <a href="{{ route('admin.orders.index') }}"
           class="flex items-center space-x-2 p-2 rounded transition
                  {{ request()->routeIs('admin.orders.*') 
                      ? 'bg-green-50 font-semibold text-green-700' 
                      : 'hover:bg-green-100 text-gray-700' }}">
            <span>🧾</span><span>Kelola Pesanan</span>
        </a>

        {{-- Artikel --}}
        <a href="{{ route('admin.artikel.index') }}"
        class="flex items-center space-x-2 p-2 rounded transition
                {{ request()->routeIs('admin.artikel.*') 
                    ? 'bg-green-50 font-semibold text-green-700' 
                    : 'hover:bg-green-100 text-gray-700' }}">
            <span>📰</span><span>Kelola Artikel</span>
        </a>

        {{-- Video Pembelajaran --}}
        <a href="{{ route('admin.videos.index') }}"
        class="flex items-center space-x-2 p-2 rounded transition
                {{ request()->routeIs('admin.videos.*') 
                    ? 'bg-green-50 font-semibold text-green-700' 
                    : 'hover:bg-green-100 text-gray-700' }}">
            <span>🎥</span><span>Video Pembelajaran</span>
        </a>

    </nav>
</aside>
