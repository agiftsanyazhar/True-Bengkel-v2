<?php

use App\Http\Controllers\API\MotorController;
use Illuminate\Support\Facades\Route;

Route::prefix('motor')->name('motor.')->group(function () {
    Route::get('/', [MotorController::class, 'index'])->name('index');
});
