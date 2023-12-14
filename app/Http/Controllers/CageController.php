<?php

namespace App\Http\Controllers;

use App\Models\Cage;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;


class CageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            // Intenta obtener el usuario desde el token JWT
            $user = JWTAuth::parseToken()->authenticate();
    
            // Si se obtiene el usuario, obtén el user_id
            $user_id = $user->id;
    
            // Filtra las jaulas por el user_id
            $cages = Cage::where('user_id', $user_id)->get();
    
            if ($cages->isEmpty()) {
                return response()->json(['message' => 'No hay jaulas disponibles para este usuario'], 404);
            }
    
            return response()->json($cages);
        } catch (\Exception $e) {
            // Manejo de errores, por ejemplo, el token es inválido
            return response()->json(['message' => 'Error al obtener el usuario autenticado'], 500);
        }
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
    public function show(Cage $cage)
    {
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cage $cage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cage $cage)
    {
        //
    }
}
