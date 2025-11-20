@extends('layouts.app')

@section('title', 'Terms of Service')

@section('content')
<div class="py-24 px-6 sm:px-8 lg:px-12 max-w-4xl mx-auto">
    <h1 class="text-5xl md:text-6xl font-thin tracking-wide mb-6">Terms of Service</h1>
    <p class="text-gray-400 mb-16">Last updated: {{ date('F d, Y') }}</p>

    <div class="prose prose-invert max-w-none space-y-8">
        <section>
            <h2 class="text-3xl font-thin mb-4">1. Agreement to Terms</h2>
            <p class="text-gray-400 font-light leading-relaxed">
                By accessing and using this website, you accept and agree to be bound by the terms and provision of this agreement.
                If you do not agree to abide by the above, please do not use this service.
            </p>
        </section>

        <section>
            <h2 class="text-3xl font-thin mb-4">2. Digital Products</h2>
            <p class="text-gray-400 font-light leading-relaxed mb-4">
                All digital products sold on this website are provided "as is" without warranty of any kind, either express or implied.
            </p>
            <ul class="list-disc list-inside text-gray-400 font-light space-y-2">
                <li>Digital products are delivered via email after successful payment</li>
                <li>Downloads are available immediately upon purchase</li>
                <li>Products are for personal or commercial use as specified</li>
                <li>No refunds are provided for digital products after download</li>
            </ul>
        </section>

        <section>
            <h2 class="text-3xl font-thin mb-4">3. Payment Terms</h2>
            <p class="text-gray-400 font-light leading-relaxed">
                All payments are processed securely through Stripe. We accept major credit cards and other payment methods as available.
                Prices are listed in USD and are subject to change without notice.
            </p>
        </section>

        <section>
            <h2 class="text-3xl font-thin mb-4">4. Refund Policy</h2>
            <p class="text-gray-400 font-light leading-relaxed mb-4">
                Due to the nature of digital products, refunds are handled as follows:
            </p>
            <ul class="list-disc list-inside text-gray-400 font-light space-y-2">
                <li><strong>Before Download:</strong> Refunds are available within 24 hours of purchase if you contact customer support at support@sd-create.jp before downloading the product</li>
                <li><strong>After Download:</strong> No refunds are available once the digital product has been downloaded</li>
                <li><strong>Defective Products:</strong> If you experience technical issues with the product, please contact support@sd-create.jp for a refund or replacement</li>
            </ul>
        </section>

        <section>
            <h2 class="text-3xl font-thin mb-4">5. Intellectual Property</h2>
            <p class="text-gray-400 font-light leading-relaxed">
                All content on this website, including but not limited to text, graphics, logos, images, and software,
                is the property of the website owner and protected by international copyright laws.
                Unauthorized use or distribution is prohibited.
            </p>
        </section>

        <section>
            <h2 class="text-3xl font-thin mb-4">6. License Grant</h2>
            <p class="text-gray-400 font-light leading-relaxed">
                Upon purchase of a digital product, you are granted a non-exclusive, non-transferable license to use the product
                according to the terms specified with each product. You may not resell, redistribute, or share purchased digital products.
            </p>
        </section>

        <section>
            <h2 class="text-3xl font-thin mb-4">7. Privacy</h2>
            <p class="text-gray-400 font-light leading-relaxed">
                We collect and process personal information in accordance with our Privacy Policy.
                By using this website, you consent to such processing and you warrant that all data provided by you is accurate.
            </p>
        </section>

        <section>
            <h2 class="text-3xl font-thin mb-4">8. Limitation of Liability</h2>
            <p class="text-gray-400 font-light leading-relaxed">
                In no event shall we be liable for any direct, indirect, incidental, special, or consequential damages
                arising out of or in any way connected with the use of this website or with the delay or inability to use this website,
                or for any information, products, and services obtained through this website.
            </p>
        </section>

        <section>
            <h2 class="text-3xl font-thin mb-4">9. Changes to Terms</h2>
            <p class="text-gray-400 font-light leading-relaxed">
                We reserve the right to modify these terms at any time. Changes will be effective immediately upon posting to the website.
                Your continued use of the website following any changes indicates your acceptance of the new terms.
            </p>
        </section>

        <section>
            <h2 class="text-3xl font-thin mb-4">10. Contact Information</h2>
            <p class="text-gray-400 font-light leading-relaxed">
                If you have any questions about these Terms of Service, please contact us at:
            </p>
            <p class="text-gray-400 font-light mt-4">
                Email: <a href="mailto:support@sd-create.jp" class="text-white hover:text-gray-400 transition-colors">support@sd-create.jp</a>
            </p>
        </section>
    </div>

    <div class="mt-16 pt-8 border-t border-gray-800">
        <a href="{{ route('home') }}" class="text-gray-400 hover:text-white transition-colors text-sm">
            ← Back to Home
        </a>
    </div>
</div>
@endsection
