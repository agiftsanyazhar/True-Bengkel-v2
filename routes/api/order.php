<?php

use App\Http\Controllers\API\OrderController;
use Illuminate\Support\Facades\Route;

Route::prefix('order')->name('order.')->group(function () {
    Route::get('/', [OrderController::class, 'index'])->name('index');
    Route::prefix('detail')->name('detail.')->group(function () {
        Route::get('/{order_id}', [OrderController::class, 'detailOrder'])->name('index');
    });
});
