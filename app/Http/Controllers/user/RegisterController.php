<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function register(Request $request) {
        $validated = Validator::make($request->all(), [
            "first_name" => "required|string",
            "last_name" => "required|string",
            "email" => "required|email",
            "password" => "required|min:8|string"
        ]);

        if($validated->fails()){
            return response()->json(["Validation error" => $validated->errors()], 400);
        }
        
        $data = $validated->getData();
        
        if(User::emailHasTaken($data["email"])){
            return response()->json(["message" => "Email has taken"], 422);
        }

        $password = Hash::make($data["password"]);

        $user = User::create([
            "first_name" => $data["first_name"],
            "last_name" => $data["last_name"],
            "email" => $data["email"],
            "password" => $password
        ]);

        if(!$user) {
            return response()->json([
                "message" => "Something wrong when sending data"
            ], 422);
        }

        return response()->json([
            "user" => $user
        ]);
    }
}
