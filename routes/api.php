<?php

use App\Http\Controllers\TeamController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::middleware('auth:passport')->group(function () {
    Route::get('/teams', [TeamController::class, 'restShow']);
});
