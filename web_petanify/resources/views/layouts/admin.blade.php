<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title') - Admin Petanify</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Bootstrap & Font Awesome -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        body {
            display: flex;
            flex-direction: row;
            min-height: 100vh;
            margin: 0;
            font-family: 'Segoe UI', sans-serif;
        }
        .sidebar {
            background-color: #071308;
            color: white;
            min-width: 250px;
            transition: all 0.3s ease;
        }
        .sidebar.collapsed { min-width: 80px; }
        .sidebar .nav-link {
            color: #ffffffcc;
            padding: 12px 20px;
            display: flex;
            align-items: center;
        }
        .sidebar .nav-link:hover {
            background-color: #34344a;
            color: white;
        }
        .sidebar .nav-link i {
            margin-right: 12px;
            min-width: 20px;
            text-align: center;
        }
        .sidebar.collapsed .nav-link span { display: none; }
        .toggle-btn {
            background: none;
            border: none;
            color: white;
            font-size: 20px;
            margin-left: auto;
            padding: 10px;
        }
        .main-content {
            flex: 1;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            background-color: #f4f4f4;
        }
        .content-wrapper {
            flex: 1;
            padding: 20px;
        }
        footer {
            font-size: 0.85rem;
            text-align: center;
            padding: 10px 0;
        }
        /* Dark Mode */
        body.dark-mode,
        .main-content.dark-mode { background-color: #121212 !important; color: white !important; }
        .main-content.dark-mode .card { background-color: #1f1f1f; color: white; }
        .sidebar.dark-mode { background-color: #000000; }
        .sidebar.dark-mode .nav-link { color: #ccc; }
        .sidebar.dark-mode .nav-link:hover { background-color: #1c1c1c; color: white; }
    </style>
</head>
<body id="main-body">

    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <div class="d-flex align-items-center justify-content-between p-3">
            <img src="{{ asset('img/Petanify 2.png') }}" alt="Logo Admin" style="height: 36px;">
            <button class="toggle-btn" onclick="toggleSidebar()">☰</button>
        </div>

        <a href="{{ route('admin.dashboard') }}" class="nav-link"><i class="fas fa-home"></i> <span>Dashboard</span></a>
        <a href="{{ route('admin.post.manage') }}" class="nav-link"><i class="fas fa-newspaper"></i> <span>Kelola Postingan</span></a>
        <a href="{{ route('admin.comment.manage') }}" class="nav-link"><i class="fas fa-comments"></i> <span>Kelola Komentar</span></a>
        <a href="{{ route('admin.produk.index') }}" class="nav-link {{ Request::routeIs('admin.produk.*') ? 'active' : '' }}">
            <i class="fas fa-box"></i> <span>Kelola Produk</span>
        </a>
        <a href="{{ route('admin.kategori.index') }}" class="nav-link {{ Request::routeIs('admin.kategori.*') ? 'active' : '' }}">
            <i class="fas fa-tags"></i> <span>Kelola Kategori</span>
        </a>
        <a href="{{ route('admin.orders.index') }}" class="nav-link {{ Request::routeIs('admin.orders.*') ? 'active' : '' }}">
            <i class="fas fa-shopping-cart"></i> <span>Kelola Pesanan</span>
        </a>
        <a href="{{ route('admin.transfer_petani.index') }}" class="nav-link {{ Request::routeIs('admin.transfer_petani.*') ? 'active' : '' }}">
            <i class="fas fa-exchange-alt"></i> <span>Transfer Petani</span>
        </a>


        <a href="{{ route('admin.artikel.index') }}" class="nav-link {{ Request::routeIs('admin.artikel.*') ? 'active' : '' }}">
            <i class="fas fa-newspaper"></i> <span>Kelola Artikel</span>
        </a>
        <a href="{{ route('admin.videos.index') }}" class="nav-link {{ Request::routeIs('admin.videos.*') ? 'active' : '' }}">
            <i class="fas fa-video"></i> <span>Video Pembelajaran</span>
        </a>

        <!-- Logout -->
        <a href="{{ route('logout') }}" class="nav-link"
           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="fas fa-sign-out-alt"></i> <span>Keluar</span>
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">@csrf</form>
    </div>

    <!-- Main Content -->
    <div class="main-content" id="main-content">
        <!-- User Dropdown -->
        @auth
            <div class="dropdown-user" style="position:absolute; top:10px; right:20px;">
                <button id="userDropdownBtn" style="background:transparent;border:none;display:flex;align-items:center;gap:8px;cursor:pointer;font-weight:600;color:#222;">
                    <i class="fa-solid fa-user-circle fa-lg" style="color:#FFB800;"></i>
                    {{ Auth::user()->name }}
                    <i class="fa fa-caret-down" style="margin-left:4px;"></i>
                </button>
                <div id="userDropdownMenu" style="display:none;position:absolute;right:0;top:110%;background:#fff;border:1px solid #e0e0e0;box-shadow:0 2px 12px #aaa2;min-width:170px;border-radius:10px;z-index:99;">
                    <a href="{{ route('profile.edit') }}" style="display:block;padding:10px 18px;text-decoration:none;color:#333;font-weight:500;border-bottom:1px solid #f1f1f1;">Profil Saya</a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" style="width:100%;padding:10px 18px;text-align:left;background:none;border:none;color:#E02D2D;font-weight:bold;border-radius:0 0 10px 10px;cursor:pointer;">
                            Logout
                        </button>
                    </form>
                </div>
            </div>
        @endauth

        <!-- Page Content -->
        <div class="content-wrapper">
            <h4 class="fw-bold">@yield('title')</h4>
            <hr>
            @yield('content')
        </div>
        <footer class="text-muted">&copy; 2025 Petanify - Admin Panel</footer>
    </div>

    <!-- Scripts -->
    <script>
        function toggleSidebar() {
            document.getElementById('sidebar').classList.toggle('collapsed');
        }

        document.addEventListener('DOMContentLoaded', function () {
            // Dark mode state
            const isDark = localStorage.getItem('darkMode') === 'true';
            const body = document.getElementById('main-body');
            const content = document.getElementById('main-content');
            const sidebar = document.getElementById('sidebar');
            if (isDark) {
                body.classList.add('dark-mode');
                content.classList.add('dark-mode');
                sidebar.classList.add('dark-mode');
            }

            // Dropdown toggle
            const btn = document.getElementById('userDropdownBtn');
            const menu = document.getElementById('userDropdownMenu');
            if (btn && menu) {
                btn.onclick = function (e) {
                    e.stopPropagation();
                    menu.style.display = (menu.style.display === 'block') ? 'none' : 'block';
                };
                document.addEventListener('click', function () {
                    menu.style.display = 'none';
                });
            }
        });
    </script>
</body>
</html>
