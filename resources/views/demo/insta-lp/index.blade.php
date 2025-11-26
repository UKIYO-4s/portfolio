@extends('demo.insta-lp.layouts.app')

@section('title', 'Home')

@section('content')
<section class="py-8 md:py-12">
    <div class="max-w-6xl mx-auto px-4 md:px-8">
        <!-- PC Layout: Left description + Right mockup -->
        <div class="mock-wrapper hidden md:flex gap-12 lg:gap-16 items-center justify-center">
            <!-- Left: Description & Toggle hint -->
            <div class="flex-1 max-w-md">
                <p class="text-xs font-medium text-gray-500 uppercase tracking-wider mb-4">flick landing page</p>
                <h1 class="text-4xl lg:text-5xl font-bold leading-tight mb-6">
                    フリックで<br>
                    <span class="insta-gradient-text">体験する</span><br>
                    新しいLP
                </h1>
                <p class="text-gray-600 text-lg leading-relaxed mb-8">
                    スマホネイティブな縦スクロール体験。直感的なフリック操作で、ユーザーを惹きつけるランディングページ。
                </p>

                <!-- Scroll hint -->
                <div class="flex items-center gap-3 text-gray-400">
                    <svg class="w-5 h-5 animate-bounce" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
                    </svg>
                    <span class="text-sm">モック内をスクロール</span>
                </div>
            </div>

            <!-- Right: Phone Mockup -->
            <div class="flex-shrink-0 relative">
                <div class="phone-mockup">
                    <div id="snap-container-mock" class="snap-container">
                        @include('demo.insta-lp.partials.sections')
                    </div>
                </div>
                <!-- Dot navigation outside mockup -->
                <div id="dot-nav-mock" class="absolute right-[-24px] top-1/2 -translate-y-1/2 flex flex-col gap-3">
                    <button class="dot-nav active" data-target="0"></button>
                    <button class="dot-nav" data-target="1"></button>
                    <button class="dot-nav" data-target="2"></button>
                    <button class="dot-nav" data-target="3"></button>
                </div>
            </div>
        </div>

        <!-- Full screen wrapper (mobile default, PC toggle) -->
        <div class="full-wrapper">
            <div class="lp-container bg-white">
                <div id="snap-container-full" class="snap-container h-full">
                    @include('demo.insta-lp.partials.sections')
                </div>
                <!-- Dot navigation fixed right -->
                <div id="dot-nav-full" class="fixed right-4 top-1/2 -translate-y-1/2 flex flex-col gap-3 z-50">
                    <button class="dot-nav active" data-target="0"></button>
                    <button class="dot-nav" data-target="1"></button>
                    <button class="dot-nav" data-target="2"></button>
                    <button class="dot-nav" data-target="3"></button>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', () => {
    // Initialize both containers
    initFlickScroll('snap-container-mock', 'dot-nav-mock');
    initFlickScroll('snap-container-full', 'dot-nav-full');

    function initFlickScroll(containerId, dotNavId) {
        const container = document.getElementById(containerId);
        const dotNav = document.getElementById(dotNavId);
        if (!container || !dotNav) return;

        const sections = container.querySelectorAll('.snap-section');
        const dots = dotNav.querySelectorAll('.dot-nav');
        let currentSection = 0;
        let isScrolling = false;

        // Update dot navigation
        function updateDots(index) {
            dots.forEach((dot, i) => {
                dot.classList.toggle('active', i === index);
            });
        }

        // Scroll to section
        function scrollToSection(index) {
            if (index < 0 || index >= sections.length || isScrolling) return;

            isScrolling = true;
            currentSection = index;
            updateDots(index);

            const sectionHeight = container.clientHeight;
            container.scrollTo({
                top: index * sectionHeight,
                behavior: 'smooth'
            });

            setTimeout(() => {
                isScrolling = false;
            }, 600);
        }

        // Dot click handler
        dots.forEach(dot => {
            dot.addEventListener('click', () => {
                const target = parseInt(dot.dataset.target);
                scrollToSection(target);
            });
        });

        // Wheel handler for snap scrolling
        container.addEventListener('wheel', (e) => {
            e.preventDefault();
            if (isScrolling) return;

            if (e.deltaY > 0) {
                scrollToSection(currentSection + 1);
            } else if (e.deltaY < 0) {
                scrollToSection(currentSection - 1);
            }
        }, { passive: false });

        // Touch handlers for mobile flick
        let touchStartY = 0;
        let touchMoveY = 0;

        container.addEventListener('touchstart', (e) => {
            touchStartY = e.touches[0].clientY;
            touchMoveY = touchStartY;
        }, { passive: true });

        container.addEventListener('touchmove', (e) => {
            touchMoveY = e.touches[0].clientY;
            // Prevent default scroll behavior
            if (isScrolling) {
                e.preventDefault();
            }
        }, { passive: false });

        container.addEventListener('touchend', (e) => {
            if (isScrolling) return;

            const diff = touchStartY - touchMoveY;
            const threshold = 50;

            if (Math.abs(diff) > threshold) {
                if (diff > 0) {
                    scrollToSection(currentSection + 1);
                } else {
                    scrollToSection(currentSection - 1);
                }
            }
        }, { passive: true });

        // Observe scroll position to update current section
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting && !isScrolling) {
                    const index = parseInt(entry.target.dataset.index);
                    if (!isNaN(index)) {
                        currentSection = index;
                        updateDots(index);
                    }
                }
            });
        }, {
            root: container,
            threshold: 0.6
        });

        sections.forEach(section => observer.observe(section));
    }
});
</script>
@endpush
