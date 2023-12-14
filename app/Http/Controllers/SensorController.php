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
    
            // Nombre del tipo de sensor
            $sensorTypeName = $sensor->sensorType->name;

            // Unidad del sensor
            $sensorUnit = $sensor->sensorType->unit;

            $data = [
                'id' => $sensor->id,
                'sensor_type_name' => $sensorTypeName,
                'value' => $sensor->value,
                'sensor_unit'=> $sensorUnit
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
