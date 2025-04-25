<?php

use Illuminate\Support\Facades\Route;
use Modules\Shared\CompanySize\Controllers\CompanySizeController;

Route::group(['middleware' => ['auth:api']], function () {
    Route::get('/', [CompanySizeController::class, 'index']);
    Route::post('/', [CompanySizeController::class, 'store']);
    Route::get('/{id}', [CompanySizeController::class, 'show']);
    Route::put('/{id}', [CompanySizeController::class, 'update']);
    Route::delete('/{id}', [CompanySizeController::class, 'delete']);
});
