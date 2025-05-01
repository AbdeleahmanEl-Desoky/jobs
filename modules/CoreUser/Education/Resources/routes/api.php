<?php

use Illuminate\Support\Facades\Route;
use Modules\CoreUser\Education\Controllers\EducationController;

Route::group(['middleware' => ['auth:api_user']], function () {
    Route::get('/', [EducationController::class, 'index']);
    Route::post('/', [EducationController::class, 'store']);
    Route::get('/{id}', [EducationController::class, 'show']);
    Route::put('/{id}', [EducationController::class, 'update']);
    Route::delete('/{id}', [EducationController::class, 'delete']);
});
