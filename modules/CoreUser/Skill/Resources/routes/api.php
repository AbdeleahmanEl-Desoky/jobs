<?php

use Illuminate\Support\Facades\Route;
use Modules\CoreUser\Skill\Controllers\SkillController;

Route::group(['middleware' => ['auth:api_user']], function () {
    Route::get('/', [SkillController::class, 'index']);
    Route::post('/', [SkillController::class, 'store']);
    Route::get('/{id}', [SkillController::class, 'show']);
    Route::put('/{id}', [SkillController::class, 'update']);
    Route::delete('/{id}', [SkillController::class, 'delete']);
});
