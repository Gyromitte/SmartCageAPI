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

// Sensors
Route::get('water', [CageSensorController::class,'water']);

// Ejemplo de cómo debería ser en tu ruta
Route::post('registro', [UserController::class, 'store']);

