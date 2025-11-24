@extends('demo.simple-hp.layouts.app')

@section('title', 'サービス')

@section('content')
<!-- Page Header -->
<section class="py-20 bg-white">
    <div class="max-w-6xl mx-auto px-8 text-center">
        <h1 class="text-5xl font-light text-gray-900 mb-4">サービス</h1>
        <p class="text-gray-600 font-light">Our Services</p>
    </div>
</section>

<!-- Services Detail -->
<section class="py-20 bg-gray-50">
    <div class="max-w-6xl mx-auto px-8">
        @foreach($services as $index => $service)
            <div class="mb-32 {{ $index == count($services) - 1 ? 'mb-0' : '' }}">
                <!-- Service Title -->
                <div class="mb-12 text-center">
                    <span class="inline-block px-4 py-1 bg-white text-gray-600 text-xs mb-4 border border-gray-300 font-light">Service {{ sprintf('%02d', $index + 1) }}</span>
                    <h2 class="text-4xl font-light text-gray-900 mb-4">{{ $service['title'] }}</h2>
                    <p class="text-gray-600 font-light">{{ $service['description'] }}</p>
                </div>

                <!-- Service Images Grid -->
                <div class="flex justify-center mb-12">
                    @if($index % 2 == 0)
                        <!-- Large + Small Layout -->
                        <div class="flex flex-col md:flex-row gap-8">
                            <div class="w-[500px] h-[400px] bg-gray-100 border border-gray-300 flex items-center justify-center flex-shrink-0">
                                <div class="text-center">
                                    <svg class="w-12 h-12 mx-auto text-gray-400 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                    <p class="text-gray-600 text-sm font-light">Service Image</p>
                                    <p class="text-gray-400 text-xs">500 × 400</p>
                                </div>
                            </div>
                            <div class="flex flex-col gap-8">
                                <div class="w-[500px] h-[196px] bg-gray-100 border border-gray-300 flex items-center justify-center flex-shrink-0">
                                    <div class="text-center">
                                        <svg class="w-10 h-10 mx-auto text-gray-400 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                        </svg>
                                        <p class="text-gray-400 text-xs">500 × 196</p>
                                    </div>
                                </div>
                                <div class="w-[500px] h-[196px] bg-gray-200 border border-gray-300 flex items-center justify-center flex-shrink-0">
                                    <div class="text-center">
                                        <svg class="w-10 h-10 mx-auto text-gray-400 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                        </svg>
                                        <p class="text-gray-400 text-xs">500 × 196</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                        <!-- Three Equal Layout -->
                        <div class="flex flex-col md:flex-row gap-8">
                            <div class="w-[350px] h-[350px] bg-gray-100 border border-gray-300 flex items-center justify-center flex-shrink-0">
                                <div class="text-center">
                                    <svg class="w-10 h-10 mx-auto text-gray-400 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                    <p class="text-gray-400 text-xs">350 × 350</p>
                                </div>
                            </div>
                            <div class="w-[350px] h-[350px] bg-gray-200 border border-gray-300 flex items-center justify-center flex-shrink-0">
                                <div class="text-center">
                                    <svg class="w-10 h-10 mx-auto text-gray-400 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                    <p class="text-gray-400 text-xs">350 × 350</p>
                                </div>
                            </div>
                            <div class="w-[350px] h-[350px] bg-gray-100 border border-gray-300 flex items-center justify-center flex-shrink-0">
                                <div class="text-center">
                                    <svg class="w-10 h-10 mx-auto text-gray-400 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                    <p class="text-gray-400 text-xs">350 × 350</p>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>

                <!-- Service Details -->
                <div class="max-w-3xl mx-auto bg-white p-8 border border-gray-200">
                    <h3 class="text-lg font-light text-gray-900 mb-6">主な特徴</h3>
                    <ul class="space-y-3 mb-8">
                        @foreach($service['features'] as $feature)
                            <li class="flex items-start text-sm">
                                <span class="text-gray-400 mr-3 mt-1">•</span>
                                <span class="text-gray-700 font-light">{{ $feature }}</span>
                            </li>
                        @endforeach
                    </ul>

                    <div class="flex flex-col md:flex-row items-center justify-between pt-6 border-t border-gray-200 gap-6">
                        <div>
                            <p class="text-xs text-gray-600 mb-1 font-light">料金の目安</p>
                            <p class="text-2xl font-light text-gray-900">{{ $service['price'] }}</p>
                        </div>
                        <a href="{{ route('demo.simple-hp.contact') }}" class="inline-block bg-gray-900 text-white text-sm px-8 py-3 hover:bg-gray-800 transition-colors font-light">
                            お問い合わせ
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</section>

<!-- CTA Section -->
<section class="py-20 bg-white">
    <div class="max-w-4xl mx-auto px-8 text-center">
        <h2 class="text-3xl font-light text-gray-900 mb-6">お気軽にご相談ください</h2>
        <p class="text-gray-600 font-light leading-relaxed mb-10">
            サービスに関するご質問や、お見積もりのご依頼など、<br>
            お気軽にお問い合わせください。
        </p>
        <a href="{{ route('demo.simple-hp.contact') }}" class="inline-block text-sm text-gray-700 border border-gray-300 px-8 py-3 hover:bg-gray-50 transition-colors font-light">
            お問い合わせフォーム
        </a>
    </div>
</section>
@endsection
