<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\WebhookController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/price', [ProjectController::class, 'index'])->name('projects.index');
Route::get('/projects/{project}', [ProjectController::class, 'show'])->name('projects.show');

Route::get('/photos', [PhotoController::class, 'index'])->name('photos.index');

Route::get('/shop', [ProductController::class, 'index'])->name('shop.index');
Route::get('/shop/{product}', [ProductController::class, 'show'])->name('shop.show');

Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add/{product}', [CartController::class, 'add'])->name('cart.add');
Route::patch('/cart/{cartItem}', [CartController::class, 'update'])->name('cart.update');
Route::delete('/cart/{cartItem}', [CartController::class, 'remove'])->name('cart.remove');

Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
Route::post('/checkout/process', [CheckoutController::class, 'process'])
    ->middleware('throttle.email')
    ->name('checkout.process');
Route::get('/checkout/success', [CheckoutController::class, 'success'])->name('checkout.success');
Route::get('/checkout/cancel', [CheckoutController::class, 'cancel'])->name('checkout.cancel');

Route::get('/download/{order}/{product}', [\App\Http\Controllers\DownloadController::class, 'download'])->name('download');

// Stripe Webhook
Route::post('/stripe/webhook', [WebhookController::class, 'handleStripeWebhook'])->name('stripe.webhook');

Route::view('/terms', 'terms')->name('terms');
Route::view('/legal', 'legal')->name('legal');

// Invoice Demo Routes
use App\Http\Controllers\Demo\InvoiceDemoController;

Route::prefix('projects/demo/invoice')->name('demo.invoice.')->group(function () {
    Route::get('/login', [InvoiceDemoController::class, 'login'])->name('login');
    Route::get('/dashboard', [InvoiceDemoController::class, 'dashboard'])->name('dashboard');

    // Invoices
    Route::get('/invoices', [InvoiceDemoController::class, 'invoices'])->name('invoices.index');
    Route::get('/invoices/create', [InvoiceDemoController::class, 'invoicesCreate'])->name('invoices.create');
    Route::get('/invoices/{id}', [InvoiceDemoController::class, 'invoicesShow'])->name('invoices.show');

    // Quotes
    Route::get('/quotes', [InvoiceDemoController::class, 'quotes'])->name('quotes.index');
    Route::get('/quotes/create', [InvoiceDemoController::class, 'quotesCreate'])->name('quotes.create');

    // Customers
    Route::get('/customers', [InvoiceDemoController::class, 'customers'])->name('customers.index');
    Route::get('/customers/create', [InvoiceDemoController::class, 'customersCreate'])->name('customers.create');

    // Items
    Route::get('/items', [InvoiceDemoController::class, 'items'])->name('items.index');

    // Settings
    Route::get('/settings', [InvoiceDemoController::class, 'settings'])->name('settings');
});

// Simple HP Demo Routes
use App\Http\Controllers\Demo\SimpleHpDemoController;

Route::prefix('projects/demo/simple-hp')->name('demo.simple-hp.')->group(function () {
    Route::get('/', [SimpleHpDemoController::class, 'index'])->name('index');
    Route::get('/about', [SimpleHpDemoController::class, 'about'])->name('about');
    Route::get('/service', [SimpleHpDemoController::class, 'service'])->name('service');
    Route::get('/contact', [SimpleHpDemoController::class, 'contact'])->name('contact');
});

// Custom HP Demo Routes
use App\Http\Controllers\Demo\CustomHpDemoController;

Route::prefix('projects/demo/custom-hp')->name('demo.custom-hp.')->group(function () {
    Route::get('/', [CustomHpDemoController::class, 'index'])->name('index');
    Route::get('/about', [CustomHpDemoController::class, 'about'])->name('about');
    Route::get('/service', [CustomHpDemoController::class, 'service'])->name('service');
    Route::get('/works', [CustomHpDemoController::class, 'works'])->name('works');
    Route::get('/news', [CustomHpDemoController::class, 'news'])->name('news');
    Route::get('/news/{id}', [CustomHpDemoController::class, 'newsDetail'])->name('news.detail');
    Route::get('/contact', [CustomHpDemoController::class, 'contact'])->name('contact');
});

// Full Custom HP Demo Routes
use App\Http\Controllers\Demo\FullCustomHpDemoController;

Route::prefix('projects/demo/full-custom')->name('demo.full-custom.')->group(function () {
    Route::get('/', [FullCustomHpDemoController::class, 'index'])->name('index');
    Route::get('/products', [FullCustomHpDemoController::class, 'products'])->name('products');
    Route::get('/products/{id}', [FullCustomHpDemoController::class, 'productDetail'])->name('products.detail');
    Route::get('/about', [FullCustomHpDemoController::class, 'about'])->name('about');
    Route::get('/contact', [FullCustomHpDemoController::class, 'contact'])->name('contact');
    Route::get('/admin/dashboard', [FullCustomHpDemoController::class, 'adminDashboard'])->name('admin.dashboard');
    Route::get('/admin/products', [FullCustomHpDemoController::class, 'adminProducts'])->name('admin.products');
});

// SNS Tool Demo Routes
use App\Http\Controllers\Demo\SnsToolDemoController;

Route::prefix('projects/demo/sns-tool')->name('demo.sns-tool.')->group(function () {
    Route::get('/', [SnsToolDemoController::class, 'index'])->name('index');
    Route::get('/feed', [SnsToolDemoController::class, 'feed'])->name('feed');
    Route::get('/reels', [SnsToolDemoController::class, 'reels'])->name('reels');
    Route::get('/posts', [SnsToolDemoController::class, 'posts'])->name('posts');
    Route::get('/posts/create', [SnsToolDemoController::class, 'postsCreate'])->name('posts.create');
    Route::get('/schedule', [SnsToolDemoController::class, 'schedule'])->name('schedule');
    Route::get('/templates', [SnsToolDemoController::class, 'templates'])->name('templates');
    Route::get('/analytics', [SnsToolDemoController::class, 'analytics'])->name('analytics');
});

// Retro Terminal Demo Routes
use App\Http\Controllers\Demo\RetroTerminalDemoController;

Route::prefix('projects/demo/retro-terminal')->name('demo.retro-terminal.')->group(function () {
    Route::get('/', [RetroTerminalDemoController::class, 'index'])->name('index');
    Route::get('/about', [RetroTerminalDemoController::class, 'about'])->name('about');
    Route::get('/service', [RetroTerminalDemoController::class, 'service'])->name('service');
    Route::get('/contact', [RetroTerminalDemoController::class, 'contact'])->name('contact');
});

// Luxury Demo Routes
use App\Http\Controllers\Demo\LuxuryDemoController;

Route::prefix('projects/demo/luxury')->name('demo.luxury.')->group(function () {
    Route::get('/', [LuxuryDemoController::class, 'index'])->name('index');
});

// Brutalist Demo Routes
use App\Http\Controllers\Demo\BrutalistDemoController;

Route::prefix('projects/demo/brutalist')->name('demo.brutalist.')->group(function () {
    Route::get('/', [BrutalistDemoController::class, 'index'])->name('index');
});

// Cyber Demo Routes
use App\Http\Controllers\Demo\CyberDemoController;

Route::prefix('projects/demo/cyber')->name('demo.cyber.')->group(function () {
    Route::get('/', [CyberDemoController::class, 'index'])->name('index');
});

// Instagram LP Demo Routes
use App\Http\Controllers\Demo\InstaLpDemoController;

Route::prefix('projects/demo/insta-lp')->name('demo.insta-lp.')->group(function () {
    Route::get('/', [InstaLpDemoController::class, 'index'])->name('index');
});

// Flick LP Demo Routes (CSS 3D)
Route::get('/demo/flick-css3d', function () {
    return view('demo.flick-css3d');
})->name('demo.flick-css3d');

// Options Demo Routes
Route::prefix('projects/demo/options')->name('demo.options.')->group(function () {
    Route::view('/sns', 'demo.options.sns')->name('sns');
    Route::view('/dashboard', 'demo.options.dashboard')->name('dashboard');
    Route::view('/posts', 'demo.options.posts')->name('posts');
    Route::view('/shop', 'demo.options.shop')->name('shop');
    Route::view('/meo', 'demo.options.meo')->name('meo');
    Route::view('/chatbot', 'demo.options.chatbot')->name('chatbot');
    Route::view('/map', 'demo.options.map')->name('map');
});

// Admin Routes
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProjectController as AdminProjectController;
use App\Http\Controllers\Admin\PhotoController as AdminPhotoController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::middleware('admin')->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

        Route::resource('projects', AdminProjectController::class);
        Route::post('projects/{project}/reorder', [AdminProjectController::class, 'reorder'])->name('projects.reorder');

        Route::resource('photos', AdminPhotoController::class);
        Route::post('photos/{photo}/reorder', [AdminPhotoController::class, 'reorder'])->name('photos.reorder');

        Route::resource('products', AdminProductController::class);

        Route::get('orders', [AdminOrderController::class, 'index'])->name('orders.index');
        Route::get('orders/{order}', [AdminOrderController::class, 'show'])->name('orders.show');
        Route::patch('orders/{order}/status', [AdminOrderController::class, 'updateStatus'])->name('orders.updateStatus');
    });
});
