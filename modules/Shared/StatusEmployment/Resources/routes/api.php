<?php

use Illuminate\Support\Facades\Route;
use Modules\Shared\StatusEmployment\Controllers\StatusEmploymentController;

// Route::group(['middleware' => ['auth:api']], function () {
    Route::get('/', [StatusEmploymentController::class, 'index']);
//     Route::post('/', [StatusEmploymentController::class, 'store']);
//     Route::get('/{id}', [StatusEmploymentController::class, 'show']);
//     Route::put('/{id}', [StatusEmploymentController::class, 'update']);
//     Route::delete('/{id}', [StatusEmploymentController::class, 'delete']);
// });
