@extends('admin.layouts.app')

@section('title', '設定 - 管理画面')

@section('content')
<div>
    <h1 class="text-4xl font-semibold tracking-normal font-display mb-12">設定</h1>

    <div class="max-w-2xl">
        {{-- パスワード変更 --}}
        <div class="bg-gray-900 border border-gray-800 p-8">
            <h2 class="text-2xl font-medium mb-6">パスワード変更</h2>

            @if(session('success'))
                <div class="mb-6 p-4 bg-green-900/30 border border-green-700 text-green-400">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('admin.password.update') }}" method="POST" class="space-y-6">
                @csrf

                <div>
                    <label for="current_password" class="block text-sm text-gray-400 mb-2">現在のパスワード</label>
                    <input type="password"
                           name="current_password"
                           id="current_password"
                           class="w-full px-4 py-3 bg-gray-800 border border-gray-700 focus:border-blue-500 focus:outline-none text-white"
                           required>
                    @error('current_password')
                        <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="new_password" class="block text-sm text-gray-400 mb-2">新しいパスワード</label>
                    <input type="password"
                           name="new_password"
                           id="new_password"
                           class="w-full px-4 py-3 bg-gray-800 border border-gray-700 focus:border-blue-500 focus:outline-none text-white"
                           required
                           minlength="8">
                    @error('new_password')
                        <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                    @enderror
                    <p class="mt-1 text-xs text-gray-500">8文字以上で入力してください</p>
                </div>

                <div>
                    <label for="new_password_confirmation" class="block text-sm text-gray-400 mb-2">新しいパスワード（確認）</label>
                    <input type="password"
                           name="new_password_confirmation"
                           id="new_password_confirmation"
                           class="w-full px-4 py-3 bg-gray-800 border border-gray-700 focus:border-blue-500 focus:outline-none text-white"
                           required>
                </div>

                <div class="pt-4">
                    <button type="submit"
                            class="px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white transition-colors">
                        パスワードを変更
                    </button>
                </div>
            </form>
        </div>

        {{-- アカウント情報 --}}
        <div class="mt-8 bg-gray-900 border border-gray-800 p-8">
            <h2 class="text-2xl font-medium mb-6">アカウント情報</h2>
            <div class="space-y-4 text-sm">
                <div class="flex justify-between py-2 border-b border-gray-800">
                    <span class="text-gray-400">メールアドレス</span>
                    <span>{{ Auth::user()->email }}</span>
                </div>
                <div class="flex justify-between py-2 border-b border-gray-800">
                    <span class="text-gray-400">ユーザー名</span>
                    <span>{{ Auth::user()->name }}</span>
                </div>
                <div class="flex justify-between py-2">
                    <span class="text-gray-400">作成日</span>
                    <span>{{ Auth::user()->created_at->format('Y年m月d日') }}</span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
