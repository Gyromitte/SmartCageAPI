<?php

namespace App\Http\Controllers;

use Tymon\JWTAuth\Facades\JWTAuth;
use App\Models\CageSensor;
use App\Models\Cage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CageSensorController extends Controller
{   
    private $AIOKEY = "aio_mWEQ53yPHSJ1vQrk9VwaPGyCwxNt";
    private $RUTA = "https://io.adafruit.com/api/v2/valeriamorales/feeds"; // Ruta por defecto

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

    public function getSensoresDeJaula($cage_id)
    {
        try {
            // Busca la jaula con el ID proporcionado
            $cage = Cage::find($cage_id);
    
            if (is_null($cage)) {
                return response()->json(['message' => 'La jaula no fue encontrada'], 404);
            }
    
            // Busca los sensores asociados a la jaula específica
            $sensors = CageSensor::where('cage_id', $cage_id)->get();
    
            if ($sensors->isEmpty()) {
                return response()->json(['message' => 'No hay sensores disponibles para esta jaula'], 404);
            }
        
            return response()->json($sensors);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error al obtener los sensores de la jaula'], 500);
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
