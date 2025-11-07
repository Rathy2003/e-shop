<?php

use Illuminate\Support\Facades\Route;

// Admin
Route::prefix('ecadmin')->group(function () {
    include 'admin/dashboard.php';
    include 'admin/slider.php';
});

// Client
include 'client/front.php';
include 'client/cart.php';
include 'client/auth.php';
include 'client/checkout.php';
include 'client/order.php';


