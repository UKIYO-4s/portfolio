@extends('demo.simple-hp.layouts.app')

@section('title', 'サービス')

@section('content')
<!-- Page Header -->
<section class="py-16 bg-stone-50">
    <div class="max-w-6xl mx-auto px-8 text-center">
        <h1 class="text-5xl font-light text-gray-800 mb-4">サービス</h1>
        <p class="text-sm text-gray-500">Our Services</p>
    </div>
</section>

<!-- Services Detail -->
<section class="py-24 bg-white">
    <div class="max-w-6xl mx-auto px-8">
        @foreach($services as $index => $service)
            <div class="mb-32 {{ $index == count($services) - 1 ? 'mb-0' : '' }}">
                <!-- Service Title -->
                <div class="mb-12 text-center">
                    <span class="inline-block px-4 py-1 bg-stone-100 text-gray-600 text-xs mb-4">Service {{ sprintf('%02d', $index + 1) }}</span>
                    <h2 class="text-4xl font-light text-gray-800 mb-4">{{ $service['title'] }}</h2>
                    <p class="text-gray-600 font-light">{{ $service['description'] }}</p>
                </div>

                <!-- Service Images Grid -->
                <div class="grid {{ $index % 2 == 0 ? 'md:grid-cols-2' : 'md:grid-cols-3' }} gap-6 mb-12">
                    @if($index % 2 == 0)
                        <!-- Large + Small Layout -->
                        <div class="md:col-span-1">
                            <div class="aspect-[3/4] bg-gray-300 flex items-center justify-center">
                                <span class="text-gray-500 text-xs">Image (600x800px)</span>
                            </div>
                        </div>
                        <div class="md:col-span-1 space-y-6">
                            <div class="aspect-video bg-gray-300 flex items-center justify-center">
                                <span class="text-gray-500 text-xs">Image (600x340px)</span>
                            </div>
                            <div class="aspect-video bg-gray-300 flex items-center justify-center">
                                <span class="text-gray-500 text-xs">Image (600x340px)</span>
                            </div>
                        </div>
                    @else
                        <!-- Three Equal Layout -->
                        <div class="aspect-square bg-gray-300 flex items-center justify-center">
                            <span class="text-gray-500 text-xs">Image (400x400px)</span>
                        </div>
                        <div class="aspect-square bg-gray-300 flex items-center justify-center">
                            <span class="text-gray-500 text-xs">Image (400x400px)</span>
                        </div>
                        <div class="aspect-square bg-gray-300 flex items-center justify-center">
                            <span class="text-gray-500 text-xs">Image (400x400px)</span>
                        </div>
                    @endif
                </div>

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
