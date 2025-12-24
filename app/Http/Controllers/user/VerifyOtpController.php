<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\TwoFactorChallenge;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class VerifyOtpController extends Controller
{
    public function verifyOtp(Request $request){
        $data = $request->validate([
            "challenge_id" => ["required", "uuid"],
            "otp" => ["required", "digits:6"]
        ]);

        $challenge = TwoFactorChallenge::with('user')
        ->where('id', $data["challenge_id"])
        ->first();

        if(!$challenge) {
            return response()->json([
                "message" => "Error challenges not found"
            ], 404);
        }

        if($challenge->consumed_at || $challenge->expires_at->isPast()) {
            return response()->json([
                "message" => "OTP expired. Try again"
            ], 400);
        }

        if ($challenge->attempts >= 5) {
            return response()->json([
                "message" => "Too much attempts. Try again later"
            ], 429);
        }
        
        $challenge->increment('attempts');
        
        if(!Hash::check($data["otp"], $challenge->code_hash)) {
            return response()->json([
                "message" => "OTP token invalid"
            ], 401);
        }

        $challenge->update(["consumed_at" => now()]);

        $user = $challenge->user;

        $user->tokens()->delete();

        $token = $user->createToken('api')->plainTextToken;

        return response()->json([
            "require_2fa" => false,
            'user' => $user,
            'token' => $token,
        ]);
    }
}
