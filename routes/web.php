<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [\App\Http\Controllers\HomepageController::class, 'index']);
//Route::view('/', 'welcome');

Route::get('/shop', [\App\Http\Controllers\ShopController::class, 'index']);
//Route::view('/shop', 'shop');

Route::view('/about', 'about');

Route::get('/contact', [\App\Http\Controllers\ContactController::class, 'index']);
//Route::view('/contact', 'contact');
