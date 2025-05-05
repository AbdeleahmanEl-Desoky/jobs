<?php

use Illuminate\Support\Facades\Route;
use Modules\CoreCompany\Company\Controllers\CompanyController;

Route::group(['middleware' => ['auth:api_company']], function () {
    Route::get('/', [CompanyController::class, 'show']);
    Route::post('/', [CompanyController::class, 'update']);
    // Route::delete('/{id}', [CompanyController::class, 'delete']);
});
