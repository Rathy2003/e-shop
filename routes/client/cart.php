<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Client\CartController;

Route::get('/cart', [CartController::class, 'index'])->name('client.cart');
Route::post('add-to-cart', [CartController::class, 'addToCart'])->name('client.cart.add-to-cart');
Route::post('/get-cart-items', [CartController::class, 'getCartList'])->name('client.cart.get-cart-items');
Route::post('/update-cart-quantity', [CartController::class, 'updateCartQuantity'])->name('client.cart.update-cart-quantity');
Route::post('/remove-cart-item', [CartController::class, 'removeCartItem'])->name('client.cart.remove-cart-item');
Route::post('/get-total-cart', [CartController::class, 'getTotalCart'])->name('client.cart.get-total-cart');
