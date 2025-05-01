<?php

use Illuminate\Support\Facades\Route;
use Modules\Shared\Media\Controllers\MediaController;

Route::group(['middleware' => ['auth:api']], function () {
    Route::delete('/{id}', [MediaController::class, 'delete']);
});
