<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ShopController;
use App\Http\Middleware\AdminCheckMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

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

Route::middleware(['auth', AdminCheckMiddleware::class])->prefix('admin')->group(function () { // prefix - dodaje zajednicki naziv na sve rute
    Route::controller(ContactController::class)->group(function (){
        Route::post('/send-contact', 'sendContact');
        Route::get('/all-contacts', 'getAllContacts')
            ->name('adminAllContacts');
        Route::put('/update-contact/{contact}', 'update')
            ->name('updateContact');
        Route::get('/delete-contact/{contact}','delete')
            ->name('deleteContact');
        Route::get('/update-contact-form/{contact}','updateContactForm')
            ->name('updateContactForm');
    });
    Route::controller(ProductController::class)->group(function ()
    {
        Route::post('/add-product','addProduct');
        Route::get('/all-products', 'index')
            ->name('adminAllProducts');
        Route::get('/delete-products/{product}','delete')
            ->name('deleteProduct');
        Route::get('/update-product-form/{product}','updateProductForm')
            ->name('updateProductForm');
        Route::put('/update-product/{product}','update')
            ->name('updateProduct');
    });
});

require __DIR__.'/auth.php'; // mora biti na kraju - sluzi da bi ucitalo autentifikacione rute
