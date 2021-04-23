<?php

use Illuminate\Support\Facades\Route;

/**
 * Static Routes
 */
Route::as('static:')->group(function () {
    Route::view('/', 'static.pages.home')->name('home');
    Route::view('about', 'static.pages.about')->name('about');
    Route::view('contact-us', 'static.pages.contact')->name('contact');

    Route::get(
        'blog',
        App\Http\Controllers\Static\Articles\IndexController::class,
    )->name('articles:index');
});

/**
 * Package Routes
 */
Route::prefix('packages')->as('packages:')->group(function () {

    /**
     * Show All Packages
     */
    Route::get(
        '/',
        App\Http\Controllers\Static\Packages\IndexController::class,
    )->name('index');

    /**
     * Show a Package
     */
    Route::get(
        '{package}',
        App\Http\Controllers\Static\Packages\ShowController::class,
        )->name('show');
});

/**
 * Authenticated Routes
 */
Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::view('dashboard', 'app.dashboard.index')->name('dashboard:index');

    /**
     * Dashboard Actions
     */
    Route::prefix('dashboard')->as('dashboard:')->group(function () {
        /**
         * Packages
         */
        Route::prefix('packages')->as('packages:')->group(function () {
            Route::get(
                '/',
                App\Http\Controllers\Dashboard\Packages\IndexController::class,
            )->name('index');
        });
    });
});
