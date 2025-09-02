<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');
Route::view('/shop', 'shop');
Route::view('/about', 'about');
Route::view('/contact', 'contact');
