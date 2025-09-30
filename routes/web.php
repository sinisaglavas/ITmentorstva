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

Route::middleware(['auth', AdminCheckMiddleware::class])->prefix('/admin')->group(function ()
{
    Route::controller(ContactController::class)->prefix('/contact')->group(function ()
    {
        Route::get('/all', 'getAllContacts');
        Route::get('/delete/{contact}','delete')->name('contact.delete');
        Route::get('/update/form/{contact}','updateContactForm')->name('contact.update');
        Route::post('/send', 'sendContact')->name('contact.send');
        Route::put('/update/{contact}', 'update')->name('contact.update');
    });
    Route::controller(ProductController::class)->prefix('/product')->group(function ()
    {
        Route::get('/all', 'index');
        Route::get('/delete/{product}','delete')->name('product.delete');
        Route::get('/update/form/{product}','updateProductForm')->name('product.update.form');
        Route::post('/add','addProduct')->name('product.add');
        Route::put('/update/{product}','update')->name('product.update');
    });
});

require __DIR__.'/auth.php'; // mora biti na kraju - ucitava autentifikacione rute
