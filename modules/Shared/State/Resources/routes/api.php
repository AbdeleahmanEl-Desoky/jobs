<?php

use Illuminate\Support\Facades\Route;
use Modules\Shared\State\Controllers\StateController;

// Route::group(['middleware' => ['auth:api']], function () {
    Route::get('/', [StateController::class, 'index']);
    // Route::post('/', [StateController::class, 'store']);
    // Route::get('/{id}', [StateController::class, 'show']);
    // Route::put('/{id}', [StateController::class, 'update']);
    // Route::delete('/{id}', [StateController::class, 'delete']);
// });
