<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Client\CheckoutController;

Route::post('/api/process-checkout', [CheckoutController::class, 'processCheckout'])->name('client.checkout.process-checkout');
Route::post('/api/check-transaction', [CheckoutController::class, 'check_transaction'])->name('client.checkout.check-transaction');
Route::post('/api/create_order',[CheckoutController::class, 'create_order'])->name('client.checkout.create_order');
