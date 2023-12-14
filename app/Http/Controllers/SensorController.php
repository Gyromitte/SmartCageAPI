<?php

namespace App\Http\Controllers;

use App\Models\Sensor;
use App\Models\CageSensor;
use Illuminate\Http\Request;

class SensorController extends Controller
{   
    public function getSensor($sensor_id)
    {
        try
        {
            // Buscar el sensor con el id
            $sensor  = Sensor::find($sensor_id);

            if (is_null($sensor)) {
                return response()->json(['message' => 'El sensor no fue encontrado'], 404);
            }

            // Obtener el sensor
            $sensor = Sensor::where('sensor_id', $sensor_id)->get();

            if ($sensor->isEmpty()) {
                return response()->json(['message' => 'El sensor no tenia valores que retornar'], 404);
            }
            return response()->json($sensor);
        }catch (\Exception $e) {
            return response()->json(['message' => 'Error al obtener el sensor'], 500);
        }
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Sensor $sensor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Sensor $sensor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sensor $sensor)
    {
        //
    }
}
