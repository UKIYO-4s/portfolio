@extends('layouts.app')

@section('title', 'ダウンロード - ' . $product->name)

@section('content')
<div class="py-24 px-6 sm:px-8 lg:px-12 max-w-3xl mx-auto">
    <div class="text-center mb-12">
        <div class="mb-6">
            <div class="inline-flex items-center gap-2 px-3 py-1 bg-purple-900/30 border border-purple-700 rounded-full text-purple-400 text-sm mb-4">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"></path>
                </svg>
                開発者向けダウンロード
            </div>
        </div>
        <h1 class="text-4xl font-semibold tracking-normal font-display mb-4">{{ $product->name }}</h1>

        {{-- バージョン情報 --}}
        <div class="mt-4 text-sm text-gray-500">
            <span class="inline-flex items-center gap-2 px-3 py-1 bg-gray-800 rounded-full">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                </svg>
                Version {{ $versionInfo['version'] }}
                @if($versionInfo['releaseDate'])
                    <span class="text-gray-600">|</span>
                    {{ $versionInfo['releaseDate']->format('Y/m/d') }}
                @endif
            </span>
        </div>
    </div>

    <div class="bg-gray-900/50 border border-gray-800 p-8 mb-8">
        <h2 class="text-xl font-light mb-6 text-center">お使いのMacを選択してください</h2>

        <div class="grid md:grid-cols-2 gap-6">
            <!-- Apple Silicon -->
            <a href="{{ request()->fullUrlWithQuery(['type' => 'arm64']) }}"
               class="block p-6 bg-gray-800 hover:bg-gray-700 border border-gray-700 hover:border-blue-500 transition-all group">
                <div class="text-center">
                    <div class="mb-4">
                        <svg class="w-12 h-12 mx-auto text-gray-400 group-hover:text-blue-400 transition-colors" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M18.71 19.5c-.83 1.24-1.71 2.45-3.05 2.47-1.34.03-1.77-.79-3.29-.79-1.53 0-2 .77-3.27.82-1.31.05-2.3-1.32-3.14-2.53C4.25 17 2.94 12.45 4.7 9.39c.87-1.52 2.43-2.48 4.12-2.51 1.28-.02 2.5.87 3.29.87.78 0 2.26-1.07 3.81-.91.65.03 2.47.26 3.64 1.98-.09.06-2.17 1.28-2.15 3.81.03 3.02 2.65 4.03 2.68 4.04-.03.07-.42 1.44-1.38 2.83M13 3.5c.73-.83 1.94-1.46 2.94-1.5.13 1.17-.34 2.35-1.04 3.19-.69.85-1.83 1.51-2.95 1.42-.15-1.15.41-2.35 1.05-3.11z"/>
                        </svg>
                    </div>
                    <h3 class="text-lg font-medium mb-2">Apple Silicon</h3>
                    <p class="text-sm text-gray-400 mb-3">M1 / M2 / M3 / M4 チップ搭載Mac</p>
                    <div class="text-xs text-gray-500">
                        @if(isset($versionInfo['files']['arm64']))
                            {{ $versionInfo['files']['arm64']['filename'] }}<br>
                            <span class="text-gray-400">{{ number_format($versionInfo['files']['arm64']['size'] / 1024 / 1024, 0) }} MB</span>
                        @endif
                    </div>
                </div>
            </a>

            <!-- Intel -->
            <a href="{{ request()->fullUrlWithQuery(['type' => 'x64']) }}"
               class="block p-6 bg-gray-800 hover:bg-gray-700 border border-gray-700 hover:border-blue-500 transition-all group">
                <div class="text-center">
                    <div class="mb-4">
                        <svg class="w-12 h-12 mx-auto text-gray-400 group-hover:text-blue-400 transition-colors" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M18.71 19.5c-.83 1.24-1.71 2.45-3.05 2.47-1.34.03-1.77-.79-3.29-.79-1.53 0-2 .77-3.27.82-1.31.05-2.3-1.32-3.14-2.53C4.25 17 2.94 12.45 4.7 9.39c.87-1.52 2.43-2.48 4.12-2.51 1.28-.02 2.5.87 3.29.87.78 0 2.26-1.07 3.81-.91.65.03 2.47.26 3.64 1.98-.09.06-2.17 1.28-2.15 3.81.03 3.02 2.65 4.03 2.68 4.04-.03.07-.42 1.44-1.38 2.83M13 3.5c.73-.83 1.94-1.46 2.94-1.5.13 1.17-.34 2.35-1.04 3.19-.69.85-1.83 1.51-2.95 1.42-.15-1.15.41-2.35 1.05-3.11z"/>
                        </svg>
                    </div>
                    <h3 class="text-lg font-medium mb-2">Intel Mac</h3>
                    <p class="text-sm text-gray-400 mb-3">Intel プロセッサ搭載Mac</p>
                    <div class="text-xs text-gray-500">
                        @if(isset($versionInfo['files']['x64']))
                            {{ $versionInfo['files']['x64']['filename'] }}<br>
                            <span class="text-gray-400">{{ number_format($versionInfo['files']['x64']['size'] / 1024 / 1024, 0) }} MB</span>
                        @endif
                    </div>
                </div>
            </a>
        </div>
    </div>

    {{-- macOS セキュリティ警告について --}}
    <div class="bg-yellow-900/20 border border-yellow-700 p-6 mb-8">
        <div class="flex items-start gap-4">
            <div class="flex-shrink-0">
                <svg class="w-6 h-6 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                </svg>
            </div>
            <div>
                <h3 class="font-medium text-yellow-400 mb-2">アプリの起動方法（重要）</h3>
                <p class="text-sm text-gray-300 mb-3">
                    このアプリはAppleの公証を受けていないため、<strong class="text-white">ダブルクリックでは起動できません。</strong>
                </p>
                <div class="text-sm text-gray-300 space-y-2">
                    <p class="font-medium text-white">起動手順：</p>
                    <ol class="list-decimal list-inside space-y-1 ml-2">
                        <li>ダウンロードした<code class="bg-gray-800 px-1 rounded">.dmg</code>ファイルを開く</li>
                        <li>アプリを<code class="bg-gray-800 px-1 rounded">Applications</code>フォルダにドラッグ</li>
                        <li>Applicationsフォルダ内のアプリを<strong class="text-yellow-400">右クリック</strong>（またはControl+クリック）</li>
                        <li>メニューから「<strong class="text-white">開く</strong>」を選択</li>
                        <li>確認ダイアログが表示されたら「<strong class="text-white">開く</strong>」をクリック</li>
                    </ol>
                    <p class="text-gray-400 mt-3 text-xs">
                        ※ 初回起動時のみこの手順が必要です。2回目以降は通常通りダブルクリックで起動できます。
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-blue-900/20 border border-blue-800 p-6 mb-8">
        <h3 class="font-medium mb-3">Macの種類の確認方法</h3>
        <ol class="text-sm text-gray-300 space-y-2">
            <li>1. 画面左上のAppleメニュー  をクリック</li>
            <li>2. 「このMacについて」を選択</li>
            <li>3. 「チップ」または「プロセッサ」を確認
                <ul class="ml-4 mt-1 text-gray-400">
                    <li>- 「Apple M1」「Apple M2」など → <strong class="text-white">Apple Silicon</strong></li>
                    <li>- 「Intel Core」など → <strong class="text-white">Intel Mac</strong></li>
                </ul>
            </li>
        </ol>
    </div>

    {{-- 利用規約・法的警告 --}}
    <div class="mt-8 p-5 bg-red-900/20 border border-red-800 rounded">
        <div class="flex items-start gap-3">
            <svg class="w-5 h-5 text-red-500 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
            </svg>
            <div class="text-sm">
                <p class="font-medium text-red-400 mb-2">ご利用にあたっての注意事項</p>
                <ul class="text-gray-300 space-y-1">
                    <li>・本ソフトウェアは開発・テスト目的でのみご利用いただけます</li>
                    <li>・ダウンロードリンクの第三者への共有・転載は固く禁止されています</li>
                    <li>・本ソフトウェアの無断複製・再配布・転売は著作権法により禁止されています</li>
                </ul>
                <p class="mt-3 text-red-400 font-medium">
                    上記に違反した場合、法的措置を講じる場合があります。
                </p>
            </div>
        </div>
    </div>

    <div class="mt-8 text-center">
        <p class="text-sm text-gray-500 mb-4">ご不明な点がございましたら、お気軽にお問い合わせください。</p>
        <a href="mailto:support@sd-create.jp" class="text-blue-400 hover:underline text-sm">support@sd-create.jp</a>
    </div>
</div>
@endsection
