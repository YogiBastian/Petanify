<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', config('app.name', 'Petanify'))</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;700&display=swap" rel="stylesheet" />
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Bricolage+Grotesque:opsz,wght@12..96,200..800&family=Delius&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />

    <!-- Tailwind CSS CDN (for CDN fallback/landing) -->
    <script src="https://cdn.tailwindcss.com"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @stack('styles')
    @livewireStyles

    <style>
        html, body { height: 100%; margin: 0; }
        body { min-height: 100vh; display: flex; flex-direction: column; font-family: 'Montserrat', 'figtree', sans-serif; }
        main { flex: 1 0 auto; }
        footer { flex-shrink: 0; }
    </style>
</head>
<body class="font-sans antialiased bg-gray-100">
    <div class="min-h-screen flex flex-col bg-gray-100">

        {{-- Optional Flash Message --}}
        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mx-auto my-4 max-w-2xl">
                {{ session('success') }}
            </div>
        @endif

        {{-- Page Content --}}
        <main class="flex-1 px-4 sm:px-6 lg:px-8 py-6 flex items-center justify-center">
            <div class="container max-w-lg mx-auto">
                {{ $slot ?? '' }}
                @yield('content')
            </div>
        </main>
        {{-- Tidak ada footer untuk guest --}}
    </div>

    @stack('scripts')
    @livewireScripts
</body>
</html>
