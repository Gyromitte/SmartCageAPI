<?php

namespace App\Http\Controllers;

use App\Models\Cage;
use Illuminate\Http\Request;

class CageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Cage::all();
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
