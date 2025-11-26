<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>@yield('title', 'FlickLP') - Instagram風フリックLP Demo</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
        }

        body {
            background: #fff;
            color: #262626;
            overflow-x: hidden;
        }

        /* Instagram gradient */
        .insta-gradient {
            background: linear-gradient(45deg, #F58529, #DD2A7B, #8134AF);
        }

        .insta-gradient-text {
            background: linear-gradient(45deg, #F58529, #DD2A7B, #8134AF);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        /* Phone mockup - PC only */
        .phone-mockup {
            max-width: 380px;
            width: 100%;
            aspect-ratio: 9/16;
            border-radius: 2rem;
            border: 1px solid #e5e7eb;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
            overflow: hidden;
            background: #fff;
        }

        @media (min-width: 768px) {
            .phone-mockup {
                max-width: 420px;
            }
        }

        /* Scroll snap container */
        .snap-container {
            height: 100%;
            overflow-y: auto;
            scroll-snap-type: y mandatory;
            scrollbar-width: none;
            -ms-overflow-style: none;
        }

        .snap-container::-webkit-scrollbar {
            display: none;
        }

        .snap-section {
            scroll-snap-align: start;
            scroll-snap-stop: always;
            height: 100%;
            min-height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding: 0 1.5rem;
        }

        /* Full screen mode (mobile default, PC toggle) */
        body.full-mode .mock-wrapper {
            display: none !important;
        }

        body.full-mode .full-wrapper {
            display: block !important;
        }

        body.full-mode .lp-container {
            position: fixed;
            inset: 0;
            top: 64px;
            z-index: 40;
        }

        body.full-mode .snap-section {
            padding: 0 1rem;
        }

        /* Mock mode (PC default) */
        body.mock-mode .mock-wrapper {
            display: flex !important;
        }

        body.mock-mode .full-wrapper {
            display: none !important;
        }

        /* Toggle styles */
        .toggle-btn {
            transition: all 0.2s ease;
        }

        .toggle-btn.active {
            background: linear-gradient(45deg, #F58529, #DD2A7B, #8134AF);
            color: white;
            border-color: transparent;
        }

        /* Dot navigation */
        .dot-nav {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: rgba(0, 0, 0, 0.2);
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .dot-nav.active {
            background: #262626;
            transform: scale(1.2);
        }

        /* Tabular numbers */
        .tabular-nums {
            font-variant-numeric: tabular-nums;
        }
    </style>
</head>
<body class="min-h-screen mock-mode">
    <!-- Header -->
    <header class="fixed top-0 w-full z-50 bg-white/95 backdrop-blur-md border-b border-gray-200">
        <div class="max-w-6xl mx-auto px-4 md:px-8">
            <div class="flex justify-between items-center h-16">
                <!-- Logo -->
                <a href="{{ route('demo.insta-lp.index') }}" class="text-xl font-bold">
                    <span class="insta-gradient-text">FlickLP</span>
                </a>

                <!-- View Toggle - PC only -->
                <div class="view-toggle hidden md:flex gap-2">
                    <button onclick="setMode('mock')" id="btn-mock" class="toggle-btn px-4 py-2 text-xs font-medium rounded-full border border-gray-300 active">
                        モック表示
                    </button>
                    <button onclick="setMode('full')" id="btn-full" class="toggle-btn px-4 py-2 text-xs font-medium rounded-full border border-gray-300">
                        フル表示
                    </button>
                </div>
            </div>
        </div>
    </header>

    <!-- Spacer -->
    <div class="h-16"></div>

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer - hidden in full mode -->
    <footer class="bg-white border-t border-gray-200 py-8 full-mode-hide">
        <div class="max-w-6xl mx-auto px-4 md:px-8">
            <div class="flex flex-col items-center gap-4">
                <a href="{{ route('projects.index') }}" class="inline-flex items-center text-xs text-gray-500 hover:text-gray-800 transition-colors">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    back to projects
                </a>
                <p class="text-xs text-gray-400">
                    &copy; 2025 FlickLP. All rights reserved.
                </p>
            </div>
        </div>
    </footer>

    <!-- Mode Toggle Script -->
    <script>
        function setMode(mode) {
            document.body.classList.remove('mock-mode', 'full-mode');
            document.body.classList.add(mode + '-mode');

            document.getElementById('btn-mock').classList.remove('active');
            document.getElementById('btn-full').classList.remove('active');
            document.getElementById('btn-' + mode).classList.add('active');

            // Hide/show footer
            const footer = document.querySelector('footer');
            if (mode === 'full') {
                footer.style.display = 'none';
            } else {
                footer.style.display = '';
            }
        }

        // Auto-detect mobile and force full mode
        function checkMobile() {
            if (window.innerWidth < 768) {
                document.body.classList.remove('mock-mode');
                document.body.classList.add('full-mode');
            }
        }

        checkMobile();
        window.addEventListener('resize', checkMobile);
    </script>

    @stack('scripts')
</body>
</html>
