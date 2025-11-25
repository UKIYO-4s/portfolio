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
            background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 50%, #f1f5f9 100%);
            overflow-x: hidden;
            position: relative;
            min-height: 100vh;
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

        /* 3D球体スタイル - リアルな立体感 */
        .bg-shape {
            border-radius: 50%;
            position: absolute;
        }

        /* 球体1 - 紫〜ピンク（大） */
        .bg-shape:nth-child(1) {
            top: 5%;
            left: 5%;
            width: 28rem;
            height: 28rem;
            background: radial-gradient(circle at 30% 30%,
                rgba(255, 255, 255, 0.9) 0%,
                rgba(167, 139, 250, 0.8) 10%,
                rgba(139, 92, 246, 0.9) 30%,
                rgba(109, 40, 217, 0.95) 60%,
                rgba(76, 29, 149, 1) 100%);
            box-shadow:
                inset -20px -20px 60px rgba(0, 0, 0, 0.3),
                inset 10px 10px 40px rgba(255, 255, 255, 0.4),
                20px 20px 60px rgba(109, 40, 217, 0.4),
                -5px -5px 30px rgba(167, 139, 250, 0.2);
            animation: float 20s ease-in-out infinite;
        }

        /* 球体2 - ピンク〜オレンジ（中） */
        .bg-shape:nth-child(2) {
            bottom: 15%;
            right: 8%;
            width: 22rem;
            height: 22rem;
            background: radial-gradient(circle at 35% 25%,
                rgba(255, 255, 255, 0.95) 0%,
                rgba(251, 191, 210, 0.85) 10%,
                rgba(244, 114, 182, 0.9) 30%,
                rgba(236, 72, 153, 0.95) 60%,
                rgba(190, 24, 93, 1) 100%);
            box-shadow:
                inset -15px -15px 50px rgba(0, 0, 0, 0.25),
                inset 8px 8px 35px rgba(255, 255, 255, 0.5),
                15px 15px 50px rgba(236, 72, 153, 0.35),
                -5px -5px 25px rgba(251, 191, 210, 0.2);
            animation: float 25s ease-in-out infinite;
            animation-delay: 2s;
        }

        /* 球体3 - シアン〜ブルー（中） */
        .bg-shape:nth-child(3) {
            top: 45%;
            left: 50%;
            width: 18rem;
            height: 18rem;
            background: radial-gradient(circle at 30% 30%,
                rgba(255, 255, 255, 0.95) 0%,
                rgba(165, 243, 252, 0.85) 10%,
                rgba(34, 211, 238, 0.9) 30%,
                rgba(6, 182, 212, 0.95) 60%,
                rgba(8, 145, 178, 1) 100%);
            box-shadow:
                inset -12px -12px 40px rgba(0, 0, 0, 0.2),
                inset 6px 6px 30px rgba(255, 255, 255, 0.5),
                12px 12px 40px rgba(6, 182, 212, 0.3),
                -4px -4px 20px rgba(165, 243, 252, 0.2);
            animation: float 30s ease-in-out infinite;
            animation-delay: 4s;
        }

        /* 球体4 - アンバー〜オレンジ（小） */
        .bg-shape:nth-child(4) {
            top: 20%;
            right: 15%;
            width: 14rem;
            height: 14rem;
            background: radial-gradient(circle at 35% 25%,
                rgba(255, 255, 255, 0.95) 0%,
                rgba(253, 230, 138, 0.85) 10%,
                rgba(251, 191, 36, 0.9) 30%,
                rgba(245, 158, 11, 0.95) 60%,
                rgba(217, 119, 6, 1) 100%);
            box-shadow:
                inset -10px -10px 35px rgba(0, 0, 0, 0.2),
                inset 5px 5px 25px rgba(255, 255, 255, 0.5),
                10px 10px 35px rgba(245, 158, 11, 0.3),
                -3px -3px 15px rgba(253, 230, 138, 0.2);
            animation: float-slow 28s ease-in-out infinite;
        }

        /* 球体5 - ラベンダー〜ピンク（小） */
        .bg-shape:nth-child(5) {
            bottom: 35%;
            left: 12%;
            width: 12rem;
            height: 12rem;
            background: radial-gradient(circle at 30% 30%,
                rgba(255, 255, 255, 0.95) 0%,
                rgba(233, 213, 255, 0.85) 10%,
                rgba(196, 181, 253, 0.9) 30%,
                rgba(167, 139, 250, 0.95) 60%,
                rgba(139, 92, 246, 1) 100%);
            box-shadow:
                inset -8px -8px 30px rgba(0, 0, 0, 0.2),
                inset 4px 4px 20px rgba(255, 255, 255, 0.5),
                8px 8px 30px rgba(167, 139, 250, 0.3),
                -3px -3px 12px rgba(233, 213, 255, 0.2);
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

        /* Glassmorphism card styles - すりガラス風（ノイズテクスチャ付き） */
        .glass-card {
            background: rgba(255, 255, 255, 0.25);
            backdrop-filter: blur(16px) saturate(180%);
            -webkit-backdrop-filter: blur(16px) saturate(180%);
            border: 1px solid rgba(255, 255, 255, 0.4);
            box-shadow:
                inset 0 1px 0 0 rgba(255, 255, 255, 0.3),
                inset 0 -1px 0 0 rgba(255, 255, 255, 0.1),
                0 8px 32px rgba(0, 0, 0, 0.08);
            border-radius: 24px;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        /* ノイズテクスチャをカードに追加 */
        .glass-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='noise'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23noise)'/%3E%3C/svg%3E");
            opacity: 0.04;
            pointer-events: none;
            border-radius: 24px;
        }

        .glass-card:hover {
            background: rgba(255, 255, 255, 0.35);
            transform: translateY(-4px);
            box-shadow:
                inset 0 1px 0 0 rgba(255, 255, 255, 0.4),
                0 16px 48px rgba(0, 0, 0, 0.12);
        }

        .glass-card-strong {
            background: rgba(255, 255, 255, 0.35);
            backdrop-filter: blur(20px) saturate(180%);
            -webkit-backdrop-filter: blur(20px) saturate(180%);
            border: 1px solid rgba(255, 255, 255, 0.5);
            box-shadow:
                inset 0 1px 0 0 rgba(255, 255, 255, 0.4),
                inset 0 -1px 0 0 rgba(255, 255, 255, 0.15),
                0 8px 32px rgba(0, 0, 0, 0.1);
            border-radius: 24px;
            position: relative;
            overflow: hidden;
        }

        .glass-card-strong::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='noise'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23noise)'/%3E%3C/svg%3E");
            opacity: 0.05;
            pointer-events: none;
            border-radius: 24px;
        }

        /* Glassmorphism navigation */
        .glass-nav {
            background: rgba(255, 255, 255, 0.4);
            backdrop-filter: blur(16px) saturate(180%);
            -webkit-backdrop-filter: blur(16px) saturate(180%);
            border-bottom: 1px solid rgba(255, 255, 255, 0.5);
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.05);
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
            background: rgba(255, 255, 255, 0.4);
            transform: translateY(-4px);
            box-shadow: 0 16px 48px rgba(0, 0, 0, 0.12);
        }

        /* Button styles */
        .glass-button {
            background: rgba(255, 255, 255, 0.3);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.5);
            color: #1a1a1a;
            transition: all 0.3s ease;
        }

        .glass-button:hover {
            background: rgba(255, 255, 255, 0.5);
            transform: translateY(-2px);
        }

        .glass-button-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            transition: all 0.3s ease;
        }

        .glass-button-primary:hover {
            background: linear-gradient(135deg, #764ba2 0%, #667eea 100%);
            transform: translateY(-2px);
            box-shadow: 0 8px 24px rgba(102, 126, 234, 0.4);
        }

        /* Icon pills - 共通アイコンスタイル */
        .icon-pill {
            width: 56px;
            height: 56px;
            border-radius: 16px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 22px;
            font-weight: 600;
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.2);
        }

        .icon-pill-sm {
            width: 48px;
            height: 48px;
            border-radius: 14px;
            font-size: 20px;
        }

        /* グラデーション定義（背景と被らない色相） */
        .icon-grad-amber {
            background: linear-gradient(135deg, #FBBF24, #F97316);
            box-shadow: 0 10px 25px -5px rgba(249, 115, 22, 0.35);
        }

        .icon-grad-rose {
            background: linear-gradient(135deg, #FB7185, #F43F5E);
            box-shadow: 0 10px 25px -5px rgba(244, 63, 94, 0.35);
        }

        .icon-grad-sky {
            background: linear-gradient(135deg, #38BDF8, #0284C7);
            box-shadow: 0 10px 25px -5px rgba(2, 132, 199, 0.35);
        }

        .icon-grad-emerald {
            background: linear-gradient(135deg, #34D399, #059669);
            box-shadow: 0 10px 25px -5px rgba(5, 150, 105, 0.35);
        }

        .icon-grad-violet {
            background: linear-gradient(135deg, #A78BFA, #7C3AED);
            box-shadow: 0 10px 25px -5px rgba(124, 58, 237, 0.35);
        }

        /* モバイル対応 */
        @media (max-width: 768px) {
            /* 球体サイズを縮小 */
            .bg-shape:nth-child(1) {
                width: 16rem;
                height: 16rem;
            }
            .bg-shape:nth-child(2) {
                width: 14rem;
                height: 14rem;
            }
            .bg-shape:nth-child(3) {
                width: 10rem;
                height: 10rem;
            }
            /* 背面オブジェクト4, 5を非表示 */
            .bg-shape:nth-child(4),
            .bg-shape:nth-child(5) {
                display: none;
            }

            /* モバイル用ブラー軽減 */
            .glass-card {
                backdrop-filter: blur(12px) saturate(150%);
                -webkit-backdrop-filter: blur(12px) saturate(150%);
                background: rgba(255, 255, 255, 0.3);
            }

            .glass-nav {
                backdrop-filter: blur(12px) saturate(150%);
                -webkit-backdrop-filter: blur(12px) saturate(150%);
                background: rgba(255, 255, 255, 0.45);
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
                        <a href="{{ route('demo.custom-hp.index') }}" class="text-2xl font-light text-gray-900 hover:text-gray-600 transition-colors">
                            Creative Corp.
                        </a>
                    </div>

                    <!-- Desktop Navigation -->
                    <nav class="hidden md:flex space-x-12 lg:space-x-16">
                        <a href="{{ route('demo.custom-hp.index') }}" class="text-sm font-light text-gray-700 hover:text-gray-900 transition-colors {{ request()->routeIs('demo.custom-hp.index') ? 'text-gray-900 font-normal' : '' }}">
                            ホーム
                        </a>
                        <a href="{{ route('demo.custom-hp.about') }}" class="text-sm font-light text-gray-700 hover:text-gray-900 transition-colors {{ request()->routeIs('demo.custom-hp.about') ? 'text-gray-900 font-normal' : '' }}">
                            会社概要
                        </a>
                        <a href="{{ route('demo.custom-hp.service') }}" class="text-sm font-light text-gray-700 hover:text-gray-900 transition-colors {{ request()->routeIs('demo.custom-hp.service') ? 'text-gray-900 font-normal' : '' }}">
                            サービス
                        </a>
                        <a href="{{ route('demo.custom-hp.works') }}" class="text-sm font-light text-gray-700 hover:text-gray-900 transition-colors {{ request()->routeIs('demo.custom-hp.works') ? 'text-gray-900 font-normal' : '' }}">
                            実績
                        </a>
                        <a href="{{ route('demo.custom-hp.news') }}" class="text-sm font-light text-gray-700 hover:text-gray-900 transition-colors {{ request()->routeIs('demo.custom-hp.news*') ? 'text-gray-900 font-normal' : '' }}">
                            お知らせ
                        </a>
                        <a href="{{ route('demo.custom-hp.contact') }}" class="text-sm font-light text-gray-700 hover:text-gray-900 transition-colors {{ request()->routeIs('demo.custom-hp.contact') ? 'text-gray-900 font-normal' : '' }}">
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
            <div id="mobile-menu" class="hidden md:hidden border-t border-gray-200">
                <div class="px-6 py-4 space-y-3">
                    <a href="{{ route('demo.custom-hp.index') }}" class="block py-2 text-sm font-light text-gray-700 hover:text-gray-900 {{ request()->routeIs('demo.custom-hp.index') ? 'text-gray-900 font-normal' : '' }}">
                        ホーム
                    </a>
                    <a href="{{ route('demo.custom-hp.about') }}" class="block py-2 text-sm font-light text-gray-700 hover:text-gray-900 {{ request()->routeIs('demo.custom-hp.about') ? 'text-gray-900 font-normal' : '' }}">
                        会社概要
                    </a>
                    <a href="{{ route('demo.custom-hp.service') }}" class="block py-2 text-sm font-light text-gray-700 hover:text-gray-900 {{ request()->routeIs('demo.custom-hp.service') ? 'text-gray-900 font-normal' : '' }}">
                        サービス
                    </a>
                    <a href="{{ route('demo.custom-hp.works') }}" class="block py-2 text-sm font-light text-gray-700 hover:text-gray-900 {{ request()->routeIs('demo.custom-hp.works') ? 'text-gray-900 font-normal' : '' }}">
                        実績
                    </a>
                    <a href="{{ route('demo.custom-hp.news') }}" class="block py-2 text-sm font-light text-gray-700 hover:text-gray-900 {{ request()->routeIs('demo.custom-hp.news*') ? 'text-gray-900 font-normal' : '' }}">
                        お知らせ
                    </a>
                    <a href="{{ route('demo.custom-hp.contact') }}" class="block py-2 text-sm font-light text-gray-700 hover:text-gray-900 {{ request()->routeIs('demo.custom-hp.contact') ? 'text-gray-900 font-normal' : '' }}">
                        お問い合わせ
                    </a>
                </div>
            </div>
        </header>

        <!-- Demo Notice -->
        <div class="glass-card border-t-0 rounded-none">
            <div class="max-w-7xl mx-auto px-6 lg:px-8 py-3">
                <p class="text-xs text-gray-600 text-center font-light">
                    <span class="font-normal text-gray-900">デモモード:</span> これはデモ用のモックアップです。グラスモーフィズム × アーティスティックなデザインをご体験ください。
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
                        <p class="text-gray-600 text-sm font-light leading-relaxed mb-4">
                            デザインとテクノロジーの力で、<br>
                            新しい価値を創造し、社会に貢献する。
                        </p>
                        <p class="text-gray-600 text-sm font-light leading-relaxed">
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
                            <li><a href="{{ route('demo.custom-hp.index') }}" class="text-gray-600 hover:text-gray-900 transition-colors">ホーム</a></li>
                            <li><a href="{{ route('demo.custom-hp.about') }}" class="text-gray-600 hover:text-gray-900 transition-colors">会社概要</a></li>
                            <li><a href="{{ route('demo.custom-hp.service') }}" class="text-gray-600 hover:text-gray-900 transition-colors">サービス</a></li>
                            <li><a href="{{ route('demo.custom-hp.works') }}" class="text-gray-600 hover:text-gray-900 transition-colors">実績</a></li>
                            <li><a href="{{ route('demo.custom-hp.news') }}" class="text-gray-600 hover:text-gray-900 transition-colors">お知らせ</a></li>
                            <li><a href="{{ route('demo.custom-hp.contact') }}" class="text-gray-600 hover:text-gray-900 transition-colors">お問い合わせ</a></li>
                        </ul>
                    </div>

                    <!-- Business Hours -->
                    <div>
                        <h3 class="text-sm font-normal text-gray-900 mb-6">営業時間</h3>
                        <p class="text-gray-600 text-sm font-light leading-relaxed">
                            平日 9:00 - 18:00<br>
                            （土日祝日は休業）
                        </p>
                    </div>
                </div>

                <div class="border-t border-gray-200 mt-12 pt-8 text-center">
                    <p class="text-gray-500 text-xs font-light">
                        &copy; 2025 Creative Corporation. All rights reserved.
                    </p>
                </div>
            </div>

            <!-- Back to Projects Button -->
            <div class="border-t border-gray-100">
                <div class="max-w-7xl mx-auto px-6 lg:px-8 py-4 text-center">
                    <a href="{{ route('projects.index') }}" class="inline-flex items-center text-xs text-gray-500 hover:text-gray-900 transition-colors font-light">
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
