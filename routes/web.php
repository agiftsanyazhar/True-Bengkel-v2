<?php

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

Route::get('/login', function () {
    return redirect('login');
});

Route::get('/dashboard', function () {
    // return redirect()->route('admin.bio.about-me.index');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';
