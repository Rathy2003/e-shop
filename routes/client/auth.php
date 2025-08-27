<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Client\AuthController;

Route::get('/account/login',[AuthController::class,'login'])->name('client.account.login');
Route::get('/account/register',[AuthController::class,'register'])->name('client.account.register');
Route::post('/account/process_register',[AuthController::class,'processRegister'])->name('client.account.process_register');
Route::post('/account/process_logout',[AuthController::class,'processLogout'])->name('client.account.process_logout');
Route::post('/account/process_login',[AuthController::class,'processLogin'])->name('client.account.process_login');
