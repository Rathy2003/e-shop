<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Client\CheckoutController;

Route::post('/api/process-checkout', [CheckoutController::class, 'processCheckout'])->name('client.checkout.process-checkout');

