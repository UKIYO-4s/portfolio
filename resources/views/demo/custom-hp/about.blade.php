@extends('demo.custom-hp.layouts.app')

@section('title', '会社概要')

@section('content')
<!-- Page Header -->
<section class="pt-32 pb-16 px-8">
    <div class="max-w-4xl mx-auto text-center">
        <span class="text-xs font-medium text-[#6B6B6B] tracking-widest uppercase mb-4 block">About Us</span>
        <h1 class="text-4xl md:text-5xl font-semibold text-[#121212] mb-6 leading-tight">会社概要</h1>
        <p class="text-lg text-[#6B6B6B] leading-relaxed max-w-2xl mx-auto">
            私たちのビジョン、ミッション、そして会社情報をご紹介します。
        </p>
    </div>
</section>

<!-- Vision & Mission -->
<section class="py-20 px-8">
    <div class="max-w-5xl mx-auto">
        <div class="grid md:grid-cols-2 gap-6 mb-20">
            <!-- Vision -->
            <div class="glass-card-minimal p-8">
                <div class="flex items-center gap-3 mb-6">
                    <div class="icon-minimal">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                        </svg>
                    </div>
                    <h2 class="text-xl font-medium text-[#121212]">Vision</h2>
                </div>
                <p class="text-[#6B6B6B] leading-relaxed">
                    {{ $company['vision'] }}
                </p>
            </div>

            <!-- Mission -->
            <div class="glass-card-minimal p-8">
                <div class="flex items-center gap-3 mb-6">
                    <div class="icon-minimal">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                    </div>
                    <h2 class="text-xl font-medium text-[#121212]">Mission</h2>
                </div>
                <ul class="space-y-3">
                    @foreach($company['mission'] as $item)
                        <li class="flex items-start gap-3 text-[#6B6B6B] leading-relaxed">
                            <svg class="w-4 h-4 text-[#1F3A2E] flex-shrink-0 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span class="text-sm">{{ $item }}</span>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- Company Information -->
<section class="py-20 px-8">
    <div class="max-w-4xl mx-auto">
        <div class="glass-card-minimal p-10 md:p-14">
            <h2 class="text-2xl font-semibold text-[#121212] mb-10 text-center">会社情報</h2>

            <div class="grid md:grid-cols-2 gap-x-12 gap-y-6 max-w-3xl mx-auto">
                <!-- Company Name -->
                <div class="border-b border-[rgba(0,0,0,0.06)] pb-4">
                    <dt class="text-xs text-[#6B6B6B] mb-1">会社名</dt>
                    <dd class="text-[#121212] font-medium">{{ $company['name'] }}</dd>
                    <dd class="text-[#6B6B6B] text-sm mt-0.5">{{ $company['name_en'] }}</dd>
                </div>

                <!-- Established -->
                <div class="border-b border-[rgba(0,0,0,0.06)] pb-4">
                    <dt class="text-xs text-[#6B6B6B] mb-1">設立</dt>
                    <dd class="text-[#121212] font-medium">{{ $company['established'] }}</dd>
                </div>

                <!-- Capital -->
                <div class="border-b border-[rgba(0,0,0,0.06)] pb-4">
                    <dt class="text-xs text-[#6B6B6B] mb-1">資本金</dt>
                    <dd class="text-[#121212] font-medium">{{ $company['capital'] }}</dd>
                </div>

                <!-- Employees -->
                <div class="border-b border-[rgba(0,0,0,0.06)] pb-4">
                    <dt class="text-xs text-[#6B6B6B] mb-1">従業員数</dt>
                    <dd class="text-[#121212] font-medium">{{ $company['employees'] }}</dd>
                </div>

                <!-- CEO -->
                <div class="border-b border-[rgba(0,0,0,0.06)] pb-4">
                    <dt class="text-xs text-[#6B6B6B] mb-1">代表取締役</dt>
                    <dd class="text-[#121212] font-medium">{{ $company['ceo'] }}</dd>
                </div>

                <!-- Phone -->
                <div class="border-b border-[rgba(0,0,0,0.06)] pb-4">
                    <dt class="text-xs text-[#6B6B6B] mb-1">電話番号</dt>
                    <dd class="text-[#121212] font-medium">{{ $company['phone'] }}</dd>
                </div>

                <!-- Address -->
                <div class="border-b border-[rgba(0,0,0,0.06)] pb-4 md:col-span-2">
                    <dt class="text-xs text-[#6B6B6B] mb-1">所在地</dt>
                    <dd class="text-[#121212] font-medium">
                        〒{{ $company['postal_code'] }}<br>
                        {{ $company['address'] }}
                    </dd>
                </div>

                <!-- Email -->
                <div class="border-b border-[rgba(0,0,0,0.06)] pb-4 md:col-span-2">
                    <dt class="text-xs text-[#6B6B6B] mb-1">メールアドレス</dt>
                    <dd class="text-[#121212] font-medium">{{ $company['email'] }}</dd>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Values Section -->
<section class="py-20 px-8">
    <div class="max-w-5xl mx-auto">
        <div class="text-center mb-12">
            <h2 class="text-2xl md:text-3xl font-semibold text-[#121212] mb-4">私たちの価値観</h2>
            <p class="text-[#6B6B6B] max-w-xl mx-auto">
                私たちが大切にしている3つの価値観
            </p>
        </div>

        <div class="grid md:grid-cols-3 gap-6">
            <!-- Value 1 -->
            <div class="glass-card-minimal p-8 text-center">
                <div class="icon-minimal mx-auto mb-5">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
                    </svg>
                </div>
                <h3 class="text-lg font-medium text-[#121212] mb-3">Innovation</h3>
                <p class="text-sm text-[#6B6B6B] leading-relaxed">
                    常に新しい技術とアイデアを追求し、革新的なソリューションを提供します。
                </p>
            </div>

            <!-- Value 2 -->
            <div class="glass-card-minimal p-8 text-center">
                <div class="icon-minimal mx-auto mb-5">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                    </svg>
                </div>
                <h3 class="text-lg font-medium text-[#121212] mb-3">Partnership</h3>
                <p class="text-sm text-[#6B6B6B] leading-relaxed">
                    お客様との信頼関係を大切にし、共に成長していくパートナーシップを築きます。
                </p>
            </div>

            <!-- Value 3 -->
            <div class="glass-card-minimal p-8 text-center">
                <div class="icon-minimal mx-auto mb-5">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path>
                    </svg>
                </div>
                <h3 class="text-lg font-medium text-[#121212] mb-3">Quality</h3>
                <p class="text-sm text-[#6B6B6B] leading-relaxed">
                    妥協のない品質へのこだわりで、お客様の期待を超える価値を提供します。
                </p>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-20 px-8">
    <div class="max-w-3xl mx-auto">
        <div class="glass-card-minimal p-10 text-center">
            <h2 class="text-xl md:text-2xl font-semibold text-[#121212] mb-4">一緒に働きませんか？</h2>
            <p class="text-[#6B6B6B] leading-relaxed mb-6">
                私たちと一緒に新しい価値を創造していく仲間を募集しています。
            </p>
            <a href="{{ route('demo.custom-hp.contact') }}" class="btn-primary px-8 py-3 rounded-full text-sm font-medium inline-block">
                採用情報を見る
            </a>
        </div>
    </div>
</section>
@endsection
