<?php

use Illuminate\Support\Facades\Route;

/**
 * Static Routes
 */
Route::as('static:')->group(function () {
    Route::view('/', 'static.home')->name('home');
});

/**
 * Authenticated Routes
 */
Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::view('dashboard', 'app.dashboard.index')->name('dashboard:index');
});
