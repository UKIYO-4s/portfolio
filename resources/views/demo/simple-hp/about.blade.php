@extends('demo.simple-hp.layouts.app')

@section('title', '会社概要')

@section('content')
<!-- Page Header -->
<section class="py-24 bg-gradient-to-b from-gray-50 to-white">
    <div class="max-w-6xl mx-auto px-8 text-center">
        <h1 class="text-4xl md:text-5xl font-semibold text-gray-900 mb-4">会社概要</h1>
        <p class="text-gray-600">Company Profile</p>
    </div>
</section>

<!-- Profile Section -->
<section class="py-24 bg-white">
    <div class="max-w-6xl mx-auto px-8">
        <div class="grid md:grid-cols-2 gap-12 items-center">
            <!-- Image Placeholder -->
            <div>
                <div class="w-full aspect-[8/5] bg-gradient-to-br from-gray-100 to-gray-200 rounded-2xl shadow-lg border border-gray-200 flex items-center justify-center">
                    <div class="text-center">
                        <svg class="w-16 h-16 mx-auto text-gray-400 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                        <p class="text-gray-600 text-sm">Company Image</p>
                        <p class="text-gray-400 text-xs mt-1">800 × 500</p>
                    </div>
                </div>
            </div>

            <!-- Text Content -->
            <div>
                <h2 class="text-3xl font-semibold text-gray-900 mb-6">私たちについて</h2>
                <p class="text-gray-600 leading-relaxed mb-6">
                    私たちは、最新のテクノロジーとクリエイティブな発想で、お客様のビジネスの成長をサポートしています。
                </p>
                <p class="text-gray-600 leading-relaxed mb-6">
                    デザインと技術の力で、お客様のビジョンを実現し、ビジネスの成功に貢献することを使命としています。
                </p>
                <p class="text-gray-600 leading-relaxed">
                    常にお客様の視点に立ち、最適なソリューションを提供することで、社会に貢献してまいります。
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Company Info Section -->
<section class="py-24 bg-gray-50">
    <div class="max-w-4xl mx-auto px-8">
        <h2 class="text-3xl font-semibold text-gray-900 mb-12 text-center">企業情報</h2>

        <div class="bg-white rounded-2xl shadow-md overflow-hidden">
            <div class="divide-y divide-gray-200">
                <div class="grid md:grid-cols-3 py-6 px-8">
                    <dt class="text-sm text-gray-600 font-medium">会社名</dt>
                    <dd class="md:col-span-2 text-gray-900 mt-2 md:mt-0">
                        {{ $company['name'] }}<br>
                        <span class="text-sm text-gray-600">{{ $company['name_en'] }}</span>
                    </dd>
                </div>

                <div class="grid md:grid-cols-3 py-6 px-8">
                    <dt class="text-sm text-gray-600 font-medium">設立</dt>
                    <dd class="md:col-span-2 text-gray-900 mt-2 md:mt-0">{{ $company['established'] }}</dd>
                </div>

                <div class="grid md:grid-cols-3 py-6 px-8">
                    <dt class="text-sm text-gray-600 font-medium">代表取締役</dt>
                    <dd class="md:col-span-2 text-gray-900 mt-2 md:mt-0">{{ $company['ceo'] }}</dd>
                </div>

                <div class="grid md:grid-cols-3 py-6 px-8">
                    <dt class="text-sm text-gray-600 font-medium">資本金</dt>
                    <dd class="md:col-span-2 text-gray-900 mt-2 md:mt-0">{{ $company['capital'] }}</dd>
                </div>

                <div class="grid md:grid-cols-3 py-6 px-8">
                    <dt class="text-sm text-gray-600 font-medium">従業員数</dt>
                    <dd class="md:col-span-2 text-gray-900 mt-2 md:mt-0">{{ $company['employees'] }}</dd>
                </div>

                <div class="grid md:grid-cols-3 py-6 px-8">
                    <dt class="text-sm text-gray-600 font-medium">所在地</dt>
                    <dd class="md:col-span-2 text-gray-900 mt-2 md:mt-0">
                        〒{{ $company['postal_code'] }}<br>
                        {{ $company['address'] }}
                    </dd>
                </div>

                <div class="grid md:grid-cols-3 py-6 px-8">
                    <dt class="text-sm text-gray-600 font-medium">電話番号</dt>
                    <dd class="md:col-span-2 text-gray-900 mt-2 md:mt-0">{{ $company['phone'] }}</dd>
                </div>

                <div class="grid md:grid-cols-3 py-6 px-8">
                    <dt class="text-sm text-gray-600 font-medium">メールアドレス</dt>
                    <dd class="md:col-span-2 text-gray-900 mt-2 md:mt-0">{{ $company['email'] }}</dd>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Business Content Section -->
<section class="py-24 bg-white">
    <div class="max-w-4xl mx-auto px-8">
        <h2 class="text-3xl font-semibold text-gray-900 mb-12 text-center">事業内容</h2>

        <ul class="space-y-4 mb-16 bg-gray-50 p-8 rounded-2xl">
            @foreach($company['business'] as $business)
                <li class="flex items-start">
                    <span class="text-gray-400 mr-4 mt-1 text-xl">•</span>
                    <span class="text-gray-700">{{ $business }}</span>
                </li>
            @endforeach
        </ul>

        <div class="bg-gradient-to-br from-gray-900 to-gray-800 p-12 rounded-2xl shadow-xl">
            <h3 class="text-2xl font-semibold text-white mb-6 text-center">企業理念</h3>
            <p class="text-gray-100 leading-relaxed text-center">
                私たちは、最新のテクノロジーとクリエイティブな発想で、お客様のビジネスの成長をサポートします。<br>
                常にお客様の視点に立ち、最適なソリューションを提供することで、社会に貢献してまいります。
            </p>
        </div>
    </div>
</section>

<!-- Access Map Section -->
<section class="py-24 bg-gray-50">
    <div class="max-w-6xl mx-auto px-8">
        <h2 class="text-3xl font-semibold text-gray-900 mb-12 text-center">アクセス</h2>

        <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
            <div class="h-96">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3240.8274789816973!2d139.7638467!3d35.6812405!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x60188bfbd89f700b%3A0x277c49ba34ed38!2z5p2x5Lqs6aeF!5e0!3m2!1sja!2sjp!4v1234567890"
                    width="100%"
                    height="100%"
                    style="border:0;"
                    allowfullscreen=""
                    loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>

            <div class="p-8 bg-white border-t border-gray-100">
                <h3 class="font-semibold text-gray-900 mb-4 text-center">電車でのアクセス</h3>
                <ul class="text-gray-700 text-sm space-y-2 text-center">
                    <li>JR「東京駅」丸の内南口より徒歩3分</li>
                    <li>東京メトロ丸ノ内線「東京駅」より徒歩1分</li>
                    <li>東京メトロ千代田線「二重橋前駅」より徒歩5分</li>
                </ul>
            </div>
        </div>
    </div>
</section>
@endsection
