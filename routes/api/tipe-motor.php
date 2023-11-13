<?php

use App\Http\Controllers\API\TipeMotorController;
use Illuminate\Support\Facades\Route;

Route::prefix('tipe-motor')->name('tipe-motor.')->group(function () {
    Route::get('/', [TipeMotorController::class, 'index'])->name('index');
});
