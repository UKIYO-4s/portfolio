@extends('demo.simple-hp.layouts.app')

@section('title', '会社概要')

@section('content')
<!-- Page Header -->
<section class="py-16 bg-stone-50">
    <div class="max-w-6xl mx-auto px-8 text-center">
        <h1 class="text-5xl font-light text-gray-800 mb-4">会社概要</h1>
        <p class="text-sm text-gray-500">Company Profile</p>
    </div>
</section>

<!-- Profile Image Section -->
<section class="py-24 bg-white">
    <div class="max-w-6xl mx-auto px-8">
        <div class="grid md:grid-cols-2 gap-16 items-center mb-24">
            <!-- Image -->
            <div class="w-full h-[500px] bg-gray-200 border-2 border-dashed border-gray-400 flex items-center justify-center">
                <div class="text-center">
                    <svg class="w-16 h-16 mx-auto text-gray-400 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                    <span class="text-gray-600 text-sm font-medium">Profile Image</span>
                    <p class="text-gray-400 text-xs mt-1">700 x 500px</p>
                </div>
            </div>

            <!-- Text Content -->
            <div>
                <h2 class="text-4xl font-light text-gray-800 mb-8 tracking-wide">
                    私たちについて
                </h2>
                <div class="space-y-4 text-sm text-gray-600 leading-relaxed font-light">
                    <p>
                        私たちは、最新のテクノロジーとクリエイティブな発想で、
                        お客様のビジネスの成長をサポートしています。
                    </p>
                    <p>
                        デザインと旅が好きな、自然派な性格。
                        様々なところで水彩画やふんわりふんわりとしたものが好きで、
                        いつまでも未完と何年もかけていきたいとそう思います。
                    </p>
                    <p>
                        常にお客様の視点に立ち、最適なソリューションを提供することで、
                        社会に貢献してまいります。
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Company Info Section -->
<section class="py-24 bg-stone-50">
    <div class="max-w-6xl mx-auto px-8">
        <h2 class="text-3xl font-light text-gray-800 mb-16 text-center">企業情報</h2>

        <div class="grid md:grid-cols-2 gap-x-16 gap-y-12">
            <!-- Left Column -->
            <div class="space-y-8">
                <div class="border-b border-gray-300 pb-6">
                    <dt class="text-xs text-gray-500 mb-2 tracking-wider">会社名</dt>
                    <dd class="text-gray-800 font-light">{{ $company['name'] }}</dd>
                    <dd class="text-sm text-gray-600 font-light mt-1">{{ $company['name_en'] }}</dd>
                </div>
                <div class="border-b border-gray-300 pb-6">
                    <dt class="text-xs text-gray-500 mb-2 tracking-wider">設立</dt>
                    <dd class="text-gray-800 font-light">{{ $company['established'] }}</dd>
                </div>
                <div class="border-b border-gray-300 pb-6">
                    <dt class="text-xs text-gray-500 mb-2 tracking-wider">資本金</dt>
                    <dd class="text-gray-800 font-light">{{ $company['capital'] }}</dd>
                </div>
                <div class="border-b border-gray-300 pb-6">
                    <dt class="text-xs text-gray-500 mb-2 tracking-wider">従業員数</dt>
                    <dd class="text-gray-800 font-light">{{ $company['employees'] }}</dd>
                </div>
            </div>

            <!-- Right Column -->
            <div class="space-y-8">
                <div class="border-b border-gray-300 pb-6">
                    <dt class="text-xs text-gray-500 mb-2 tracking-wider">代表取締役</dt>
                    <dd class="text-gray-800 font-light">{{ $company['ceo'] }}</dd>
                </div>
                <div class="border-b border-gray-300 pb-6">
                    <dt class="text-xs text-gray-500 mb-2 tracking-wider">所在地</dt>
                    <dd class="text-gray-800 font-light">
                        〒{{ $company['postal_code'] }}<br>
                        {{ $company['address'] }}
                    </dd>
                </div>
                <div class="border-b border-gray-300 pb-6">
                    <dt class="text-xs text-gray-500 mb-2 tracking-wider">電話番号</dt>
                    <dd class="text-gray-800 font-light">{{ $company['phone'] }}</dd>
                </div>
                <div class="border-b border-gray-300 pb-6">
                    <dt class="text-xs text-gray-500 mb-2 tracking-wider">メールアドレス</dt>
                    <dd class="text-gray-800 font-light">{{ $company['email'] }}</dd>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Business Content Section -->
<section class="py-24 bg-white">
    <div class="max-w-4xl mx-auto px-8">
        <h2 class="text-3xl font-light text-gray-800 mb-12 text-center">事業内容</h2>

        <ul class="space-y-4 mb-16">
            @foreach($company['business'] as $business)
                <li class="flex items-start text-sm">
                    <span class="text-gray-400 mr-3">•</span>
                    <span class="text-gray-700 font-light">{{ $business }}</span>
                </li>
            @endforeach
        </ul>

        <div class="p-12 bg-stone-50">
            <h3 class="text-xl font-light text-gray-800 mb-6 text-center">企業理念</h3>
            <p class="text-sm text-gray-700 leading-relaxed font-light text-center">
                私たちは、最新のテクノロジーとクリエイティブな発想で、お客様のビジネスの成長をサポートします。<br>
                常にお客様の視点に立ち、最適なソリューションを提供することで、社会に貢献してまいります。
            </p>
        </div>
    </div>
</section>

<!-- Access Map Section -->
<section class="py-24 bg-stone-50">
    <div class="max-w-6xl mx-auto px-8">
        <h2 class="text-3xl font-light text-gray-800 mb-12 text-center">アクセス</h2>

        <div class="bg-white overflow-hidden shadow-sm">
            <div class="h-96">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3240.8274789816973!2d139.7638467!3d35.6812405!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x60188bfbd89f700b%3A0x277c49ba34ed38!2z5p2x5Lqs6aeF!5e0!3m2!1sja!2sjp!4v1234567890"
                    width="100%"
                    height="100%"
                    style="border:0;"
                    allowfullscreen=""
                    loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"
                    class="w-full h-full">
                </iframe>
            </div>

            <div class="p-8 border-t border-gray-100">
                <h3 class="font-light text-gray-800 mb-4 text-center">電車でのアクセス</h3>
                <ul class="text-gray-600 text-sm space-y-2 font-light text-center">
                    <li>JR「東京駅」丸の内南口より徒歩3分</li>
                    <li>東京メトロ丸ノ内線「東京駅」より徒歩1分</li>
                    <li>東京メトロ千代田線「二重橋前駅」より徒歩5分</li>
                </ul>
            </div>
        </div>
    </div>
</section>
@endsection
