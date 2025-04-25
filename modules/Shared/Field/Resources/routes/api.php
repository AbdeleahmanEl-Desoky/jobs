<?php

use Illuminate\Support\Facades\Route;
use Modules\Shared\Field\Controllers\FieldController;

Route::group(['middleware' => ['auth:api']], function () {
    Route::get('/', [FieldController::class, 'index']);
    Route::post('/', [FieldController::class, 'store']);
    Route::get('/{id}', [FieldController::class, 'show']);
    Route::put('/{id}', [FieldController::class, 'update']);
    Route::delete('/{id}', [FieldController::class, 'delete']);
});
