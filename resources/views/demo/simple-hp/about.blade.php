@extends('demo.simple-hp.layouts.app')

@section('title', '会社概要')

@section('content')
<!-- Page Header -->
<section class="bg-gradient-to-r from-blue-600 to-blue-800 dark:from-blue-800 dark:to-blue-950 text-white py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-4xl font-bold text-center">会社概要</h1>
        <p class="text-center text-blue-100 mt-4">Company Profile</p>
    </div>
</section>

<!-- Company Info -->
<section class="py-16 bg-white dark:bg-gray-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid md:grid-cols-2 gap-12">
            <!-- Company Details -->
            <div>
                <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-6">企業情報</h2>
                <dl class="space-y-4">
                    <div class="border-b border-gray-200 dark:border-gray-700 pb-4">
                        <dt class="text-sm font-medium text-gray-500 dark:text-gray-400 mb-1">会社名</dt>
                        <dd class="text-gray-900 dark:text-white">{{ $company['name'] }}</dd>
                        <dd class="text-sm text-gray-600 dark:text-gray-400">{{ $company['name_en'] }}</dd>
                    </div>
                    <div class="border-b border-gray-200 dark:border-gray-700 pb-4">
                        <dt class="text-sm font-medium text-gray-500 dark:text-gray-400 mb-1">設立</dt>
                        <dd class="text-gray-900 dark:text-white">{{ $company['established'] }}</dd>
                    </div>
                    <div class="border-b border-gray-200 dark:border-gray-700 pb-4">
                        <dt class="text-sm font-medium text-gray-500 dark:text-gray-400 mb-1">資本金</dt>
                        <dd class="text-gray-900 dark:text-white">{{ $company['capital'] }}</dd>
                    </div>
                    <div class="border-b border-gray-200 dark:border-gray-700 pb-4">
                        <dt class="text-sm font-medium text-gray-500 dark:text-gray-400 mb-1">従業員数</dt>
                        <dd class="text-gray-900 dark:text-white">{{ $company['employees'] }}</dd>
                    </div>
                    <div class="border-b border-gray-200 dark:border-gray-700 pb-4">
                        <dt class="text-sm font-medium text-gray-500 dark:text-gray-400 mb-1">代表取締役</dt>
                        <dd class="text-gray-900 dark:text-white">{{ $company['ceo'] }}</dd>
                    </div>
                    <div class="border-b border-gray-200 dark:border-gray-700 pb-4">
                        <dt class="text-sm font-medium text-gray-500 dark:text-gray-400 mb-1">所在地</dt>
                        <dd class="text-gray-900 dark:text-white">
                            〒{{ $company['postal_code'] }}<br>
                            {{ $company['address'] }}
                        </dd>
                    </div>
                    <div class="border-b border-gray-200 dark:border-gray-700 pb-4">
                        <dt class="text-sm font-medium text-gray-500 dark:text-gray-400 mb-1">電話番号</dt>
                        <dd class="text-gray-900 dark:text-white">{{ $company['phone'] }}</dd>
                    </div>
                    <div class="pb-4">
                        <dt class="text-sm font-medium text-gray-500 dark:text-gray-400 mb-1">メールアドレス</dt>
                        <dd class="text-gray-900 dark:text-white">{{ $company['email'] }}</dd>
                    </div>
                </dl>
            </div>

            <!-- Business Content -->
            <div>
                <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-6">事業内容</h2>
                <ul class="space-y-3">
                    @foreach($company['business'] as $business)
                        <li class="flex items-start">
                            <svg class="w-6 h-6 text-blue-600 dark:text-blue-400 mr-3 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <span class="text-gray-700 dark:text-gray-300">{{ $business }}</span>
                        </li>
                    @endforeach
                </ul>

                <div class="mt-8 p-6 bg-blue-50 dark:bg-blue-900/20 rounded-lg">
                    <h3 class="font-semibold text-gray-900 dark:text-white mb-3">企業理念</h3>
                    <p class="text-gray-700 dark:text-gray-300 leading-relaxed">
                        私たちは、最新のテクノロジーとクリエイティブな発想で、お客様のビジネスの成長をサポートします。
                        常にお客様の視点に立ち、最適なソリューションを提供することで、社会に貢献してまいります。
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Access Map -->
<section class="py-16 bg-gray-50 dark:bg-gray-900">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-2xl font-bold text-gray-900 dark:text-white text-center mb-8">アクセス</h2>
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md overflow-hidden">
            <div class="aspect-w-16 aspect-h-9 h-96">
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
            <div class="p-6">
                <h3 class="font-semibold text-gray-900 dark:text-white mb-2">電車でのアクセス</h3>
                <ul class="text-gray-600 dark:text-gray-400 text-sm space-y-1">
                    <li>• JR「東京駅」丸の内南口より徒歩3分</li>
                    <li>• 東京メトロ丸ノ内線「東京駅」より徒歩1分</li>
                    <li>• 東京メトロ千代田線「二重橋前駅」より徒歩5分</li>
                </ul>
            </div>
        </div>
    </div>
</section>
@endsection
