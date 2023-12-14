<?php

namespace App\Http\Controllers;

use App\Models\Sensor;
use App\Models\CageSensor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SensorController extends Controller
{   
    private $AIOKEY = "aio_gvmG02nVb9WZ4wjNpsnD1wUE713T";
    private $RUTA = "https://io.adafruit.com/api/v2/valeriamorales/feeds/"; // Ruta por defecto

    public function getSensorData(Request $request, $sensor_route)
    {
        try {
            // Construir la Url
            $sensorRoute = $sensor_route . '/data/last';
    
            $response = Http::withHeaders([
                'X-AIO-Key' => $this->AIOKEY,
            ])->get($this->RUTA . $sensorRoute);
    
            if ($response->ok()) {
                return response()->json([
                    "msg" => "Si",
                    "data" => $response->json()
                ], 200);
            } else {
                return response()->json([
                    "msg" => "No",
                    "data" => $response->body()
                ], $response->status());
            }
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error al obtener los datos del sensor: ' . $e->getMessage()], 500);
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
