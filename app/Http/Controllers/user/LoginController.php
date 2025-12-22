<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login(Request $request) {
        $validatedData = $request->validate([
            "email" => ['required', 'email'],
            "password" => ['required', 'min:8', 'string']
        ]);

        $user = User::where("email", $validatedData["email"])->first();
        
        if (!$user || Auth::check($validatedData["password"], $request->password)){
            return response()->json([
                "message" => "user not found"
            ], 404);
        }
        
        if(!Hash::check($validatedData["password"], $user->password)) {
            return response()->json([
                "message" => "invalid credentials"
            ], 401);
        }
        
        $token = $user->createToken('api')->plainTextToken;

        return response()->json([
            "user" => $user,
            "token" =>$token
        ]);
    }
}
