<?php

use Illuminate\Support\Facades\Route;
use Modules\CoreUser\Experience\Controllers\ExperienceController;

Route::group(['middleware' => ['auth:api_user']], function () {
    Route::get('/', [ExperienceController::class, 'index']);
    Route::post('/', [ExperienceController::class, 'store']);
    Route::get('/{id}', [ExperienceController::class, 'show']);
    Route::put('/{id}', [ExperienceController::class, 'update']);
    Route::delete('/{id}', [ExperienceController::class, 'delete']);
});
