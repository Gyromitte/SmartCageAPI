<?php

namespace App\Http\Controllers;

use App\Models\CageSensor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CageSensorController extends Controller
{   
    private $AIOKEY = "aio_Qkpv22MBMkdRZOz2v96HxS5TgJMj";
    private $RUTA = "https://io.adafruit.com/api/v2/Pedro26hiram/feeds"; // Ruta por defecto

    public function water(Request $request){
        $response = Http::withHeaders([
            'X-AIO-Key' => $this->AIOKEY,
        ])->get($this->RUTA . '/jaula.agua/data/last');  // Concatenar las partes que queremos consultar

        if($response->ok()){
            return response()->json([
                "msg" => "Si",
                "data" => $response->json()
            ], 200);
        } else {
            return response()->json([
                "msg" => "No",
                "data" => $response->body()
            ],$response->status());
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
    public function show(CageSensor $cageSensor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CageSensor $cageSensor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CageSensor $cageSensor)
    {
        //
    }
}
