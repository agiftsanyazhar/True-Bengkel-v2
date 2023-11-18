<?php

use App\Http\Controllers\API\{
    AboutController,
    AdminController,
    BrandController,
    JabatanController,
    KendaraanController,
    MotorController,
    OrderController,
    PegawaiController,
    PelangganController,
    RoleController,
    SparePartController,
    TipeMotorController,
    UserController,
};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// --------------------------------------------------------------------------
// About
// --------------------------------------------------------------------------
Route::prefix('about')->name('about.')->group(function () {
    Route::get('/', [AboutController::class, 'index'])->name('index');
});

// --------------------------------------------------------------------------
// Admin
// --------------------------------------------------------------------------
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('index');
});

// --------------------------------------------------------------------------
// Brand
// --------------------------------------------------------------------------
Route::prefix('brand')->name('brand.')->group(function () {
    Route::get('/', [BrandController::class, 'index'])->name('index');
});

// --------------------------------------------------------------------------
// Jabatan
// --------------------------------------------------------------------------
Route::prefix('jabatan')->name('jabatan.')->group(function () {
    Route::get('/', [JabatanController::class, 'index'])->name('index');
});

// --------------------------------------------------------------------------
// Kendaraan
// --------------------------------------------------------------------------
Route::prefix('kendaraan')->name('kendaraan.')->group(function () {
    Route::get('/', [KendaraanController::class, 'index'])->name('index');
});

// --------------------------------------------------------------------------
// Motor
// --------------------------------------------------------------------------
Route::prefix('motor')->name('motor.')->group(function () {
    Route::get('/', [MotorController::class, 'index'])->name('index');
});

// --------------------------------------------------------------------------
// Order
// --------------------------------------------------------------------------
Route::prefix('order')->name('order.')->group(function () {
    Route::get('/', [OrderController::class, 'index'])->name('index');
});

// --------------------------------------------------------------------------
// Pegawai
// --------------------------------------------------------------------------
Route::prefix('pegawai')->name('pegawai.')->group(function () {
    Route::get('/', [PegawaiController::class, 'index'])->name('index');
});

// --------------------------------------------------------------------------
// Pelanggan
// --------------------------------------------------------------------------
Route::prefix('pelanggan')->name('pelanggan.')->group(function () {
    Route::get('/', [PelangganController::class, 'index'])->name('index');
});

// --------------------------------------------------------------------------
// Role
// --------------------------------------------------------------------------
Route::prefix('role')->name('role.')->group(function () {
    Route::get('/', [RoleController::class, 'index'])->name('index');
});

// --------------------------------------------------------------------------
// Spare Part
// --------------------------------------------------------------------------
Route::prefix('spare-prat')->name('spare-prat.')->group(function () {
    Route::get('/', [SparePartController::class, 'index'])->name('index');
});

// --------------------------------------------------------------------------
// Tipe Motor
// --------------------------------------------------------------------------
Route::prefix('tipe-motor')->name('tipe-motor.')->group(function () {
    Route::get('/', [TipeMotorController::class, 'index'])->name('index');
});

// --------------------------------------------------------------------------
// User
// --------------------------------------------------------------------------
Route::prefix('user')->name('user.')->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('index');
});
