<?php

use App\Http\Controllers\CageController;
use App\Http\Controllers\CageSensorController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SensorController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//Route::apiResource('cages', CageController::class);

// Sensors
Route::get('water', [CageSensorController::class,'water']);

Route::post('register', [UserController::class, 'store']);
Route::post('login', [UserController::class, 'login']);

//protected routes
Route::middleware('jwt.verify')->group(function(){
    Route::put('update/{id}', [UserController::class, 'update']);
    Route::get('user/info', [UserController::class, 'index']);
    Route::post('logout', [UserController::class, 'logout']);

    // Cages
    Route::get('cages', [CageController::class,'index']);
    Route::post('cages/create', [CageController::class, 'createCageForUser']);

    // Sensors
    // Get sensors values
    Route::get('cages/sensors/{sensor_route}', [SensorController::class, 'getSensorData']);

    // Get sensors from cage
    Route::get('cages/{jaula_id}/sensors', [CageSensorController::class, 'getSensoresDeJaula']);

    // Send data 
    Route::post('/datos/{sensor_route}/{dato}', [SensorController::class, 'enviarDatos']);
});
