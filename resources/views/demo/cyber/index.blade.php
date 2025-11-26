@extends('demo.cyber.layouts.app')

@section('title', 'Home')

@section('content')
<!-- Hero Section -->
<section class="py-16 md:py-20">
    <div class="max-w-6xl mx-auto px-6 md:px-10">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <!-- Left: Copy & CTA -->
            <div>
                <p class="text-cyan-400 text-sm font-medium mb-4">NEXT-GEN PLATFORM</p>
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold leading-tight mb-6">
                    Build the
                    <span class="gradient-text">Future</span>
                    Today
                </h1>
                <p class="text-[#94A3B8] text-lg leading-relaxed mb-8 max-w-md">
                    Harness cutting-edge technology to transform your digital presence. Fast, secure, and infinitely scalable.
                </p>
                <div class="flex flex-col sm:flex-row gap-4">
                    <a href="#contact" class="btn-blue px-8 py-4 rounded-lg text-sm font-semibold text-center">
                        Start Building
                    </a>
                    <a href="#features" class="btn-outline-purple px-8 py-4 rounded-lg text-sm font-semibold text-center">
                        Explore Features
                    </a>
                </div>
            </div>

            <!-- Right: 3D Card with Node Pattern -->
            <div class="hidden lg:flex justify-center">
                <div class="relative">
                    <!-- Main card -->
                    <div class="glass-card rounded-2xl p-8 w-80 glow-blue">
                        <!-- Node/Line SVG -->
                        <svg class="w-full h-48 mb-6" viewBox="0 0 200 120" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <!-- Grid lines -->
                            <line x1="0" y1="30" x2="200" y2="30" stroke="rgba(59, 130, 246, 0.2)" stroke-width="1"/>
                            <line x1="0" y1="60" x2="200" y2="60" stroke="rgba(59, 130, 246, 0.2)" stroke-width="1"/>
                            <line x1="0" y1="90" x2="200" y2="90" stroke="rgba(59, 130, 246, 0.2)" stroke-width="1"/>
                            <line x1="50" y1="0" x2="50" y2="120" stroke="rgba(59, 130, 246, 0.2)" stroke-width="1"/>
                            <line x1="100" y1="0" x2="100" y2="120" stroke="rgba(59, 130, 246, 0.2)" stroke-width="1"/>
                            <line x1="150" y1="0" x2="150" y2="120" stroke="rgba(59, 130, 246, 0.2)" stroke-width="1"/>

                            <!-- Connection lines -->
                            <line x1="50" y1="30" x2="100" y2="60" stroke="rgba(139, 92, 246, 0.6)" stroke-width="2"/>
                            <line x1="100" y1="60" x2="150" y2="30" stroke="rgba(59, 130, 246, 0.6)" stroke-width="2"/>
                            <line x1="100" y1="60" x2="100" y2="90" stroke="rgba(34, 211, 238, 0.6)" stroke-width="2"/>
                            <line x1="50" y1="90" x2="100" y2="90" stroke="rgba(139, 92, 246, 0.6)" stroke-width="2"/>
                            <line x1="100" y1="90" x2="150" y2="90" stroke="rgba(59, 130, 246, 0.6)" stroke-width="2"/>

                            <!-- Nodes -->
                            <circle cx="50" cy="30" r="6" fill="#3B82F6"/>
                            <circle cx="100" cy="60" r="8" fill="#8B5CF6"/>
                            <circle cx="150" cy="30" r="6" fill="#3B82F6"/>
                            <circle cx="50" cy="90" r="5" fill="#22D3EE"/>
                            <circle cx="100" cy="90" r="5" fill="#22D3EE"/>
                            <circle cx="150" cy="90" r="5" fill="#22D3EE"/>

                            <!-- Glow effect on center node -->
                            <circle cx="100" cy="60" r="12" fill="rgba(139, 92, 246, 0.3)">
                                <animate attributeName="r" values="12;16;12" dur="2s" repeatCount="indefinite"/>
                                <animate attributeName="opacity" values="0.3;0.1;0.3" dur="2s" repeatCount="indefinite"/>
                            </circle>
                        </svg>

                        <div class="text-center">
                            <p class="text-white font-semibold mb-1">Neural Network</p>
                            <p class="text-[#64748B] text-sm">Connected. Intelligent. Fast.</p>
                        </div>
                    </div>

                    <!-- Floating accent -->
                    <div class="absolute -top-4 -right-4 w-16 h-16 bg-purple-500/20 rounded-xl blur-sm"></div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Features Section -->
<section id="features" class="py-16 md:py-20 reveal">
    <div class="max-w-6xl mx-auto px-6 md:px-10">
        <div class="text-center mb-12">
            <p class="text-blue-400 text-sm font-medium mb-2">FEATURES</p>
            <h2 class="text-3xl md:text-4xl font-bold">Powerful Capabilities</h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <!-- Feature 1 -->
            <div class="glass-card rounded-xl p-6">
                <div class="w-12 h-12 rounded-lg bg-blue-500/10 flex items-center justify-center mb-4">
                    <svg class="w-6 h-6 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                    </svg>
                </div>
                <h3 class="text-white font-semibold mb-2">Lightning Fast</h3>
                <p class="text-[#64748B] text-sm leading-relaxed">
                    Optimized performance with sub-second response times.
                </p>
            </div>

            <!-- Feature 2 -->
            <div class="glass-card rounded-xl p-6">
                <div class="w-12 h-12 rounded-lg bg-purple-500/10 flex items-center justify-center mb-4">
                    <svg class="w-6 h-6 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                    </svg>
                </div>
                <h3 class="text-white font-semibold mb-2">Secure by Design</h3>
                <p class="text-[#64748B] text-sm leading-relaxed">
                    Enterprise-grade security with end-to-end encryption.
                </p>
            </div>

            <!-- Feature 3 -->
            <div class="glass-card rounded-xl p-6">
                <div class="w-12 h-12 rounded-lg bg-cyan-500/10 flex items-center justify-center mb-4">
                    <svg class="w-6 h-6 text-cyan-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z"></path>
                    </svg>
                </div>
                <h3 class="text-white font-semibold mb-2">Scalable</h3>
                <p class="text-[#64748B] text-sm leading-relaxed">
                    Grows with your needs from startup to enterprise.
                </p>
            </div>

            <!-- Feature 4 -->
            <div class="glass-card rounded-xl p-6">
                <div class="w-12 h-12 rounded-lg bg-blue-500/10 flex items-center justify-center mb-4">
                    <svg class="w-6 h-6 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                    </svg>
                </div>
                <h3 class="text-white font-semibold mb-2">Analytics</h3>
                <p class="text-[#64748B] text-sm leading-relaxed">
                    Real-time insights and comprehensive dashboards.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Metrics Section -->
<section id="metrics" class="py-16 md:py-20 reveal">
    <div class="max-w-6xl mx-auto px-6 md:px-10">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Metric 1 -->
            <div class="glass-card rounded-xl p-8 glow-purple">
                <span class="text-5xl md:text-6xl font-bold gradient-text">99.9%</span>
                <h3 class="text-white font-semibold mt-4 mb-2">Uptime Guaranteed</h3>
                <p class="text-[#64748B] text-sm leading-relaxed">
                    Our infrastructure ensures your services are always available when you need them.
                </p>
            </div>

            <!-- Metric 2 -->
            <div class="glass-card rounded-xl p-8 glow-blue">
                <span class="text-5xl md:text-6xl font-bold gradient-text">&lt;50ms</span>
                <h3 class="text-white font-semibold mt-4 mb-2">Response Time</h3>
                <p class="text-[#64748B] text-sm leading-relaxed">
                    Blazing fast performance with global edge network distribution.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section id="contact" class="py-16 md:py-20 reveal">
    <div class="max-w-6xl mx-auto px-6 md:px-10">
        <div class="glass-card rounded-2xl p-10 md:p-16 text-center relative overflow-hidden">
            <!-- Glow accent -->
            <div class="absolute top-0 left-1/2 -translate-x-1/2 w-64 h-32 bg-gradient-to-b from-blue-500/20 to-transparent blur-2xl"></div>

            <div class="relative z-10">
                <p class="text-cyan-400 text-sm font-medium mb-4">GET STARTED</p>
                <h2 class="text-3xl md:text-4xl font-bold mb-6">
                    Ready to Launch?
                </h2>
                <p class="text-[#94A3B8] text-lg leading-relaxed mb-10 max-w-xl mx-auto">
                    Join thousands of developers building the next generation of web applications.
                </p>
                <a href="#" class="btn-blue px-10 py-4 rounded-lg text-sm font-semibold inline-block">
                    Start Free Trial
                </a>
            </div>
        </div>
    </div>
</section>
@endsection
