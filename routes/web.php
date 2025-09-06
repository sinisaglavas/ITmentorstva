<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [\App\Http\Controllers\OceneController::class, 'index']);

Route::view('/dodaj-ocenu', 'addGrade');

Route::post('/send-grade', [\App\Http\Controllers\OceneController::class, 'sendGrade'])->name('sendGrade');
