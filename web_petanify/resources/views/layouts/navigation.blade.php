@php
    $role = Auth::user()->role ?? null;
@endphp

<style>
    .nav-container {
        display: flex;
        align-items: center;
        justify-content: space-between;
        max-width: 1280px;
        margin: auto;
        padding: 0 32px;
        height: 70px;
        font-family: 'Bricolage Grotesque', 'Delius', sans-serif;
        position: relative;
        z-index: 50;
    }
    .logo-img {
        height: 42px;
        margin-right: 8px;
        transition: transform 0.25s cubic-bezier(0.65,0,0.35,1);
    }
    .logo-img:hover {
        transform: scale(1.10) rotate(-5deg);
    }
    .nav-menu {
        display: flex;
        gap: 36px;
        list-style: none;
        justify-content: center;
        align-items: center;
        margin: 0;
        padding: 0;
    }
    .nav-menu a {
        font-weight: 500;
        color: #222;
        position: relative;
        transition: color 0.2s cubic-bezier(.55,0,.1,1);
        text-decoration: none;
        font-family: inherit;
        font-size: 1.09rem;
        padding-bottom: 2px;
    }
    .nav-menu a.active, .nav-menu a:focus, .nav-menu a:hover {
        color: #FFB800;
    }
    .nav-menu a.active::after,
    .nav-menu a:hover::after {
        content: '';
        display: block;
        width: 26px;
        margin: 3px auto 0 auto;
        border-bottom: 3px solid #FFB800;
        border-radius: 3px;
        animation: underlineFadeIn 0.3s;
    }
    @keyframes underlineFadeIn {
        from {width:0; opacity:0;}
        to {width:26px; opacity:1;}
    }
    .navbar-actions {
        display: flex;
        gap: 14px;
        align-items: center;
    }
    .sign-in-link {
        font-weight: 500;
        color: #222;
        text-decoration: none;
        transition: color 0.2s;
    }
    .sign-in-link:hover {
        color: #FFB800;
    }
    .get-started-btn {
        padding: 8px 24px;
        border-radius: 25px;
        background: #FFB800;
        color: #fff;
        font-weight: bold;
        text-decoration: none;
        box-shadow: 0 2px 8px #ffb80033;
        transition: background 0.2s, box-shadow 0.2s;
    }
    .get-started-btn:hover {
        background: #ffa900;
        box-shadow: 0 4px 12px #ffb80033;
    }
</style>

<header style="background: #fff; border-bottom: 1px solid #eee; box-shadow: 0 2px 8px #00000008;">
    <div class="nav-container"
         style="display: flex; align-items: center; justify-content: space-between; max-width: 1280px; margin: auto; padding: 0 32px; height: 70px;">
        
        {{-- Logo - PALING KIRI --}}
        <div class="logo" style="display: flex; align-items: center;">
            <img src="{{ asset('img/Petanify 2.png') }}" alt="Petanify Logo" class="logo-img" style="height: 42px;">
        </div>

        {{-- Navigation Menu by Role --}}
        <nav style="flex:1;">
            <ul class="nav-menu">
                @if($role === 'admin')
                    <li><a href="{{ route('admin.dashboard') }}" class="{{ Request::routeIs('admin.dashboard') ? 'active' : '' }}">Dashboard</a></li>
                @elseif($role === 'petani')
                    <li><a href="{{ route('petani.dashboard') }}" class="{{ Request::routeIs('petani.dashboard') ? 'active' : '' }}">Home</a></li>
                    <li><a href="{{ route('petani.forum.index') }}" class="{{ Request::routeIs('petani.forum.index') ? 'active' : '' }}">Forum</a></li>
                    <li><a href="{{ route('petani.marketplace.index') }}" class="{{ Request::routeIs('petani.marketplace.index') ? 'active' : '' }}">Marketplace</a></li>
                    <li><a href="{{ route('petani.kelola-produk.index') }}" class="{{ Request::routeIs('petani.kelola-produk.*') ? 'active' : '' }}">Kelola Produk</a></li>
 <li>
        <a href="{{ route('petani.videos.index') }}" class="{{ Request::routeIs('petani.videos.*') ? 'active' : '' }}">
            Video Pembelajaran
        </a>
    </li>
            <li>
            <a href="{{ route('petani.artikel.index') }}" class="{{ Request::routeIs('petani.artikel.index*') ? 'active' : '' }}">
                Artikel
            </a>
        </li>
        
                    {{-- Tambah menu petani lain di sini --}}
                @elseif($role === 'pembeli')
                    <li><a href="{{ route('pembeli.dashboard') }}" class="{{ Request::routeIs('pembeli.dashboard') ? 'active' : '' }}">Home</a></li>
                    <li><a href="{{ route('pembeli.forum.index') }}" class="{{ Request::routeIs('pembeli.forum.index') ? 'active' : '' }}">Forum</a></li>
                        <li>
        <a href="{{ route('pembeli.marketplace.index') }}" class="{{ Request::routeIs('pembeli.marketplace.index') ? 'active' : '' }}">
                    Marketplace
                </a>
            </li>

             <li>
        <a href="{{ route('pembeli.videos.index') }}" class="{{ Request::routeIs('pembeli.videos.*') ? 'active' : '' }}">
            Video Pembelajaran
        </a>
    </li>

        <li>
            <a href="{{ route('pembeli.artikel.index') }}" class="{{ Request::routeIs('pembeli.artikel.index*') ? 'active' : '' }}">
                Artikel
            </a>
        </li>

                
                    {{-- Tambah menu pembeli lain di sini --}}
                @else
                    <li><a href="/" class="{{ Request::is('/') ? 'active' : '' }}">Home</a></li>
                    <li><a href="#about" class="">About</a></li>
                    <li><a href="#faq" class="">FAQ</a></li>
                    <li><a href="#contact" class="">Contact Us</a></li>
                @endif
            </ul>
        </nav>

<div class="navbar-actions" style="display: flex; align-items: center; gap: 18px;">
    {{-- IKON KERANJANG --}}

@if($role === 'petani')
    <a href="{{ route('petani.keranjang') }}" class="relative group mx-2 text-green-700 hover:text-green-800" style="font-size:1.42rem;">
        <i class="fa fa-shopping-cart"></i>
        @if($cartCount > 0)
            <span class="absolute -top-2 -right-2 bg-red-600 text-white text-xs rounded-full px-1.5" style="font-size:0.81rem;">
                {{ $cartCount }}
            </span>
        @endif
    </a>
    <a href="{{ route('petani.orders.index') }}" title="Pesanan" class="relative group mx-2 text-blue-700 hover:text-blue-800" style="font-size:1.40rem;">
        <i class="fa fa-clipboard-list"></i>
    </a>
@elseif($role === 'pembeli')
    <a href="{{ route('pembeli.keranjang.index') }}" class="relative group mx-2 text-green-700 hover:text-green-800" style="font-size:1.42rem;">
        <i class="fa fa-shopping-cart"></i>
        @if($cartCount > 0)
            <span class="absolute -top-2 -right-2 bg-red-600 text-white text-xs rounded-full px-1.5" style="font-size:0.81rem;">
                {{ $cartCount }}
            </span>
        @endif
    </a>
    <a href="{{ route('pembeli.orders.index') }}" title="Pesanan" class="relative group mx-2 text-blue-700 hover:text-blue-800" style="font-size:1.40rem;">
        <i class="fa fa-clipboard-list"></i>
    </a>
@endif


    {{-- USER DROPDOWN --}}
    @auth
        <div class="dropdown-user" style="position:relative;">
            <button id="userDropdownBtn" style="background:transparent;border:none;display:flex;align-items:center;gap:8px;cursor:pointer;font-weight:600;color:#222;">
                <i class="fa-solid fa-user-circle fa-lg" style="color:#FFB800;"></i>
                {{ Auth::user()->name }}
                <i class="fa fa-caret-down" style="margin-left:4px;"></i>
            </button>
                <div id="userDropdownMenu" style="display:none;position:absolute;right:0;top:110%;background:#fff;border:1px solid #e0e0e0;box-shadow:0 2px 12px #aaa2;min-width:170px;border-radius:10px;z-index:99;">
                    <a href="{{ route('profile.edit') }}" style="display:block;padding:10px 18px;text-decoration:none;color:#333;font-weight:500;border-bottom:1px solid #f1f1f1;">Profil Saya</a>
                    
                    @php $role = Auth::user()->role ?? null; @endphp
                    @if($role === 'petani')
                        <a href="{{ route('petani.transfer.index') }}" style="display:block;padding:10px 18px;text-decoration:none;color:#333;font-weight:500;border-bottom:1px solid #f1f1f1;">
                            Riwayat Penerimaan
                        </a>
                    @endif
                
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" style="width:100%;padding:10px 18px;text-align:left;background:none;border:none;color:#E02D2D;font-weight:bold;border-radius:0 0 10px 10px;cursor:pointer;">
                            Logout
                        </button>
                    </form>
                </div>
        </div>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var btn = document.getElementById('userDropdownBtn');
                var menu = document.getElementById('userDropdownMenu');
                btn.onclick = function(e){
                    e.stopPropagation();
                    menu.style.display = (menu.style.display === 'block') ? 'none' : 'block';
                };
                document.addEventListener('click', function(){
                    menu.style.display = 'none';
                });
            });
        </script>
    @else
        <a href="{{ route('login') }}" class="sign-in-link">Sign in</a>
        <a href="{{ route('register') }}" class="get-started-btn">Get Started</a>
    @endauth
</div>

    </div>
</header>