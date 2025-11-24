@extends('demo.simple-hp.layouts.app')

@section('title', 'サービス')

@section('content')
<!-- Page Header -->
<section class="bg-gradient-to-r from-blue-600 to-blue-800 dark:from-blue-800 dark:to-blue-950 text-white py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-4xl font-bold text-center">サービス</h1>
        <p class="text-center text-blue-100 mt-4">Our Services</p>
    </div>
</section>

<!-- Services -->
<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="space-y-16">
            @foreach($services as $index => $service)
                <div class="grid md:grid-cols-2 gap-8 items-center {{ $index % 2 == 1 ? 'md:flex-row-reverse' : '' }}">
                    <!-- Service Content -->
                    <div class="{{ $index % 2 == 1 ? 'md:order-2' : '' }}">
                        <div class="inline-block px-3 py-1 bg-blue-100 text-blue-600 rounded-full text-sm font-medium mb-4">
                            Service {{ $index + 1 }}
                        </div>
                        <h2 class="text-3xl font-bold text-gray-900 mb-4">{{ $service['title'] }}</h2>
                        <p class="text-gray-600 mb-6 leading-relaxed">
                            {{ $service['description'] }}
                        </p>

                        <h3 class="font-semibold text-gray-900 mb-3">主な特徴</h3>
                        <ul class="space-y-2 mb-6">
                            @foreach($service['features'] as $feature)
                                <li class="flex items-start">
                                    <svg class="w-5 h-5 text-blue-600 mr-2 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    <span class="text-gray-700">{{ $feature }}</span>
                                </li>
                            @endforeach
                        </ul>

                        <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg border border-gray-100">
                            <div>
                                <p class="text-sm text-gray-500">料金</p>
                                <p class="text-2xl font-bold text-gray-900">{{ $service['price'] }}</p>
                            </div>
                            <a href="{{ route('demo.simple-hp.contact') }}" class="inline-block bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg font-medium transition-colors">
                                お問い合わせ
                            </a>
                        </div>
                    </div>

                    <!-- Service Image Placeholder -->
                    <div class="{{ $index % 2 == 1 ? 'md:order-1' : '' }}">
                        <div class="aspect-w-16 aspect-h-9 bg-gradient-to-br {{ $index == 0 ? 'from-blue-400 to-blue-600' : ($index == 1 ? 'from-green-400 to-green-600' : 'from-purple-400 to-purple-600') }} rounded-lg shadow-lg flex items-center justify-center">
                            <div class="text-white text-center p-8">
                                <svg class="w-16 h-16 mx-auto mb-4 opacity-80" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    @if($index == 0)
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                    @elseif($index == 1)
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"></path>
                                    @else
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 12l3-3 3 3 4-4M8 21l4-4 4 4M3 4h18M4 4h16v12a1 1 0 01-1 1H5a1 1 0 01-1-1V4z"></path>
                                    @endif
                                </svg>
                                <p class="text-xl font-bold">{{ $service['title'] }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl font-bold text-gray-900 mb-4">お気軽にご相談ください</h2>
        <p class="text-gray-600 mb-8 max-w-2xl mx-auto">
            サービスに関するご質問や、お見積もりのご依頼など、<br>
            お気軽にお問い合わせください。
        </p>
        <a href="{{ route('demo.simple-hp.contact') }}" class="inline-block bg-blue-600 hover:bg-blue-700 text-white px-8 py-3 rounded-lg font-semibold transition-colors">
            お問い合わせフォーム
        </a>
    </div>
</section>
@endsection
