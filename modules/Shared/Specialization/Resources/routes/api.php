<?php

use Illuminate\Support\Facades\Route;
use Modules\Shared\Specialization\Controllers\SpecializationController;

// Route::group(['middleware' => ['auth:api']], function () {
    Route::get('/', [SpecializationController::class, 'index']);
//     Route::post('/', [SpecializationController::class, 'store']);
//     Route::get('/{id}', [SpecializationController::class, 'show']);
//     Route::put('/{id}', [SpecializationController::class, 'update']);
//     Route::delete('/{id}', [SpecializationController::class, 'delete']);
// });
