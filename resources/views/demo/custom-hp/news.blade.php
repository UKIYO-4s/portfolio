@extends('demo.custom-hp.layouts.app')

@section('title', 'お知らせ')

@section('content')
<!-- Page Header -->
<section class="pt-32 pb-16 px-8">
    <div class="max-w-4xl mx-auto text-center">
        <span class="text-xs font-medium text-[#6B6B6B] tracking-widest uppercase mb-4 block">News</span>
        <h1 class="text-4xl md:text-5xl font-semibold text-[#121212] mb-6 leading-tight">お知らせ</h1>
        <p class="text-lg text-[#6B6B6B] leading-relaxed max-w-2xl mx-auto">
            最新のニュースやお知らせをお届けします。
        </p>
    </div>
</section>

<!-- Category Filter -->
<section class="py-8 px-8">
    <div class="max-w-3xl mx-auto">
        <div class="flex flex-wrap justify-center gap-2">
            <button class="btn-primary px-5 py-2 rounded-full text-xs font-medium">
                すべて
            </button>
            <button class="btn-outline px-5 py-2 rounded-full text-xs font-medium">
                お知らせ
            </button>
            <button class="btn-outline px-5 py-2 rounded-full text-xs font-medium">
                プレスリリース
            </button>
            <button class="btn-outline px-5 py-2 rounded-full text-xs font-medium">
                受賞
            </button>
            <button class="btn-outline px-5 py-2 rounded-full text-xs font-medium">
                採用
            </button>
        </div>
    </div>
</section>

<!-- News List -->
<section class="py-16 px-8">
    <div class="max-w-3xl mx-auto">
        <div class="space-y-4">
            @foreach($newsItems as $news)
                <a href="{{ route('demo.custom-hp.news.detail', $news['id']) }}" class="block group">
                    <div class="glass-card-minimal p-6 transition-all duration-300">
                        <div class="flex flex-col md:flex-row md:items-center gap-4">
                            <!-- Date & Category -->
                            <div class="flex-shrink-0 md:w-40">
                                <div class="flex items-center gap-3 md:flex-col md:items-start">
                                    <time class="text-sm text-[#121212]">
                                        {{ \Carbon\Carbon::parse($news['date'])->format('Y.m.d') }}
                                    </time>
                                    <span class="text-xs px-2 py-0.5 rounded-full bg-[rgba(31,58,46,0.08)] text-[#1F3A2E]">
                                        {{ $news['category'] }}
                                    </span>
                                </div>
                            </div>

                            <!-- Content -->
                            <div class="flex-1">
                                <h2 class="text-base font-medium text-[#121212] mb-2 group-hover:text-[#1F3A2E] transition-colors">
                                    {{ $news['title'] }}
                                </h2>
                                <p class="text-sm text-[#6B6B6B] leading-relaxed">
                                    {{ $news['excerpt'] }}
                                </p>
                            </div>

                            <!-- Arrow -->
                            <div class="flex-shrink-0 md:ml-4">
                                <svg class="w-5 h-5 text-[#6B6B6B] group-hover:text-[#1F3A2E] transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 5l7 7-7 7"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="mt-12 flex justify-center gap-2">
            <button class="btn-primary w-9 h-9 rounded-full flex items-center justify-center text-xs font-medium">
                1
            </button>
            <button class="btn-outline w-9 h-9 rounded-full flex items-center justify-center text-xs font-medium">
                2
            </button>
            <button class="btn-outline w-9 h-9 rounded-full flex items-center justify-center text-xs font-medium">
                3
            </button>
            <button class="btn-outline w-9 h-9 rounded-full flex items-center justify-center text-xs font-medium">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
            </button>
        </div>
    </div>
</section>

<!-- Newsletter Section -->
<section class="py-24 px-8">
    <div class="max-w-3xl mx-auto">
        <div class="glass-card-minimal p-10 md:p-14 text-center">
            <div class="icon-minimal w-14 h-14 mx-auto mb-6">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                </svg>
            </div>
            <h2 class="text-xl md:text-2xl font-semibold text-[#121212] mb-4">ニュースレター購読</h2>
            <p class="text-[#6B6B6B] leading-relaxed mb-8">
                最新のニュースやお役立ち情報を定期的にお届けします。<br class="hidden md:block">
                ぜひご登録ください。
            </p>
            <div class="max-w-sm mx-auto">
                <div class="flex items-center gap-2">
                    <input
                        type="email"
                        placeholder="メールアドレスを入力"
                        class="flex-1 rounded-full border border-[rgba(0,0,0,0.08)] bg-white/50 px-5 py-2.5 text-sm text-[#121212] placeholder-[#6B6B6B] focus:outline-none focus:ring-2 focus:ring-[#1F3A2E]/20 focus:border-[#1F3A2E]/30 transition-all"
                    >
                    <button class="btn-primary px-6 py-2.5 rounded-full text-sm font-medium flex-shrink-0">
                        登録
                    </button>
                </div>
                <p class="text-xs text-[#6B6B6B] mt-4">
                    登録いただいたメールアドレスは、プライバシーポリシーに基づき適切に管理いたします。
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Archive Section -->
<section class="py-16 px-8">
    <div class="max-w-3xl mx-auto">
        <div class="text-center mb-10">
            <h2 class="text-xl md:text-2xl font-semibold text-[#121212] mb-3">アーカイブ</h2>
        </div>

        <div class="grid md:grid-cols-3 gap-4">
            @foreach(['2024年', '2023年', '2022年'] as $year)
                <div class="glass-card-minimal p-5">
                    <h3 class="text-base font-medium text-[#121212] mb-3">{{ $year }}</h3>
                    <ul class="space-y-1.5">
                        @foreach(['12月', '11月', '10月', '9月'] as $month)
                            <li>
                                <a href="#" class="text-sm text-[#6B6B6B] hover:text-[#1F3A2E] transition-colors flex items-center justify-between group">
                                    <span>{{ $month }}</span>
                                    <span class="text-xs text-[#6B6B6B]/60 group-hover:text-[#1F3A2E]">({{ rand(1, 10) }})</span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
