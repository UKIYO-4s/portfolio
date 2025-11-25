@extends('demo.simple-hp.layouts.app')

@section('title', 'サービス')

@section('content')
<!-- Page Header -->
<section class="py-24 bg-gradient-to-br from-gray-50 via-emerald-50/20 to-gray-50">
    <div class="max-w-6xl mx-auto px-8 text-center">
        <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">サービス</h1>
        <p class="text-gray-600">Services</p>
    </div>
</section>

<!-- Services -->
<section class="py-24 bg-white">
    <div class="max-w-6xl mx-auto px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">提供サービス</h2>
            <div class="w-16 h-1 bg-emerald-600 mx-auto mb-8"></div>
            <p class="text-gray-600">お客様のニーズに合わせた最適なソリューションを提供します</p>
        </div>

        <div class="space-y-16">
            @foreach($services as $index => $service)
            <!-- Service Card -->
            <div class="bg-gradient-to-br from-gray-50 via-emerald-50/20 to-gray-50 rounded-2xl shadow-lg border-l-4 border-emerald-600 overflow-hidden hover:shadow-xl transition-shadow duration-300">
                <div class="grid md:grid-cols-2 gap-0">
                    <!-- Service Image -->
                    <div class="order-2 md:order-{{ $index % 2 == 0 ? '1' : '2' }}">
                        <div class="h-full min-h-[300px] bg-gradient-to-br {{ $service['gradient'] }} flex items-center justify-center">
                            <div class="text-center">
                                <svg class="w-16 h-16 mx-auto text-gray-400 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                                <p class="text-gray-600 text-sm">Service Image</p>
                                <p class="text-gray-400 text-xs mt-1">600 × 400</p>
                            </div>
                        </div>
                    </div>

                    <!-- Service Content -->
                    <div class="order-1 md:order-{{ $index % 2 == 0 ? '2' : '1' }} p-8 md:p-12 flex flex-col justify-center">
                        <div class="mb-6">
                            <span class="inline-block px-4 py-1.5 bg-emerald-600 text-white text-xs rounded-full font-semibold mb-4">
                                Service {{ sprintf('%02d', $index + 1) }}
                            </span>
                            <h3 class="text-2xl md:text-3xl font-bold text-gray-900 mb-4">{{ $service['title'] }}</h3>
                            <p class="text-gray-600 leading-relaxed mb-6">
                                {{ $service['description'] }}
                            </p>
                        </div>

                        <!-- Features -->
                        <div class="mb-6">
                            <h4 class="text-lg font-bold text-gray-900 mb-4">主な内容</h4>
                            <ul class="space-y-2">
                                @foreach($service['features'] as $feature)
                                <li class="flex items-center text-sm text-gray-600">
                                    <span class="text-emerald-600 mr-2 text-base">✓</span>
                                    <span>{{ $feature }}</span>
                                </li>
                                @endforeach
                            </ul>
                        </div>

                        <!-- Price & Duration -->
                        <div class="flex flex-wrap items-center gap-6 pt-6 border-t border-gray-200">
                            <div>
                                <p class="text-xs text-gray-600 mb-1">料金</p>
                                <p class="text-2xl font-bold text-emerald-600">{{ $service['price'] }}</p>
                            </div>
                            <div>
                                <p class="text-xs text-gray-600 mb-1">納期目安</p>
                                <p class="text-lg font-semibold text-gray-900">{{ $service['duration'] }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Process Overview -->
<section class="py-24 bg-gradient-to-br from-gray-50 via-emerald-50/20 to-gray-50">
    <div class="max-w-4xl mx-auto px-8 text-center">
        <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-6">制作の流れ</h2>
        <p class="text-gray-600 leading-relaxed mb-10">
            ヒアリングから納品まで、丁寧にサポートいたします。<br>
            詳しい制作フローは「私について」ページをご覧ください。
        </p>
        <a href="{{ route('demo.simple-hp.about') }}" class="inline-block text-sm text-gray-700 border-2 border-gray-300 px-8 py-3 rounded-lg hover:bg-white hover:border-gray-400 transition-all duration-300 font-medium">
            制作フローを見る
        </a>
    </div>
</section>

<!-- CTA Section -->
<section class="py-24 bg-white">
    <div class="max-w-4xl mx-auto px-8 text-center">
        <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-6">お気軽にご相談ください</h2>
        <p class="text-gray-600 leading-relaxed mb-10">
            ご質問やお見積もりのご依頼など、<br>
            お気軽にお問い合わせください。
        </p>
        <a href="{{ route('demo.simple-hp.contact') }}" class="inline-block bg-emerald-600 text-white text-base px-10 py-4 rounded-lg hover:bg-emerald-700 hover:shadow-lg transition-all duration-300 transform hover:-translate-y-0.5 font-semibold">
            お問い合わせフォーム
        </a>
    </div>
</section>
@endsection
