<?php

use Illuminate\Support\Facades\Route;
use Modules\CoreUser\User\Controllers\UserController;

Route::group(['middleware' => ['auth:api_user']], function () {
    Route::post('/', [UserController::class, 'update']);
    Route::get('/profile', [UserController::class, 'show']);
    Route::post('/cv', [UserController::class, 'uploadCv']);
    // Route::delete('/{id}', [UserController::class, 'delete']);
});
