<?php

use Illuminate\Support\Facades\Route;
use Modules\Shared\Field\Controllers\FieldController;

    Route::get('/', [FieldController::class, 'index']);

