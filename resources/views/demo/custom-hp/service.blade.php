@extends('demo.custom-hp.layouts.app')

@section('title', 'サービス')

@section('content')
<!-- Page Header -->
<section class="pt-32 pb-20 px-6 lg:px-8">
    <div class="max-w-5xl mx-auto text-center">
        <span class="text-xs font-normal text-gray-500 tracking-widest uppercase mb-4 block">Our Services</span>
        <h1 class="text-5xl md:text-6xl font-light text-gray-900 mb-8 leading-tight">サービス</h1>
        <p class="text-lg text-[#1F1F1F] font-light leading-relaxed max-w-2xl mx-auto">
            お客様のビジネスを成功に導く、幅広いクリエイティブソリューションを提供しています。
        </p>
    </div>
</section>

<!-- Services List -->
<section class="py-20 px-6 lg:px-8">
    <div class="max-w-6xl mx-auto space-y-20">
        @foreach($services as $index => $service)
            <div class="glass-card rounded-3xl overflow-hidden {{ $index % 2 == 0 ? '' : '' }}">
                <div class="grid md:grid-cols-2 gap-0">
                    <!-- Image/Icon Side -->
                    <div class="order-2 md:order-{{ $index % 2 == 0 ? '1' : '2' }} bg-gradient-to-br from-{{ $index == 0 ? 'orange' : ($index == 1 ? 'pink' : 'orange') }}-100/60 to-{{ $index == 0 ? 'orange' : ($index == 1 ? 'pink' : 'pink') }}-100/40 p-12 flex items-center justify-center">
                        <div class="text-center">
                            @if($index == 0)
                                <svg class="w-32 h-32 mx-auto text-orange-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01"></path>
                                </svg>
                            @elseif($index == 1)
                                <svg class="w-32 h-32 mx-auto text-pink-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"></path>
                                </svg>
                            @else
                                <svg class="w-32 h-32 mx-auto text-orange-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                                </svg>
                            @endif
                            <p class="text-gray-500 font-light text-sm">Service {{ sprintf('%02d', $index + 1) }}</p>
                        </div>
                    </div>

                    <!-- Content Side -->
                    <div class="order-1 md:order-{{ $index % 2 == 0 ? '2' : '1' }} p-12">
                        <div class="mb-6">
                            <span class="text-xs font-light px-3 py-1 rounded-full bg-white/60 text-[#1F1F1F] inline-block mb-4">Service {{ sprintf('%02d', $index + 1) }}</span>
                            <h2 class="text-3xl md:text-4xl font-light text-gray-900 mb-4">{{ $service['title'] }}</h2>
                            <p class="text-[#1F1F1F] font-light leading-relaxed mb-8">
                                {{ $service['description'] }}
                            </p>
                        </div>

                        <div class="mb-8">
                            <h3 class="text-sm font-normal text-gray-900 mb-4 tracking-wide">主な特徴</h3>
                            <ul class="space-y-3">
                                @foreach($service['features'] as $feature)
                                    <li class="flex items-start gap-3">
                                        <svg class="w-5 h-5 text-{{ $index == 0 ? 'orange' : ($index == 1 ? 'pink' : 'orange') }}-500 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                        </svg>
                                        <span class="text-sm text-[#1F1F1F] font-light">{{ $feature }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                        <div class="flex items-center justify-between pt-6 border-t border-gray-200/50">
                            <div>
                                <p class="text-xs text-gray-500 font-light mb-1">料金の目安</p>
                                <p class="text-2xl md:text-3xl font-light text-gray-900">{{ $service['price'] }}</p>
                            </div>
                            <a href="{{ route('demo.custom-hp.contact') }}" class="glass-button px-6 py-3 rounded-full text-sm font-light text-gray-900">
                                お問い合わせ →
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</section>

<!-- Process Section -->
<section class="py-32 px-6 lg:px-8 bg-gradient-to-b from-transparent to-white/30">
    <div class="max-w-6xl mx-auto">
        <div class="text-center mb-20">
            <span class="text-xs font-normal text-gray-500 tracking-widest uppercase mb-4 block">Our Process</span>
            <h2 class="text-3xl md:text-4xl font-light text-gray-900 mb-6">制作の流れ</h2>
            <p class="text-[#1F1F1F] font-light max-w-2xl mx-auto">
                ご依頼から納品まで、スムーズなプロジェクト進行をお約束します。
            </p>
        </div>

        <div class="grid md:grid-cols-4 gap-8">
            <!-- Step 1 -->
            <div class="text-center">
                <div class="glass-card rounded-3xl p-8 mb-6">
                    <div class="w-16 h-16 rounded-full bg-gradient-to-br from-orange-200/60 to-orange-300/40 flex items-center justify-center mx-auto mb-4">
                        <span class="text-2xl font-light text-orange-700">01</span>
                    </div>
                    <h3 class="text-lg font-light text-gray-900 mb-2">ヒアリング</h3>
                    <p class="text-xs text-[#1F1F1F] font-light leading-relaxed">
                        お客様のご要望や課題を丁寧にお伺いします
                    </p>
                </div>
            </div>

            <!-- Step 2 -->
            <div class="text-center">
                <div class="glass-card rounded-3xl p-8 mb-6">
                    <div class="w-16 h-16 rounded-full bg-gradient-to-br from-pink-200/60 to-pink-300/40 flex items-center justify-center mx-auto mb-4">
                        <span class="text-2xl font-light text-pink-700">02</span>
                    </div>
                    <h3 class="text-lg font-light text-gray-900 mb-2">企画・提案</h3>
                    <p class="text-xs text-[#1F1F1F] font-light leading-relaxed">
                        最適なソリューションをご提案いたします
                    </p>
                </div>
            </div>

            <!-- Step 3 -->
            <div class="text-center">
                <div class="glass-card rounded-3xl p-8 mb-6">
                    <div class="w-16 h-16 rounded-full bg-gradient-to-br from-orange-200/60 to-pink-200/40 flex items-center justify-center mx-auto mb-4">
                        <span class="text-2xl font-light text-orange-600">03</span>
                    </div>
                    <h3 class="text-lg font-light text-gray-900 mb-2">制作</h3>
                    <p class="text-xs text-[#1F1F1F] font-light leading-relaxed">
                        プロフェッショナルなチームが制作を進めます
                    </p>
                </div>
            </div>

            <!-- Step 4 -->
            <div class="text-center">
                <div class="glass-card rounded-3xl p-8 mb-6">
                    <div class="w-16 h-16 rounded-full bg-gradient-to-br from-pink-200/60 to-orange-200/40 flex items-center justify-center mx-auto mb-4">
                        <span class="text-2xl font-light text-pink-600">04</span>
                    </div>
                    <h3 class="text-lg font-light text-gray-900 mb-2">納品・サポート</h3>
                    <p class="text-xs text-[#1F1F1F] font-light leading-relaxed">
                        納品後も継続的にサポートいたします
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- FAQ Section -->
<section class="py-20 px-6 lg:px-8">
    <div class="max-w-4xl mx-auto">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-light text-gray-900 mb-6">よくあるご質問</h2>
            <p class="text-[#1F1F1F] font-light">
                お客様からよくいただくご質問にお答えします
            </p>
        </div>

        <div class="space-y-6">
            <!-- FAQ 1 -->
            <div class="glass-card rounded-2xl p-8">
                <h3 class="text-lg font-light text-gray-900 mb-3">Q. 制作期間はどのくらいですか？</h3>
                <p class="text-sm text-[#1F1F1F] font-light leading-relaxed pl-6">
                    A. プロジェクトの規模や内容によりますが、一般的なWebサイトで1〜3ヶ月程度です。詳細はお見積もり時にご案内いたします。
                </p>
            </div>

            <!-- FAQ 2 -->
            <div class="glass-card rounded-2xl p-8">
                <h3 class="text-lg font-light text-gray-900 mb-3">Q. 費用はどのように決まりますか？</h3>
                <p class="text-sm text-[#1F1F1F] font-light leading-relaxed pl-6">
                    A. ご要望やサイトの規模、機能などを総合的に判断してお見積もりいたします。まずは無料でご相談ください。
                </p>
            </div>

            <!-- FAQ 3 -->
            <div class="glass-card rounded-2xl p-8">
                <h3 class="text-lg font-light text-gray-900 mb-3">Q. 運用サポートは対応していますか？</h3>
                <p class="text-sm text-[#1F1F1F] font-light leading-relaxed pl-6">
                    A. はい、サイト公開後の運用・保守サポートも承っております。月額制のサポートプランもご用意しています。
                </p>
            </div>

            <!-- FAQ 4 -->
            <div class="glass-card rounded-2xl p-8">
                <h3 class="text-lg font-light text-gray-900 mb-3">Q. 遠方からの依頼は可能ですか？</h3>
                <p class="text-sm text-[#1F1F1F] font-light leading-relaxed pl-6">
                    A. はい、オンラインでのお打ち合わせにも対応しておりますので、全国どこからでもご依頼いただけます。
                </p>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-20 px-6 lg:px-8">
    <div class="max-w-4xl mx-auto">
        <div class="glass-card-strong rounded-3xl p-12 md:p-16 text-center">
            <h2 class="text-2xl md:text-3xl font-light text-gray-900 mb-6">まずはお気軽にご相談ください</h2>
            <p class="text-[#1F1F1F] font-light leading-relaxed mb-10">
                サービスに関するご質問やお見積もりのご依頼など、<br class="hidden md:block">
                お気軽にお問い合わせください。
            </p>
            <a href="{{ route('demo.custom-hp.contact') }}" class="glass-button-primary px-10 py-4 rounded-full text-sm font-light inline-block">
                お問い合わせフォーム
            </a>
        </div>
    </div>
</section>
@endsection
