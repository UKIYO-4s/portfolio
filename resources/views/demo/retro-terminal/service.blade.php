@extends('demo.retro-terminal.layouts.app')

@section('title', 'Services')

@section('content')
<div class="px-6 py-16 md:py-24">
    <div class="max-w-5xl mx-auto">
        <!-- Page Header -->
        <div class="text-center mb-16">
            <h1 class="font-8bit text-xl md:text-3xl tracking-wider text-glow mb-4">
                SERVICES_<span class="cursor-blink">|</span>
            </h1>
            <p class="text-lg opacity-70">What we can build for you</p>
        </div>

        <!-- Services Grid -->
        <div class="grid md:grid-cols-2 gap-6 mb-16">
            <!-- Service 1 -->
            <div class="card-retro p-8 group">
                <div class="flex items-center gap-4 mb-6">
                    <div class="w-12 h-12 flex items-center justify-center border border-current rounded opacity-70 group-hover:opacity-100 transition">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                    </div>
                    <h2 class="font-8bit text-xs md:text-sm">WEB_DESIGN</h2>
                </div>
                <p class="font-vt323 text-xl opacity-80 mb-4">
                    Custom website design with retro aesthetics and modern functionality.
                    Responsive layouts that work on all devices.
                </p>
                <ul class="space-y-2 text-sm opacity-60">
                    <li class="flex items-center gap-2">
                        <span class="w-1.5 h-1.5 bg-current rounded-full"></span>
                        Landing pages
                    </li>
                    <li class="flex items-center gap-2">
                        <span class="w-1.5 h-1.5 bg-current rounded-full"></span>
                        Corporate websites
                    </li>
                    <li class="flex items-center gap-2">
                        <span class="w-1.5 h-1.5 bg-current rounded-full"></span>
                        Portfolio sites
                    </li>
                </ul>
            </div>

            <!-- Service 2 -->
            <div class="card-retro p-8 group">
                <div class="flex items-center gap-4 mb-6">
                    <div class="w-12 h-12 flex items-center justify-center border border-current rounded opacity-70 group-hover:opacity-100 transition">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"/>
                        </svg>
                    </div>
                    <h2 class="font-8bit text-xs md:text-sm">WEB_DEV</h2>
                </div>
                <p class="font-vt323 text-xl opacity-80 mb-4">
                    Full-stack development using modern frameworks and best practices.
                    Clean, maintainable code.
                </p>
                <ul class="space-y-2 text-sm opacity-60">
                    <li class="flex items-center gap-2">
                        <span class="w-1.5 h-1.5 bg-current rounded-full"></span>
                        React / Vue / Next.js
                    </li>
                    <li class="flex items-center gap-2">
                        <span class="w-1.5 h-1.5 bg-current rounded-full"></span>
                        Laravel / Node.js
                    </li>
                    <li class="flex items-center gap-2">
                        <span class="w-1.5 h-1.5 bg-current rounded-full"></span>
                        API development
                    </li>
                </ul>
            </div>

            <!-- Service 3 -->
            <div class="card-retro p-8 group">
                <div class="flex items-center gap-4 mb-6">
                    <div class="w-12 h-12 flex items-center justify-center border border-current rounded opacity-70 group-hover:opacity-100 transition">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"/>
                        </svg>
                    </div>
                    <h2 class="font-8bit text-xs md:text-sm">MOBILE_APP</h2>
                </div>
                <p class="font-vt323 text-xl opacity-80 mb-4">
                    Cross-platform mobile applications with unique retro-inspired interfaces.
                    iOS and Android support.
                </p>
                <ul class="space-y-2 text-sm opacity-60">
                    <li class="flex items-center gap-2">
                        <span class="w-1.5 h-1.5 bg-current rounded-full"></span>
                        React Native
                    </li>
                    <li class="flex items-center gap-2">
                        <span class="w-1.5 h-1.5 bg-current rounded-full"></span>
                        Flutter
                    </li>
                    <li class="flex items-center gap-2">
                        <span class="w-1.5 h-1.5 bg-current rounded-full"></span>
                        PWA development
                    </li>
                </ul>
            </div>

            <!-- Service 4 -->
            <div class="card-retro p-8 group">
                <div class="flex items-center gap-4 mb-6">
                    <div class="w-12 h-12 flex items-center justify-center border border-current rounded opacity-70 group-hover:opacity-100 transition">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01"/>
                        </svg>
                    </div>
                    <h2 class="font-8bit text-xs md:text-sm">UI/UX_DESIGN</h2>
                </div>
                <p class="font-vt323 text-xl opacity-80 mb-4">
                    User interface and experience design that balances aesthetics
                    with usability and accessibility.
                </p>
                <ul class="space-y-2 text-sm opacity-60">
                    <li class="flex items-center gap-2">
                        <span class="w-1.5 h-1.5 bg-current rounded-full"></span>
                        User research
                    </li>
                    <li class="flex items-center gap-2">
                        <span class="w-1.5 h-1.5 bg-current rounded-full"></span>
                        Wireframing
                    </li>
                    <li class="flex items-center gap-2">
                        <span class="w-1.5 h-1.5 bg-current rounded-full"></span>
                        Prototyping
                    </li>
                </ul>
            </div>
        </div>

        <!-- Process Section -->
        <div class="card-retro p-8 md:p-12 mb-12">
            <h2 class="font-8bit text-sm md:text-base text-center mb-10">OUR_PROCESS</h2>
            <div class="grid md:grid-cols-4 gap-6">
                <div class="text-center">
                    <div class="font-8bit text-2xl text-glow mb-3">01</div>
                    <h3 class="font-vt323 text-xl mb-2">DISCOVER</h3>
                    <p class="text-sm opacity-60">Understanding your needs and goals</p>
                </div>
                <div class="text-center">
                    <div class="font-8bit text-2xl text-glow mb-3">02</div>
                    <h3 class="font-vt323 text-xl mb-2">DESIGN</h3>
                    <p class="text-sm opacity-60">Creating visual concepts and prototypes</p>
                </div>
                <div class="text-center">
                    <div class="font-8bit text-2xl text-glow mb-3">03</div>
                    <h3 class="font-vt323 text-xl mb-2">DEVELOP</h3>
                    <p class="text-sm opacity-60">Building with clean, efficient code</p>
                </div>
                <div class="text-center">
                    <div class="font-8bit text-2xl text-glow mb-3">04</div>
                    <h3 class="font-vt323 text-xl mb-2">DEPLOY</h3>
                    <p class="text-sm opacity-60">Launch and ongoing support</p>
                </div>
            </div>
        </div>

        <!-- CTA -->
        <div class="text-center">
            <p class="font-vt323 text-xl opacity-70 mb-6">Ready to start your project?</p>
            <a href="{{ route('demo.retro-terminal.contact') }}" class="btn-retro font-vt323 text-lg inline-block">
                REQUEST A QUOTE
            </a>
        </div>
    </div>
</div>
@endsection
