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
            <div class="w-full h-[500px] bg-gray-300 flex items-center justify-center">
                <span class="text-gray-500 text-sm">Profile Image (700x500px)</span>
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

        <div class="bg-white overflow-hidden">
            <div class="h-96 bg-gray-300 flex items-center justify-center">
                <span class="text-gray-500 text-sm">Google Map (1200x400px)</span>
            </div>

            <div class="p-8">
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
