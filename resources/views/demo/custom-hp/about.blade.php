@extends('demo.custom-hp.layouts.app')

@section('title', '会社概要')

@section('content')
<!-- Page Header -->
<section class="pt-32 pb-20 px-6 lg:px-8">
    <div class="max-w-5xl mx-auto text-center">
        <span class="text-xs font-normal text-gray-500 tracking-widest uppercase mb-4 block">About Us</span>
        <h1 class="text-5xl md:text-6xl font-light text-gray-900 mb-8 leading-tight">会社概要</h1>
        <p class="text-lg text-[#1F1F1F] font-light leading-relaxed max-w-2xl mx-auto">
            私たちのビジョン、ミッション、そして会社情報をご紹介します。
        </p>
    </div>
</section>

<!-- Vision & Mission -->
<section class="py-20 px-6 lg:px-8">
    <div class="max-w-6xl mx-auto">
        <div class="grid md:grid-cols-2 gap-8 mb-20">
            <!-- Vision -->
            <div class="glass-card rounded-3xl p-10">
                <div class="flex items-center gap-3 mb-6">
                    <div class="w-12 h-12 rounded-2xl bg-gradient-to-br from-orange-200/60 to-orange-300/40 flex items-center justify-center">
                        <svg class="w-6 h-6 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                        </svg>
                    </div>
                    <h2 class="text-2xl font-light text-gray-900">Vision</h2>
                </div>
                <p class="text-[#1F1F1F] font-light leading-relaxed text-lg">
                    {{ $company['vision'] }}
                </p>
            </div>

            <!-- Mission -->
            <div class="glass-card rounded-3xl p-10">
                <div class="flex items-center gap-3 mb-6">
                    <div class="w-12 h-12 rounded-2xl bg-gradient-to-br from-pink-200/60 to-pink-300/40 flex items-center justify-center">
                        <svg class="w-6 h-6 text-pink-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                    </div>
                    <h2 class="text-2xl font-light text-gray-900">Mission</h2>
                </div>
                <ul class="space-y-4">
                    @foreach($company['mission'] as $item)
                        <li class="flex items-start gap-3 text-[#1F1F1F] font-light leading-relaxed">
                            <svg class="w-5 h-5 text-orange-500 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span>{{ $item }}</span>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- Company Information -->
<section class="py-20 px-6 lg:px-8">
    <div class="max-w-6xl mx-auto">
        <div class="glass-card-strong rounded-3xl p-12 md:p-16">
            <h2 class="text-3xl font-light text-gray-900 mb-12 text-center">会社情報</h2>

            <div class="grid md:grid-cols-2 gap-x-16 gap-y-8 max-w-4xl mx-auto">
                <!-- Company Name -->
                <div class="border-b border-gray-200/50 pb-6">
                    <dt class="text-xs font-normal text-gray-500 mb-2 tracking-wide">会社名</dt>
                    <dd class="text-gray-900 font-light text-lg">{{ $company['name'] }}</dd>
                    <dd class="text-[#1F1F1F] font-light text-sm mt-1">{{ $company['name_en'] }}</dd>
                </div>

                <!-- Established -->
                <div class="border-b border-gray-200/50 pb-6">
                    <dt class="text-xs font-normal text-gray-500 mb-2 tracking-wide">設立</dt>
                    <dd class="text-gray-900 font-light text-lg">{{ $company['established'] }}</dd>
                </div>

                <!-- Capital -->
                <div class="border-b border-gray-200/50 pb-6">
                    <dt class="text-xs font-normal text-gray-500 mb-2 tracking-wide">資本金</dt>
                    <dd class="text-gray-900 font-light text-lg">{{ $company['capital'] }}</dd>
                </div>

                <!-- Employees -->
                <div class="border-b border-gray-200/50 pb-6">
                    <dt class="text-xs font-normal text-gray-500 mb-2 tracking-wide">従業員数</dt>
                    <dd class="text-gray-900 font-light text-lg">{{ $company['employees'] }}</dd>
                </div>

                <!-- CEO -->
                <div class="border-b border-gray-200/50 pb-6">
                    <dt class="text-xs font-normal text-gray-500 mb-2 tracking-wide">代表取締役</dt>
                    <dd class="text-gray-900 font-light text-lg">{{ $company['ceo'] }}</dd>
                </div>

                <!-- Phone -->
                <div class="border-b border-gray-200/50 pb-6">
                    <dt class="text-xs font-normal text-gray-500 mb-2 tracking-wide">電話番号</dt>
                    <dd class="text-gray-900 font-light text-lg">{{ $company['phone'] }}</dd>
                </div>

                <!-- Address -->
                <div class="border-b border-gray-200/50 pb-6 md:col-span-2">
                    <dt class="text-xs font-normal text-gray-500 mb-2 tracking-wide">所在地</dt>
                    <dd class="text-gray-900 font-light text-lg">
                        〒{{ $company['postal_code'] }}<br>
                        {{ $company['address'] }}
                    </dd>
                </div>

                <!-- Email -->
                <div class="border-b border-gray-200/50 pb-6 md:col-span-2">
                    <dt class="text-xs font-normal text-gray-500 mb-2 tracking-wide">メールアドレス</dt>
                    <dd class="text-gray-900 font-light text-lg">{{ $company['email'] }}</dd>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Values Section -->
<section class="py-20 px-6 lg:px-8">
    <div class="max-w-6xl mx-auto">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-light text-gray-900 mb-6">私たちの価値観</h2>
            <p class="text-[#1F1F1F] font-light max-w-2xl mx-auto">
                私たちが大切にしている3つの価値観
            </p>
        </div>

        <div class="grid md:grid-cols-3 gap-8">
            <!-- Value 1 -->
            <div class="glass-card rounded-3xl p-8 text-center">
                <div class="w-16 h-16 rounded-full bg-gradient-to-br from-orange-200/60 to-orange-300/40 flex items-center justify-center mx-auto mb-6">
                    <svg class="w-8 h-8 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-light text-gray-900 mb-4">Innovation</h3>
                <p class="text-sm text-[#1F1F1F] font-light leading-relaxed">
                    常に新しい技術とアイデアを追求し、革新的なソリューションを提供します。
                </p>
            </div>

            <!-- Value 2 -->
            <div class="glass-card rounded-3xl p-8 text-center">
                <div class="w-16 h-16 rounded-full bg-gradient-to-br from-pink-200/60 to-pink-300/40 flex items-center justify-center mx-auto mb-6">
                    <svg class="w-8 h-8 text-pink-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-light text-gray-900 mb-4">Partnership</h3>
                <p class="text-sm text-[#1F1F1F] font-light leading-relaxed">
                    お客様との信頼関係を大切にし、共に成長していくパートナーシップを築きます。
                </p>
            </div>

            <!-- Value 3 -->
            <div class="glass-card rounded-3xl p-8 text-center">
                <div class="w-16 h-16 rounded-full bg-gradient-to-br from-orange-200/60 to-pink-200/40 flex items-center justify-center mx-auto mb-6">
                    <svg class="w-8 h-8 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-light text-gray-900 mb-4">Quality</h3>
                <p class="text-sm text-[#1F1F1F] font-light leading-relaxed">
                    妥協のない品質へのこだわりで、お客様の期待を超える価値を提供します。
                </p>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-20 px-6 lg:px-8">
    <div class="max-w-4xl mx-auto">
        <div class="glass-card rounded-3xl p-12 text-center">
            <h2 class="text-2xl md:text-3xl font-light text-gray-900 mb-6">一緒に働きませんか？</h2>
            <p class="text-[#1F1F1F] font-light leading-relaxed mb-8">
                私たちと一緒に新しい価値を創造していく仲間を募集しています。
            </p>
            <a href="{{ route('demo.custom-hp.contact') }}" class="glass-button-primary px-10 py-4 rounded-full text-sm font-light inline-block">
                採用情報を見る
            </a>
        </div>
    </div>
</section>
@endsection
