<!DOCTYPE html>
<html lang="ja" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Admin Dashboard')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="h-full bg-black text-white antialiased">
    <div class="min-h-full">
        <nav class="bg-gray-900 border-b border-gray-800">
            <div class="max-w-7xl mx-auto px-6">
                <div class="flex justify-between items-center h-16">
                    <div class="flex items-center gap-12">
                        <h1 class="text-xl font-light">Admin Panel</h1>
                        <div class="hidden md:flex gap-8">
                            <a href="{{ route('admin.dashboard') }}" class="text-sm {{ request()->routeIs('admin.dashboard') ? 'text-white' : 'text-gray-400 hover:text-white' }} transition-colors">
                                Dashboard
                            </a>
                            <a href="{{ route('admin.photos.index') }}" class="text-sm {{ request()->routeIs('admin.photos.*') ? 'text-white' : 'text-gray-400 hover:text-white' }} transition-colors">
                                Photos
                            </a>
                            <a href="{{ route('admin.products.index') }}" class="text-sm {{ request()->routeIs('admin.products.*') ? 'text-white' : 'text-gray-400 hover:text-white' }} transition-colors">
                                Products
                            </a>
                            <a href="{{ route('admin.orders.index') }}" class="text-sm {{ request()->routeIs('admin.orders.*') ? 'text-white' : 'text-gray-400 hover:text-white' }} transition-colors">
                                Orders
                            </a>
                        </div>
                    </div>

                    <div class="flex items-center space-x-6">
                        <a href="{{ route('home') }}" target="_blank" class="text-sm text-gray-400 hover:text-white transition-colors">
                            View Site →
                        </a>
                        <form action="{{ route('admin.logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="text-sm text-gray-400 hover:text-white transition-colors">
                                Logout
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </nav>

        <main class="max-w-7xl mx-auto px-6 py-12">
            @if(session('success'))
                <div class="mb-8 p-4 bg-green-900/20 border border-green-800 text-green-400">
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="mb-8 p-4 bg-red-900/20 border border-red-800 text-red-400">
                    {{ session('error') }}
                </div>
            @endif

            @yield('content')
        </main>
    </div>
</body>
</html>
