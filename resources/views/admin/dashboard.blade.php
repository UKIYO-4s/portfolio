@extends('admin.layouts.app')

@section('title', 'ダッシュボード - 管理画面')

@section('content')
<div>
    <h1 class="text-4xl font-semibold tracking-normal font-display mb-12" data-ja="ダッシュボード" data-en="Dashboard">ダッシュボード</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-12">
        <div class="bg-gray-900 border border-gray-800 p-6">
            <div class="text-gray-400 text-sm mb-2" data-ja="写真" data-en="Photos">写真</div>
            <div class="text-3xl font-light">{{ $stats['photos'] }}</div>
        </div>

        <div class="bg-gray-900 border border-gray-800 p-6">
            <div class="text-gray-400 text-sm mb-2" data-ja="商品" data-en="Products">商品</div>
            <div class="text-3xl font-light">{{ $stats['products'] }}</div>
        </div>

        <div class="bg-gray-900 border border-gray-800 p-6">
            <div class="text-gray-400 text-sm mb-2" data-ja="注文" data-en="Orders">注文</div>
            <div class="text-3xl font-light">{{ $stats['orders'] }}</div>
        </div>

        <div class="bg-gray-900 border border-gray-800 p-6">
            <div class="text-gray-400 text-sm mb-2" data-ja="売上" data-en="Revenue">売上</div>
            <div class="text-3xl font-light">¥{{ number_format($stats['total_revenue'], 0) }}</div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        <div>
            <h2 class="text-2xl font-medium font-display mb-6" data-ja="クイックアクション" data-en="Quick Actions">クイックアクション</h2>
            <div class="space-y-4">
                <a href="{{ route('admin.photos.create') }}" class="block bg-gray-900 border border-gray-800 p-4 hover:border-gray-600 transition-colors">
                    <div class="font-light" data-ja="写真をアップロード" data-en="Upload Photos">写真をアップロード</div>
                    <div class="text-sm text-gray-400 mt-1" data-ja="ギャラリーに新しい写真を追加" data-en="Add new photos to gallery">ギャラリーに新しい写真を追加</div>
                </a>
                <a href="{{ route('admin.products.create') }}" class="block bg-gray-900 border border-gray-800 p-4 hover:border-gray-600 transition-colors">
                    <div class="font-light" data-ja="新規商品を追加" data-en="Add New Product">新規商品を追加</div>
                    <div class="text-sm text-gray-400 mt-1" data-ja="新しいデジタル商品を作成" data-en="Create a new digital product">新しいデジタル商品を作成</div>
                </a>
            </div>
        </div>

        <div>
            <h2 class="text-2xl font-medium font-display mb-6" data-ja="最近の注文" data-en="Recent Orders">最近の注文</h2>
            @if($recentOrders->count() > 0)
                <div class="bg-gray-900 border border-gray-800">
                    @foreach($recentOrders as $order)
                        <a href="{{ route('admin.orders.show', $order) }}" class="block p-4 border-b border-gray-800 last:border-b-0 hover:bg-gray-800 transition-colors">
                            <div class="flex justify-between items-start mb-2">
                                <div class="font-mono text-sm">{{ $order->order_number }}</div>
                                <div class="text-sm">¥{{ number_format($order->total_amount, 0) }}</div>
                            </div>
                            <div class="text-sm text-gray-400">{{ $order->customer_name }}</div>
                            <div class="flex justify-between items-center mt-2">
                                <span class="text-xs px-2 py-1 {{ $order->payment_status === 'paid' ? 'bg-green-900/30 text-green-400' : 'bg-gray-800 text-gray-400' }}">
                                    {{ $order->payment_status === 'paid' ? '支払い済み' : $order->payment_status }}
                                </span>
                                <div class="text-xs text-gray-500">{{ $order->created_at->diffForHumans() }}</div>
                            </div>
                        </a>
                    @endforeach
                </div>
            @else
                <div class="bg-gray-900 border border-gray-800 p-8 text-center text-gray-400" data-ja="まだ注文がありません" data-en="No orders yet">
                    まだ注文がありません
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
