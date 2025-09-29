<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\AdminCheckMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get('/shop', [\App\Http\Controllers\ShopController::class, 'index']);
Route::view('/about', 'about');
Route::get('/contact', [ContactController::class, 'index']);

Route::middleware('auth')->group(function (){
    Route::post('/add-product', [ProductController::class, 'addProduct']);
    Route::post('/send-contact', [ContactController::class, 'sendContact']);

});


Route::middleware(['auth', AdminCheckMiddleware::class])->prefix('admin')->group(function () { // prefix - dodaje zajednicki naziv na sve rute
    Route::get('/all-contacts', [ContactController::class, 'getAllContacts'])
        ->name('adminAllContacts');

    Route::view('/add-product-form','addProductForm');
    Route::put('/update-contact/{contact}', [ContactController::class, 'update'])
        ->name('updateContact');
    Route::get('/all-products', [ProductController::class, 'index'])
        ->name('adminAllProducts');
    Route::get('/delete-products/{product}', [ProductController::class, 'delete'])
        ->name('deleteProduct');
    Route::get('/delete-contact/{contact}', [ContactController::class, 'delete'])
        ->name('deleteContact');
    Route::get('/update-contact-form/{contact}', [ContactController::class, 'updateContactForm'])
        ->name('updateContactForm');
    Route::get('/update-product-form/{product}', [ProductController::class, 'updateProductForm'])
        ->name('updateProductForm');
    Route::put('/update-product/{product}', [ProductController::class, 'update'])
        ->name('updateProduct');
});

require __DIR__.'/auth.php'; // mora biti na kraju - sluzi da bi ucitalo autentifikacione rute
