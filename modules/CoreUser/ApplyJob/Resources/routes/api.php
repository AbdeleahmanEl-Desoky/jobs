<?php

use Illuminate\Support\Facades\Route;
use Modules\CoreUser\ApplyJob\Controllers\ApplyJobController;

Route::group(['middleware' => ['auth:api_user']], function () {
    Route::get('/', [ApplyJobController::class, 'index']);
    Route::post('/', [ApplyJobController::class, 'store']);
    Route::get('/{id}', [ApplyJobController::class, 'show']);
    Route::put('/{id}', [ApplyJobController::class, 'update']);
    Route::delete('/{id}', [ApplyJobController::class, 'delete']);
    Route::post('/{id}/archive', [ApplyJobController::class, 'archive']); 
});
