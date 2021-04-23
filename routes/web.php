<?php

use Illuminate\Support\Facades\Route;

/**
 * Static Routes
 */
Route::as('static:')->group(function () {
    Route::view('/', 'static.pages.home')->name('home');
    Route::view('about', 'static.pages.about')->name('about');

    Route::get(
        'blog',
        App\Http\Controllers\Static\Articles\IndexController::class,
    )->name('articles:index');
});

/**
 * Authenticated Routes
 */
Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::view('dashboard', 'app.dashboard.index')->name('dashboard:index');
});
