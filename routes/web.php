<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [\App\Http\Controllers\HomepageController::class, 'index']);
//Route::view('/', 'welcome');

Route::get('/shop', [\App\Http\Controllers\ShopController::class, 'index']);
//Route::view('/shop', 'shop');

Route::view('/about', 'about');

Route::get('/contact', [\App\Http\Controllers\ContactController::class, 'index']);

Route::get('/admin/all-contacts', [\App\Http\Controllers\ContactController::class, 'getAllContacts']);

Route::post('/send-contact', [\App\Http\Controllers\ContactController::class, 'sendContact']);

Route::get('/admin/add-product', [\App\Http\Controllers\ProductController::class, 'addProductForm']);

Route::post('/add-product', [\App\Http\Controllers\ProductController::class, 'addProduct']);

Route::get('/admin/all-products', [\App\Http\Controllers\ProductController::class, 'index']);

Route::get('/admin/delete-products/{product}', [\App\Http\Controllers\ProductController::class, 'delete']);

Route::get('/admin/delete-contact/{contact}', [\App\Http\Controllers\ContactController::class, 'delete'])->name('deleteContact');
