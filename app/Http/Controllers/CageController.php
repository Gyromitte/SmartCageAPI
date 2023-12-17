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

    public function createCageForUser(Request $request)
    {
        try {
            // Intenta obtener el usuario desde el token JWT
            $user = JWTAuth::parseToken()->authenticate();
    
            // Obtén los datos validados de la solicitud
            $validatedData = $request->validate([
                'name' => 'required',
                'description' => 'required',
            ], [ 
                'name.required' => 'El nombre de la jaula es obligatorio',
                'description.required' => 'La descripción de la jaula es obligatoria',
            ]);
    
            // Crea la jaula asociada al usuario autenticado
            $cage = Cage::create([
                'name' => $validatedData['name'],
                'description' => $validatedData['description'],
                'user_id' => $user->id, // Asigna el user_id del usuario autenticado
            ]);
    
            return response()->json(['message' => 'Jaula creada con éxito', 'cage' => $cage], 201);
        } catch (\Exception $e) {
            // Manejo de errores, por ejemplo, el token es inválido
            return response()->json(['message' => 'Error al crear la jaula'], 500);
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
