<?php

namespace App\Http\Controllers;

use App\Models\CageSensor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CageSensorController extends Controller
{
    public function water(Request $request){
        $response = Http::withHeaders([
            'X-AIO-Key' => "aio_znOT705Jd39JYlCuN6hwk2zcUFff",
        ])->get('https://io.adafruit.com/api/v2/Pedro26hiram/groups/jaula');

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
