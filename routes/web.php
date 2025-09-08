<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [\App\Http\Controllers\HomepageController::class, 'index']);
//Route::view('/', 'welcome');

Route::get('/shop', [\App\Http\Controllers\ShopController::class, 'index']);
//Route::view('/shop', 'shop');

Route::view('/about', 'about');

Route::get('/contact', [\App\Http\Controllers\ContactController::class, 'index']);

Route::get('/admin/all-contacts', [\App\Http\Controllers\ContactController::class, 'getAllContacts'])
->name('adminAllContacts');

Route::post('/send-contact', [\App\Http\Controllers\ContactController::class, 'sendContact']);

Route::view('/admin/add-product','addProduct');

Route::post('/add-product', [\App\Http\Controllers\ProductController::class, 'addProduct']);

Route::get('/admin/all-products', [\App\Http\Controllers\ProductController::class, 'index'])
->name('adminAllProducts');

Route::get('/admin/delete-products/{product}', [\App\Http\Controllers\ProductController::class, 'delete'])
    ->name('deleteProduct');

Route::get('/admin/delete-contact/{contact}', [\App\Http\Controllers\ContactController::class, 'delete'])
    ->name('deleteContact');

Route::get('/admin/update-contact-form/{contact}', [\App\Http\Controllers\ContactController::class, 'updateContactForm'])
    ->name('updateContactForm');
Route::put('/update-contact/{contact}', [\App\Http\Controllers\ContactController::class, 'update'])
    ->name('updateContact');

Route::get('/admin/update-product-form/{product}', [\App\Http\Controllers\ProductController::class, 'updateProductForm'])
    ->name('updateProductForm');
Route::put('/update-product/{product}', [\App\Http\Controllers\ProductController::class, 'update'])
    ->name('updateProduct');
