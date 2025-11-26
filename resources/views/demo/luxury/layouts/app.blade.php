<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Maison Noir') - Luxury Demo</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
    <style>
        :root {
            --bg-primary: #0B0B0B;
            --bg-secondary: #111111;
            --gold: #CFA65B;
            --gold-light: #E8C97A;
            --gold-dark: #B8923F;
            --text-primary: #FFFFFF;
            --text-secondary: #9A9A9A;
            --text-muted: #6B6B6B;
        }

        * {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
        }

        body {
            background: var(--bg-primary);
            color: var(--text-primary);
            position: relative;
        }

        /* Noise texture overlay */
        body::before {
            content: '';
            position: fixed;
            inset: 0;
            background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 200 200' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='noise'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.85' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23noise)'/%3E%3C/svg%3E");
            opacity: 0.02;
            pointer-events: none;
            z-index: 0;
        }

        .font-serif {
            font-family: 'Playfair Display', Georgia, serif;
        }

        .font-sans {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
        }

        .text-gold {
            color: var(--gold);
        }

        .bg-gold {
            background: var(--gold);
        }

        .border-gold {
            border-color: var(--gold);
        }

        .tracking-wide {
            letter-spacing: 0.05em;
        }

        .tracking-wider {
            letter-spacing: 0.1em;
        }

        .tracking-widest {
            letter-spacing: 0.2em;
        }

        /* Buttons */
        .btn-gold {
            background: var(--gold);
            color: var(--bg-primary);
            transition: all 0.3s ease;
        }

        .btn-gold:hover {
            background: var(--gold-light);
        }

        .btn-outline-gold {
            background: transparent;
            border: 1px solid var(--gold);
            color: var(--gold);
            transition: all 0.3s ease;
        }

        .btn-outline-gold:hover {
            background: var(--gold);
            color: var(--bg-primary);
        }

        /* Service cards */
        .service-card {
            background: transparent;
            border: 1px solid var(--gold);
            transition: all 0.3s ease;
        }

        .service-card:hover {
            box-shadow: 0 0 20px rgba(207, 166, 91, 0.15);
            transform: translateY(-2px);
        }

        /* Gold glow effect */
        .gold-glow {
            box-shadow: 0 0 30px rgba(207, 166, 91, 0.2);
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

        /* Content wrapper */
        .content-wrapper {
            position: relative;
            z-index: 1;
        }
    </style>
</head>
<body class="min-h-screen">
    <div class="content-wrapper">
        <!-- Header -->
        <header class="fixed top-0 w-full z-50 bg-[#0B0B0B]/95 backdrop-blur-sm border-b border-[#222]">
            <div class="max-w-6xl mx-auto px-6 md:px-10">
                <div class="flex justify-between items-center h-20">
                    <!-- Logo -->
                    <a href="{{ route('demo.luxury.index') }}" class="font-serif text-2xl tracking-wider text-white">
                        MAISON NOIR
                    </a>

                    <!-- Desktop Navigation -->
                    <nav class="hidden md:flex items-center gap-12">
                        <a href="#services" class="text-sm tracking-wider text-[#9A9A9A] hover:text-gold transition-colors">
                            SERVICES
                        </a>
                        <a href="#clients" class="text-sm tracking-wider text-[#9A9A9A] hover:text-gold transition-colors">
                            CLIENTS
                        </a>
                        <a href="#contact" class="btn-outline-gold px-6 py-2 rounded-lg text-sm tracking-wider ml-4">
                            CONTACT
                        </a>
                    </nav>

                    <!-- Mobile menu button -->
                    <div class="md:hidden">
                        <button type="button" id="mobile-menu-button" class="text-[#9A9A9A] hover:text-white">
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4 6h16M4 12h16M4 18h16" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Mobile Navigation -->
            <div id="mobile-menu" class="hidden md:hidden border-t border-[#222]">
                <div class="px-6 py-6 space-y-4 bg-[#0B0B0B]">
                    <a href="#services" class="block text-sm tracking-wider text-[#9A9A9A] hover:text-gold">
                        SERVICES
                    </a>
                    <a href="#clients" class="block text-sm tracking-wider text-[#9A9A9A] hover:text-gold">
                        CLIENTS
                    </a>
                    <a href="#contact" class="block text-sm tracking-wider text-gold">
                        CONTACT
                    </a>
                </div>
            </div>
        </header>

        <!-- Spacer for fixed header -->
        <div class="h-20"></div>

        <!-- Demo Notice -->
        <div class="bg-[#111] border-b border-[#222]">
            <div class="max-w-6xl mx-auto px-6 md:px-10 py-3">
                <p class="text-xs text-center text-[#6B6B6B] tracking-wide">
                    <span class="text-gold">DEMO MODE</span> - Luxury Brand Design Showcase
                </p>
            </div>
        </div>

        <!-- Main Content -->
        <main>
            @yield('content')
        </main>

        <!-- Footer -->
        <footer class="bg-[#0B0B0B] border-t border-[#222] pt-16 pb-8">
            <div class="max-w-6xl mx-auto px-6 md:px-10">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-12 mb-12">
                    <!-- Brand -->
                    <div>
                        <h3 class="font-serif text-xl tracking-wider mb-6">MAISON NOIR</h3>
                        <p class="text-[#6B6B6B] text-sm leading-relaxed tracking-wide">
                            Crafting digital experiences<br>
                            for discerning brands.
                        </p>
                    </div>

                    <!-- Contact -->
                    <div>
                        <h3 class="text-sm tracking-widest text-gold mb-6">CONTACT</h3>
                        <p class="text-[#6B6B6B] text-sm leading-relaxed tracking-wide">
                            Tokyo, Japan<br>
                            contact@maison-noir.jp
                        </p>
                    </div>

                    <!-- Social -->
                    <div>
                        <h3 class="text-sm tracking-widest text-gold mb-6">FOLLOW</h3>
                        <div class="flex space-x-6">
                            <a href="#" class="text-[#6B6B6B] hover:text-gold transition-colors text-sm tracking-wider">Instagram</a>
                            <a href="#" class="text-[#6B6B6B] hover:text-gold transition-colors text-sm tracking-wider">LinkedIn</a>
                        </div>
                    </div>
                </div>

                <div class="border-t border-[#222] pt-8">
                    <div class="flex justify-center mb-6">
                        <a href="{{ route('projects.index') }}" class="inline-flex items-center text-xs text-[#6B6B6B] hover:text-gold transition-colors tracking-wider">
                            <svg class="w-3 h-3 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                            </svg>
                            BACK TO PROJECTS
                        </a>
                    </div>
                    <p class="text-[#6B6B6B] text-xs tracking-wider text-center">
                        &copy; 2025 MAISON NOIR. All rights reserved.
                    </p>
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
