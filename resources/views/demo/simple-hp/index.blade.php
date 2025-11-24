@extends('demo.simple-hp.layouts.app')

@section('title', 'ホーム')

@section('content')
<!-- Hero Section with Image -->
<section class="relative bg-stone-50 flex justify-center">
    <div class="w-[1400px] h-[500px] bg-gray-200 border-2 border-dashed border-gray-400 flex items-center justify-center">
        <div class="text-center">
            <div class="text-gray-400 mb-2">
                <svg class="w-16 h-16 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                </svg>
            </div>
            <span class="text-gray-600 text-sm font-medium">Hero Image</span>
            <p class="text-gray-400 text-xs mt-1">1400 × 500px</p>
        </div>
    </div>

    <!-- Hero Text Overlay -->
    <div class="absolute inset-0 flex items-center justify-center pointer-events-none">
        <div class="text-center px-4">
            <h1 class="text-5xl md:text-6xl font-light text-gray-800 mb-6 tracking-wide">
                ビジネスの成長を<br>サポートします
            </h1>
            <p class="text-lg md:text-xl text-gray-600 font-light">
                web design, graphic design, photograph, travel, colours, watercolor and more...
            </p>
        </div>
    </div>
</section>

<!-- What's New Section -->
<section class="py-24 bg-white">
    <div class="max-w-5xl mx-auto px-8">
        <div class="flex justify-between items-center mb-12">
            <h2 class="text-2xl font-light text-gray-800">what's new</h2>
            <a href="#" class="text-sm text-gray-500 hover:text-gray-800 transition-colors">all view →</a>
        </div>

        <div class="space-y-4">
            <div class="flex items-center gap-6 py-4 border-b border-gray-200">
                <span class="text-sm text-gray-500 w-24">2023.12.08</span>
                <p class="text-gray-700">新規デザインプロジェクトを開始しました</p>
            </div>
            <div class="flex items-center gap-6 py-4 border-b border-gray-200">
                <span class="text-sm text-gray-500 w-24">2023.12.01</span>
                <p class="text-gray-700">アルバムを更新しました！</p>
            </div>
        </div>
    </div>
</section>

<!-- About Section -->
<section class="py-24 bg-stone-50">
    <div class="max-w-5xl mx-auto px-8">
        <div class="flex flex-col md:flex-row gap-16 items-center">
            <!-- Text Content -->
            <div class="flex-1">
                <h2 class="text-4xl font-light text-gray-800 mb-8 tracking-wide">
                    わたしの<br>こと
                </h2>
                <div class="space-y-1 text-sm text-gray-600 leading-relaxed mb-8 font-light">
                    <p>デザインと旅が好きな、自然派な性格な人々へ。</p>
                    <p>様々なところで水彩画やふんわりふんわりとしたものが好きで、</p>
                    <p>いつまでも未完いと何年もかけていきたいとそう思います。</p>
                    <p></p>
                    <p>移動の日程は、ちみちみとしかなたかみあとてきです。</p>
                </div>
                <a href="{{ route('demo.simple-hp.about') }}" class="inline-block text-sm text-gray-800 border border-gray-800 px-6 py-2 hover:bg-gray-800 hover:text-white transition-colors">
                    my profile
                </a>
            </div>

            <!-- Image Placeholder -->
            <div class="w-[500px] h-[400px] bg-gray-200 border-2 border-dashed border-gray-400 flex items-center justify-center flex-shrink-0">
                <div class="text-center">
                    <div class="text-gray-400 mb-2">
                        <svg class="w-12 h-12 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <span class="text-gray-600 text-sm font-medium">About Image</span>
                    <p class="text-gray-400 text-xs mt-1">500 × 400px</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Services Section -->
<section class="py-24 bg-white">
    <div class="max-w-5xl mx-auto px-8">
        <!-- Design Service -->
        <div class="mb-32">
            <div class="mb-8">
                <h3 class="text-3xl font-light text-gray-800 mb-4">design</h3>
                <p class="text-sm text-gray-600 leading-relaxed font-light">
                    名刺作り・ものづくりなど豊かな暮らしにどんな
                </p>
            </div>

            <div class="flex flex-col md:flex-row gap-8 justify-center">
                <div class="w-[350px] h-[350px] bg-gray-200 border-2 border-dashed border-gray-400 flex items-center justify-center flex-shrink-0">
                    <div class="text-center">
                        <svg class="w-8 h-8 mx-auto text-gray-400 mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                        <p class="text-gray-400 text-xs">350 × 350px</p>
                    </div>
                </div>
                <div class="w-[350px] h-[350px] bg-gray-300 border-2 border-dashed border-gray-500 flex items-center justify-center flex-shrink-0">
                    <div class="text-center">
                        <svg class="w-8 h-8 mx-auto text-gray-500 mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                        <p class="text-gray-500 text-xs">350 × 350px</p>
                    </div>
                </div>
                <div class="w-[350px] h-[350px] bg-gray-200 border-2 border-dashed border-gray-400 flex items-center justify-center flex-shrink-0">
                    <div class="text-center">
                        <svg class="w-8 h-8 mx-auto text-gray-400 mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                        <p class="text-gray-400 text-xs">350 × 350px</p>
                    </div>
                </div>
            </div>

            <div class="mt-8 text-sm text-gray-600 leading-relaxed font-light">
                <p>おしゃれなものづくりを豊かな暮らしにそのための
                  デザインシステムズのデザイン・ショッピングでWebsiteの開発をやるメインのイーストランドショップを提供と共有
                  物語など前転新しメインや、デザインのものがボタンの運をおしゃれさんさんです。</p>
            </div>

            <div class="mt-6">
                <a href="{{ route('demo.simple-hp.service') }}" class="text-sm text-gray-500 hover:text-gray-800 transition-colors">view more →</a>
            </div>
        </div>

        <!-- Photography Service -->
        <div class="mb-32">
            <div class="mb-8">
                <h3 class="text-3xl font-light text-gray-800 mb-4">写真を撮ります</h3>
                <h4 class="text-xl font-light text-gray-600 mb-4">photograph</h4>
            </div>

            <div class="flex flex-col md:flex-row gap-8 justify-center">
                <div class="w-[350px] h-[350px] bg-gray-200 border-2 border-dashed border-gray-400 flex items-center justify-center flex-shrink-0">
                    <div class="text-center">
                        <svg class="w-8 h-8 mx-auto text-gray-400 mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                        <p class="text-gray-400 text-xs">350 × 350px</p>
                    </div>
                </div>
                <div class="w-[350px] h-[350px] bg-gray-300 border-2 border-dashed border-gray-500 flex items-center justify-center flex-shrink-0">
                    <div class="text-center">
                        <svg class="w-8 h-8 mx-auto text-gray-500 mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                        <p class="text-gray-500 text-xs">350 × 350px</p>
                    </div>
                </div>
                <div class="w-[350px] h-[350px] bg-gray-200 border-2 border-dashed border-gray-400 flex items-center justify-center flex-shrink-0">
                    <div class="text-center">
                        <svg class="w-8 h-8 mx-auto text-gray-400 mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                        <p class="text-gray-400 text-xs">350 × 350px</p>
                    </div>
                </div>
            </div>

            <div class="mt-8 text-sm text-gray-600 leading-relaxed font-light">
                <p>ウェルカムプース、デジタルカメラを使って写真撮影をしています。
                  記念ちんもちろん自然や建築のみしないし、日常・観光地の記録を残そうとお声か可能す検索と新鮮に。
                  思え出不織布湯等の持つドーストリートベース実、湯等部にお時間とともともします。</p>
            </div>

            <div class="mt-6">
                <a href="{{ route('demo.simple-hp.service') }}" class="text-sm text-gray-500 hover:text-gray-800 transition-colors">view more →</a>
            </div>
        </div>
    </div>
</section>

<!-- Works Section -->
<section class="py-24 bg-stone-50">
    <div class="max-w-5xl mx-auto px-8 text-center">
        <h2 class="text-4xl font-light text-gray-800 mb-12">my works</h2>

        <a href="{{ route('demo.simple-hp.service') }}" class="inline-block bg-gray-800 text-white text-sm px-8 py-3 hover:bg-gray-700 transition-colors">
            pick up
        </a>
    </div>
</section>

<!-- Contact CTA -->
<section class="py-24 bg-white">
    <div class="max-w-4xl mx-auto px-8 text-center">
        <h2 class="text-3xl font-light text-gray-800 mb-6">お気軽にご相談ください</h2>
        <p class="text-sm text-gray-600 mb-12 font-light leading-relaxed">
            お問い合わせまたはお気軽にお問い合わせフォームよりご連絡ください。<br>
            専門スタッフが丁寧に対応いたします。
        </p>

        <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
            <div class="flex items-center gap-2">
                <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                </svg>
                <a href="tel:03-1234-5678" class="text-blue-600 hover:underline">03-1234-5678</a>
            </div>

            <span class="text-gray-400">|</span>

            <a href="{{ route('demo.simple-hp.contact') }}" class="text-blue-600 hover:underline">お問い合わせフォーム →</a>
        </div>
    </div>
</section>
@endsection
