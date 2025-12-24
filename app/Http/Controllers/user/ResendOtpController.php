<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\TwoFactorChallenge;
use App\Notifications\TwoFactorOtpNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ResendOtpController extends Controller
{
     public function resendOtp(Request $request)
    {
        $data = $request->validate([
            'challenge_id' => ['required','uuid'],
        ]);

        $challenge = TwoFactorChallenge::with('user')->find($data['challenge_id']);
        if (!$challenge) return response()->json(['message' => 'Challenge not found'], 404);

        if ($challenge->consumed_at) {
            return response()->json(['message' => 'Challenge has been used'], 400);
        }

        // cooldown 60 detik
        if ($challenge->last_sent_at && $challenge->last_sent_at->gt(now()->subSeconds(60))) {
            return response()->json(['message' => 'Wait a minute before resend'], 429);
        }

        // generate OTP baru + extend expiry
        $otp = (string) random_int(100000, 999999);

        $challenge->update([
            'code_hash' => Hash::make($otp),
            'expires_at' => now()->addMinutes(10),
            'attempts' => 0,
            'last_sent_at' => now(),
        ]);

        $challenge->user->notify(new TwoFactorOtpNotification($otp));

        return response()->json(['message' => 'OTP Resend!']);
    }
}
