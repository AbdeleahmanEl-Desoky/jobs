<?php

use Illuminate\Support\Facades\Route;
use Modules\CoreUser\Archived\Controllers\ArchivedController;

Route::group(['middleware' => ['auth:api']], function () {
    Route::get('/', [ArchivedController::class, 'index']);
    Route::post('/', [ArchivedController::class, 'store']);
    Route::get('/{id}', [ArchivedController::class, 'show']);
    Route::put('/{id}', [ArchivedController::class, 'update']);
    Route::delete('/{id}', [ArchivedController::class, 'delete']);
});
