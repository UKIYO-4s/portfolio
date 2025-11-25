@extends('demo.custom-hp.layouts.app')

@section('title', 'ホーム')

@section('content')
<!-- Hero Section -->
<section class="min-h-screen flex items-center justify-center px-8 py-20">
    <div class="max-w-5xl mx-auto text-center">
        <p class="text-[#265A49] font-medium mb-6 text-sm tracking-wider uppercase">Creative Studio</p>
        <h1 class="text-5xl md:text-6xl lg:text-7xl font-semibold text-[#121212] mb-8 leading-tight">
            Design meets<br>
            Technology
        </h1>
        <p class="text-lg text-[#6B6B6B] leading-relaxed max-w-2xl mx-auto mb-12">
            デザインとテクノロジーの力で、新しい価値を創造し、<br class="hidden md:block">
            社会に貢献する。
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
            <a href="{{ route('demo.custom-hp.contact') }}" class="btn-primary px-8 py-3 rounded-full text-sm font-medium">
                お問い合わせ
            </a>
            <a href="{{ route('demo.custom-hp.works') }}" class="btn-outline px-8 py-3 rounded-full text-sm font-medium">
                実績を見る
            </a>
        </div>

        <!-- Scroll Indicator -->
        <div class="mt-24 animate-bounce">
            <svg class="w-5 h-5 mx-auto text-[#6B6B6B]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
            </svg>
        </div>
    </div>
</section>

<!-- Services Section -->
<section class="py-32 px-8 bg-gradient-to-br from-[#EDEBE8]/20 via-transparent to-transparent">
    <div class="max-w-6xl mx-auto">
        <div class="text-center mb-16">
            <span class="text-xs font-medium text-[#6B6B6B] tracking-widest uppercase mb-4 block">Our Services</span>
            <h2 class="text-3xl md:text-4xl font-semibold text-[#121212] mb-4">サービス</h2>
            <p class="text-[#6B6B6B] max-w-xl mx-auto">
                私たちは、幅広いクリエイティブソリューションを提供しています。
            </p>
        </div>

        <div class="grid md:grid-cols-3 gap-6">
            <!-- Service 1: Webデザイン -->
            <div class="glass-card-minimal p-8">
                <div class="flex items-start gap-4 mb-6">
                    <div class="icon-minimal">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01"></path>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-lg font-medium text-[#121212] mb-2">Webデザイン</h3>
                        <p class="text-sm text-[#6B6B6B] leading-relaxed">
                            美しく使いやすいWebサイトをデザインします。
                        </p>
                    </div>
                </div>
                <div class="pt-4 border-t border-[rgba(0,0,0,0.06)]">
                    <p class="text-xs text-[#6B6B6B] mb-1">料金の目安</p>
                    <p class="text-xl font-medium text-[#121212]">30万円〜</p>
                </div>
            </div>

            <!-- Service 2: Web開発 -->
            <div class="glass-card-minimal p-8">
                <div class="flex items-start gap-4 mb-6">
                    <div class="icon-minimal">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"></path>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-lg font-medium text-[#121212] mb-2">Web開発</h3>
                        <p class="text-sm text-[#6B6B6B] leading-relaxed">
                            最新技術を使った高品質なWebアプリケーション開発。
                        </p>
                    </div>
                </div>
                <div class="pt-4 border-t border-[rgba(0,0,0,0.06)]">
                    <p class="text-xs text-[#6B6B6B] mb-1">料金の目安</p>
                    <p class="text-xl font-medium text-[#121212]">50万円〜</p>
                </div>
            </div>

            <!-- Service 3: デジタルマーケティング -->
            <div class="glass-card-minimal p-8">
                <div class="flex items-start gap-4 mb-6">
                    <div class="icon-minimal">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-lg font-medium text-[#121212] mb-2">マーケティング</h3>
                        <p class="text-sm text-[#6B6B6B] leading-relaxed">
                            データドリブンなマーケティング戦略を提案。
                        </p>
                    </div>
                </div>
                <div class="pt-4 border-t border-[rgba(0,0,0,0.06)]">
                    <p class="text-xs text-[#6B6B6B] mb-1">料金の目安</p>
                    <p class="text-xl font-medium text-[#121212]">20万円〜/月</p>
                </div>
            </div>
        </div>

        <div class="text-center mt-12">
            <a href="{{ route('demo.custom-hp.service') }}" class="btn-outline px-6 py-2.5 rounded-full text-sm font-medium inline-flex items-center gap-2">
                サービス一覧を見る
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
            </a>
        </div>
    </div>
</section>

<!-- Works Section -->
<section class="py-32 px-8 bg-gradient-to-br from-[#EDEBE8]/15 via-transparent to-[#F7F6F4]/10">
    <div class="max-w-6xl mx-auto">
        <div class="text-center mb-16">
            <span class="text-xs font-medium text-[#6B6B6B] tracking-widest uppercase mb-4 block">Selected Works</span>
            <h2 class="text-3xl md:text-4xl font-semibold text-[#121212] mb-4">実績</h2>
            <p class="text-[#6B6B6B] max-w-xl mx-auto">
                私たちが手がけたプロジェクトの一部をご紹介します。
            </p>
        </div>

        <div class="grid md:grid-cols-2 gap-6">
            <!-- Work 1 -->
            <div class="glass-card-minimal overflow-hidden group">
                <div class="aspect-[16/10] bg-gradient-to-br from-[#EDEBE8] to-[#F7F6F4] flex items-center justify-center relative">
                    <div class="text-center">
                        <svg class="w-12 h-12 mx-auto text-[#6B6B6B]/40 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                        <p class="text-[#6B6B6B]/60 text-xs">Work Image</p>
                    </div>
                    <div class="absolute inset-0 bg-[#265A49]/0 group-hover:bg-[#265A49]/5 transition-colors duration-300"></div>
                </div>
                <div class="p-6">
                    <div class="flex items-center gap-3 mb-3">
                        <span class="text-xs px-2.5 py-1 rounded-full bg-[rgba(38,90,73,0.08)] text-[#265A49]">Web開発</span>
                        <span class="text-xs text-[#6B6B6B]">2024</span>
                    </div>
                    <h3 class="text-lg font-medium text-[#121212] mb-2">ECサイトリニューアル</h3>
                    <p class="text-sm text-[#6B6B6B] leading-relaxed">
                        老舗アパレルブランドのECサイトを全面リニューアル。
                    </p>
                </div>
            </div>

            <!-- Work 2 -->
            <div class="glass-card-minimal overflow-hidden group">
                <div class="aspect-[16/10] bg-gradient-to-br from-[#EDEBE8] to-[#F7F6F4] flex items-center justify-center relative">
                    <div class="text-center">
                        <svg class="w-12 h-12 mx-auto text-[#6B6B6B]/40 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                        <p class="text-[#6B6B6B]/60 text-xs">Work Image</p>
                    </div>
                    <div class="absolute inset-0 bg-[#265A49]/0 group-hover:bg-[#265A49]/5 transition-colors duration-300"></div>
                </div>
                <div class="p-6">
                    <div class="flex items-center gap-3 mb-3">
                        <span class="text-xs px-2.5 py-1 rounded-full bg-[rgba(38,90,73,0.08)] text-[#265A49]">Webデザイン</span>
                        <span class="text-xs text-[#6B6B6B]">2024</span>
                    </div>
                    <h3 class="text-lg font-medium text-[#121212] mb-2">コーポレートサイト制作</h3>
                    <p class="text-sm text-[#6B6B6B] leading-relaxed">
                        IT企業のコーポレートサイトをゼロから制作。
                    </p>
                </div>
            </div>
        </div>

        <div class="text-center mt-12">
            <a href="{{ route('demo.custom-hp.works') }}" class="btn-outline px-6 py-2.5 rounded-full text-sm font-medium inline-flex items-center gap-2">
                実績一覧を見る
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
            </a>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-32 px-8 bg-gradient-to-br from-[#EDEBE8]/20 via-transparent to-transparent">
    <div class="max-w-3xl mx-auto">
        <div class="glass-card-minimal p-12 md:p-16 text-center">
            <h2 class="text-2xl md:text-3xl font-semibold text-[#121212] mb-4">お気軽にご相談ください</h2>
            <p class="text-[#6B6B6B] leading-relaxed mb-8 max-w-lg mx-auto">
                サービスに関するご質問、お見積もりのご依頼など、<br class="hidden md:block">
                お気軽にお問い合わせください。
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center items-center text-sm text-[#6B6B6B] mb-8">
                <span>03-1234-5678</span>
                <span class="hidden sm:block">|</span>
                <span>info@creative-studio.jp</span>
            </div>
            <a href="{{ route('demo.custom-hp.contact') }}" class="btn-primary px-8 py-3 rounded-full text-sm font-medium inline-block">
                お問い合わせフォーム
            </a>
        </div>
    </div>
</section>
@endsection
