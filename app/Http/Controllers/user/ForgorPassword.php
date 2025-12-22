<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

class ForgorPassword extends Controller
{
    public function forgotPassword(Request $request)
    {
        $request->validate(["email" => "required|email"]);

        $status =  Password::sendResetLink($request->only("email"));

        return $status === Password::RESET_LINK_SENT 
        ? response()->json(["message" => "Reset Link has sended"]) 
        : response()->json(["message" => "Error email not found"], 400);
    }
}
