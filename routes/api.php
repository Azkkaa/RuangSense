<?php

use App\Http\Controllers\Api\SearchController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\SensorLogController;

/**
 * Sensor-Log Session
 */
Route::prefix('sensor-log')->group(function() {
    Route::post('store', [SensorLogController::class, 'store'])->name('sensor.store');
});

Route::prefix('device')->group(function() {
    Route::post('search', [SearchController::class, 'device']);
});

/**
 * Raw Testing Device
 */
// Route::post('/raw-test', function () {
//     return response()->json([
//         'raw' => file_get_contents('php://input'),
//         'json' => request()->json()->all(),
//         'all' => request()->all(),
//     ]);
// });
