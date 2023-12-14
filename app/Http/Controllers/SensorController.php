<?php

namespace App\Http\Controllers;

use App\Models\Sensor;
use App\Models\CageSensor;
use Illuminate\Http\Request;

class SensorController extends Controller
{   
    public function getSensor($sensor_id)
    {
        try {
            $sensor = Sensor::with('sensorType')->find($sensor_id);
    
            if (is_null($sensor)) {
                return response()->json(['message' => 'El sensor no fue encontrado'], 404);
            }
    
            // Acceder al nombre del tipo de sensor a través de la relación
            $sensorTypeName = $sensor->sensorType->name;
    
            $data = [
                'id' => $sensor->id,
                'sensor_type_name' => $sensorTypeName,
                'value' => $sensor->value
            ];
    
            return response()->json($data);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error al obtener el sensor: ' . $e->getMessage()], 500);
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
