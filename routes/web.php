<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');
Route::get('/projects/{project}', [ProjectController::class, 'show'])->name('projects.show');

Route::get('/photos', [PhotoController::class, 'index'])->name('photos.index');

Route::get('/shop', [ProductController::class, 'index'])->name('shop.index');
Route::get('/shop/{product}', [ProductController::class, 'show'])->name('shop.show');

Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add/{product}', [CartController::class, 'add'])->name('cart.add');
Route::patch('/cart/{cartItem}', [CartController::class, 'update'])->name('cart.update');
Route::delete('/cart/{cartItem}', [CartController::class, 'remove'])->name('cart.remove');

Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
Route::post('/checkout/process', [CheckoutController::class, 'process'])->name('checkout.process');
Route::get('/checkout/success', [CheckoutController::class, 'success'])->name('checkout.success');
Route::get('/checkout/cancel', [CheckoutController::class, 'cancel'])->name('checkout.cancel');

Route::get('/download/{order}/{product}', [\App\Http\Controllers\DownloadController::class, 'download'])->name('download');

Route::view('/terms', 'terms')->name('terms');
Route::view('/legal', 'legal')->name('legal');

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
