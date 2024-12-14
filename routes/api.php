<?php

use App\Http\Controllers\TeamController;
use App\Http\Controllers\ApiGameController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::middleware('auth:passport')->group(function () {
    Route::get('/teams', [TeamController::class, 'restIndex']);
    Route::get('/teams/{id}', [TeamController::class, 'restShow']);

    Route::post('/teams', [TeamController::class, 'restStore']);
    Route::put('/teams/{id}', [TeamController::class, 'restUpdate']);

    Route::apiResource('teams.games', ApiGameController::class)->shallow();
});
