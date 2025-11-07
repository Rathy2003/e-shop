<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\SliderController;

Route::get('slider',[SliderController::class,"index"])->name("admin.slider.index");
Route::get('slider/create',[SliderController::class,"create"])->name("admin.slider.create");

