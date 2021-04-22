<?php

use Illuminate\Support\Facades\Route;

/**
 * Static Routes
 */
Route::as('static:')->group(function () {
    Route::view('/', 'static.home')->name('home');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
