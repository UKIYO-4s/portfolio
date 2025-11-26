@extends('demo.insta-lp.layouts.app')

@section('title', 'Home')

@section('content')
<section class="py-12 md:py-20">
    <div class="max-w-6xl mx-auto px-4 md:px-8">
        <!-- PC Layout: Side by side -->
        <div class="flex flex-col lg:flex-row gap-12 lg:gap-16 items-center">

            <!-- Left: Copy & CTA (PC only) -->
            <div class="flex-1 pc-only">
                <p class="text-xs font-medium text-gray-500 uppercase tracking-wider mb-4">instagram-style landing page</p>
                <h1 class="text-4xl md:text-5xl font-bold leading-tight mb-6">
                    フリックで<br>
                    <span class="insta-gradient-text">体験する</span><br>
                    新しいLP
                </h1>
                <p class="text-gray-600 text-lg leading-relaxed mb-8 max-w-md">
                    スマホネイティブな縦スクロール体験。直感的なフリック操作で、ユーザーを惹きつけるランディングページを。
                </p>
                <div class="flex gap-4">
                    <a href="#" class="insta-gradient px-8 py-4 rounded-full text-white text-sm font-semibold hover:opacity-90 transition-opacity">
                        無料で試す
                    </a>
                    <a href="#" class="px-8 py-4 rounded-full border border-gray-300 text-gray-700 text-sm font-semibold hover:bg-gray-50 transition-colors">
                        詳しく見る
                    </a>
                </div>

                <!-- Scroll hint -->
                <div class="mt-12 flex items-center gap-3 text-gray-400">
                    <svg class="w-5 h-5 animate-bounce" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
                    </svg>
                    <span class="text-xs">スマホモック内をスクロール</span>
                </div>
            </div>

            <!-- Right: Phone Mockup -->
            <div class="phone-wrapper flex-shrink-0">
                <div class="phone-mockup w-[320px] md:w-[360px]">
                    <!-- Notch -->
                    <div class="phone-notch"></div>

                    <!-- Screen -->
                    <div class="phone-screen aspect-[9/16] relative" style="margin-top: -14px;">
                        <!-- Snap scroll container -->
                        <div id="snap-container" class="snap-container h-full">

                            <!-- Section 1: Hero -->
                            <div class="snap-section h-full flex flex-col relative" data-section="0">
                                <!-- Background gradient -->
                                <div class="absolute inset-0 bg-gradient-to-b from-pink-100 via-orange-50 to-white"></div>

                                <div class="relative z-10 flex-1 flex flex-col justify-center items-center px-6 text-center">
                                    <!-- Icon -->
                                    <div class="w-20 h-20 rounded-2xl insta-gradient flex items-center justify-center mb-6 shadow-lg">
                                        <svg class="w-10 h-10 text-white" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                                        </svg>
                                    </div>

                                    <h2 class="text-2xl font-bold mb-3">
                                        <span class="insta-gradient-text">InstaLP</span>で<br>始めよう
                                    </h2>
                                    <p class="text-gray-600 text-sm mb-8 max-w-[240px]">
                                        Instagram風の縦スクロールで、ユーザーを惹きつける体験を。
                                    </p>

                                    <button class="insta-gradient px-8 py-3 rounded-full text-white text-sm font-semibold shadow-lg">
                                        無料で試す
                                    </button>
                                </div>

                                <!-- Swipe indicator -->
                                <div class="absolute bottom-6 left-1/2 -translate-x-1/2 flex flex-col items-center text-gray-400">
                                    <span class="text-[10px] mb-1">swipe up</span>
                                    <svg class="w-4 h-4 animate-bounce" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"></path>
                                    </svg>
                                </div>
                            </div>

                            <!-- Section 2: Templates -->
                            <div class="snap-section h-full flex flex-col bg-white" data-section="1">
                                <div class="flex-1 flex flex-col justify-center px-6">
                                    <p class="text-[10px] font-medium text-gray-400 uppercase tracking-wider mb-2">templates</p>
                                    <h2 class="text-xl font-bold mb-6">テンプレートを選ぶ</h2>

                                    <!-- Template grid -->
                                    <div class="grid grid-cols-2 gap-3 mb-6">
                                        <div class="aspect-[3/4] rounded-xl bg-gradient-to-br from-pink-400 to-purple-500 p-3 flex flex-col justify-end">
                                            <span class="text-white text-xs font-medium">minimal</span>
                                        </div>
                                        <div class="aspect-[3/4] rounded-xl bg-gradient-to-br from-orange-400 to-red-500 p-3 flex flex-col justify-end">
                                            <span class="text-white text-xs font-medium">bold</span>
                                        </div>
                                        <div class="aspect-[3/4] rounded-xl bg-gradient-to-br from-blue-400 to-cyan-500 p-3 flex flex-col justify-end">
                                            <span class="text-white text-xs font-medium">fresh</span>
                                        </div>
                                        <div class="aspect-[3/4] rounded-xl bg-gradient-to-br from-green-400 to-teal-500 p-3 flex flex-col justify-end">
                                            <span class="text-white text-xs font-medium">nature</span>
                                        </div>
                                    </div>

                                    <p class="text-gray-500 text-xs text-center">
                                        お好みのスタイルをタップして選択
                                    </p>
                                </div>
                            </div>

                            <!-- Section 3: Insights -->
                            <div class="snap-section h-full flex flex-col bg-gray-50" data-section="2">
                                <div class="flex-1 flex flex-col justify-center px-6">
                                    <p class="text-[10px] font-medium text-gray-400 uppercase tracking-wider mb-2">insights</p>
                                    <h2 class="text-xl font-bold mb-6">リアルタイム分析</h2>

                                    <!-- Stats -->
                                    <div class="space-y-4 mb-6">
                                        <div class="bg-white rounded-xl p-4 shadow-sm">
                                            <div class="flex items-center justify-between mb-2">
                                                <span class="text-xs text-gray-500">再生数</span>
                                                <span class="text-xs text-green-500 font-medium">+23%</span>
                                            </div>
                                            <span class="text-2xl font-bold insta-gradient-text">12,847</span>
                                        </div>

                                        <div class="flex gap-3">
                                            <div class="flex-1 bg-white rounded-xl p-4 shadow-sm">
                                                <span class="text-xs text-gray-500 block mb-1">保存</span>
                                                <span class="text-lg font-bold">1,234</span>
                                            </div>
                                            <div class="flex-1 bg-white rounded-xl p-4 shadow-sm">
                                                <span class="text-xs text-gray-500 block mb-1">シェア</span>
                                                <span class="text-lg font-bold">567</span>
                                            </div>
                                            <div class="flex-1 bg-white rounded-xl p-4 shadow-sm">
                                                <span class="text-xs text-gray-500 block mb-1">いいね</span>
                                                <span class="text-lg font-bold">8.9K</span>
                                            </div>
                                        </div>
                                    </div>

                                    <p class="text-gray-500 text-xs text-center">
                                        パフォーマンスを一目で把握
                                    </p>
                                </div>
                            </div>

                            <!-- Section 4: CTA -->
                            <div class="snap-section h-full flex flex-col relative" data-section="3">
                                <!-- Full gradient background -->
                                <div class="absolute inset-0 insta-gradient"></div>

                                <div class="relative z-10 flex-1 flex flex-col justify-center items-center px-6 text-center text-white">
                                    <div class="w-16 h-16 rounded-full bg-white/20 backdrop-blur flex items-center justify-center mb-6">
                                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                        </svg>
                                    </div>

                                    <h2 class="text-2xl font-bold mb-3">
                                        今すぐ始めよう
                                    </h2>
                                    <p class="text-white/80 text-sm mb-8 max-w-[240px]">
                                        無料プランで全機能をお試しいただけます。クレジットカード不要。
                                    </p>

                                    <button class="bg-white px-8 py-3 rounded-full text-sm font-semibold shadow-lg hover:bg-gray-50 transition-colors">
                                        <span class="insta-gradient-text">無料で始める</span>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- Dot navigation -->
                        <div class="absolute right-3 top-1/2 -translate-y-1/2 flex flex-col gap-2 z-20">
                            <button class="dot-nav w-2 h-2 rounded-full bg-gray-800 transition-all" data-target="0"></button>
                            <button class="dot-nav w-2 h-2 rounded-full bg-gray-300 transition-all" data-target="1"></button>
                            <button class="dot-nav w-2 h-2 rounded-full bg-gray-300 transition-all" data-target="2"></button>
                            <button class="dot-nav w-2 h-2 rounded-full bg-gray-300 transition-all" data-target="3"></button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Mobile only: Bottom copy -->
            <div class="mobile-only text-center px-4 py-8">
                <h1 class="text-2xl font-bold mb-4">
                    フリックで<span class="insta-gradient-text">体験する</span>新しいLP
                </h1>
                <p class="text-gray-600 text-sm mb-6">
                    スマホネイティブな縦スクロール体験。直感的なフリック操作で、ユーザーを惹きつけるランディングページを。
                </p>
                <a href="#" class="insta-gradient px-6 py-3 rounded-full text-white text-sm font-semibold inline-block">
                    無料で試す
                </a>
            </div>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', () => {
    const container = document.getElementById('snap-container');
    const sections = container.querySelectorAll('.snap-section');
    const dots = document.querySelectorAll('.dot-nav');
    let currentSection = 0;
    let isScrolling = false;

    // Update dot navigation
    function updateDots(index) {
        dots.forEach((dot, i) => {
            if (i === index) {
                dot.classList.remove('bg-gray-300');
                dot.classList.add('bg-gray-800');
            } else {
                dot.classList.remove('bg-gray-800');
                dot.classList.add('bg-gray-300');
            }
        });
    }

    // Scroll to section
    function scrollToSection(index) {
        if (index < 0 || index >= sections.length || isScrolling) return;

        isScrolling = true;
        currentSection = index;
        updateDots(index);

        sections[index].scrollIntoView({ behavior: 'smooth', block: 'start' });

        setTimeout(() => {
            isScrolling = false;
        }, 500);
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
        } else {
            scrollToSection(currentSection - 1);
        }
    }, { passive: false });

    // Touch handlers for mobile flick
    let touchStartY = 0;
    let touchEndY = 0;

    container.addEventListener('touchstart', (e) => {
        touchStartY = e.changedTouches[0].screenY;
    }, { passive: true });

    container.addEventListener('touchend', (e) => {
        if (isScrolling) return;

        touchEndY = e.changedTouches[0].screenY;
        const diff = touchStartY - touchEndY;

        if (Math.abs(diff) > 50) {
            if (diff > 0) {
                scrollToSection(currentSection + 1);
            } else {
                scrollToSection(currentSection - 1);
            }
        }
    }, { passive: true });

    // Update current section on scroll
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting && !isScrolling) {
                const index = parseInt(entry.target.dataset.section);
                currentSection = index;
                updateDots(index);
            }
        });
    }, {
        root: container,
        threshold: 0.5
    });

    sections.forEach(section => observer.observe(section));

    // Reveal animations
    const revealTargets = document.querySelectorAll('.reveal');
    const revealObserver = new IntersectionObserver((entries) => {
        entries.forEach(e => {
            if (e.isIntersecting) {
                e.target.classList.add('visible');
                revealObserver.unobserve(e.target);
            }
        });
    }, { threshold: 0.2 });

    revealTargets.forEach(el => revealObserver.observe(el));
});
</script>
@endpush
