<?php

use App\Http\Controllers\API\SparePartController;
use Illuminate\Support\Facades\Route;

Route::prefix('spare-part')->name('spare-part.')->group(function () {
    Route::get('/', [SparePartController::class, 'index'])->name('index');
});
