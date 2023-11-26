<?php

use App\Http\Controllers\Auth\{
    AuthenticatedSessionController,
    ForgetPasswordController,
    RegisterController,
    ResetPasswordController,
};
use Illuminate\Support\Facades\Route;

// --------------------------------------------------------------------------
// Login & Logout
// --------------------------------------------------------------------------
Route::get('/login', [AuthenticatedSessionController::class, 'index'])
    ->middleware('guest')
    ->name('login');

Route::post('/login', [AuthenticatedSessionController::class, 'store'])
    ->middleware('guest');

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
    // ->middleware('auth:sanctum')
    ->name('logout');

// --------------------------------------------------------------------------
// Register
// --------------------------------------------------------------------------
Route::get('/register', [RegisterController::class, 'index'])
    ->middleware('guest')
    ->name('register');

Route::post('/register', [RegisterController::class, 'store'])
    ->middleware('guest')
    ->name('register');

// --------------------------------------------------------------------------
// Forget Password
// --------------------------------------------------------------------------
Route::get('/forget-password', [ForgetPasswordController::class, 'index'])
    ->middleware('guest')
    ->name('forget-password');

Route::post('/forget-password/submit', [ForgetPasswordController::class, 'submitForgetPassword'])
    ->middleware('guest')
    ->name('forget-password.submit');

// --------------------------------------------------------------------------
// Reset Password
// --------------------------------------------------------------------------
Route::get('/reset-password/{token}', [ResetPasswordController::class, 'index'])
    ->middleware('guest')
    ->name('reset-password');

Route::post('/reset-password/submit', [ResetPasswordController::class, 'submitResetPassword'])
    ->middleware('guest')
    ->name('reset-password.submit');
