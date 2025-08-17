<?php

use Illuminate\Support\Facades\Route;
use Modules\CoreUser\UserJob\Controllers\UserJobController;

Route::group(['middleware' => ['auth:api_user']], function () {
    Route::get('/', [UserJobController::class, 'index']);
    Route::get('/{id}', [UserJobController::class, 'show']);
});
