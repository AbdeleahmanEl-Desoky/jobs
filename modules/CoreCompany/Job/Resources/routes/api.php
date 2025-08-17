<?php

use Illuminate\Support\Facades\Route;
use Modules\CoreCompany\Job\Controllers\JobController;

Route::group(['middleware' => ['auth:api_company']], function () {
    Route::get('/', [JobController::class, 'index']);
    Route::post('/', [JobController::class, 'store']);
    Route::get('/{id}', [JobController::class, 'show']);
    Route::put('/{id}', [JobController::class, 'update']);
    Route::delete('/{id}', [JobController::class, 'delete']);
});
