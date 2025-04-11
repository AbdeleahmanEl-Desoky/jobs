<?php

use Illuminate\Support\Facades\Route;
use Modules\Auth\Controllers\AuthController;


    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/forgot-password', [AuthController::class, 'forgotPassword']);
    Route::post('/verify-otp', [AuthController::class, 'verifyOtp']);
    Route::post('/reset-password', [AuthController::class, 'resetPassword']);

    // Route::get('/{id}', [AuthController::class, 'show']);
    // Route::put('/{id}', [AuthController::class, 'update']);
    // Route::delete('/{id}', [AuthController::class, 'delete']);

