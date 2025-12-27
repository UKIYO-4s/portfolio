<!DOCTYPE html>
<html lang="ja" class="h-full" data-font="c">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', '管理画面')</title>
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville:wght@400;700&family=Sora:wght@300;400;500;600&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="h-full bg-black text-white antialiased">
    <div class="min-h-full">
        <nav class="bg-gray-900 border-b border-gray-800">
            <div class="max-w-7xl mx-auto px-6">
                <div class="flex justify-between items-center h-16">
                    <div class="flex items-center gap-12">
                        <h1 class="text-xl font-medium" data-ja="管理画面" data-en="Admin Panel">管理画面</h1>
                        <div class="hidden md:flex gap-8">
                            <a href="{{ route('admin.dashboard') }}" class="text-sm {{ request()->routeIs('admin.dashboard') ? 'text-white' : 'text-gray-400 hover:text-white' }} transition-colors" data-ja="ダッシュボード" data-en="Dashboard">
                                ダッシュボード
                            </a>
                            <a href="{{ route('admin.photos.index') }}" class="text-sm {{ request()->routeIs('admin.photos.*') ? 'text-white' : 'text-gray-400 hover:text-white' }} transition-colors" data-ja="写真" data-en="Photos">
                                写真
                            </a>
                            <a href="{{ route('admin.products.index') }}" class="text-sm {{ request()->routeIs('admin.products.*') ? 'text-white' : 'text-gray-400 hover:text-white' }} transition-colors" data-ja="商品" data-en="Products">
                                商品
                            </a>
                            <a href="{{ route('admin.orders.index') }}" class="text-sm {{ request()->routeIs('admin.orders.*') ? 'text-white' : 'text-gray-400 hover:text-white' }} transition-colors" data-ja="注文" data-en="Orders">
                                注文
                            </a>
                            <a href="{{ route('admin.settings') }}" class="text-sm {{ request()->routeIs('admin.settings') ? 'text-white' : 'text-gray-400 hover:text-white' }} transition-colors" data-ja="設定" data-en="Settings">
                                設定
                            </a>
                        </div>
                    </div>

                    <div class="flex items-center space-x-6">
                        <button onclick="toggleLanguage()" class="text-sm text-gray-400 hover:text-white border border-gray-700 px-3 py-1 rounded">
                            <span id="lang-toggle">English</span>
                        </button>
                        <a href="{{ route('home') }}" target="_blank" class="text-sm text-gray-400 hover:text-white transition-colors" data-ja="サイトを見る →" data-en="View Site →">
                            サイトを見る →
                        </a>
                        <form action="{{ route('admin.logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="text-sm text-gray-400 hover:text-white transition-colors" data-ja="ログアウト" data-en="Logout">
                                ログアウト
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

    <script>
    let currentLang = 'ja';

    function toggleLanguage() {
        currentLang = currentLang === 'ja' ? 'en' : 'ja';
        document.getElementById('lang-toggle').textContent = currentLang === 'ja' ? 'English' : '日本語';

        document.querySelectorAll('[data-ja]').forEach(el => {
            if (el.hasAttribute('data-' + currentLang)) {
                el.textContent = el.getAttribute('data-' + currentLang);
            }
        });
    }
    </script>
</body>
</html>
