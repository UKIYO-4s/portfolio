@extends('demo.full-custom.layouts.app')

@section('title', 'お問い合わせ')

@section('content')
<!-- Page Header -->
<div class="bg-gradient-to-r from-orange-400 to-orange-300 py-16 border-b-4 border-gray-800">
    <div class="max-w-7xl mx-auto px-6 lg:px-8 text-center">
        <h1 class="text-5xl md:text-6xl font-bold text-gray-800 mb-4">
            Get in Touch!
        </h1>
        <p class="text-xl font-bold text-gray-800">
            We'd love to hear from you!
        </p>
    </div>
</div>

<!-- Contact Form -->
<div class="max-w-4xl mx-auto px-6 lg:px-8 py-20">
    <div class="bg-cyan-400 p-2 rounded-3xl border-4 border-gray-800 retro-shadow">
        <div class="bg-[#FFF8E7] p-8 md:p-12 rounded-2xl">
            <form onsubmit="event.preventDefault(); alert('Message sent! (Demo only)');">
                <!-- Name -->
                <div class="mb-6">
                    <label class="block text-2xl font-bold text-gray-800 mb-3">
                        Your Name
                    </label>
                    <input type="text"
                           required
                           class="w-full px-6 py-4 text-xl font-bold bg-white text-gray-800 rounded-2xl border-4 border-gray-800 retro-shadow-sm focus:outline-none focus:ring-4 focus:ring-orange-400"
                           placeholder="John Doe">
                </div>

                <!-- Email -->
                <div class="mb-6">
                    <label class="block text-2xl font-bold text-gray-800 mb-3">
                        Your Email
                    </label>
                    <input type="email"
                           required
                           class="w-full px-6 py-4 text-xl font-bold bg-white text-gray-800 rounded-2xl border-4 border-gray-800 retro-shadow-sm focus:outline-none focus:ring-4 focus:ring-orange-400"
                           placeholder="john@example.com">
                </div>

                <!-- Subject -->
                <div class="mb-6">
                    <label class="block text-2xl font-bold text-gray-800 mb-3">
                        Subject
                    </label>
                    <input type="text"
                           required
                           class="w-full px-6 py-4 text-xl font-bold bg-white text-gray-800 rounded-2xl border-4 border-gray-800 retro-shadow-sm focus:outline-none focus:ring-4 focus:ring-orange-400"
                           placeholder="What's on your mind?">
                </div>

                <!-- Message -->
                <div class="mb-8">
                    <label class="block text-2xl font-bold text-gray-800 mb-3">
                        Your Message
                    </label>
                    <textarea rows="6"
                              required
                              class="w-full px-6 py-4 text-xl font-bold bg-white text-gray-800 rounded-2xl border-4 border-gray-800 retro-shadow-sm focus:outline-none focus:ring-4 focus:ring-orange-400 resize-none"
                              placeholder="Tell us everything!"></textarea>
                </div>

                <!-- Submit Button -->
                <button type="submit"
                        class="w-full px-8 py-6 bg-orange-400 text-gray-800 text-2xl font-bold rounded-3xl border-4 border-gray-800 retro-shadow bounce-hover btn-retro">
                    Send Message
                </button>

                <p class="text-center text-gray-600 font-bold mt-4 text-sm">
                    * This form is for demo purposes only
                </p>
            </form>
        </div>
    </div>
</div>

<!-- Contact Info -->
<div class="max-w-7xl mx-auto px-6 lg:px-8 pb-20">
    <h2 class="text-4xl font-bold text-center text-gray-800 mb-12">
        Other Ways to Reach Us
    </h2>

    <div class="grid md:grid-cols-3 gap-8">
        <!-- Phone -->
        <div class="bg-pink-400 p-8 rounded-2xl border-4 border-gray-800 retro-shadow bounce-hover-subtle text-center">
            <div class="w-16 h-16 mx-auto bg-white rounded-xl border-4 border-gray-800 flex items-center justify-center mb-4">
                <svg class="w-8 h-8 text-gray-800" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
            </div>
            <h3 class="text-2xl font-bold text-gray-800 mb-3">Phone</h3>
            <p class="text-xl font-bold text-gray-800">123-456-7890</p>
        </div>

        <!-- Email -->
        <div class="bg-orange-400 p-8 rounded-2xl border-4 border-gray-800 retro-shadow bounce-hover-subtle text-center">
            <div class="w-16 h-16 mx-auto bg-white rounded-xl border-4 border-gray-800 flex items-center justify-center mb-4">
                <svg class="w-8 h-8 text-gray-800" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
            </div>
            <h3 class="text-2xl font-bold text-gray-800 mb-3">Email</h3>
            <p class="text-xl font-bold text-gray-800">hello@funkyco.com</p>
        </div>

        <!-- Address -->
        <div class="bg-cyan-400 p-8 rounded-2xl border-4 border-gray-800 retro-shadow bounce-hover-subtle text-center">
            <div class="w-16 h-16 mx-auto bg-white rounded-xl border-4 border-gray-800 flex items-center justify-center mb-4">
                <svg class="w-8 h-8 text-gray-800" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
            </div>
            <h3 class="text-2xl font-bold text-gray-800 mb-3">Address</h3>
            <p class="text-xl font-bold text-gray-800">123 Groovy St,<br>Funkville</p>
        </div>
    </div>
</div>

<!-- FAQ Section -->
<div class="bg-gradient-to-r from-pink-400 to-pink-300 py-20 border-t-4 border-gray-800">
    <div class="max-w-4xl mx-auto px-6 lg:px-8">
        <h2 class="text-4xl font-bold text-center text-gray-800 mb-12">
            FAQ
        </h2>

        <div class="space-y-6">
            <!-- FAQ 1 -->
            <div class="bg-white p-6 rounded-2xl border-4 border-gray-800 retro-shadow">
                <h3 class="text-2xl font-bold text-gray-800 mb-3">How long does shipping take?</h3>
                <p class="text-lg text-gray-700">Usually 3-5 business days! We're super fast!</p>
            </div>

            <!-- FAQ 2 -->
            <div class="bg-white p-6 rounded-2xl border-4 border-gray-800 retro-shadow">
                <h3 class="text-2xl font-bold text-gray-800 mb-3">Do you ship internationally?</h3>
                <p class="text-lg text-gray-700">Yes! We ship funky products worldwide!</p>
            </div>

            <!-- FAQ 3 -->
            <div class="bg-white p-6 rounded-2xl border-4 border-gray-800 retro-shadow">
                <h3 class="text-2xl font-bold text-gray-800 mb-3">What's your return policy?</h3>
                <p class="text-lg text-gray-700">30-day money back guarantee! No questions asked!</p>
            </div>
        </div>
    </div>
</div>
@endsection
