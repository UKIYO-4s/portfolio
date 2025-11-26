@extends('demo.retro-terminal.layouts.app')

@section('title', 'Home')

@section('content')
<!-- Hero Section -->
<div class="flex items-center justify-center px-6 py-16 md:py-24">
    <div class="max-w-3xl mx-auto text-center">
        <!-- Terminal Icon -->
        <div class="mb-8 flex justify-center">
            <svg class="w-16 h-16 md:w-20 md:h-20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <rect x="2" y="3" width="20" height="14" rx="2" stroke-width="1.5"/>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M6 19h12"/>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 22h6"/>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M7 8l3 2-3 2"/>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 12h4"/>
            </svg>
        </div>

        <!-- Logo / Heading -->
        <h1 class="font-8bit text-2xl md:text-4xl lg:text-5xl tracking-wider text-glow mb-8 leading-relaxed">
            TERMINAL_
            <span class="cursor-blink">|</span>
        </h1>

        <!-- Subheading -->
        <p class="text-lg md:text-xl opacity-80 mb-4 max-w-xl mx-auto">
            Digital solutions for the modern era.
        </p>
        <p class="text-sm md:text-base opacity-60 mb-12 max-w-md mx-auto">
            Building interfaces that bridge the past and future.
        </p>

        <!-- CTA Buttons -->
        <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
            <a href="{{ route('demo.retro-terminal.contact') }}" class="btn-retro font-vt323 text-lg w-full sm:w-auto">
                GET STARTED
            </a>
            <a href="{{ route('demo.retro-terminal.about') }}" class="btn-retro font-vt323 text-lg w-full sm:w-auto opacity-70 hover:opacity-100">
                LEARN MORE
            </a>
        </div>

        <!-- Status line -->
        <div class="mt-16 flex items-center justify-center gap-2 text-xs opacity-50 font-8bit">
            <span class="w-2 h-2 bg-current rounded-full"></span>
            <span>SYSTEM ONLINE</span>
            <span class="mx-2">|</span>
            <span>v1.0.0</span>
        </div>
    </div>
</div>

<!-- Features Section -->
<div class="px-6 py-16 md:py-24 border-t border-[rgba(88,230,156,0.2)]">
    <div class="max-w-5xl mx-auto">
        <h2 class="font-8bit text-sm md:text-base text-center mb-12">WHAT_WE_DO</h2>
        <div class="grid md:grid-cols-3 gap-6">
            <div class="card-retro p-6 text-center">
                <svg class="w-10 h-10 mx-auto mb-4 opacity-70" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                </svg>
                <h3 class="font-vt323 text-xl mb-2">WEB DESIGN</h3>
                <p class="text-sm opacity-60">Custom designs with retro aesthetics</p>
            </div>
            <div class="card-retro p-6 text-center">
                <svg class="w-10 h-10 mx-auto mb-4 opacity-70" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"/>
                </svg>
                <h3 class="font-vt323 text-xl mb-2">DEVELOPMENT</h3>
                <p class="text-sm opacity-60">Modern tech, classic interface</p>
            </div>
            <div class="card-retro p-6 text-center">
                <svg class="w-10 h-10 mx-auto mb-4 opacity-70" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                </svg>
                <h3 class="font-vt323 text-xl mb-2">PERFORMANCE</h3>
                <p class="text-sm opacity-60">Fast, optimized experiences</p>
            </div>
        </div>
    </div>
</div>
@endsection
