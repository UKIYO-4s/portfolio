@extends('demo.custom-hp.layouts.app')

@section('title', '実績')

@section('content')
<!-- Page Header -->
<section class="pt-32 pb-16 px-8">
    <div class="max-w-4xl mx-auto text-center">
        <span class="text-xs font-medium text-[#6B6B6B] tracking-widest uppercase mb-4 block">Our Works</span>
        <h1 class="text-4xl md:text-5xl font-semibold text-[#121212] mb-6 leading-tight">実績</h1>
        <p class="text-lg text-[#6B6B6B] leading-relaxed max-w-2xl mx-auto">
            私たちが手がけたプロジェクトの一部をご紹介します。
        </p>
    </div>
</section>

<!-- Filter Tabs -->
<section class="py-8 px-8">
    <div class="max-w-5xl mx-auto">
        <div class="flex flex-wrap justify-center gap-2">
            <button class="btn-primary px-5 py-2 rounded-full text-xs font-medium">
                すべて
            </button>
            <button class="btn-outline px-5 py-2 rounded-full text-xs font-medium">
                Webデザイン
            </button>
            <button class="btn-outline px-5 py-2 rounded-full text-xs font-medium">
                Web開発
            </button>
            <button class="btn-outline px-5 py-2 rounded-full text-xs font-medium">
                アプリデザイン
            </button>
            <button class="btn-outline px-5 py-2 rounded-full text-xs font-medium">
                マーケティング
            </button>
        </div>
    </div>
</section>

<!-- Works Grid -->
<section class="py-16 px-8 bg-gradient-to-br from-[#EDEBE8]/20 via-transparent to-transparent">
    <div class="max-w-6xl mx-auto">
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($works as $work)
                <div class="glass-card-minimal overflow-hidden group">
                    <!-- Image Placeholder -->
                    <div class="aspect-[4/3] bg-gradient-to-br from-[#EDEBE8] to-[#F7F6F4] flex items-center justify-center relative">
                        <div class="text-center z-10">
                            <svg class="w-12 h-12 mx-auto text-[#6B6B6B]/30 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                            <p class="text-[#6B6B6B]/50 text-xs">Work Image</p>
                        </div>
                        <div class="absolute inset-0 bg-[#265A49]/0 group-hover:bg-[#265A49]/5 transition-colors duration-300"></div>
                    </div>

                    <!-- Content -->
                    <div class="p-5">
                        <div class="flex items-center gap-2 mb-2">
                            <span class="text-xs px-2 py-0.5 rounded-full bg-[rgba(31,58,46,0.08)] text-[#265A49]">
                                {{ $work['category'] }}
                            </span>
                            <span class="text-xs text-[#6B6B6B]">{{ $work['year'] }}</span>
                        </div>

                        <h3 class="text-base font-medium text-[#121212] mb-1">{{ $work['title'] }}</h3>
                        <p class="text-xs text-[#6B6B6B] mb-2">{{ $work['client'] }}</p>
                        <p class="text-sm text-[#6B6B6B] leading-relaxed mb-4">
                            {{ $work['description'] }}
                        </p>

                        <!-- Tags -->
                        <div class="flex flex-wrap gap-1.5 pt-3 border-t border-[rgba(0,0,0,0.06)]">
                            @foreach($work['tags'] as $tag)
                                <span class="text-xs px-2 py-0.5 rounded bg-[rgba(0,0,0,0.04)] text-[#6B6B6B]">
                                    {{ $tag }}
                                </span>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Stats Section -->
<section class="py-24 px-8">
    <div class="max-w-5xl mx-auto">
        <div class="glass-card-minimal p-10 md:p-14">
            <div class="text-center mb-12">
                <h2 class="text-2xl md:text-3xl font-semibold text-[#121212] mb-3">実績数</h2>
                <p class="text-[#6B6B6B]">
                    これまでの実績を数字でご紹介
                </p>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                <!-- Stat 1 -->
                <div class="text-center">
                    <div class="text-4xl md:text-5xl font-semibold text-[#121212] mb-2">200+</div>
                    <p class="text-sm text-[#6B6B6B]">プロジェクト実績</p>
                </div>

                <!-- Stat 2 -->
                <div class="text-center">
                    <div class="text-4xl md:text-5xl font-semibold text-[#121212] mb-2">98%</div>
                    <p class="text-sm text-[#6B6B6B]">顧客満足度</p>
                </div>

                <!-- Stat 3 -->
                <div class="text-center">
                    <div class="text-4xl md:text-5xl font-semibold text-[#121212] mb-2">15</div>
                    <p class="text-sm text-[#6B6B6B]">受賞歴</p>
                </div>

                <!-- Stat 4 -->
                <div class="text-center">
                    <div class="text-4xl md:text-5xl font-semibold text-[#121212] mb-2">5年</div>
                    <p class="text-sm text-[#6B6B6B]">平均継続期間</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Client Logos Section -->
<section class="py-16 px-8">
    <div class="max-w-5xl mx-auto">
        <div class="text-center mb-12">
            <h2 class="text-2xl md:text-3xl font-semibold text-[#121212] mb-3">取引先企業</h2>
            <p class="text-[#6B6B6B]">
                信頼いただいている企業様の一部
            </p>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
            @for($i = 1; $i <= 8; $i++)
                <div class="glass-card-minimal p-6 flex items-center justify-center aspect-[4/3]">
                    <div class="text-center">
                        <div class="icon-minimal mx-auto mb-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                            </svg>
                        </div>
                        <p class="text-xs text-[#6B6B6B]">Company {{ chr(64 + $i) }}</p>
                    </div>
                </div>
            @endfor
        </div>
    </div>
</section>

<!-- Testimonials Section -->
<section class="py-16 px-8">
    <div class="max-w-5xl mx-auto">
        <div class="text-center mb-12">
            <h2 class="text-2xl md:text-3xl font-semibold text-[#121212] mb-3">お客様の声</h2>
            <p class="text-[#6B6B6B]">
                実際にご利用いただいたお客様からのフィードバック
            </p>
        </div>

        <div class="grid md:grid-cols-2 gap-6">
            <!-- Testimonial 1 -->
            <div class="glass-card-minimal p-6">
                <div class="mb-4">
                    <svg class="w-8 h-8 text-[#265A49]/20" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z"/>
                    </svg>
                </div>
                <p class="text-[#6B6B6B] leading-relaxed mb-5 text-sm">
                    「デザインのクオリティが非常に高く、ブランドイメージを完璧に表現していただきました。チームの対応も素晴らしく、安心してプロジェクトを任せられました。」
                </p>
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-full bg-gradient-to-br from-[#EDEBE8] to-[#F7F6F4]"></div>
                    <div>
                        <p class="text-sm font-medium text-[#121212]">田中 様</p>
                        <p class="text-xs text-[#6B6B6B]">株式会社A / 代表取締役</p>
                    </div>
                </div>
            </div>

            <!-- Testimonial 2 -->
            <div class="glass-card-minimal p-6">
                <div class="mb-4">
                    <svg class="w-8 h-8 text-[#265A49]/20" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z"/>
                    </svg>
                </div>
                <p class="text-[#6B6B6B] leading-relaxed mb-5 text-sm">
                    「技術力が高く、複雑な要件にも柔軟に対応していただきました。納期もしっかり守っていただき、とても満足しています。今後も長くお付き合いしたいパートナーです。」
                </p>
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-full bg-gradient-to-br from-[#EDEBE8] to-[#F7F6F4]"></div>
                    <div>
                        <p class="text-sm font-medium text-[#121212]">佐藤 様</p>
                        <p class="text-xs text-[#6B6B6B]">株式会社B / マーケティング部長</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-16 px-8">
    <div class="max-w-3xl mx-auto">
        <div class="glass-card-minimal p-10 md:p-14 text-center">
            <h2 class="text-xl md:text-2xl font-semibold text-[#121212] mb-4">プロジェクトのご相談</h2>
            <p class="text-[#6B6B6B] leading-relaxed mb-8">
                あなたのプロジェクトについてお聞かせください。<br class="hidden md:block">
                最適なソリューションをご提案いたします。
            </p>
            <a href="{{ route('demo.custom-hp.contact') }}" class="btn-primary px-8 py-3 rounded-full text-sm font-medium inline-block">
                お問い合わせフォーム
            </a>
        </div>
    </div>
</section>
@endsection
