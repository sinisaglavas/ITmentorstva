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
        Route::get('/delete/{contact}','delete')->name('deleteContact');
        Route::get('/update/form/{contact}','updateContactForm')->name('updateContactForm');
        Route::get('/all', 'getAllContacts')->name('adminAllContacts');
        Route::post('/send', 'sendContact')->name('sendContact');
        Route::put('/update/{contact}', 'update')->name('updateContact');
    });
    Route::controller(ProductController::class)->prefix('/product')->group(function ()
    {
        Route::get('/all', 'index')->name('adminAllProducts');
        Route::get('/delete/{product}','delete')->name('deleteProduct');
        Route::get('/update/form/{product}','updateProductForm')->name('updateProductForm');
        Route::post('/add','addProduct')->name('addProduct');
        Route::put('/update/{product}','update')->name('updateProduct');
    });
});

require __DIR__.'/auth.php'; // mora biti na kraju - ucitava autentifikacione rute
