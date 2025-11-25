@extends('demo.custom-hp.layouts.app')

@section('title', 'お知らせ')

@section('content')
<!-- Page Header -->
<section class="pt-32 pb-20 px-6 lg:px-8">
    <div class="max-w-5xl mx-auto text-center">
        <span class="text-xs font-normal text-gray-500 tracking-widest uppercase mb-4 block">News</span>
        <h1 class="text-5xl md:text-6xl font-light text-gray-900 mb-8 leading-tight">お知らせ</h1>
        <p class="text-lg text-[#1F1F1F] font-light leading-relaxed max-w-2xl mx-auto">
            最新のニュースやお知らせをお届けします。
        </p>
    </div>
</section>

<!-- Category Filter -->
<section class="py-10 px-6 lg:px-8">
    <div class="max-w-4xl mx-auto">
        <div class="flex flex-wrap justify-center gap-3">
            <button class="glass-button-primary px-6 py-2 rounded-full text-xs font-light">
                すべて
            </button>
            <button class="glass-button px-6 py-2 rounded-full text-xs font-light text-[#1F1F1F]">
                お知らせ
            </button>
            <button class="glass-button px-6 py-2 rounded-full text-xs font-light text-[#1F1F1F]">
                プレスリリース
            </button>
            <button class="glass-button px-6 py-2 rounded-full text-xs font-light text-[#1F1F1F]">
                受賞
            </button>
            <button class="glass-button px-6 py-2 rounded-full text-xs font-light text-[#1F1F1F]">
                採用
            </button>
        </div>
    </div>
</section>

<!-- News List -->
<section class="py-20 px-6 lg:px-8">
    <div class="max-w-4xl mx-auto">
        <div class="space-y-6">
            @foreach($newsItems as $news)
                <a href="{{ route('demo.custom-hp.news.detail', $news['id']) }}" class="block">
                    <div class="glass-card glass-card-hover rounded-3xl p-8 transition-all duration-300">
                        <div class="flex flex-col md:flex-row md:items-center gap-6">
                            <!-- Date & Category -->
                            <div class="flex-shrink-0 md:w-48">
                                <div class="flex items-center gap-3 md:flex-col md:items-start">
                                    <time class="text-sm font-light text-gray-900">
                                        {{ \Carbon\Carbon::parse($news['date'])->format('Y.m.d') }}
                                    </time>
                                    <span class="text-xs font-light px-3 py-1 rounded-full bg-white/60 text-[#1F1F1F]">
                                        {{ $news['category'] }}
                                    </span>
                                </div>
                            </div>

                            <!-- Content -->
                            <div class="flex-1">
                                <h2 class="text-xl font-light text-gray-900 mb-3 group-hover:text-[#1F1F1F] transition-colors">
                                    {{ $news['title'] }}
                                </h2>
                                <p class="text-sm text-[#1F1F1F] font-light leading-relaxed">
                                    {{ $news['excerpt'] }}
                                </p>
                            </div>

                            <!-- Arrow -->
                            <div class="flex-shrink-0 md:ml-6">
                                <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 5l7 7-7 7"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="mt-16 flex justify-center gap-2">
            <button class="glass-button-primary w-10 h-10 rounded-full flex items-center justify-center text-sm font-light">
                1
            </button>
            <button class="glass-button w-10 h-10 rounded-full flex items-center justify-center text-sm font-light text-[#1F1F1F]">
                2
            </button>
            <button class="glass-button w-10 h-10 rounded-full flex items-center justify-center text-sm font-light text-[#1F1F1F]">
                3
            </button>
            <button class="glass-button w-10 h-10 rounded-full flex items-center justify-center text-sm font-light text-[#1F1F1F]">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
            </button>
        </div>
    </div>
</section>

<!-- Newsletter Section -->
<section class="py-32 px-6 lg:px-8 bg-gradient-to-b from-transparent to-white/30">
    <div class="max-w-4xl mx-auto">
        <div class="glass-card-strong rounded-3xl p-12 md:p-16 text-center">
            <div class="w-16 h-16 rounded-full bg-gradient-to-br from-orange-200/60 to-pink-200/40 flex items-center justify-center mx-auto mb-8">
                <svg class="w-8 h-8 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                </svg>
            </div>
            <h2 class="text-2xl md:text-3xl font-light text-gray-900 mb-6">ニュースレター購読</h2>
            <p class="text-[#1F1F1F] font-light leading-relaxed mb-10">
                最新のニュースやお役立ち情報を定期的にお届けします。<br class="hidden md:block">
                ぜひご登録ください。
            </p>
            <div class="max-w-md mx-auto">
                <div class="glass-card rounded-full p-2 flex items-center gap-2">
                    <input
                        type="email"
                        placeholder="メールアドレスを入力"
                        class="flex-1 bg-transparent px-6 py-2 text-sm font-light text-gray-900 placeholder-gray-500 focus:outline-none"
                    >
                    <button class="glass-button-primary px-8 py-2 rounded-full text-sm font-light flex-shrink-0">
                        登録
                    </button>
                </div>
                <p class="text-xs text-gray-500 font-light mt-4">
                    登録いただいたメールアドレスは、プライバシーポリシーに基づき適切に管理いたします。
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Archive Section -->
<section class="py-20 px-6 lg:px-8">
    <div class="max-w-4xl mx-auto">
        <div class="text-center mb-12">
            <h2 class="text-2xl md:text-3xl font-light text-gray-900 mb-6">アーカイブ</h2>
        </div>

        <div class="grid md:grid-cols-3 gap-6">
            @foreach(['2024年', '2023年', '2022年'] as $year)
                <div class="glass-card rounded-2xl p-6">
                    <h3 class="text-lg font-light text-gray-900 mb-4">{{ $year }}</h3>
                    <ul class="space-y-2">
                        @foreach(['12月', '11月', '10月', '9月'] as $month)
                            <li>
                                <a href="#" class="text-sm text-[#1F1F1F] font-light hover:text-gray-900 transition-colors flex items-center justify-between group">
                                    <span>{{ $month }}</span>
                                    <span class="text-xs text-gray-400 group-hover:text-[#1F1F1F]">({{ rand(1, 10) }})</span>
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
