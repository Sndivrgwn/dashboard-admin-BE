<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;

class ResetPasswordController extends Controller
{
    public function resetPassword(Request $request) {
        $request->validate([
            "token" => "required|string",
            "email" => "required|email",
            "password" => "required|min:8|confirmed",
        ]);

        $status = Password::reset(
            $request->only("email", "password", "password_confirmation", "token"),
            function($user, $password) {
                $user->forceFill([
                    "password" => Hash::make($password)
                ])->save();
            }
        );

        return $status === Password::PASSWORD_RESET 
        ? response()->json(["message" => "Password has been reset"]) 
        : response()->json(["message" => "Error token invalid"], 400);
    }
}
