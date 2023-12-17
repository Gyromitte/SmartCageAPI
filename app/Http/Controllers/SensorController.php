<?php

namespace App\Http\Controllers;

use App\Models\Sensor;
use App\Models\CageSensor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SensorController extends Controller
{   
    private $AIOKEY = "aio_mBLL88G7WIioCRBNkAu2IwqXcBK8";
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

    public function enviarDatos(Request $request, $sensor_route, $dato)
    {
        try {
            // Construir la URL del feed
            $sensorRoute = $sensor_route . '/data';
            $url = $this->RUTA . $sensorRoute;

            $response = Http::withHeaders([
                'X-AIO-Key' => $this->AIOKEY,
                'Content-Type' => 'application/json',
            ])->post($url, [
                'value' => $dato // dato que se enviara al feed
            ]);

            if ($response->successful()) {
                return response()->json([
                    "msg" => "Dato enviado correctamente a Adafruit",
                    "data" => $response->json()
                ], 200);
            } else {
                return response()->json([
                    "msg" => "Error al enviar el dato a Adafruit",
                    "data" => $response->body()
                ], $response->status());
            }
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error al enviar los datos al feed de Adafruit: ' . $e->getMessage()], 500);
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
