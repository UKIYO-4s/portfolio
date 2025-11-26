@extends('demo.retro-terminal.layouts.app')

@section('title', 'Contact')

@section('content')
<div class="px-6 py-16 md:py-24">
    <div class="max-w-4xl mx-auto">
        <!-- Page Header -->
        <div class="text-center mb-16">
            <h1 class="font-8bit text-xl md:text-3xl tracking-wider text-glow mb-4">
                CONTACT_<span class="cursor-blink">|</span>
            </h1>
            <p class="text-lg opacity-70">Let's start a conversation</p>
        </div>

        <div class="grid md:grid-cols-2 gap-8">
            <!-- Contact Form -->
            <div class="card-retro p-8">
                <h2 class="font-8bit text-xs md:text-sm mb-6">SEND_MESSAGE</h2>
                <form class="space-y-6">
                    <div>
                        <label class="block font-vt323 text-lg mb-2">NAME_</label>
                        <input type="text" class="input-retro w-full font-vt323 text-lg" placeholder="Your name">
                    </div>
                    <div>
                        <label class="block font-vt323 text-lg mb-2">EMAIL_</label>
                        <input type="email" class="input-retro w-full font-vt323 text-lg" placeholder="your@email.com">
                    </div>
                    <div>
                        <label class="block font-vt323 text-lg mb-2">SUBJECT_</label>
                        <select class="input-retro w-full font-vt323 text-lg">
                            <option value="">Select a topic</option>
                            <option value="project">New Project</option>
                            <option value="quote">Request Quote</option>
                            <option value="support">Support</option>
                            <option value="other">Other</option>
                        </select>
                    </div>
                    <div>
                        <label class="block font-vt323 text-lg mb-2">MESSAGE_</label>
                        <textarea class="input-retro w-full font-vt323 text-lg h-32 resize-none" placeholder="Tell us about your project..."></textarea>
                    </div>
                    <button type="submit" class="btn-retro font-vt323 text-lg w-full">
                        SEND MESSAGE
                    </button>
                </form>
                <p class="text-xs opacity-50 mt-4 text-center">
                    * This is a demo form. No data is submitted.
                </p>
            </div>

            <!-- Contact Info -->
            <div class="space-y-6">
                <!-- Info Card -->
                <div class="card-retro p-8">
                    <h2 class="font-8bit text-xs md:text-sm mb-6">CONTACT_INFO</h2>
                    <div class="space-y-6">
                        <div class="flex items-start gap-4">
                            <svg class="w-6 h-6 opacity-70 flex-shrink-0 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                            <div>
                                <p class="font-vt323 text-lg opacity-60 mb-1">EMAIL</p>
                                <p class="font-vt323 text-xl">hello@terminal.demo</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-4">
                            <svg class="w-6 h-6 opacity-70 flex-shrink-0 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                            </svg>
                            <div>
                                <p class="font-vt323 text-lg opacity-60 mb-1">PHONE</p>
                                <p class="font-vt323 text-xl">+1 (555) 123-4567</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-4">
                            <svg class="w-6 h-6 opacity-70 flex-shrink-0 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                            <div>
                                <p class="font-vt323 text-lg opacity-60 mb-1">LOCATION</p>
                                <p class="font-vt323 text-xl">Tokyo, Japan</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Hours Card -->
                <div class="card-retro p-8">
                    <h2 class="font-8bit text-xs md:text-sm mb-6">BUSINESS_HOURS</h2>
                    <div class="space-y-3 font-vt323 text-lg">
                        <div class="flex justify-between">
                            <span class="opacity-60">Monday - Friday</span>
                            <span>09:00 - 18:00</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="opacity-60">Saturday</span>
                            <span>10:00 - 15:00</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="opacity-60">Sunday</span>
                            <span>CLOSED</span>
                        </div>
                    </div>
                </div>

                <!-- Social Links -->
                <div class="card-retro p-8">
                    <h2 class="font-8bit text-xs md:text-sm mb-6">FOLLOW_US</h2>
                    <div class="flex gap-4">
                        <a href="#" class="w-10 h-10 flex items-center justify-center border border-current rounded opacity-60 hover:opacity-100 hover:bg-[var(--mint)] hover:text-[var(--bg-dark)] transition">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/>
                            </svg>
                        </a>
                        <a href="#" class="w-10 h-10 flex items-center justify-center border border-current rounded opacity-60 hover:opacity-100 hover:bg-[var(--mint)] hover:text-[var(--bg-dark)] transition">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 0C5.374 0 0 5.373 0 12c0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23A11.509 11.509 0 0112 5.803c1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576C20.566 21.797 24 17.3 24 12c0-6.627-5.373-12-12-12z"/>
                            </svg>
                        </a>
                        <a href="#" class="w-10 h-10 flex items-center justify-center border border-current rounded opacity-60 hover:opacity-100 hover:bg-[var(--mint)] hover:text-[var(--bg-dark)] transition">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
