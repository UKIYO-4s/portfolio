@extends('demo.custom-hp.layouts.app')

@section('title', 'サービス')

@section('content')
<!-- Page Header -->
<section class="pt-32 pb-16 px-8">
    <div class="max-w-4xl mx-auto text-center">
        <span class="text-xs font-medium text-[#6B6B6B] tracking-widest uppercase mb-4 block">Our Services</span>
        <h1 class="text-4xl md:text-5xl font-semibold text-[#121212] mb-6 leading-tight">サービス</h1>
        <p class="text-lg text-[#6B6B6B] leading-relaxed max-w-2xl mx-auto">
            お客様のビジネスを成功に導く、幅広いクリエイティブソリューションを提供しています。
        </p>
    </div>
</section>

<!-- Services List -->
<section class="py-20 px-8 bg-gradient-to-br from-[#EDEBE8]/20 via-transparent to-transparent">
    <div class="max-w-5xl mx-auto space-y-8">
        @foreach($services as $index => $service)
            <div class="glass-card-minimal overflow-hidden">
                <div class="grid md:grid-cols-2 gap-0">
                    <!-- Image/Icon Side -->
                    <div class="order-2 md:order-{{ $index % 2 == 0 ? '1' : '2' }} bg-gradient-to-br from-[#EDEBE8] to-[#F7F6F4] p-10 flex items-center justify-center min-h-[280px]">
                        <div class="text-center">
                            <div class="icon-minimal w-16 h-16 mx-auto mb-4">
                                @if($index == 0)
                                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01"></path>
                                    </svg>
                                @elseif($index == 1)
                                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"></path>
                                    </svg>
                                @else
                                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                                    </svg>
                                @endif
                            </div>
                            <p class="text-[#6B6B6B] text-xs">Service {{ sprintf('%02d', $index + 1) }}</p>
                        </div>
                    </div>

                    <!-- Content Side -->
                    <div class="order-1 md:order-{{ $index % 2 == 0 ? '2' : '1' }} p-10">
                        <div class="mb-6">
                            <span class="text-xs px-2.5 py-1 rounded-full bg-[rgba(31,58,46,0.08)] text-[#265A49] inline-block mb-4">Service {{ sprintf('%02d', $index + 1) }}</span>
                            <h2 class="text-2xl md:text-3xl font-semibold text-[#121212] mb-4">{{ $service['title'] }}</h2>
                            <p class="text-[#6B6B6B] leading-relaxed mb-6">
                                {{ $service['description'] }}
                            </p>
                        </div>

                        <div class="mb-6">
                            <h3 class="text-xs font-medium text-[#121212] mb-3 tracking-wide uppercase">主な特徴</h3>
                            <ul class="space-y-2">
                                @foreach($service['features'] as $feature)
                                    <li class="flex items-start gap-2">
                                        <svg class="w-4 h-4 text-[#265A49] flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                        </svg>
                                        <span class="text-sm text-[#6B6B6B]">{{ $feature }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                        <div class="flex items-center justify-between pt-6 border-t border-[rgba(0,0,0,0.06)]">
                            <div>
                                <p class="text-xs text-[#6B6B6B] mb-1">料金の目安</p>
                                <p class="text-2xl font-medium text-[#121212]">{{ $service['price'] }}</p>
                            </div>
                            <a href="{{ route('demo.custom-hp.contact') }}" class="btn-outline px-5 py-2 rounded-full text-sm font-medium">
                                お問い合わせ
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</section>

<!-- Process Section -->
<section class="py-24 px-8">
    <div class="max-w-5xl mx-auto">
        <div class="text-center mb-16">
            <span class="text-xs font-medium text-[#6B6B6B] tracking-widest uppercase mb-4 block">Our Process</span>
            <h2 class="text-2xl md:text-3xl font-semibold text-[#121212] mb-4">制作の流れ</h2>
            <p class="text-[#6B6B6B] max-w-xl mx-auto">
                ご依頼から納品まで、スムーズなプロジェクト進行をお約束します。
            </p>
        </div>

        <div class="grid md:grid-cols-4 gap-6">
            <!-- Step 1 -->
            <div class="glass-card-minimal p-6 text-center">
                <div class="w-10 h-10 rounded-full bg-[rgba(31,58,46,0.1)] flex items-center justify-center mx-auto mb-4">
                    <span class="text-sm font-medium text-[#265A49]">01</span>
                </div>
                <h3 class="text-base font-medium text-[#121212] mb-2">ヒアリング</h3>
                <p class="text-xs text-[#6B6B6B] leading-relaxed">
                    お客様のご要望や課題を丁寧にお伺いします
                </p>
            </div>

            <!-- Step 2 -->
            <div class="glass-card-minimal p-6 text-center">
                <div class="w-10 h-10 rounded-full bg-[rgba(31,58,46,0.1)] flex items-center justify-center mx-auto mb-4">
                    <span class="text-sm font-medium text-[#265A49]">02</span>
                </div>
                <h3 class="text-base font-medium text-[#121212] mb-2">企画・提案</h3>
                <p class="text-xs text-[#6B6B6B] leading-relaxed">
                    最適なソリューションをご提案いたします
                </p>
            </div>

            <!-- Step 3 -->
            <div class="glass-card-minimal p-6 text-center">
                <div class="w-10 h-10 rounded-full bg-[rgba(31,58,46,0.1)] flex items-center justify-center mx-auto mb-4">
                    <span class="text-sm font-medium text-[#265A49]">03</span>
                </div>
                <h3 class="text-base font-medium text-[#121212] mb-2">制作</h3>
                <p class="text-xs text-[#6B6B6B] leading-relaxed">
                    プロフェッショナルなチームが制作を進めます
                </p>
            </div>

            <!-- Step 4 -->
            <div class="glass-card-minimal p-6 text-center">
                <div class="w-10 h-10 rounded-full bg-[rgba(31,58,46,0.1)] flex items-center justify-center mx-auto mb-4">
                    <span class="text-sm font-medium text-[#265A49]">04</span>
                </div>
                <h3 class="text-base font-medium text-[#121212] mb-2">納品・サポート</h3>
                <p class="text-xs text-[#6B6B6B] leading-relaxed">
                    納品後も継続的にサポートいたします
                </p>
            </div>
        </div>
    </div>
</section>

<!-- FAQ Section -->
<section class="py-20 px-8">
    <div class="max-w-3xl mx-auto">
        <div class="text-center mb-12">
            <h2 class="text-2xl md:text-3xl font-semibold text-[#121212] mb-4">よくあるご質問</h2>
            <p class="text-[#6B6B6B]">
                お客様からよくいただくご質問にお答えします
            </p>
        </div>

        <div class="space-y-4">
            <!-- FAQ 1 -->
            <div class="glass-card-minimal p-6">
                <h3 class="text-base font-medium text-[#121212] mb-2">Q. 制作期間はどのくらいですか？</h3>
                <p class="text-sm text-[#6B6B6B] leading-relaxed pl-5">
                    A. プロジェクトの規模や内容によりますが、一般的なWebサイトで1〜3ヶ月程度です。詳細はお見積もり時にご案内いたします。
                </p>
            </div>

            <!-- FAQ 2 -->
            <div class="glass-card-minimal p-6">
                <h3 class="text-base font-medium text-[#121212] mb-2">Q. 費用はどのように決まりますか？</h3>
                <p class="text-sm text-[#6B6B6B] leading-relaxed pl-5">
                    A. ご要望やサイトの規模、機能などを総合的に判断してお見積もりいたします。まずは無料でご相談ください。
                </p>
            </div>

            <!-- FAQ 3 -->
            <div class="glass-card-minimal p-6">
                <h3 class="text-base font-medium text-[#121212] mb-2">Q. 運用サポートは対応していますか？</h3>
                <p class="text-sm text-[#6B6B6B] leading-relaxed pl-5">
                    A. はい、サイト公開後の運用・保守サポートも承っております。月額制のサポートプランもご用意しています。
                </p>
            </div>

            <!-- FAQ 4 -->
            <div class="glass-card-minimal p-6">
                <h3 class="text-base font-medium text-[#121212] mb-2">Q. 遠方からの依頼は可能ですか？</h3>
                <p class="text-sm text-[#6B6B6B] leading-relaxed pl-5">
                    A. はい、オンラインでのお打ち合わせにも対応しておりますので、全国どこからでもご依頼いただけます。
                </p>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-20 px-8">
    <div class="max-w-3xl mx-auto">
        <div class="glass-card-minimal p-10 md:p-14 text-center">
            <h2 class="text-xl md:text-2xl font-semibold text-[#121212] mb-4">まずはお気軽にご相談ください</h2>
            <p class="text-[#6B6B6B] leading-relaxed mb-8">
                サービスに関するご質問やお見積もりのご依頼など、<br class="hidden md:block">
                お気軽にお問い合わせください。
            </p>
            <a href="{{ route('demo.custom-hp.contact') }}" class="btn-primary px-8 py-3 rounded-full text-sm font-medium inline-block">
                お問い合わせフォーム
            </a>
        </div>
    </div>
</section>
@endsection
