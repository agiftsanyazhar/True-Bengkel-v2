<?php

use App\Http\Controllers\API\JabatanController;
use Illuminate\Support\Facades\Route;

Route::prefix('jabatan')->name('jabatan.')->group(function () {
    Route::get('/', [JabatanController::class, 'index'])->name('index');
});
