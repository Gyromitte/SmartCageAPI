<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator; 

class UserController extends Controller
{
    public function index()
    {
        return User::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $validator = Validator::make($request->all(), [
        'name' => 'required|string|max:255',
        'lastname' => 'required|string|max:255',
        'email' => 'required|email|unique:users',
        'password' => 'required|string|min:6',
    ]);

    if ($validator->fails()) {
        return response()->json(['message' => 'Error creating user', 'errors' => $validator->errors()], 422);
    }

    $user = new User();
    $user->name = $request->name;
    $user->lastname = $request->lastname;
    $user->email = $request->email;
    $user->password = bcrypt($request->password);

    try {
        $user->save();
        return response()->json(['message' => 'User created successfully'], 201);
    } catch (\Exception $e) {
        return response()->json(['message' => 'Error creating user', 'error' => $e->getMessage()], 500);
    }
}


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return User::find($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::find($id);
        $user->name = $request->name;
        $user->lastname = $request->lastname;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->update();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);
        
        if(is_null($user)){
            return response()->json(['message' => 'Record not found'], 404);
        }

        $user->delete();
        return response()->noContent();
    }
}
