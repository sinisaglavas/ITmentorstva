<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ShopController;
use App\Http\Middleware\AdminCheckMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard', function () { return view('dashboard'); })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::view('/', 'welcome');
Route::view('/add-product-form','addProductForm');
Route::view('/about', 'about');
Route::view('/contact',  'contact');
Route::get('/shop', [ShopController::class, 'index']);

Route::middleware(['auth', AdminCheckMiddleware::class])->prefix('admin')->group(function () {
    Route::controller(ContactController::class)->group(function (){
        Route::post('/contact/send', 'sendContact')->name('sendContact');
        Route::get('/contacts', 'getAllContacts')->name('adminAllContacts');
        Route::put('/contact/update/{contact}', 'update')->name('updateContact');
        Route::get('/contact/delete/{contact}','delete')->name('deleteContact');
        Route::get('/contact/update/form/{contact}','updateContactForm')->name('updateContactForm');
    });
    Route::controller(ProductController::class)->group(function ()
    {
        Route::post('/product/add','addProduct')->name('addProduct');
        Route::get('/products', 'index')->name('adminAllProducts');
        Route::get('/products/delete/{product}','delete')->name('deleteProduct');
        Route::get('/product/update/form/{product}','updateProductForm')->name('updateProductForm');
        Route::put('/product/update/{product}','update')->name('updateProduct');
    });
});

require __DIR__.'/auth.php'; // mora biti na kraju - ucitava autentifikacione rute
