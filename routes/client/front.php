<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Client\HomeController;

Route::get('/', [HomeController::class, 'index'])->name('client.index');
Route::get('/shop', [HomeController::class, 'shop'])->name('client.shop');
Route::get('/products/{slug}',[HomeController::class,'view_product'])->name('client.view_product');
Route::get('/order', [HomeController::class, 'order'])->name('client.order');
Route::get('/checkout', [HomeController::class, 'checkout'])->name('client.checkout');
Route::get('/cart-items',[HomeController::class,'cart_items'])->name('client.cart_items');
Route::get('/about', [HomeController::class, 'about'])->name('client.about');
Route::get('/contact', [HomeController::class, 'contact'])->name('client.contact');
Route::get('/{name?}',[HomeController::class,'shop'])->name('client.category');
// 404-Not Found


