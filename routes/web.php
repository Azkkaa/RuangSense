<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DeviceController;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('user.search-device');
})->name('user.search-device');

Route::get('/dashboard/device/{device:api_key}', [DeviceController::class, 'show'])->name('user.device');

Route::prefix('/admin')->middleware('is_admin')->group(function () {
    Route::get('dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

    Route::prefix('device')->group(function () {
        Route::get('create', [DeviceController::class, 'create'])->name('device.create');
        Route::post('store', [DeviceController::class, 'store'])->name('device.store');
    });
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
