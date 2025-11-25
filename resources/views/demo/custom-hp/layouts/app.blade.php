<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Creative Corporation') - カスタムHPデモ</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&display=swap');

        * {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Helvetica Neue', sans-serif;
        }

        body {
            background: linear-gradient(135deg, #fafafa 0%, #ffffff 50%, #fafafa 100%);
            overflow-x: hidden;
            position: relative;
        }

        /* Smooth scrolling */
        html {
            scroll-behavior: smooth;
        }

        /* Noise texture on body */
        .noise-texture::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            opacity: 0.03;
            background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 200 200' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='noiseFilter'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='4' numOctaves='4' /%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23noiseFilter)'/%3E%3C/svg%3E");
            pointer-events: none;
            z-index: -1;
        }

        /* Background Abstract Objects */
        .bg-abstract {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 0;
            pointer-events: none;
            overflow: hidden;
        }

        /* 主役オブジェクト3つ（前面） */
        .bg-shape:nth-child(1) {
            position: absolute;
            top: 5rem;
            left: 5rem;
            width: 24rem;
            height: 24rem;
            background: linear-gradient(135deg, rgba(251, 146, 60, 0.3), rgba(251, 207, 232, 0.3));
            border-radius: 50%;
            filter: blur(80px);
            animation: float 20s ease-in-out infinite;
        }

        .bg-shape:nth-child(2) {
            position: absolute;
            bottom: 10rem;
            right: 5rem;
            width: 24rem;
            height: 24rem;
            background: linear-gradient(135deg, rgba(251, 207, 232, 0.3), rgba(196, 181, 253, 0.3));
            border-radius: 50%;
            filter: blur(60px);
            animation: float 25s ease-in-out infinite;
            animation-delay: 2s;
        }

        .bg-shape:nth-child(3) {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 24rem;
            height: 24rem;
            background: linear-gradient(135deg, rgba(196, 181, 253, 0.3), rgba(251, 146, 60, 0.3));
            border-radius: 50%;
            filter: blur(70px);
            animation: float 30s ease-in-out infinite;
            animation-delay: 4s;
        }

        /* 奥行きオブジェクト2つ（背面） */
        .bg-shape:nth-child(4) {
            position: absolute;
            top: 2.5rem;
            right: 10rem;
            width: 16rem;
            height: 16rem;
            background: linear-gradient(135deg, rgba(251, 146, 60, 0.15), rgba(251, 207, 232, 0.15));
            border-radius: 50%;
            filter: blur(120px);
            animation: float-slow 30s ease-in-out infinite;
        }

        .bg-shape:nth-child(5) {
            position: absolute;
            bottom: 5rem;
            left: 10rem;
            width: 16rem;
            height: 16rem;
            background: linear-gradient(135deg, rgba(251, 207, 232, 0.15), rgba(196, 181, 253, 0.15));
            border-radius: 50%;
            filter: blur(120px);
            animation: float-slow 35s ease-in-out infinite;
            animation-delay: 3s;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }

        @keyframes float-slow {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-30px); }
        }

        /* Glassmorphism card styles */
        .glass-card {
            background: rgba(255, 255, 255, 0.6);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.35);
            box-shadow:
                inset 0 1px 0 0 rgba(255, 255, 255, 0.15),
                0 8px 32px rgba(0, 0, 0, 0.1);
            border-radius: 16px;
            transition: all 0.3s ease;
        }

        .glass-card:hover {
            transform: scale(1.01) translateY(-2px);
        }

        .glass-card-strong {
            background: rgba(255, 255, 255, 0.6);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.35);
            box-shadow:
                inset 0 1px 0 0 rgba(255, 255, 255, 0.15),
                0 8px 32px rgba(0, 0, 0, 0.1);
            border-radius: 16px;
        }

        /* Glassmorphism navigation */
        .glass-nav {
            background: rgba(255, 255, 255, 0.6);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.35);
            box-shadow: 0 4px 24px rgba(0, 0, 0, 0.04);
        }

        /* Content wrapper to sit above background */
        .content-wrapper {
            position: relative;
            z-index: 1;
        }

        /* Hover effects for glass cards */
        .glass-card-hover {
            transition: all 0.3s ease;
        }

        .glass-card-hover:hover {
            background: rgba(255, 255, 255, 0.75);
            transform: translateY(-2px);
            box-shadow: 0 12px 40px rgba(0, 0, 0, 0.12);
        }

        /* Button styles */
        .glass-button {
            background: rgba(255, 255, 255, 0.6);
            backdrop-filter: blur(15px);
            -webkit-backdrop-filter: blur(15px);
            border: 1px solid rgba(255, 255, 255, 0.4);
            transition: all 0.3s ease;
        }

        .glass-button:hover {
            background: rgba(255, 255, 255, 0.8);
            transform: translateY(-1px);
        }

        .glass-button-primary {
            background: rgba(249, 115, 22, 1);
            color: white;
            transition: all 0.3s ease;
        }

        .glass-button-primary:hover {
            background: rgba(234, 88, 12, 1);
        }

        /* モバイル対応 */
        @media (max-width: 768px) {
            /* 背面オブジェクト4, 5を非表示 */
            .bg-shape:nth-child(4),
            .bg-shape:nth-child(5) {
                display: none;
            }

            /* ブラー軽減 */
            .glass-card {
                backdrop-filter: blur(5px);
                -webkit-backdrop-filter: blur(5px);
            }

            .glass-nav {
                backdrop-filter: blur(5px);
                -webkit-backdrop-filter: blur(5px);
            }

            /* 主役オブジェクトのblurも軽減 */
            .bg-shape:nth-child(1),
            .bg-shape:nth-child(2),
            .bg-shape:nth-child(3) {
                filter: blur(40px);
            }
        }
    </style>
</head>
<body class="noise-texture">
    <!-- Background Abstract Objects -->
    <div class="bg-abstract">
        <div class="bg-shape"></div>
        <div class="bg-shape"></div>
        <div class="bg-shape"></div>
        <div class="bg-shape"></div>
        <div class="bg-shape"></div>
    </div>

    <!-- Content Wrapper -->
    <div class="content-wrapper">
        <!-- Header / Navigation -->
        <header class="glass-nav sticky top-0 z-50">
            <div class="max-w-7xl mx-auto px-6 lg:px-8">
                <div class="flex justify-between items-center h-20">
                    <!-- Logo -->
                    <div class="flex-shrink-0">
                        <a href="{{ route('demo.custom-hp.index') }}" class="text-2xl font-light text-gray-900 hover:text-gray-700 transition-colors">
                            Creative Corp.
                        </a>
                    </div>

                    <!-- Desktop Navigation -->
                    <nav class="hidden md:flex space-x-12 lg:space-x-16">
                        <a href="{{ route('demo.custom-hp.index') }}" class="text-sm font-light text-[#1F1F1F] hover:text-gray-900 transition-colors {{ request()->routeIs('demo.custom-hp.index') ? 'text-gray-900 font-normal' : '' }}">
                            ホーム
                        </a>
                        <a href="{{ route('demo.custom-hp.about') }}" class="text-sm font-light text-[#1F1F1F] hover:text-gray-900 transition-colors {{ request()->routeIs('demo.custom-hp.about') ? 'text-gray-900 font-normal' : '' }}">
                            会社概要
                        </a>
                        <a href="{{ route('demo.custom-hp.service') }}" class="text-sm font-light text-[#1F1F1F] hover:text-gray-900 transition-colors {{ request()->routeIs('demo.custom-hp.service') ? 'text-gray-900 font-normal' : '' }}">
                            サービス
                        </a>
                        <a href="{{ route('demo.custom-hp.works') }}" class="text-sm font-light text-[#1F1F1F] hover:text-gray-900 transition-colors {{ request()->routeIs('demo.custom-hp.works') ? 'text-gray-900 font-normal' : '' }}">
                            実績
                        </a>
                        <a href="{{ route('demo.custom-hp.news') }}" class="text-sm font-light text-[#1F1F1F] hover:text-gray-900 transition-colors {{ request()->routeIs('demo.custom-hp.news*') ? 'text-gray-900 font-normal' : '' }}">
                            お知らせ
                        </a>
                        <a href="{{ route('demo.custom-hp.contact') }}" class="text-sm font-light text-[#1F1F1F] hover:text-gray-900 transition-colors {{ request()->routeIs('demo.custom-hp.contact') ? 'text-gray-900 font-normal' : '' }}">
                            お問い合わせ
                        </a>
                    </nav>

                    <!-- Mobile menu button -->
                    <div class="md:hidden">
                        <button type="button" id="mobile-menu-button" class="text-gray-700 hover:text-gray-900 focus:outline-none">
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 6h16M4 12h16M4 18h16" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Mobile Navigation -->
            <div id="mobile-menu" class="hidden md:hidden border-t border-white/30">
                <div class="px-6 py-4 space-y-3">
                    <a href="{{ route('demo.custom-hp.index') }}" class="block py-2 text-sm font-light text-[#1F1F1F] hover:text-gray-900 {{ request()->routeIs('demo.custom-hp.index') ? 'text-gray-900 font-normal' : '' }}">
                        ホーム
                    </a>
                    <a href="{{ route('demo.custom-hp.about') }}" class="block py-2 text-sm font-light text-[#1F1F1F] hover:text-gray-900 {{ request()->routeIs('demo.custom-hp.about') ? 'text-gray-900 font-normal' : '' }}">
                        会社概要
                    </a>
                    <a href="{{ route('demo.custom-hp.service') }}" class="block py-2 text-sm font-light text-[#1F1F1F] hover:text-gray-900 {{ request()->routeIs('demo.custom-hp.service') ? 'text-gray-900 font-normal' : '' }}">
                        サービス
                    </a>
                    <a href="{{ route('demo.custom-hp.works') }}" class="block py-2 text-sm font-light text-[#1F1F1F] hover:text-gray-900 {{ request()->routeIs('demo.custom-hp.works') ? 'text-gray-900 font-normal' : '' }}">
                        実績
                    </a>
                    <a href="{{ route('demo.custom-hp.news') }}" class="block py-2 text-sm font-light text-[#1F1F1F] hover:text-gray-900 {{ request()->routeIs('demo.custom-hp.news*') ? 'text-gray-900 font-normal' : '' }}">
                        お知らせ
                    </a>
                    <a href="{{ route('demo.custom-hp.contact') }}" class="block py-2 text-sm font-light text-[#1F1F1F] hover:text-gray-900 {{ request()->routeIs('demo.custom-hp.contact') ? 'text-gray-900 font-normal' : '' }}">
                        お問い合わせ
                    </a>
                </div>
            </div>
        </header>

        <!-- Demo Notice -->
        <div class="glass-card border-t-0 rounded-none">
            <div class="max-w-7xl mx-auto px-6 lg:px-8 py-3">
                <p class="text-xs text-[#1F1F1F] text-center font-light">
                    <span class="font-normal">デモモード:</span> これはデモ用のモックアップです。グラスモーフィズム × アーティスティックなデザインをご体験ください。
                </p>
            </div>
        </div>

        <!-- Main Content -->
        <main>
            @yield('content')
        </main>

        <!-- Footer -->
        <footer class="glass-card-strong mt-32 rounded-none">
            <div class="max-w-7xl mx-auto px-6 lg:px-8 py-16">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-12">
                    <!-- Company Info -->
                    <div class="md:col-span-2">
                        <h3 class="text-xl font-light text-gray-900 mb-6">Creative Corporation</h3>
                        <p class="text-[#1F1F1F] text-sm font-light leading-relaxed mb-4">
                            デザインとテクノロジーの力で、<br>
                            新しい価値を創造し、社会に貢献する。
                        </p>
                        <p class="text-[#1F1F1F] text-sm font-light leading-relaxed">
                            〒150-0013<br>
                            東京都渋谷区恵比寿1-1-1<br>
                            TEL: 03-1234-5678<br>
                            Email: info@creative-corp.jp
                        </p>
                    </div>

                    <!-- Quick Links -->
                    <div>
                        <h3 class="text-sm font-normal text-gray-900 mb-6">サイトマップ</h3>
                        <ul class="space-y-3 text-sm font-light">
                            <li><a href="{{ route('demo.custom-hp.index') }}" class="text-[#1F1F1F] hover:text-gray-900 transition-colors">ホーム</a></li>
                            <li><a href="{{ route('demo.custom-hp.about') }}" class="text-[#1F1F1F] hover:text-gray-900 transition-colors">会社概要</a></li>
                            <li><a href="{{ route('demo.custom-hp.service') }}" class="text-[#1F1F1F] hover:text-gray-900 transition-colors">サービス</a></li>
                            <li><a href="{{ route('demo.custom-hp.works') }}" class="text-[#1F1F1F] hover:text-gray-900 transition-colors">実績</a></li>
                            <li><a href="{{ route('demo.custom-hp.news') }}" class="text-[#1F1F1F] hover:text-gray-900 transition-colors">お知らせ</a></li>
                            <li><a href="{{ route('demo.custom-hp.contact') }}" class="text-[#1F1F1F] hover:text-gray-900 transition-colors">お問い合わせ</a></li>
                        </ul>
                    </div>

                    <!-- Business Hours -->
                    <div>
                        <h3 class="text-sm font-normal text-gray-900 mb-6">営業時間</h3>
                        <p class="text-[#1F1F1F] text-sm font-light leading-relaxed">
                            平日 9:00 - 18:00<br>
                            （土日祝日は休業）
                        </p>
                    </div>
                </div>

                <div class="border-t border-gray-200/50 mt-12 pt-8 text-center">
                    <p class="text-gray-600 text-xs font-light">
                        &copy; 2025 Creative Corporation. All rights reserved.
                    </p>
                </div>
            </div>

            <!-- Back to Projects Button -->
            <div class="border-t border-gray-200/30">
                <div class="max-w-7xl mx-auto px-6 lg:px-8 py-4 text-center">
                    <a href="{{ route('projects.index') }}" class="inline-flex items-center text-xs text-gray-600 hover:text-gray-900 transition-colors font-light">
                        <svg class="w-3 h-3 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>
                        プロジェクト一覧に戻る
                    </a>
                </div>
            </div>
        </footer>
    </div>

    <!-- Mobile Menu Toggle Script -->
    <script>
        document.getElementById('mobile-menu-button').addEventListener('click', function() {
            const menu = document.getElementById('mobile-menu');
            menu.classList.toggle('hidden');
        });
    </script>

    @stack('scripts')
</body>
</html>
