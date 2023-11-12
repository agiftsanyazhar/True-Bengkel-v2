<?php

use Illuminate\Support\Facades\Route;

// --------------------------------------------------------------------------
// Landing Page
// --------------------------------------------------------------------------
Route::prefix('')->name('landing-page.')->group(function () {
    Route::get('/', [LandingPageController::class, 'index'])->name('index');
});
