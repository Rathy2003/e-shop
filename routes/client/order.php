<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Client\OrderController;

Route::post('/orders/get-all-order', [OrderController::class, 'getAllOrders'])->name('client.orders.get-all-orders');
