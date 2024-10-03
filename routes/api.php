<?php

use Illuminate\Support\Facades\Route;

Route::prefix('auth')
    ->middleware('auth:api')
    ->controller(\App\Http\Controllers\AuthController::class)
    ->group(function() {
        Route::post('login','login')->withoutMiddleware('auth:api');
        Route::post('logout','logout');
        Route::post('refresh','refresh');
        Route::post('me','me');
});

Route::apiResource('space', \App\Http\Controllers\SpaceController::class)
    ->middleware('auth:api');
