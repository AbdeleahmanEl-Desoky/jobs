<?php

use Illuminate\Support\Facades\Route;
use Modules\Shared\JobTitle\Controllers\JobTitleController;

// Route::group(['middleware' => ['auth:api']], function () {
    Route::get('/', [JobTitleController::class, 'index']);
//     Route::post('/', [JobTitleController::class, 'store']);
//     Route::get('/{id}', [JobTitleController::class, 'show']);
//     Route::put('/{id}', [JobTitleController::class, 'update']);
//     Route::delete('/{id}', [JobTitleController::class, 'delete']);
// });
