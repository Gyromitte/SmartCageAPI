<?php

use App\Http\Controllers\CageController;
use App\Http\Controllers\CageSensorController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('users', UserController::class);
Route::apiResource('cages', CageController::class);
Route::get('adafruit', [CageSensorController::class,'adafruit']);