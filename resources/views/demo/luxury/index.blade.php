@extends('demo.luxury.layouts.app')

@section('title', 'Home')

@section('content')
<!-- Hero Section -->
<section class="min-h-[85vh] flex items-center py-24">
    <div class="max-w-6xl mx-auto px-6 md:px-10 w-full">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
            <!-- Left: Copy & CTA -->
            <div>
                <p class="text-gold text-sm tracking-widest mb-6">DIGITAL ATELIER</p>
                <h1 class="font-serif text-4xl md:text-5xl lg:text-6xl leading-tight mb-8">
                    Where Luxury<br>
                    <span class="text-gold">Meets Digital</span>
                </h1>
                <p class="text-[#9A9A9A] text-base md:text-lg leading-relaxed mb-10 tracking-wide max-w-md">
                    We craft bespoke digital experiences for brands that demand excellence. Every pixel, every interaction, meticulously designed.
                </p>
                <div class="flex flex-col sm:flex-row gap-4">
                    <a href="#contact" class="btn-gold px-8 py-4 rounded-lg text-sm tracking-widest text-center font-medium">
                        START A PROJECT
                    </a>
                    <a href="#services" class="btn-outline-gold px-8 py-4 rounded-lg text-sm tracking-widest text-center">
                        OUR SERVICES
                    </a>
                </div>
            </div>

            <!-- Right: Abstract Decoration -->
            <div class="hidden lg:flex justify-center items-center relative">
                <svg class="w-80 h-80" viewBox="0 0 400 400" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <!-- Outer circle -->
                    <circle cx="200" cy="200" r="180" stroke="#CFA65B" stroke-width="1" opacity="0.3"/>
                    <!-- Inner circle -->
                    <circle cx="200" cy="200" r="120" stroke="#CFA65B" stroke-width="1" opacity="0.5"/>
                    <!-- Center circle -->
                    <circle cx="200" cy="200" r="60" stroke="#CFA65B" stroke-width="1" opacity="0.8"/>
                    <!-- Vertical line -->
                    <line x1="200" y1="20" x2="200" y2="380" stroke="#CFA65B" stroke-width="1" opacity="0.2"/>
                    <!-- Horizontal line -->
                    <line x1="20" y1="200" x2="380" y2="200" stroke="#CFA65B" stroke-width="1" opacity="0.2"/>
                    <!-- Diagonal lines -->
                    <line x1="60" y1="60" x2="340" y2="340" stroke="#CFA65B" stroke-width="1" opacity="0.15"/>
                    <line x1="340" y1="60" x2="60" y2="340" stroke="#CFA65B" stroke-width="1" opacity="0.15"/>
                    <!-- Small accent circle with glow -->
                    <circle cx="200" cy="200" r="8" fill="#CFA65B" opacity="0.9">
                        <animate attributeName="opacity" values="0.9;0.5;0.9" dur="3s" repeatCount="indefinite"/>
                    </circle>
                </svg>
            </div>
        </div>
    </div>
</section>

<!-- Services Section -->
<section id="services" class="py-24 reveal">
    <div class="max-w-6xl mx-auto px-6 md:px-10">
        <div class="text-center mb-16">
            <p class="text-gold text-sm tracking-widest mb-4">WHAT WE DO</p>
            <h2 class="font-serif text-3xl md:text-4xl">Our Services</h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Service 1 -->
            <div class="service-card p-8 rounded-lg">
                <div class="w-12 h-12 border border-gold rounded-lg flex items-center justify-center mb-6">
                    <svg class="w-6 h-6 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                    </svg>
                </div>
                <h3 class="font-serif text-xl mb-4">Brand Identity</h3>
                <p class="text-[#6B6B6B] text-sm leading-relaxed tracking-wide">
                    Crafting distinctive visual identities that resonate with your audience and elevate your brand presence.
                </p>
            </div>

            <!-- Service 2 -->
            <div class="service-card p-8 rounded-lg">
                <div class="w-12 h-12 border border-gold rounded-lg flex items-center justify-center mb-6">
                    <svg class="w-6 h-6 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z"></path>
                    </svg>
                </div>
                <h3 class="font-serif text-xl mb-4">Web Design</h3>
                <p class="text-[#6B6B6B] text-sm leading-relaxed tracking-wide">
                    Creating immersive digital experiences that captivate visitors and reflect the essence of luxury.
                </p>
            </div>

            <!-- Service 3 -->
            <div class="service-card p-8 rounded-lg">
                <div class="w-12 h-12 border border-gold rounded-lg flex items-center justify-center mb-6">
                    <svg class="w-6 h-6 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                    </svg>
                </div>
                <h3 class="font-serif text-xl mb-4">Digital Strategy</h3>
                <p class="text-[#6B6B6B] text-sm leading-relaxed tracking-wide">
                    Developing comprehensive strategies that position your brand at the forefront of the digital landscape.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Clients Section -->
<section id="clients" class="py-24 reveal">
    <div class="max-w-6xl mx-auto px-6 md:px-10">
        <div class="text-center mb-16">
            <p class="text-gold text-sm tracking-widest mb-4">TRUSTED BY</p>
            <h2 class="font-serif text-3xl md:text-4xl">Our Clients</h2>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
            <!-- Client 1 -->
            <div class="border border-[#222] rounded-lg p-8 flex items-center justify-center hover:border-gold/30 transition-colors">
                <span class="font-serif text-lg text-[#6B6B6B] tracking-wider">LUXE CO.</span>
            </div>
            <!-- Client 2 -->
            <div class="border border-[#222] rounded-lg p-8 flex items-center justify-center hover:border-gold/30 transition-colors">
                <span class="font-serif text-lg text-[#6B6B6B] tracking-wider">ATELIER M</span>
            </div>
            <!-- Client 3 -->
            <div class="border border-[#222] rounded-lg p-8 flex items-center justify-center hover:border-gold/30 transition-colors">
                <span class="font-serif text-lg text-[#6B6B6B] tracking-wider">NOIR STUDIO</span>
            </div>
            <!-- Client 4 -->
            <div class="border border-[#222] rounded-lg p-8 flex items-center justify-center hover:border-gold/30 transition-colors">
                <span class="font-serif text-lg text-[#6B6B6B] tracking-wider">PRESTIGE</span>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section id="contact" class="py-24 reveal">
    <div class="max-w-6xl mx-auto px-6 md:px-10">
        <div class="border border-gold rounded-lg p-12 md:p-16 text-center gold-glow">
            <p class="text-gold text-sm tracking-widest mb-4">LET'S CREATE</p>
            <h2 class="font-serif text-3xl md:text-4xl mb-6">
                Ready to Elevate<br>Your Brand?
            </h2>
            <p class="text-[#9A9A9A] text-base leading-relaxed mb-10 max-w-lg mx-auto tracking-wide">
                We partner with select brands to create exceptional digital experiences. Start the conversation today.
            </p>
            <a href="#" class="btn-gold px-10 py-4 rounded-lg text-sm tracking-widest inline-block font-medium">
                GET IN TOUCH
            </a>
        </div>
    </div>
</section>
@endsection
