<?php

use App\Http\Controllers\CageController;
use App\Http\Controllers\CageSensorController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::apiResource('cages', CageController::class);

// Sensors
Route::get('water', [CageSensorController::class,'water']);

Route::post('register', [UserController::class, 'store']);
Route::post('login', [UserController::class, 'login']);

//protected routes
Route::middleware('jwt.verify')->group(function(){
    Route::get('users', [UserController::class, 'index']);
});
