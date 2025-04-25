<?php

use Illuminate\Support\Facades\Route;
use Modules\Shared\City\Controllers\CityController;

// Route::group(['middleware' => ['auth:api']], function () {
    Route::get('/', [CityController::class, 'index']);
//     Route::post('/', [CityController::class, 'store']);
//     Route::get('/{id}', [CityController::class, 'show']);
//     Route::put('/{id}', [CityController::class, 'update']);
//     Route::delete('/{id}', [CityController::class, 'delete']);
// });
