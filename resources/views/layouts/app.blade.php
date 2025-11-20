<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', config('app.name', 'Corporate Site'))</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="h-full bg-black text-white antialiased">
    <nav class="fixed top-0 w-full z-50 bg-black/80 backdrop-blur-md border-b border-gray-800">
        <div class="max-w-7xl mx-auto px-6 sm:px-8 lg:px-12">
            <div class="flex justify-between items-center h-20">
                <div class="flex-shrink-0">
                    <a href="{{ route('home') }}" class="text-xl font-light tracking-wider hover:text-gray-400 transition-colors">
                        SD-create
                    </a>
                </div>

                <div class="hidden md:flex space-x-12">
                    <a href="{{ route('projects.index') }}" class="text-sm font-light hover:text-gray-400 transition-colors {{ request()->routeIs('projects.*') ? 'text-gray-400' : '' }}">
                        Projects
                    </a>
                    <a href="{{ route('photos.index') }}" class="text-sm font-light hover:text-gray-400 transition-colors {{ request()->routeIs('photos.*') ? 'text-gray-400' : '' }}">
                        Photography
                    </a>
                    <a href="{{ route('shop.index') }}" class="text-sm font-light hover:text-gray-400 transition-colors {{ request()->routeIs('shop.*') ? 'text-gray-400' : '' }}">
                        Shop
                    </a>
                </div>

                <div class="flex items-center space-x-8">
                    <a href="{{ route('cart.index') }}" class="relative hover:text-gray-400 transition-colors">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                        </svg>
                        @if(session('cart_count', 0) > 0)
                            <span class="absolute -top-2 -right-2 bg-gray-600 text-white text-xs rounded-full h-5 w-5 flex items-center justify-center">
                                {{ session('cart_count', 0) }}
                            </span>
                        @endif
                    </a>

                    <button class="md:hidden" onclick="toggleMobileMenu()">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <div id="mobile-menu" class="md:hidden hidden bg-black border-t border-gray-800">
            <div class="px-6 py-4 space-y-4">
                <a href="{{ route('projects.index') }}" class="block text-sm font-light hover:text-gray-400 transition-colors">
                    Projects
                </a>
                <a href="{{ route('photos.index') }}" class="block text-sm font-light hover:text-gray-400 transition-colors">
                    Photography
                </a>
                <a href="{{ route('shop.index') }}" class="block text-sm font-light hover:text-gray-400 transition-colors">
                    Shop
                </a>
            </div>
        </div>
    </nav>

    <main class="pt-20 min-h-screen">
        @yield('content')
    </main>

    <footer class="bg-black border-t border-gray-800">
        <div class="max-w-7xl mx-auto px-6 sm:px-8 lg:px-12 py-12">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div>
                    <h3 class="text-lg font-light mb-4">SD-create</h3>
                    <p class="text-sm text-gray-400 font-light">
                        後藤翔栄 - Digital creator & developer
                    </p>
                </div>
                <div>
                    <h3 class="text-lg font-light mb-4">Links</h3>
                    <ul class="space-y-2 text-sm text-gray-400">
                        <li><a href="{{ route('projects.index') }}" class="hover:text-white transition-colors">Projects</a></li>
                        <li><a href="{{ route('photos.index') }}" class="hover:text-white transition-colors">Photography</a></li>
                        <li><a href="{{ route('shop.index') }}" class="hover:text-white transition-colors">Shop</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-lg font-light mb-4">Legal</h3>
                    <ul class="space-y-2 text-sm text-gray-400">
                        <li><a href="{{ route('legal') }}" class="hover:text-white transition-colors">特定商取引法に基づく表記</a></li>
                        <li><a href="{{ route('terms') }}" class="hover:text-white transition-colors">Terms of Service</a></li>
                    </ul>
                </div>
            </div>
            <div class="mt-12 pt-8 border-t border-gray-800 text-center text-sm text-gray-400">
                <p>&copy; {{ date('Y') }} All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script>
        function toggleMobileMenu() {
            const menu = document.getElementById('mobile-menu');
            menu.classList.toggle('hidden');
        }
    </script>
</body>
</html>
