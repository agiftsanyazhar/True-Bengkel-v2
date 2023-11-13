<?php

use App\Http\Controllers\API\KendaraanController;
use Illuminate\Support\Facades\Route;

Route::prefix('kendaraan')->name('kendaraan.')->group(function () {
    Route::get('/', [KendaraanController::class, 'index'])->name('index');
});
