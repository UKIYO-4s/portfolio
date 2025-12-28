<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PurchaseVerificationController;

Route::post('/verify-purchase', [PurchaseVerificationController::class, 'verify']);
