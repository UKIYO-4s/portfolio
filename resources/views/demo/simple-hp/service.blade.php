@extends('demo.simple-hp.layouts.app')

@section('title', 'サービス')

@section('content')
<!-- Page Header -->
<section class="py-16 bg-stone-50">
    <div class="max-w-5xl mx-auto px-8">
        <h1 class="text-5xl font-light text-gray-800 mb-4 text-center">サービス</h1>
        <p class="text-sm text-gray-500 text-center">Our Services</p>
    </div>
</section>

<!-- Services Detail -->
<section class="py-24 bg-white">
    <div class="max-w-5xl mx-auto px-8">
        @foreach($services as $index => $service)
            <div class="mb-32 {{ $index == count($services) - 1 ? 'mb-0' : '' }}">
                <!-- Service Title -->
                <div class="mb-12 text-center">
                    <span class="inline-block px-4 py-1 bg-stone-100 text-gray-600 text-xs mb-4">Service {{ sprintf('%02d', $index + 1) }}</span>
                    <h2 class="text-4xl font-light text-gray-800 mb-4">{{ $service['title'] }}</h2>
                    <p class="text-gray-600 font-light">{{ $service['description'] }}</p>
                </div>

                <!-- Service Images Grid -->
                @if($index % 2 == 0)
                    <!-- Large + Small Layout -->
                    <div class="flex flex-col md:flex-row gap-8 mb-12 justify-center">
                        <div class="w-[600px] h-[800px] bg-gray-200 border-2 border-dashed border-gray-400 flex items-center justify-center mx-auto md:mx-0">
                            <div class="text-center">
                                <svg class="w-12 h-12 mx-auto text-gray-400 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                                <p class="text-gray-600 text-sm font-medium">Image</p>
                                <p class="text-gray-400 text-xs">600 × 800px</p>
                            </div>
                        </div>
                        <div class="flex flex-col gap-8">
                            <div class="w-[600px] h-[396px] bg-gray-200 border-2 border-dashed border-gray-400 flex items-center justify-center mx-auto md:mx-0">
                                <div class="text-center">
                                    <svg class="w-10 h-10 mx-auto text-gray-400 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                    <p class="text-gray-600 text-sm font-medium">Image</p>
                                    <p class="text-gray-400 text-xs">600 × 396px</p>
                                </div>
                            </div>
                            <div class="w-[600px] h-[396px] bg-gray-300 border-2 border-dashed border-gray-500 flex items-center justify-center mx-auto md:mx-0">
                                <div class="text-center">
                                    <svg class="w-10 h-10 mx-auto text-gray-500 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                    <p class="text-gray-600 text-sm font-medium">Image</p>
                                    <p class="text-gray-500 text-xs">600 × 396px</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    <!-- Three Equal Layout -->
                    <div class="flex flex-col md:flex-row gap-8 mb-12 justify-center">
                        <div class="w-[400px] h-[400px] bg-gray-200 border-2 border-dashed border-gray-400 flex items-center justify-center mx-auto md:mx-0">
                            <div class="text-center">
                                <svg class="w-10 h-10 mx-auto text-gray-400 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                                <p class="text-gray-600 text-sm font-medium">Image</p>
                                <p class="text-gray-400 text-xs">400 × 400px</p>
                            </div>
                        </div>
                        <div class="w-[400px] h-[400px] bg-gray-300 border-2 border-dashed border-gray-500 flex items-center justify-center mx-auto md:mx-0">
                            <div class="text-center">
                                <svg class="w-10 h-10 mx-auto text-gray-500 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                                <p class="text-gray-600 text-sm font-medium">Image</p>
                                <p class="text-gray-500 text-xs">400 × 400px</p>
                            </div>
                        </div>
                        <div class="w-[400px] h-[400px] bg-gray-200 border-2 border-dashed border-gray-400 flex items-center justify-center mx-auto md:mx-0">
                            <div class="text-center">
                                <svg class="w-10 h-10 mx-auto text-gray-400 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                                <p class="text-gray-600 text-sm font-medium">Image</p>
                                <p class="text-gray-400 text-xs">400 × 400px</p>
                            </div>
                        </div>
                    </div>
                @endif

                <!-- Service Details -->
                <div class="max-w-3xl mx-auto">
                    <h3 class="text-lg font-light text-gray-800 mb-4 border-b border-gray-200 pb-2">主な特徴</h3>
                    <ul class="space-y-3 mb-8">
                        @foreach($service['features'] as $feature)
                            <li class="flex items-start text-sm">
                                <span class="text-gray-400 mr-3">•</span>
                                <span class="text-gray-700 font-light">{{ $feature }}</span>
                            </li>
                        @endforeach
                    </ul>

                    <div class="flex items-center justify-between p-6 bg-stone-50">
                        <div>
                            <p class="text-xs text-gray-500 mb-1">料金の目安</p>
                            <p class="text-2xl font-light text-gray-800">{{ $service['price'] }}</p>
                        </div>
                        <a href="{{ route('demo.simple-hp.contact') }}" class="inline-block bg-gray-800 text-white text-sm px-6 py-2 hover:bg-gray-700 transition-colors">
                            お問い合わせ
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</section>

<!-- CTA Section -->
<section class="py-24 bg-stone-50">
    <div class="max-w-4xl mx-auto px-8 text-center">
        <h2 class="text-3xl font-light text-gray-800 mb-6">お気軽にご相談ください</h2>
        <p class="text-sm text-gray-600 mb-12 font-light leading-relaxed">
            サービスに関するご質問や、お見積もりのご依頼など、<br>
            お気軽にお問い合わせください。
        </p>
        <a href="{{ route('demo.simple-hp.contact') }}" class="inline-block text-sm text-gray-800 border border-gray-800 px-8 py-3 hover:bg-gray-800 hover:text-white transition-colors">
            お問い合わせフォーム
        </a>
    </div>
</section>
@endsection
