<?php

use App\Http\Controllers\API\BrandController;
use Illuminate\Support\Facades\Route;

Route::prefix('brand')->name('brand.')->group(function () {
    Route::get('/', [BrandController::class, 'index'])->name('index');
});
