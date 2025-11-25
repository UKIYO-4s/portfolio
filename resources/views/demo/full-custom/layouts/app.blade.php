<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Funky Co.') - フルカスタムHPデモ</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&family=Baloo+2:wght@400;700&display=swap" rel="stylesheet">

    <style>
        :root {
            /* === メインパレット（3色のみ）=== */
            --retro-orange: #FF8C42;
            --retro-cyan: #06AED5;
            --retro-pink: #FF6B9D;

            /* === 背景・ベース === */
            --retro-bg: #FFF8E7;
            --retro-border: #1F2937; /* gray-800 */
        }

        body {
            font-family: 'Baloo 2', cursive;
            background-color: var(--retro-bg);
            background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 200 200' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='noise'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.65' numOctaves='3' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23noise)' opacity='0.05'/%3E%3C/svg%3E");
            line-height: 1.6;
        }

        /* === タイポグラフィ階層 === */
        h1, h2, h3, h4 {
            font-family: 'Fredoka One', cursive;
            letter-spacing: 0.05em;
        }

        h1 { line-height: 1.2; }
        h2 { line-height: 1.3; }
        h3 { line-height: 1.4; }

        /* === レトロシャドウ（統一）=== */
        .retro-shadow {
            box-shadow: 4px 4px 0px 0px rgba(0, 0, 0, 1);
        }

        .retro-shadow-sm {
            box-shadow: 2px 2px 0px 0px rgba(0, 0, 0, 1);
        }

        /* === ホバーエフェクト（CTAボタン・重要カード用）=== */
        .bounce-hover {
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .bounce-hover:hover {
            transform: translateY(-2px);
            box-shadow: 6px 6px 0px 0px rgba(0, 0, 0, 1);
        }

        /* === 控えめホバー（一般カード用）=== */
        .bounce-hover-subtle {
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .bounce-hover-subtle:hover {
            transform: translateY(-1px);
            box-shadow: 5px 5px 0px 0px rgba(0, 0, 0, 1);
        }

        /* === モバイルではアニメーション抑制 === */
        @media (max-width: 768px) {
            .bounce-hover:hover,
            .bounce-hover-subtle:hover {
                transform: translateY(-1px);
            }
        }

        /* カラフルなグラデーション背景（3色ベース） */
        .gradient-retro-orange {
            background: linear-gradient(135deg, var(--retro-orange) 0%, #FFAA66 100%);
        }

        .gradient-retro-cyan {
            background: linear-gradient(135deg, var(--retro-cyan) 0%, #86F0FB 100%);
        }

        .gradient-retro-pink {
            background: linear-gradient(135deg, var(--retro-pink) 0%, #FFC6D9 100%);
        }

        /* ポップなボタンスタイル */
        .btn-retro {
            font-family: 'Fredoka One', cursive;
            font-weight: 400;
            letter-spacing: 0.5px;
        }

        /* デモ通知バー用（オレンジベース） */
        .demo-notice {
            background: repeating-linear-gradient(
                45deg,
                #FFAA66,
                #FFAA66 10px,
                var(--retro-orange) 10px,
                var(--retro-orange) 20px
            );
        }

        /* スムーススクロール */
        html {
            scroll-behavior: smooth;
        }

        /* モバイルメニュー */
        .mobile-menu {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s ease-out;
        }

        .mobile-menu.open {
            max-height: 500px;
        }
    </style>
</head>
<body class="min-h-screen flex flex-col">
    <!-- Navigation -->
    <nav class="bg-orange-400 border-b-4 border-gray-800 sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class="flex items-center justify-between h-20">
                <!-- Logo -->
                <a href="{{ route('demo.full-custom.index') }}" class="text-3xl md:text-4xl font-bold text-gray-800 hover:text-white transition-colors flex items-center gap-2">
                    <span class="inline-block w-8 h-8 bg-cyan-400 border-4 border-gray-800 rounded-lg"></span>
                    Funky Co.
                </a>

                <!-- Desktop Navigation -->
                <div class="hidden md:flex items-center space-x-8">
                    <a href="{{ route('demo.full-custom.products') }}"
                       class="text-lg font-bold text-gray-800 hover:text-white transition-colors {{ request()->routeIs('demo.full-custom.products*') ? 'text-white' : '' }}">
                        Products
                    </a>
                    <a href="{{ route('demo.full-custom.about') }}"
                       class="text-lg font-bold text-gray-800 hover:text-white transition-colors {{ request()->routeIs('demo.full-custom.about') ? 'text-white' : '' }}">
                        About
                    </a>
                    <a href="{{ route('demo.full-custom.contact') }}"
                       class="text-lg font-bold text-gray-800 hover:text-white transition-colors {{ request()->routeIs('demo.full-custom.contact') ? 'text-white' : '' }}">
                        Contact
                    </a>
                    <a href="{{ route('demo.full-custom.admin.dashboard') }}"
                       class="px-6 py-2 bg-cyan-400 text-gray-800 font-bold rounded-2xl border-4 border-gray-800 retro-shadow bounce-hover btn-retro {{ request()->routeIs('demo.full-custom.admin.*') ? 'bg-pink-400' : '' }}">
                        Admin
                    </a>
                </div>

                <!-- Mobile menu button -->
                <button id="mobile-menu-btn" class="md:hidden text-gray-800 hover:text-white focus:outline-none">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                </button>
            </div>

            <!-- Mobile Navigation -->
            <div id="mobile-menu" class="mobile-menu md:hidden pb-4">
                <div class="space-y-3">
                    <a href="{{ route('demo.full-custom.products') }}"
                       class="block py-2 text-lg font-bold text-gray-800 hover:text-white {{ request()->routeIs('demo.full-custom.products*') ? 'text-white' : '' }}">
                        Products
                    </a>
                    <a href="{{ route('demo.full-custom.about') }}"
                       class="block py-2 text-lg font-bold text-gray-800 hover:text-white {{ request()->routeIs('demo.full-custom.about') ? 'text-white' : '' }}">
                        About
                    </a>
                    <a href="{{ route('demo.full-custom.contact') }}"
                       class="block py-2 text-lg font-bold text-gray-800 hover:text-white {{ request()->routeIs('demo.full-custom.contact') ? 'text-white' : '' }}">
                        Contact
                    </a>
                    <a href="{{ route('demo.full-custom.admin.dashboard') }}"
                       class="inline-block px-6 py-2 bg-cyan-400 text-gray-800 font-bold rounded-2xl border-4 border-gray-800 retro-shadow btn-retro">
                        Admin
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Demo Notice -->
    <div class="demo-notice border-b-4 border-gray-800">
        <div class="max-w-7xl mx-auto px-6 py-3">
            <p class="text-center text-gray-800 font-bold text-sm">
                DEMO MODE: This is a retro-pop design mockup!
            </p>
        </div>
    </div>

    <!-- Main Content -->
    <main class="flex-1">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-orange-500 border-t-4 border-gray-800 py-12 mt-20">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class="grid md:grid-cols-3 gap-12 mb-8">
                <!-- Company Info -->
                <div>
                    <h3 class="text-2xl font-bold text-gray-800 mb-4 flex items-center gap-2">
                        <span class="inline-block w-6 h-6 bg-cyan-400 border-3 border-gray-800 rounded-md"></span>
                        Funky Co.
                    </h3>
                    <p class="text-gray-800 font-bold">
                        Making the world more<br>
                        colorful and fun!
                    </p>
                </div>

                <!-- Links -->
                <div>
                    <h4 class="text-xl font-bold text-gray-800 mb-4">Quick Links</h4>
                    <ul class="space-y-2">
                        <li><a href="{{ route('demo.full-custom.products') }}" class="text-gray-800 font-bold hover:text-white">Products</a></li>
                        <li><a href="{{ route('demo.full-custom.about') }}" class="text-gray-800 font-bold hover:text-white">About Us</a></li>
                        <li><a href="{{ route('demo.full-custom.contact') }}" class="text-gray-800 font-bold hover:text-white">Contact</a></li>
                        <li><a href="{{ route('demo.full-custom.admin.dashboard') }}" class="text-gray-800 font-bold hover:text-white">Admin</a></li>
                    </ul>
                </div>

                <!-- Social -->
                <div>
                    <h4 class="text-xl font-bold text-gray-800 mb-4">Follow Us!</h4>
                    <div class="flex space-x-4">
                        <div class="w-12 h-12 bg-cyan-400 rounded-full border-4 border-gray-800 retro-shadow-sm flex items-center justify-center cursor-pointer bounce-hover">
                            <svg class="w-6 h-6 text-gray-800" fill="currentColor" viewBox="0 0 24 24"><path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"/></svg>
                        </div>
                        <div class="w-12 h-12 bg-pink-400 rounded-full border-4 border-gray-800 retro-shadow-sm flex items-center justify-center cursor-pointer bounce-hover">
                            <svg class="w-6 h-6 text-gray-800" fill="currentColor" viewBox="0 0 24 24"><path d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z"/></svg>
                        </div>
                        <div class="w-12 h-12 bg-white rounded-full border-4 border-gray-800 retro-shadow-sm flex items-center justify-center cursor-pointer bounce-hover">
                            <svg class="w-6 h-6 text-gray-800" fill="currentColor" viewBox="0 0 24 24"><rect x="2" y="2" width="20" height="20" rx="5" fill="none" stroke="currentColor" stroke-width="2"/><circle cx="12" cy="12" r="4" fill="none" stroke="currentColor" stroke-width="2"/><circle cx="18" cy="6" r="1.5"/></svg>
                        </div>
                    </div>
                </div>
            </div>

            <div class="border-t-4 border-gray-800 pt-8 flex flex-col md:flex-row items-center justify-between gap-4">
                <p class="text-lg font-bold text-gray-800">
                    © 2024 Funky Co. All rights reserved!
                </p>
                <a href="{{ route('projects.index') }}"
                   class="px-6 py-2 bg-cyan-400 text-gray-800 font-bold rounded-2xl border-4 border-gray-800 retro-shadow bounce-hover btn-retro">
                    Back to Projects
                </a>
            </div>
        </div>
    </footer>

    <!-- Mobile Menu Toggle Script -->
    <script>
        document.getElementById('mobile-menu-btn').addEventListener('click', function() {
            const menu = document.getElementById('mobile-menu');
            menu.classList.toggle('open');
        });
    </script>

    @stack('scripts')
</body>
</html>
