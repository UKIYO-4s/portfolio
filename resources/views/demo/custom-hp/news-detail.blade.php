@extends('demo.custom-hp.layouts.app')

@section('title', $news['title'])

@section('content')
<!-- Breadcrumb -->
<section class="pt-32 pb-8 px-6 lg:px-8">
    <div class="max-w-4xl mx-auto">
        <nav class="flex items-center gap-2 text-sm font-light text-gray-600">
            <a href="{{ route('demo.custom-hp.index') }}" class="hover:text-gray-900 transition-colors">ホーム</a>
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 5l7 7-7 7"></path>
            </svg>
            <a href="{{ route('demo.custom-hp.news') }}" class="hover:text-gray-900 transition-colors">お知らせ</a>
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 5l7 7-7 7"></path>
            </svg>
            <span class="text-gray-900">記事詳細</span>
        </nav>
    </div>
</section>

<!-- Article Header -->
<section class="py-12 px-6 lg:px-8">
    <div class="max-w-4xl mx-auto">
        <div class="glass-card rounded-3xl p-8 md:p-12">
            <div class="flex items-center gap-4 mb-6">
                <time class="text-sm font-light text-gray-600">
                    {{ \Carbon\Carbon::parse($news['date'])->format('Y年m月d日') }}
                </time>
                <span class="text-xs font-light px-4 py-1.5 rounded-full bg-white/60 text-gray-600">
                    {{ $news['category'] }}
                </span>
            </div>
            <h1 class="text-3xl md:text-4xl font-light text-gray-900 leading-tight">
                {{ $news['title'] }}
            </h1>
        </div>
    </div>
</section>

<!-- Article Content -->
<section class="py-12 px-6 lg:px-8">
    <div class="max-w-4xl mx-auto">
        <div class="glass-card-strong rounded-3xl p-8 md:p-12">
            <article class="prose prose-lg max-w-none">
                <div class="text-gray-700 font-light leading-relaxed space-y-6 article-content">
                    {!! $news['content'] !!}
                </div>
            </article>
        </div>
    </div>
</section>

<!-- Share Section -->
<section class="py-12 px-6 lg:px-8">
    <div class="max-w-4xl mx-auto">
        <div class="glass-card rounded-3xl p-8">
            <div class="flex flex-col sm:flex-row items-center justify-between gap-6">
                <div class="flex items-center gap-4">
                    <span class="text-sm font-light text-gray-700">この記事をシェア:</span>
                    <div class="flex items-center gap-3">
                        <button class="w-10 h-10 rounded-full bg-white/60 hover:bg-white/80 flex items-center justify-center transition-colors">
                            <svg class="w-5 h-5 text-gray-600" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                            </svg>
                        </button>
                        <button class="w-10 h-10 rounded-full bg-white/60 hover:bg-white/80 flex items-center justify-center transition-colors">
                            <svg class="w-5 h-5 text-gray-600" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/>
                            </svg>
                        </button>
                        <button class="w-10 h-10 rounded-full bg-white/60 hover:bg-white/80 flex items-center justify-center transition-colors">
                            <svg class="w-5 h-5 text-gray-600" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                            </svg>
                        </button>
                    </div>
                </div>
                <a href="{{ route('demo.custom-hp.news') }}" class="glass-button px-6 py-2 rounded-full text-sm font-light text-gray-700 inline-flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                    </svg>
                    一覧に戻る
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Related News -->
<section class="py-20 px-6 lg:px-8">
    <div class="max-w-6xl mx-auto">
        <div class="text-center mb-12">
            <h2 class="text-2xl md:text-3xl font-light text-gray-900 mb-4">関連記事</h2>
            <p class="text-sm text-gray-600 font-light">こちらの記事もおすすめです</p>
        </div>

        <div class="grid md:grid-cols-3 gap-6">
            @for($i = 1; $i <= 3; $i++)
                @php
                    $relatedNews = [
                        ['id' => 2, 'title' => 'Webデザインアワード2024 受賞', 'date' => '2024-03-01', 'category' => '受賞'],
                        ['id' => 4, 'title' => '新サービス「Creative Cloud」リリース', 'date' => '2024-02-01', 'category' => 'プレスリリース'],
                        ['id' => 5, 'title' => '採用情報を更新しました', 'date' => '2024-01-15', 'category' => '採用']
                    ][$i - 1];
                @endphp
                <a href="{{ route('demo.custom-hp.news.detail', $relatedNews['id']) }}" class="block">
                    <div class="glass-card glass-card-hover rounded-3xl overflow-hidden">
                        <div class="aspect-video bg-gradient-to-br from-{{ $i % 2 == 0 ? 'pink' : 'orange' }}-100/60 to-{{ $i % 2 == 0 ? 'orange' : 'pink' }}-100/40 flex items-center justify-center">
                            <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                            </svg>
                        </div>
                        <div class="p-6">
                            <div class="flex items-center gap-3 mb-3">
                                <time class="text-xs font-light text-gray-600">
                                    {{ \Carbon\Carbon::parse($relatedNews['date'])->format('Y.m.d') }}
                                </time>
                                <span class="text-xs font-light px-3 py-1 rounded-full bg-white/60 text-gray-600">
                                    {{ $relatedNews['category'] }}
                                </span>
                            </div>
                            <h3 class="text-lg font-light text-gray-900">
                                {{ $relatedNews['title'] }}
                            </h3>
                        </div>
                    </div>
                </a>
            @endfor
        </div>
    </div>
</section>

<style>
.article-content h3 {
    font-size: 1.5rem;
    font-weight: 300;
    color: #111827;
    margin-top: 2rem;
    margin-bottom: 1rem;
}

.article-content h4 {
    font-size: 1.25rem;
    font-weight: 300;
    color: #111827;
    margin-top: 1.5rem;
    margin-bottom: 0.75rem;
}

.article-content p {
    margin-bottom: 1.5rem;
}

.article-content ul {
    list-style: none;
    padding-left: 0;
    margin-bottom: 1.5rem;
}

.article-content ul li {
    padding-left: 1.5rem;
    position: relative;
    margin-bottom: 0.75rem;
}

.article-content ul li::before {
    content: "•";
    position: absolute;
    left: 0;
    color: #e8a145;
    font-weight: bold;
}
</style>
@endsection
