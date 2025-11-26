<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'BLOC') - Brutalist Demo</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        :root {
            --black: #0A0A0A;
            --white: #F9F9F9;
            --gray: #D9D9D9;
            --gray-dark: #6B6B6B;
        }

        * {
            font-family: 'Manrope', -apple-system, BlinkMacSystemFont, sans-serif;
        }

        body {
            background: var(--white);
            color: var(--black);
        }

        .bg-black { background: var(--black); }
        .bg-white { background: var(--white); }
        .text-black { color: var(--black); }
        .text-white { color: var(--white); }
        .text-gray { color: var(--gray-dark); }
        .border-black { border-color: var(--black); }

        .tracking-wide { letter-spacing: 0.05em; }
        .tracking-wider { letter-spacing: 0.1em; }

        /* Buttons */
        .btn-black {
            background: var(--black);
            color: var(--white);
            transition: transform 0.2s ease;
        }

        .btn-black:hover {
            transform: translateY(-2px);
        }

        .btn-white {
            background: var(--white);
            color: var(--black);
            border: 4px solid var(--black);
            transition: transform 0.2s ease, background 0.2s ease, color 0.2s ease;
        }

        .btn-white:hover {
            background: var(--black);
            color: var(--white);
            transform: translateY(-2px);
        }

        /* Service box */
        .service-box {
            border: 4px solid var(--black);
            transition: transform 0.2s ease;
        }

        .service-box:hover {
            transform: translateY(-2px);
        }

        /* Diagonal stripes pattern */
        .stripes-bg {
            background-image: repeating-linear-gradient(
                45deg,
                transparent,
                transparent 10px,
                var(--black) 10px,
                var(--black) 12px
            );
        }

        /* Reveal animation */
        .reveal {
            opacity: 0;
            transform: translateY(24px);
            transition: opacity 0.8s ease, transform 0.8s ease;
        }

        .reveal.visible {
            opacity: 1;
            transform: translateY(0);
        }
    </style>
</head>
<body class="min-h-screen">
    <!-- Header -->
    <header class="w-full bg-white border-b-4 border-black">
        <div class="max-w-6xl mx-auto px-6 md:px-10">
            <div class="flex justify-between items-center h-20">
                <!-- Logo -->
                <a href="{{ route('demo.brutalist.index') }}" class="text-2xl font-extrabold tracking-wider text-black">
                    BLOC
                </a>

                <!-- Desktop Navigation -->
                <nav class="hidden md:flex items-center gap-12">
                    <a href="#services" class="text-sm font-bold tracking-wider text-black hover:text-gray-dark transition-colors uppercase">
                        Services
                    </a>
                    <a href="#work" class="text-sm font-bold tracking-wider text-black hover:text-gray-dark transition-colors uppercase">
                        Work
                    </a>
                    <a href="#contact" class="btn-black px-6 py-3 text-sm font-bold tracking-wider uppercase ml-4">
                        Contact
                    </a>
                </nav>

                <!-- Mobile menu button -->
                <div class="md:hidden">
                    <button type="button" id="mobile-menu-button" class="text-black">
                        <svg class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                            <path stroke-linecap="square" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Navigation -->
        <div id="mobile-menu" class="hidden md:hidden border-t-4 border-black">
            <div class="px-6 py-6 space-y-4 bg-white">
                <a href="#services" class="block text-sm font-bold tracking-wider text-black uppercase">
                    Services
                </a>
                <a href="#work" class="block text-sm font-bold tracking-wider text-black uppercase">
                    Work
                </a>
                <a href="#contact" class="block text-sm font-bold tracking-wider text-black uppercase">
                    Contact
                </a>
            </div>
        </div>
    </header>

    <!-- Demo Notice -->
    <div class="bg-black text-white">
        <div class="max-w-6xl mx-auto px-6 md:px-10 py-3">
            <p class="text-xs text-center tracking-wider font-bold uppercase">
                Demo Mode - Brutalist Design Showcase
            </p>
        </div>
    </div>

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-black text-white py-8">
        <div class="max-w-6xl mx-auto px-6 md:px-10">
            <div class="flex flex-col items-center gap-6">
                <a href="{{ route('projects.index') }}" class="inline-flex items-center text-xs font-bold tracking-wider uppercase hover:text-gray transition-colors">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="3">
                        <path stroke-linecap="square" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    Back to Projects
                </a>
                <p class="text-xs tracking-wider font-bold uppercase">
                    &copy; 2025 BLOC. All rights reserved.
                </p>
            </div>
        </div>
    </footer>

    <!-- Mobile Menu Toggle Script -->
    <script>
        document.getElementById('mobile-menu-button').addEventListener('click', function() {
            const menu = document.getElementById('mobile-menu');
            menu.classList.toggle('hidden');
        });
    </script>

    <!-- Reveal Animation Script -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const targets = document.querySelectorAll('.reveal');
            const io = new IntersectionObserver((entries) => {
                entries.forEach(e => {
                    if (e.isIntersecting) {
                        e.target.classList.add('visible');
                        io.unobserve(e.target);
                    }
                });
            }, { threshold: 0.2 });
            targets.forEach(el => io.observe(el));
        });
    </script>

    @stack('scripts')
</body>
</html>
