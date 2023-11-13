<?php

use App\Http\Controllers\API\PelangganController;
use Illuminate\Support\Facades\Route;

Route::prefix('pelanggan')->name('pelanggan.')->group(function () {
    Route::get('/', [PelangganController::class, 'index'])->name('index');
});
