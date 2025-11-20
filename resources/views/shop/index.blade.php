@extends('layouts.app')

@section('title', 'Shop - Digital Products')

@section('content')
<div class="py-24 px-6 sm:px-8 lg:px-12 max-w-7xl mx-auto">
    <div class="mb-16">
        <h1 class="text-5xl md:text-6xl font-thin tracking-wide mb-6">Shop</h1>
        <p class="text-xl text-gray-400 font-light max-w-2xl">
            Digital products, resources, and creative tools.
        </p>
    </div>

    @if(session('success'))
        <div class="mb-8 p-4 bg-green-900/20 border border-green-800 text-green-400">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="mb-8 p-4 bg-red-900/20 border border-red-800 text-red-400">
            {{ session('error') }}
        </div>
    @endif

    @if($products->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-4xl mx-auto">
            @foreach($products as $product)
            <div class="group max-w-xs mx-auto">
                <a href="{{ route('shop.show', $product) }}" class="block">
                    <div class="aspect-square bg-gray-900 mb-4 overflow-hidden w-48 mx-auto">
                        @if($product->image)
                            <img src="{{ asset('storage/' . $product->image) }}"
                                 alt="{{ $product->name }}"
                                 class="w-full h-full object-cover grayscale group-hover:grayscale-0 group-hover:scale-105 transition-all duration-500">
                        @else
                            <div class="w-full h-full flex items-center justify-center text-gray-600">
                                <svg class="w-16 h-16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01"></path>
                                </svg>
                            </div>
                        @endif
                    </div>

                    <h2 class="text-2xl font-light mb-3 group-hover:text-gray-400 transition-colors">
                        {{ $product->name }}
                    </h2>
                    <p class="text-gray-400 font-light mb-4 line-clamp-2">
                        {{ $product->description }}
                    </p>
                </a>

                <div class="flex items-center justify-between">
                    <span class="text-2xl font-light">¥{{ number_format($product->price, 0) }}</span>
                    <form action="{{ route('cart.add', $product) }}" method="POST">
                        @csrf
                        <button type="submit"
                                class="px-6 py-2 bg-[#1e3a5f] text-white hover:bg-[#2a4a73] transition-colors text-sm tracking-wider">
                            Add to Cart
                        </button>
                    </form>
                </div>
            </div>
            @endforeach
        </div>
    @else
        <div class="text-center py-24">
            <p class="text-gray-400 text-lg">No products available at the moment.</p>
        </div>
    @endif
</div>
@endsection
