@extends('layouts.app')

@section('title', 'Projects - Portfolio')

@section('content')
<div class="py-24 px-6 sm:px-8 lg:px-12 max-w-7xl mx-auto">
    <div class="mb-16">
        <h1 class="text-5xl md:text-6xl font-thin tracking-wide mb-6">Projects</h1>
        <p class="text-xl text-gray-400 font-light max-w-2xl">
            A collection of selected works spanning web development, design, and creative coding.
        </p>
    </div>

    @if($projects->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-4xl mx-auto">
            @foreach($projects as $project)
            <a href="{{ route('projects.show', $project) }}" class="group block max-w-xs mx-auto">
                <div class="aspect-square bg-gray-900 mb-4 overflow-hidden w-80 mx-auto">
                    @if($project->thumbnail)
                        <img src="{{ asset('storage/' . $project->thumbnail) }}"
                             alt="{{ $project->title }}"
                             class="w-full h-full object-cover group-hover:scale-105 transition-all duration-500">
                    @else
                        <div class="w-full h-full flex items-center justify-center text-gray-600">
                            <svg class="w-16 h-16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                    @endif
                </div>

                <div>
                    <h2 class="text-2xl font-light mb-3 group-hover:text-gray-400 transition-colors">
                        {{ $project->title }}
                    </h2>
                    <p class="text-gray-400 font-light mb-4 line-clamp-2">
                        {{ $project->description }}
                    </p>

                    @if($project->technologies)
                        <div class="flex flex-wrap gap-2">
                            @foreach($project->technologies as $tech)
                                <span class="text-xs px-3 py-1 border border-gray-700 text-gray-400">
                                    {{ $tech }}
                                </span>
                            @endforeach
                        </div>
                    @endif
                </div>
            </a>
            @endforeach
        </div>
    @else
        <div class="text-center py-24">
            <p class="text-gray-400 text-lg">No projects to display yet.</p>
        </div>
    @endif

    <!-- Pricing Section -->
    <div class="mt-32 border-t border-gray-800 pt-24">
        <div class="mb-16">
            <h2 class="text-4xl md:text-5xl font-thin tracking-wide mb-6">料金表 / Pricing</h2>
            <p class="text-lg text-gray-400 font-light max-w-2xl">
                各サービスの料金目安をご確認いただけます。詳細はお問い合わせください。
            </p>
        </div>

        <!-- Tab Navigation -->
        <div class="mb-12">
            <div class="flex flex-wrap gap-4 border-b border-gray-800">
                <button onclick="switchTab('homepage')"
                        id="tab-homepage"
                        class="tab-button px-6 py-4 text-sm font-light border-b-2 transition-colors hover:text-white active">
                    ホームページ制作
                </button>
                <button onclick="switchTab('system')"
                        id="tab-system"
                        class="tab-button px-6 py-4 text-sm font-light border-b-2 transition-colors hover:text-white">
                    システム開発
                </button>
                <button onclick="switchTab('sns')"
                        id="tab-sns"
                        class="tab-button px-6 py-4 text-sm font-light border-b-2 transition-colors hover:text-white">
                    SNS効率化ツール
                </button>
            </div>
        </div>

        <!-- Tab Content -->
        <div class="tab-content-container">
            <!-- Homepage Tab -->
            <div id="content-homepage" class="tab-content active">
                <!-- Plans Table -->
                <div class="mb-16">
                    <h3 class="text-2xl font-light mb-8 text-gray-300">プラン</h3>
                    <div class="overflow-x-auto">
                        <table class="w-full border border-gray-800">
                            <thead>
                                <tr class="border-b border-gray-800 bg-gray-900/50">
                                    <th class="px-6 py-4 text-left text-sm font-light text-gray-200">プラン名</th>
                                    <th class="px-6 py-4 text-left text-sm font-light text-gray-200">価格</th>
                                    <th class="px-6 py-4 text-left text-sm font-light text-gray-200">内容</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="border-b border-gray-800 hover:bg-gray-900/30 transition-colors cursor-pointer" onclick="window.location.href='{{ route('demo.simple-hp.index') }}'">
                                    <td class="px-6 py-4 text-sm font-light text-white">シンプルHP</td>
                                    <td class="px-6 py-4 text-sm font-light text-white">15万円〜20万円</td>
                                    <td class="px-6 py-4 text-sm font-light text-gray-100">3〜4ページ、レスポンシブ、問い合わせフォーム、基本SEO</td>
                                </tr>
                                <tr class="border-b border-gray-800 hover:bg-gray-900/30 transition-colors cursor-pointer" onclick="window.location.href='{{ route('demo.custom-hp.index') }}'">
                                    <td class="px-6 py-4 text-sm font-light text-white">カスタムデザインHP</td>
                                    <td class="px-6 py-4 text-sm font-light text-white">50万円〜</td>
                                    <td class="px-6 py-4 text-sm font-light text-gray-100">オリジナルデザイン、5〜10ページ、アニメーション</td>
                                </tr>
                                <tr class="border-b border-gray-800 hover:bg-gray-900/30 transition-colors cursor-pointer" onclick="window.location.href='{{ route('demo.full-custom.index') }}'">
                                    <td class="px-6 py-4 text-sm font-light text-white">フルカスタムHP</td>
                                    <td class="px-6 py-4 text-sm font-light text-white">80万円〜</td>
                                    <td class="px-6 py-4 text-sm font-light text-gray-100">カスタムデザイン＋システム機能</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Options Table -->
                <div>
                    <h3 class="text-2xl font-light mb-8 text-gray-300">オプション</h3>
                    <div class="overflow-x-auto">
                        <table class="w-full border border-gray-800">
                            <thead>
                                <tr class="border-b border-gray-800 bg-gray-900/50">
                                    <th class="px-6 py-4 text-left text-sm font-light text-gray-200">機能</th>
                                    <th class="px-6 py-4 text-left text-sm font-light text-gray-200">価格</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="border-b border-gray-800 hover:bg-gray-900/30 transition-colors">
                                    <td class="px-6 py-4 text-sm font-light text-white">SHOP機能（EC）</td>
                                    <td class="px-6 py-4 text-sm font-light text-white">15万円〜</td>
                                </tr>
                                <tr class="border-b border-gray-800 hover:bg-gray-900/30 transition-colors">
                                    <td class="px-6 py-4 text-sm font-light text-white">ダッシュボード</td>
                                    <td class="px-6 py-4 text-sm font-light text-white">10万円〜</td>
                                </tr>
                                <tr class="border-b border-gray-800 hover:bg-gray-900/30 transition-colors">
                                    <td class="px-6 py-4 text-sm font-light text-white">投稿機能</td>
                                    <td class="px-6 py-4 text-sm font-light text-white">8万円〜</td>
                                </tr>
                                <tr class="border-b border-gray-800 hover:bg-gray-900/30 transition-colors">
                                    <td class="px-6 py-4 text-sm font-light text-white">SNS連携</td>
                                    <td class="px-6 py-4 text-sm font-light text-white">3万円〜</td>
                                </tr>
                                <tr class="border-b border-gray-800 hover:bg-gray-900/30 transition-colors">
                                    <td class="px-6 py-4 text-sm font-light text-white">Google Map埋め込み</td>
                                    <td class="px-6 py-4 text-sm font-light text-white">1万円〜</td>
                                </tr>
                                <tr class="border-b border-gray-800 hover:bg-gray-900/30 transition-colors">
                                    <td class="px-6 py-4 text-sm font-light text-white">MEO対策</td>
                                    <td class="px-6 py-4 text-sm font-light text-white">15万円〜</td>
                                </tr>
                                <tr class="border-b border-gray-800 hover:bg-gray-900/30 transition-colors">
                                    <td class="px-6 py-4 text-sm font-light text-white">AIチャットBot</td>
                                    <td class="px-6 py-4 text-sm font-light text-white">80万円〜（時期未定）</td>
                                </tr>
                                <tr class="border-b border-gray-800 hover:bg-gray-900/30 transition-colors">
                                    <td class="px-6 py-4 text-sm font-light text-white">HP用素材撮影</td>
                                    <td class="px-6 py-4 text-sm font-light text-white">5万円/日（交通費別）</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- System Tab -->
            <div id="content-system" class="tab-content">
                <div class="overflow-x-auto">
                    <table class="w-full border border-gray-800">
                        <thead>
                            <tr class="border-b border-gray-800 bg-gray-900/50">
                                <th class="px-6 py-4 text-left text-sm font-light text-gray-200">システム</th>
                                <th class="px-6 py-4 text-left text-sm font-light text-gray-200">価格</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="border-b border-gray-800 hover:bg-gray-900/30 transition-colors cursor-pointer" onclick="window.open('https://kakeromamocca.com/transit/', '_blank')">
                                <td class="px-6 py-4 text-sm font-light text-white">
                                    <span class="inline-flex items-center gap-1">
                                        乗換案内システム
                                        <svg class="w-3 h-3 text-gray-300 inline-block" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                                        </svg>
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-sm font-light text-white">20万円</td>
                            </tr>
                            <tr class="border-b border-gray-800 hover:bg-gray-900/30 transition-colors cursor-pointer" onclick="alert('デモページは準備中です / Demo coming soon')">
                                <td class="px-6 py-4 text-sm font-light text-white">クラウドファンディング進捗報告アプリ</td>
                                <td class="px-6 py-4 text-sm font-light text-white">80万円</td>
                            </tr>
                            <tr class="border-b border-gray-800 hover:bg-gray-900/30 transition-colors cursor-pointer" onclick="window.location.href='{{ route('demo.invoice.login') }}'">
                                <td class="px-6 py-4 text-sm font-light text-white">請求書作成システム</td>
                                <td class="px-6 py-4 text-sm font-light text-white">30万円〜</td>
                            </tr>
                            <tr class="border-b border-gray-800 hover:bg-gray-900/30 transition-colors cursor-pointer" onclick="alert('デモページは準備中です / Demo coming soon')">
                                <td class="px-6 py-4 text-sm font-light text-white">営業先企業自動リサーチシステム</td>
                                <td class="px-6 py-4 text-sm font-light text-white">40万円〜</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- SNS Tab -->
            <div id="content-sns" class="tab-content">
                <div class="overflow-x-auto">
                    <table class="w-full border border-gray-800">
                        <thead>
                            <tr class="border-b border-gray-800 bg-gray-900/50">
                                <th class="px-6 py-4 text-left text-sm font-light text-gray-200">ツール</th>
                                <th class="px-6 py-4 text-left text-sm font-light text-gray-200">価格</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="border-b border-gray-800 hover:bg-gray-900/30 transition-colors cursor-pointer" onclick="alert('デモページは準備中です / Demo coming soon')">
                                <td class="px-6 py-4 text-sm font-light text-white">Instagram＆GMB投稿効率化アプリ</td>
                                <td class="px-6 py-4 text-sm font-light text-white">6万円</td>
                            </tr>
                            <tr class="border-b border-gray-800 hover:bg-gray-900/30 transition-colors cursor-pointer" onclick="alert('デモページは準備中です / Demo coming soon')">
                                <td class="px-6 py-4 text-sm font-light text-white">Instagram＆Shorts動画作成効率化アプリ</td>
                                <td class="px-6 py-4 text-sm font-light text-white">10万円</td>
                            </tr>
                            <tr class="border-b border-gray-800 hover:bg-gray-900/30 transition-colors cursor-pointer" onclick="alert('デモページは準備中です / Demo coming soon')">
                                <td class="px-6 py-4 text-sm font-light text-white">2つセット</td>
                                <td class="px-6 py-4 text-sm font-light text-white">13万円</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .tab-button {
        border-bottom-color: transparent;
        color: #d1d5db !important; /* gray-300 より明るく */
        font-weight: 400 !important;
    }

    .tab-button.active {
        border-bottom-color: white;
        color: #ffffff !important; /* 純粋な白 */
        font-weight: 500 !important;
    }

    .tab-content {
        display: none;
        opacity: 0;
        transition: opacity 0.3s ease-in-out;
    }

    .tab-content.active {
        display: block;
        animation: fadeIn 0.3s ease-in-out forwards;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(10px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* 料金表のテキスト視認性を強制的に改善 */
    .tab-content table thead th {
        color: #e5e7eb !important; /* gray-200 */
    }

    .tab-content table tbody td {
        color: #ffffff !important; /* pure white */
        -webkit-font-smoothing: antialiased !important;
        -moz-osx-font-smoothing: grayscale !important;
        font-weight: 400 !important; /* font-lightより太く */
    }

    .tab-content table tbody td:last-child {
        color: #ffffff !important; /* 価格列を確実に白に */
        font-weight: 500 !important; /* さらに太く */
    }

    /* 説明文の列だけ少し暗めに */
    .tab-content table tbody tr td:nth-child(3) {
        color: #f3f4f6 !important; /* gray-100 */
        font-weight: 400 !important;
    }

    /* 数字とアルファベットを強制的に明るく */
    .tab-content table tbody td * {
        color: inherit !important;
    }
</style>

<script>
    function switchTab(tabName) {
        // Remove active class from all tabs
        document.querySelectorAll('.tab-button').forEach(button => {
            button.classList.remove('active');
        });

        // Hide all content
        document.querySelectorAll('.tab-content').forEach(content => {
            content.classList.remove('active');
        });

        // Add active class to selected tab
        document.getElementById('tab-' + tabName).classList.add('active');
        document.getElementById('content-' + tabName).classList.add('active');
    }
</script>
@endsection
