@extends('demo.custom-hp.layouts.app')

@section('title', '実績')

@section('content')
<!-- Page Header -->
<section class="pt-32 pb-20 px-6 lg:px-8">
    <div class="max-w-5xl mx-auto text-center">
        <span class="text-xs font-normal text-gray-500 tracking-widest uppercase mb-4 block">Our Works</span>
        <h1 class="text-5xl md:text-6xl font-light text-gray-900 mb-8 leading-tight">実績</h1>
        <p class="text-lg text-[#1F1F1F] font-light leading-relaxed max-w-2xl mx-auto">
            私たちが手がけたプロジェクトの一部をご紹介します。
        </p>
    </div>
</section>

<!-- Filter Tabs -->
<section class="py-10 px-6 lg:px-8">
    <div class="max-w-6xl mx-auto">
        <div class="flex flex-wrap justify-center gap-3">
            <button class="glass-button-primary px-6 py-2 rounded-full text-xs font-light">
                すべて
            </button>
            <button class="glass-button px-6 py-2 rounded-full text-xs font-light text-[#1F1F1F]">
                Webデザイン
            </button>
            <button class="glass-button px-6 py-2 rounded-full text-xs font-light text-[#1F1F1F]">
                Web開発
            </button>
            <button class="glass-button px-6 py-2 rounded-full text-xs font-light text-[#1F1F1F]">
                アプリデザイン
            </button>
            <button class="glass-button px-6 py-2 rounded-full text-xs font-light text-[#1F1F1F]">
                マーケティング
            </button>
        </div>
    </div>
</section>

<!-- Works Grid -->
<section class="py-20 px-6 lg:px-8">
    <div class="max-w-7xl mx-auto">
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($works as $work)
                <div class="glass-card glass-card-hover rounded-3xl overflow-hidden group">
                    <!-- Image Placeholder -->
                    <div class="aspect-[4/3] bg-gradient-to-br from-{{ $loop->index % 2 == 0 ? 'orange' : 'pink' }}-100/60 to-{{ $loop->index % 2 == 0 ? 'pink' : 'orange' }}-100/40 flex items-center justify-center relative overflow-hidden">
                        <div class="text-center z-10">
                            <svg class="w-16 h-16 mx-auto text-gray-400 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                            <p class="text-gray-500 text-xs font-light">Work Image</p>
                        </div>
                        <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    </div>

                    <!-- Content -->
                    <div class="p-6">
                        <div class="flex items-center gap-2 mb-3">
                            <span class="text-xs font-light px-3 py-1 rounded-full bg-white/60 text-[#1F1F1F]">
                                {{ $work['category'] }}
                            </span>
                            <span class="text-xs font-light text-gray-500">{{ $work['year'] }}</span>
                        </div>

                        <h3 class="text-xl font-light text-gray-900 mb-2">{{ $work['title'] }}</h3>
                        <p class="text-xs text-gray-500 font-light mb-3">{{ $work['client'] }}</p>
                        <p class="text-sm text-[#1F1F1F] font-light leading-relaxed mb-4">
                            {{ $work['description'] }}
                        </p>

                        <!-- Tags -->
                        <div class="flex flex-wrap gap-2 pt-4 border-t border-gray-200/50">
                            @foreach($work['tags'] as $tag)
                                <span class="text-xs font-light px-2 py-1 rounded bg-white/40 text-[#1F1F1F]">
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
<section class="py-32 px-6 lg:px-8 bg-gradient-to-b from-transparent to-white/30">
    <div class="max-w-6xl mx-auto">
        <div class="glass-card-strong rounded-3xl p-12 md:p-16">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-light text-gray-900 mb-6">実績数</h2>
                <p class="text-[#1F1F1F] font-light">
                    これまでの実績を数字でご紹介
                </p>
            </div>

            <div class="grid md:grid-cols-4 gap-12">
                <!-- Stat 1 -->
                <div class="text-center">
                    <div class="text-5xl md:text-6xl font-light text-gray-900 mb-3">200+</div>
                    <p class="text-sm text-[#1F1F1F] font-light">プロジェクト実績</p>
                </div>

                <!-- Stat 2 -->
                <div class="text-center">
                    <div class="text-5xl md:text-6xl font-light text-gray-900 mb-3">98%</div>
                    <p class="text-sm text-[#1F1F1F] font-light">顧客満足度</p>
                </div>

                <!-- Stat 3 -->
                <div class="text-center">
                    <div class="text-5xl md:text-6xl font-light text-gray-900 mb-3">15</div>
                    <p class="text-sm text-[#1F1F1F] font-light">受賞歴</p>
                </div>

                <!-- Stat 4 -->
                <div class="text-center">
                    <div class="text-5xl md:text-6xl font-light text-gray-900 mb-3">5年</div>
                    <p class="text-sm text-[#1F1F1F] font-light">平均継続期間</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Client Logos Section -->
<section class="py-20 px-6 lg:px-8">
    <div class="max-w-6xl mx-auto">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-light text-gray-900 mb-6">取引先企業</h2>
            <p class="text-[#1F1F1F] font-light">
                信頼いただいている企業様の一部
            </p>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
            @for($i = 1; $i <= 8; $i++)
                <div class="glass-card rounded-2xl p-8 flex items-center justify-center aspect-square">
                    <div class="text-center">
                        <div class="w-16 h-16 rounded-full bg-gradient-to-br from-gray-200/60 to-gray-300/40 flex items-center justify-center mx-auto mb-3">
                            <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                            </svg>
                        </div>
                        <p class="text-xs text-gray-500 font-light">Company {{ chr(64 + $i) }}</p>
                    </div>
                </div>
            @endfor
        </div>
    </div>
</section>

<!-- Testimonials Section -->
<section class="py-20 px-6 lg:px-8">
    <div class="max-w-6xl mx-auto">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-light text-gray-900 mb-6">お客様の声</h2>
            <p class="text-[#1F1F1F] font-light">
                実際にご利用いただいたお客様からのフィードバック
            </p>
        </div>

        <div class="grid md:grid-cols-2 gap-8">
            <!-- Testimonial 1 -->
            <div class="glass-card rounded-3xl p-8">
                <div class="mb-6">
                    <svg class="w-10 h-10 text-orange-300" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z"/>
                    </svg>
                </div>
                <p class="text-[#1F1F1F] font-light leading-relaxed mb-6">
                    「デザインのクオリティが非常に高く、ブランドイメージを完璧に表現していただきました。チームの対応も素晴らしく、安心してプロジェクトを任せられました。」
                </p>
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 rounded-full bg-gradient-to-br from-orange-200/60 to-orange-300/40"></div>
                    <div>
                        <p class="text-sm font-light text-gray-900">田中 様</p>
                        <p class="text-xs text-gray-500 font-light">株式会社A / 代表取締役</p>
                    </div>
                </div>
            </div>

            <!-- Testimonial 2 -->
            <div class="glass-card rounded-3xl p-8">
                <div class="mb-6">
                    <svg class="w-10 h-10 text-pink-300" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z"/>
                    </svg>
                </div>
                <p class="text-[#1F1F1F] font-light leading-relaxed mb-6">
                    「技術力が高く、複雑な要件にも柔軟に対応していただきました。納期もしっかり守っていただき、とても満足しています。今後も長くお付き合いしたいパートナーです。」
                </p>
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 rounded-full bg-gradient-to-br from-pink-200/60 to-pink-300/40"></div>
                    <div>
                        <p class="text-sm font-light text-gray-900">佐藤 様</p>
                        <p class="text-xs text-gray-500 font-light">株式会社B / マーケティング部長</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-20 px-6 lg:px-8">
    <div class="max-w-4xl mx-auto">
        <div class="glass-card-strong rounded-3xl p-12 md:p-16 text-center">
            <h2 class="text-2xl md:text-3xl font-light text-gray-900 mb-6">プロジェクトのご相談</h2>
            <p class="text-[#1F1F1F] font-light leading-relaxed mb-10">
                あなたのプロジェクトについてお聞かせください。<br class="hidden md:block">
                最適なソリューションをご提案いたします。
            </p>
            <a href="{{ route('demo.custom-hp.contact') }}" class="glass-button-primary px-10 py-4 rounded-full text-sm font-light inline-block">
                お問い合わせフォーム
            </a>
        </div>
    </div>
</section>
@endsection
