<?php

use Illuminate\Support\Facades\Route;
use Modules\Shared\Degree\Controllers\DegreeController;

// Route::group(['middleware' => ['auth:api']], function () {
    Route::get('/', [DegreeController::class, 'index']);
//     Route::post('/', [DegreeController::class, 'store']);
//     Route::get('/{id}', [DegreeController::class, 'show']);
//     Route::put('/{id}', [DegreeController::class, 'update']);
//     Route::delete('/{id}', [DegreeController::class, 'delete']);
// });
