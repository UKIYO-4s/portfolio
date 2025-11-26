<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'NEXUS') - Cyber Demo</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --bg-dark: #0B1020;
            --bg-dark-alt: #0F1A30;
            --blue: #3B82F6;
            --blue-light: #60A5FA;
            --purple: #8B5CF6;
            --purple-light: #A78BFA;
            --cyan: #22D3EE;
            --text-primary: #FFFFFF;
            --text-secondary: #94A3B8;
            --text-muted: #64748B;
        }

        * {
            font-family: 'Space Grotesk', -apple-system, BlinkMacSystemFont, sans-serif;
        }

        body {
            background: var(--bg-dark);
            color: var(--text-primary);
            position: relative;
            overflow-x: hidden;
        }

        /* Grid background */
        .grid-bg {
            position: fixed;
            inset: 0;
            background-image:
                linear-gradient(rgba(59, 130, 246, 0.03) 1px, transparent 1px),
                linear-gradient(90deg, rgba(59, 130, 246, 0.03) 1px, transparent 1px);
            background-size: 50px 50px;
            pointer-events: none;
            z-index: 0;
        }

        /* Gradient overlay */
        .gradient-overlay {
            position: fixed;
            inset: 0;
            background: linear-gradient(to bottom right, #0B1020, #0F1A30, #0B1020);
            opacity: 0.95;
            pointer-events: none;
            z-index: 0;
        }

        /* Content wrapper */
        .content-wrapper {
            position: relative;
            z-index: 1;
        }

        /* Glow effects */
        .glow-blue {
            box-shadow: 0 0 40px rgba(59, 130, 246, 0.3);
        }

        .glow-purple {
            box-shadow: 0 0 40px rgba(139, 92, 246, 0.3);
        }

        .glow-cyan {
            box-shadow: 0 0 30px rgba(34, 211, 238, 0.2);
        }

        /* Buttons */
        .btn-blue {
            background: var(--blue);
            color: white;
            transition: all 0.3s ease;
        }

        .btn-blue:hover {
            background: var(--blue-light);
            box-shadow: 0 0 20px rgba(59, 130, 246, 0.5);
            transform: scale(1.02);
        }

        .btn-outline-purple {
            background: transparent;
            border: 1px solid var(--purple);
            color: var(--purple);
            transition: all 0.3s ease;
        }

        .btn-outline-purple:hover {
            background: var(--purple);
            color: white;
            box-shadow: 0 0 20px rgba(139, 92, 246, 0.5);
            transform: scale(1.02);
        }

        /* Glass card */
        .glass-card {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(8px);
            -webkit-backdrop-filter: blur(8px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            transition: all 0.3s ease;
        }

        .glass-card:hover {
            background: rgba(255, 255, 255, 0.08);
            border-color: rgba(59, 130, 246, 0.3);
            transform: scale(1.02);
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

        /* Gradient text */
        .gradient-text {
            background: linear-gradient(135deg, var(--blue), var(--purple));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
    </style>
</head>
<body class="min-h-screen">
    <!-- Grid Background -->
    <div class="grid-bg"></div>
    <div class="gradient-overlay"></div>

    <!-- Glow orbs -->
    <div class="fixed top-1/4 left-1/4 w-96 h-96 bg-blue-500/10 rounded-full blur-3xl pointer-events-none"></div>
    <div class="fixed bottom-1/4 right-1/4 w-80 h-80 bg-purple-500/10 rounded-full blur-3xl pointer-events-none"></div>

    <div class="content-wrapper">
        <!-- Header -->
        <header class="fixed top-0 w-full z-50 bg-[#0B1020]/80 backdrop-blur-md border-b border-white/10">
            <div class="max-w-6xl mx-auto px-6 md:px-10">
                <div class="flex justify-between items-center h-20">
                    <!-- Logo -->
                    <a href="{{ route('demo.cyber.index') }}" class="text-2xl font-bold tracking-wide">
                        <span class="gradient-text">NEXUS</span>
                    </a>

                    <!-- Desktop Navigation -->
                    <nav class="hidden md:flex items-center gap-12">
                        <a href="#features" class="text-sm text-[#94A3B8] hover:text-white transition-colors">
                            Features
                        </a>
                        <a href="#metrics" class="text-sm text-[#94A3B8] hover:text-white transition-colors">
                            Metrics
                        </a>
                        <a href="#contact" class="btn-blue px-6 py-2.5 rounded-lg text-sm font-medium">
                            Get Started
                        </a>
                    </nav>

                    <!-- Mobile menu button -->
                    <div class="md:hidden">
                        <button type="button" id="mobile-menu-button" class="text-[#94A3B8] hover:text-white">
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Mobile Navigation -->
            <div id="mobile-menu" class="hidden md:hidden border-t border-white/10">
                <div class="px-6 py-6 space-y-4 bg-[#0B1020]/95 backdrop-blur-md">
                    <a href="#features" class="block text-sm text-[#94A3B8] hover:text-white">
                        Features
                    </a>
                    <a href="#metrics" class="block text-sm text-[#94A3B8] hover:text-white">
                        Metrics
                    </a>
                    <a href="#contact" class="block text-sm text-blue-400">
                        Get Started
                    </a>
                </div>
            </div>
        </header>

        <!-- Spacer for fixed header -->
        <div class="h-20"></div>

        <!-- Demo Notice -->
        <div class="bg-gradient-to-r from-blue-500/10 via-purple-500/10 to-blue-500/10 border-b border-white/10">
            <div class="max-w-6xl mx-auto px-6 md:px-10 py-3">
                <p class="text-xs text-center text-[#94A3B8]">
                    <span class="text-cyan-400 font-medium">DEMO MODE</span> - Cyber/SF Design Showcase
                </p>
            </div>
        </div>

        <!-- Main Content -->
        <main>
            @yield('content')
        </main>

        <!-- Footer -->
        <footer class="bg-[#0B1020] border-t border-white/10 py-12">
            <div class="max-w-6xl mx-auto px-6 md:px-10">
                <div class="flex flex-col items-center gap-6">
                    <a href="{{ route('projects.index') }}" class="inline-flex items-center text-xs text-[#94A3B8] hover:text-white transition-colors">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>
                        Back to Projects
                    </a>
                    <p class="text-xs text-[#64748B]">
                        &copy; 2025 NEXUS. All rights reserved.
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
