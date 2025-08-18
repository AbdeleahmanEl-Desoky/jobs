<?php

use Illuminate\Support\Facades\Route;
use Modules\CoreUser\Saved\Controllers\SavedController;

Route::group(['middleware' => ['auth:api']], function () {
    Route::get('/', [SavedController::class, 'index']);
    Route::post('/', [SavedController::class, 'store']);
    Route::get('/{id}', [SavedController::class, 'show']);
    Route::put('/{id}', [SavedController::class, 'update']);
    Route::delete('/{id}', [SavedController::class, 'delete']);
});
