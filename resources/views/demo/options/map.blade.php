<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Google Map埋め込みデモ - オプション機能</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * { font-family: 'Noto Sans JP', sans-serif; }
    </style>
</head>
<body class="bg-gray-50 min-h-screen">
    <!-- Header -->
    <header class="bg-white border-b border-gray-200 sticky top-0 z-40">
        <div class="max-w-6xl mx-auto px-6 md:px-8 py-4 flex justify-between items-center">
            <h1 class="text-xl font-bold text-gray-800">Google Map埋め込みデモ</h1>
            <a href="{{ route('projects.index') }}" class="text-sm text-gray-500 hover:text-gray-800 flex items-center gap-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                料金表に戻る
            </a>
        </div>
    </header>

    <main class="max-w-6xl mx-auto px-6 md:px-8 py-12">
        <!-- Intro -->
        <div class="text-center mb-16">
            <div class="inline-flex items-center px-3 py-1 text-xs rounded-full bg-green-100 text-green-700 mb-4">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                </svg>
                Location
            </div>
            <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">Google Map埋め込み</h2>
            <p class="text-gray-600 max-w-2xl mx-auto text-lg">
                店舗やオフィスの位置情報を地図で表示。<br>
                お客様が迷わず訪問できるようにサポートします。
            </p>
        </div>

        <!-- Size Samples -->
        <div class="mb-20">
            <h3 class="text-2xl font-bold text-gray-800 mb-8 text-center">サイズサンプル</h3>

            <div class="space-y-8">
                <!-- Small -->
                <div class="flex flex-col items-center">
                    <div class="flex items-center gap-3 mb-3">
                        <span class="inline-flex items-center px-3 py-1 text-xs rounded-full bg-gray-200 text-gray-700">Small</span>
                        <span class="text-sm text-gray-500">300 x 200px - サイドバー・フッター向け</span>
                    </div>
                    <div class="rounded-xl overflow-hidden shadow-sm border border-gray-200">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3241.7477983421797!2d139.6917066!3d35.6594945!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x60188b857628235d%3A0xcdd8aef709a2b520!2z5riL6LC36aeF!5e0!3m2!1sja!2sjp!4v1700000000000!5m2!1sja!2sjp"
                            width="300"
                            height="200"
                            style="border:0;"
                            allowfullscreen=""
                            loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>
                </div>

                <!-- Medium -->
                <div class="flex flex-col items-center">
                    <div class="flex items-center gap-3 mb-3">
                        <span class="inline-flex items-center px-3 py-1 text-xs rounded-full bg-blue-100 text-blue-700">Medium</span>
                        <span class="text-sm text-gray-500">500 x 300px - コンテンツ内埋め込み向け</span>
                    </div>
                    <div class="rounded-xl overflow-hidden shadow-sm border border-gray-200">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3241.7477983421797!2d139.6917066!3d35.6594945!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x60188b857628235d%3A0xcdd8aef709a2b520!2z5riL6LC36aeF!5e0!3m2!1sja!2sjp!4v1700000000000!5m2!1sja!2sjp"
                            width="500"
                            height="300"
                            style="border:0;"
                            allowfullscreen=""
                            loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>
                </div>

                <!-- Large -->
                <div class="flex flex-col items-center">
                    <div class="flex items-center gap-3 mb-3">
                        <span class="inline-flex items-center px-3 py-1 text-xs rounded-full bg-purple-100 text-purple-700">Large</span>
                        <span class="text-sm text-gray-500">100% x 400px - アクセスページ・フルワイド表示向け</span>
                    </div>
                    <div class="w-full rounded-xl overflow-hidden shadow-sm border border-gray-200">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3241.7477983421797!2d139.6917066!3d35.6594945!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x60188b857628235d%3A0xcdd8aef709a2b520!2z5riL6LC36aeF!5e0!3m2!1sja!2sjp!4v1700000000000!5m2!1sja!2sjp"
                            width="100%"
                            height="400"
                            style="border:0;"
                            allowfullscreen=""
                            loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>
                </div>
            </div>
        </div>

        <!-- Color/Style Samples -->
        <div class="mb-20">
            <h3 class="text-2xl font-bold text-gray-800 mb-8 text-center">スタイルサンプル</h3>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-8">
                <!-- Default Style -->
                <div class="h-full flex flex-col rounded-2xl border border-gray-200 shadow-sm bg-white overflow-hidden">
                    <div class="p-6 md:p-7 flex flex-col flex-1">
                        <div class="flex items-center gap-3 mb-3">
                            <span class="inline-flex items-center px-3 py-1 text-xs rounded-full bg-gray-100 text-gray-700">デフォルト</span>
                        </div>
                        <p class="text-sm text-gray-500 mb-4">Google Maps標準スタイル</p>
                        <div class="mt-auto">
                            <div class="aspect-[4/3] w-full rounded-xl overflow-hidden">
                                <iframe
                                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3241.7477983421797!2d139.6917066!3d35.6594945!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x60188b857628235d%3A0xcdd8aef709a2b520!2z5riL6LC36aeF!5e0!3m2!1sja!2sjp!4v1700000000000!5m2!1sja!2sjp"
                                    width="100%"
                                    height="100%"
                                    style="border:0;"
                                    allowfullscreen=""
                                    loading="lazy"
                                    referrerpolicy="no-referrer-when-downgrade"
                                    class="w-full h-full object-cover">
                                </iframe>
                            </div>
                            <!-- Spacer to match info card height -->
                            <div class="mt-4 p-4 bg-gray-50 rounded-xl space-y-2">
                                <p class="font-medium text-gray-800 text-sm">シンプルな標準表示</p>
                                <p class="text-xs text-gray-500">装飾を抑えたベーシックなスタイル</p>
                                <p class="text-xs text-gray-500">どんなサイトにも馴染みます</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- With Card Info -->
                <div class="h-full flex flex-col rounded-2xl border border-gray-200 shadow-sm bg-white overflow-hidden">
                    <div class="p-6 md:p-7 flex flex-col flex-1">
                        <div class="flex items-center gap-3 mb-3">
                            <span class="inline-flex items-center px-3 py-1 text-xs rounded-full bg-blue-100 text-blue-700">情報カード付き</span>
                        </div>
                        <p class="text-sm text-gray-500 mb-4">住所・電話番号を併記</p>
                        <div class="mt-auto">
                            <div class="aspect-[4/3] w-full rounded-xl overflow-hidden">
                                <iframe
                                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3241.7477983421797!2d139.6917066!3d35.6594945!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x60188b857628235d%3A0xcdd8aef709a2b520!2z5riL6LC36aeF!5e0!3m2!1sja!2sjp!4v1700000000000!5m2!1sja!2sjp"
                                    width="100%"
                                    height="100%"
                                    style="border:0;"
                                    allowfullscreen=""
                                    loading="lazy"
                                    referrerpolicy="no-referrer-when-downgrade"
                                    class="w-full h-full object-cover">
                                </iframe>
                            </div>
                            <div class="mt-4 p-4 bg-gray-50 rounded-xl space-y-2">
                                <p class="font-medium text-gray-800 text-sm">サンプル株式会社</p>
                                <p class="text-xs text-gray-500">〒150-0002 東京都渋谷区渋谷1-1-1</p>
                                <p class="text-xs text-gray-500">TEL: 03-1234-5678</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Dark Frame -->
                <div class="h-full flex flex-col rounded-2xl border border-gray-200 shadow-sm bg-gray-900 overflow-hidden">
                    <div class="p-6 md:p-7 flex flex-col flex-1">
                        <div class="flex items-center gap-3 mb-3">
                            <span class="inline-flex items-center px-3 py-1 text-xs rounded-full bg-gray-700 text-gray-200">ダークフレーム</span>
                        </div>
                        <p class="text-sm text-gray-400 mb-4">ダークテーマサイト向け</p>
                        <div class="mt-auto">
                            <div class="aspect-[4/3] w-full rounded-xl overflow-hidden">
                                <iframe
                                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3241.7477983421797!2d139.6917066!3d35.6594945!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x60188b857628235d%3A0xcdd8aef709a2b520!2z5riL6LC36aeF!5e0!3m2!1sja!2sjp!4v1700000000000!5m2!1sja!2sjp"
                                    width="100%"
                                    height="100%"
                                    style="border:0;"
                                    allowfullscreen=""
                                    loading="lazy"
                                    referrerpolicy="no-referrer-when-downgrade"
                                    class="w-full h-full object-cover">
                                </iframe>
                            </div>
                            <!-- Spacer to match info card height -->
                            <div class="mt-4 p-4 bg-gray-800 rounded-xl space-y-2">
                                <p class="font-medium text-gray-200 text-sm">ダークモード対応</p>
                                <p class="text-xs text-gray-400">黒背景のサイトに最適なフレーム</p>
                                <p class="text-xs text-gray-400">高級感・モダン感を演出</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Gradient Border -->
                <div class="h-full flex flex-col rounded-2xl border border-gray-200 shadow-sm overflow-hidden" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); padding: 3px;">
                    <div class="bg-white rounded-xl flex flex-col flex-1 overflow-hidden">
                        <div class="p-6 md:p-7 flex flex-col flex-1">
                            <div class="flex items-center gap-3 mb-3">
                                <span class="inline-flex items-center px-3 py-1 text-xs rounded-full bg-gradient-to-r from-indigo-500 to-purple-500 text-white">グラデーションボーダー</span>
                            </div>
                            <p class="text-sm text-gray-500 mb-4">モダンなアクセント</p>
                            <div class="mt-auto">
                                <div class="aspect-[4/3] w-full rounded-xl overflow-hidden">
                                    <iframe
                                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3241.7477983421797!2d139.6917066!3d35.6594945!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x60188b857628235d%3A0xcdd8aef709a2b520!2z5riL6LC36aeF!5e0!3m2!1sja!2sjp!4v1700000000000!5m2!1sja!2sjp"
                                        width="100%"
                                        height="100%"
                                        style="border:0;"
                                        allowfullscreen=""
                                        loading="lazy"
                                        referrerpolicy="no-referrer-when-downgrade"
                                        class="w-full h-full object-cover">
                                    </iframe>
                                </div>
                                <div class="mt-4 p-4 bg-gray-50 rounded-xl space-y-2">
                                    <p class="font-medium text-gray-800 text-sm">トレンド感のある装飾</p>
                                    <p class="text-xs text-gray-500">ブランドカラーに合わせてカスタム可能</p>
                                    <p class="text-xs text-gray-500">目を引くアクセントに</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Rounded Shadow -->
                <div class="h-full flex flex-col rounded-2xl border border-gray-200 shadow-sm bg-white overflow-hidden">
                    <div class="p-6 md:p-7 flex flex-col flex-1">
                        <div class="flex items-center gap-3 mb-3">
                            <span class="inline-flex items-center px-3 py-1 text-xs rounded-full bg-green-100 text-green-700">角丸シャドウ</span>
                        </div>
                        <p class="text-sm text-gray-500 mb-4">柔らかい印象のデザイン</p>
                        <div class="mt-auto">
                            <div class="aspect-[4/3] w-full rounded-xl overflow-hidden shadow-lg">
                                <iframe
                                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3241.7477983421797!2d139.6917066!3d35.6594945!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x60188b857628235d%3A0xcdd8aef709a2b520!2z5riL6LC36aeF!5e0!3m2!1sja!2sjp!4v1700000000000!5m2!1sja!2sjp"
                                    width="100%"
                                    height="100%"
                                    style="border:0;"
                                    allowfullscreen=""
                                    loading="lazy"
                                    referrerpolicy="no-referrer-when-downgrade"
                                    class="w-full h-full object-cover">
                                </iframe>
                            </div>
                            <div class="mt-4 p-4 bg-gray-50 rounded-xl space-y-2">
                                <p class="font-medium text-gray-800 text-sm">親しみやすいデザイン</p>
                                <p class="text-xs text-gray-500">丸みのある角で優しい印象</p>
                                <p class="text-xs text-gray-500">カフェ・サロン等に人気</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Minimal -->
                <div class="h-full flex flex-col rounded-2xl border border-gray-200 shadow-sm bg-white overflow-hidden">
                    <div class="p-6 md:p-7 flex flex-col flex-1">
                        <div class="flex items-center gap-3 mb-3">
                            <span class="inline-flex items-center px-3 py-1 text-xs rounded-full bg-gray-100 text-gray-700">ミニマル</span>
                        </div>
                        <p class="text-sm text-gray-500 mb-4">装飾なし・シンプル</p>
                        <div class="mt-auto">
                            <div class="aspect-[4/3] w-full overflow-hidden">
                                <iframe
                                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3241.7477983421797!2d139.6917066!3d35.6594945!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x60188b857628235d%3A0xcdd8aef709a2b520!2z5riL6LC36aeF!5e0!3m2!1sja!2sjp!4v1700000000000!5m2!1sja!2sjp"
                                    width="100%"
                                    height="100%"
                                    style="border:0;"
                                    allowfullscreen=""
                                    loading="lazy"
                                    referrerpolicy="no-referrer-when-downgrade"
                                    class="w-full h-full object-cover">
                                </iframe>
                            </div>
                            <div class="mt-4 p-4 bg-gray-50 rounded-xl space-y-2">
                                <p class="font-medium text-gray-800 text-sm">究極のシンプル</p>
                                <p class="text-xs text-gray-500">余計な装飾を排除</p>
                                <p class="text-xs text-gray-500">コンテンツに集中させる</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Use Cases -->
        <div class="mb-16">
            <h3 class="text-2xl font-bold text-gray-800 mb-8 text-center">活用シーン</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-8">
                <div class="h-full flex flex-col rounded-2xl border border-gray-200 shadow-sm bg-white overflow-hidden">
                    <div class="p-6 md:p-7 flex flex-col flex-1">
                        <div class="flex items-center gap-3 mb-3">
                            <div class="w-10 h-10 bg-blue-100 rounded-xl flex items-center justify-center flex-shrink-0">
                                <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                </svg>
                            </div>
                            <h4 class="font-bold text-gray-800">店舗案内</h4>
                        </div>
                        <p class="text-sm text-gray-600 mb-4">実店舗への来店を促進。最寄り駅からのルートも表示可能</p>
                    </div>
                </div>
                <div class="h-full flex flex-col rounded-2xl border border-gray-200 shadow-sm bg-white overflow-hidden">
                    <div class="p-6 md:p-7 flex flex-col flex-1">
                        <div class="flex items-center gap-3 mb-3">
                            <div class="w-10 h-10 bg-green-100 rounded-xl flex items-center justify-center flex-shrink-0">
                                <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                            <h4 class="font-bold text-gray-800">オフィス所在地</h4>
                        </div>
                        <p class="text-sm text-gray-600 mb-4">会社概要ページに配置。取引先への信頼感向上</p>
                    </div>
                </div>
                <div class="h-full flex flex-col rounded-2xl border border-gray-200 shadow-sm bg-white overflow-hidden">
                    <div class="p-6 md:p-7 flex flex-col flex-1">
                        <div class="flex items-center gap-3 mb-3">
                            <div class="w-10 h-10 bg-purple-100 rounded-xl flex items-center justify-center flex-shrink-0">
                                <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                            <h4 class="font-bold text-gray-800">イベント会場</h4>
                        </div>
                        <p class="text-sm text-gray-600 mb-4">セミナーや展示会の会場案内に。参加率向上</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Price -->
        <div class="rounded-2xl border border-gray-200 shadow-sm bg-green-50 p-6 md:p-7 text-center">
            <p class="text-green-800 font-bold text-2xl mb-3">1万円〜</p>
            <p class="text-green-600 text-sm mb-4">地図埋め込み＋住所情報表示</p>
            <p class="text-gray-500 text-xs">※複数店舗・カスタムスタイル対応は別途ご相談ください</p>
        </div>
    </main>
</body>
</html>
