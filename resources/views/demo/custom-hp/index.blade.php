@extends('demo.custom-hp.layouts.app')

@section('title', 'ホーム')

@section('content')
<!-- Hero Section -->
<section class="min-h-screen flex items-center justify-center px-6 lg:px-8 py-20">
    <div class="max-w-5xl mx-auto text-center">
        <div class="mb-12 animate-fade-in">
            <h1 class="text-6xl md:text-7xl lg:text-8xl font-light text-gray-900 mb-8 leading-tight tracking-tight">
                Design meets<br>
                Technology
            </h1>
            <p class="text-lg md:text-xl text-[#1F1F1F] font-light leading-relaxed max-w-2xl mx-auto mb-12">
                デザインとテクノロジーの力で、新しい価値を創造し、<br class="hidden md:block">
                社会に貢献する。
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
                <a href="{{ route('demo.custom-hp.contact') }}" class="glass-button-primary px-10 py-4 rounded-full text-sm font-light inline-block">
                    お問い合わせ
                </a>
                <a href="{{ route('demo.custom-hp.works') }}" class="glass-button px-10 py-4 rounded-full text-sm font-light inline-block text-gray-900">
                    実績を見る
                </a>
            </div>
        </div>

        <!-- Scroll Indicator -->
        <div class="mt-20 animate-bounce">
            <svg class="w-6 h-6 mx-auto text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
            </svg>
        </div>
    </div>
</section>

<!-- Services Section -->
<section class="py-32 px-6 lg:px-8">
    <div class="max-w-7xl mx-auto">
        <div class="text-center mb-20">
            <span class="text-xs font-normal text-gray-500 tracking-widest uppercase mb-4 block">Our Services</span>
            <h2 class="text-4xl md:text-5xl font-light text-gray-900 mb-6">サービス</h2>
            <p class="text-[#1F1F1F] font-light max-w-2xl mx-auto">
                私たちは、幅広いクリエイティブソリューションを提供しています。
            </p>
        </div>

        <div class="grid md:grid-cols-3 gap-8">
            <!-- Service 1: Webデザイン -->
            <div class="glass-card glass-card-hover rounded-3xl p-8">
                <div class="mb-6">
                    <div class="w-12 h-12 rounded-2xl bg-gradient-to-br from-orange-200/60 to-orange-300/40 flex items-center justify-center mb-6">
                        <svg class="w-6 h-6 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-light text-gray-900 mb-4">Webデザイン</h3>
                    <p class="text-sm text-[#1F1F1F] font-light leading-relaxed mb-6">
                        美しく使いやすいWebサイトをデザインします。ユーザー体験を重視した設計で、ビジネスの成果につながるサイトを実現します。
                    </p>
                </div>
                <div class="pt-6 border-t border-gray-200/50">
                    <p class="text-xs text-gray-500 font-light mb-1">料金の目安</p>
                    <p class="text-2xl font-light text-gray-900">30万円〜</p>
                </div>
            </div>

            <!-- Service 2: Web開発 -->
            <div class="glass-card glass-card-hover rounded-3xl p-8">
                <div class="mb-6">
                    <div class="w-12 h-12 rounded-2xl bg-gradient-to-br from-pink-200/60 to-pink-300/40 flex items-center justify-center mb-6">
                        <svg class="w-6 h-6 text-pink-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-light text-gray-900 mb-4">Web開発</h3>
                    <p class="text-sm text-[#1F1F1F] font-light leading-relaxed mb-6">
                        最新技術を使った高品質なWebアプリケーション開発。安全で使いやすいシステムを提供します。
                    </p>
                </div>
                <div class="pt-6 border-t border-gray-200/50">
                    <p class="text-xs text-gray-500 font-light mb-1">料金の目安</p>
                    <p class="text-2xl font-light text-gray-900">50万円〜</p>
                </div>
            </div>

            <!-- Service 3: デジタルマーケティング -->
            <div class="glass-card glass-card-hover rounded-3xl p-8">
                <div class="mb-6">
                    <div class="w-12 h-12 rounded-2xl bg-gradient-to-br from-orange-200/60 to-pink-200/40 flex items-center justify-center mb-6">
                        <svg class="w-6 h-6 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-light text-gray-900 mb-4">デジタルマーケティング</h3>
                    <p class="text-sm text-[#1F1F1F] font-light leading-relaxed mb-6">
                        データドリブンなマーケティング戦略。SEO対策からSNS運用まで、総合的にサポートします。
                    </p>
                </div>
                <div class="pt-6 border-t border-gray-200/50">
                    <p class="text-xs text-gray-500 font-light mb-1">料金の目安</p>
                    <p class="text-2xl font-light text-gray-900">20万円〜/月</p>
                </div>
            </div>
        </div>

        <div class="text-center mt-12">
            <a href="{{ route('demo.custom-hp.service') }}" class="glass-button px-8 py-3 rounded-full text-sm font-light inline-block text-gray-900">
                サービス一覧を見る →
            </a>
        </div>
    </div>
</section>

<!-- Works Section -->
<section class="py-32 px-6 lg:px-8 bg-gradient-to-b from-transparent to-white/30">
    <div class="max-w-7xl mx-auto">
        <div class="text-center mb-20">
            <span class="text-xs font-normal text-gray-500 tracking-widest uppercase mb-4 block">Our Works</span>
            <h2 class="text-4xl md:text-5xl font-light text-gray-900 mb-6">実績</h2>
            <p class="text-[#1F1F1F] font-light max-w-2xl mx-auto">
                私たちが手がけたプロジェクトの一部をご紹介します。
            </p>
        </div>

        <div class="grid md:grid-cols-2 gap-8">
            <!-- Work 1 -->
            <div class="glass-card glass-card-hover rounded-3xl overflow-hidden">
                <div class="aspect-video bg-gradient-to-br from-orange-100/80 to-pink-100/60 flex items-center justify-center">
                    <div class="text-center">
                        <svg class="w-16 h-16 mx-auto text-gray-400 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                        <p class="text-gray-500 text-xs font-light">Work Image</p>
                    </div>
                </div>
                <div class="p-8">
                    <div class="flex items-center gap-2 mb-3">
                        <span class="text-xs font-light px-3 py-1 rounded-full bg-white/60 text-[#1F1F1F]">Web開発</span>
                        <span class="text-xs font-light text-gray-500">2024</span>
                    </div>
                    <h3 class="text-xl font-light text-gray-900 mb-3">ECサイトリニューアル</h3>
                    <p class="text-sm text-[#1F1F1F] font-light leading-relaxed">
                        老舗アパレルブランドのECサイトを全面リニューアル。モダンなUIと高速なパフォーマンスを実現しました。
                    </p>
                </div>
            </div>

            <!-- Work 2 -->
            <div class="glass-card glass-card-hover rounded-3xl overflow-hidden">
                <div class="aspect-video bg-gradient-to-br from-pink-100/80 to-orange-100/60 flex items-center justify-center">
                    <div class="text-center">
                        <svg class="w-16 h-16 mx-auto text-gray-400 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                        <p class="text-gray-500 text-xs font-light">Work Image</p>
                    </div>
                </div>
                <div class="p-8">
                    <div class="flex items-center gap-2 mb-3">
                        <span class="text-xs font-light px-3 py-1 rounded-full bg-white/60 text-[#1F1F1F]">Webデザイン</span>
                        <span class="text-xs font-light text-gray-500">2024</span>
                    </div>
                    <h3 class="text-xl font-light text-gray-900 mb-3">コーポレートサイト制作</h3>
                    <p class="text-sm text-[#1F1F1F] font-light leading-relaxed">
                        IT企業のコーポレートサイトをゼロから制作。ブランドイメージを体現したデザインが高評価を得ました。
                    </p>
                </div>
            </div>
        </div>

        <div class="text-center mt-12">
            <a href="{{ route('demo.custom-hp.works') }}" class="glass-button px-8 py-3 rounded-full text-sm font-light inline-block text-gray-900">
                実績一覧を見る →
            </a>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-32 px-6 lg:px-8">
    <div class="max-w-4xl mx-auto">
        <div class="glass-card-strong rounded-3xl p-12 md:p-16 text-center">
            <h2 class="text-3xl md:text-4xl font-light text-gray-900 mb-6">お気軽にご相談ください</h2>
            <p class="text-[#1F1F1F] font-light leading-relaxed mb-10 max-w-2xl mx-auto">
                サービスに関するご質問、お見積もりのご依頼など、<br class="hidden md:block">
                お気軽にお問い合わせください。担当者より2営業日以内にご連絡いたします。
            </p>
            <div class="flex flex-col sm:flex-row gap-6 justify-center items-center mb-10">
                <div class="flex items-center gap-3 text-[#1F1F1F]">
                    <div class="w-8 h-8 rounded-full bg-white/60 flex items-center justify-center">
                        <svg class="w-4 h-4 text-[#1F1F1F]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                        </svg>
                    </div>
                    <span class="font-light">03-1234-5678</span>
                </div>
                <span class="hidden sm:block text-gray-300">|</span>
                <div class="flex items-center gap-3 text-[#1F1F1F]">
                    <div class="w-8 h-8 rounded-full bg-white/60 flex items-center justify-center">
                        <svg class="w-4 h-4 text-[#1F1F1F]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <span class="font-light">info@creative-corp.jp</span>
                </div>
            </div>
            <a href="{{ route('demo.custom-hp.contact') }}" class="glass-button-primary px-10 py-4 rounded-full text-sm font-light inline-block">
                お問い合わせフォーム
            </a>
        </div>
    </div>
</section>

<style>
@keyframes fade-in {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.animate-fade-in {
    animation: fade-in 1s ease-out;
}
</style>
@endsection
