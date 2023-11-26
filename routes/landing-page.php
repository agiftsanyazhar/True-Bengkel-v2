<?php

use App\Http\Controllers\LandingPage\{
    LandingPageController,
};
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::prefix('')->name('landing-page.')->group(function () {
    Route::get('/', [LandingPageController::class, 'index'])->name('index');
    Route::prefix('products')->name('products.')->group(function () {
        Route::get('/', [LandingPageController::class, 'products'])->name('index');
        Route::get('/detail/{id}', [LandingPageController::class, 'productsDetail'])->name('detail');
    });
    Route::get('/customer-service', [LandingPageController::class, 'customerService'])->name('customer-service');
    Route::get('/gallery', [LandingPageController::class, 'gallery'])->name('gallery');
});
