<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Services\Auth\VerifyOtpService;
use Illuminate\Http\Request;

class VerifyOtpController extends Controller
{
    public function __construct(private VerifyOtpService $verify_otp_service)
    {
    }

    public function verifyOtp(Request $request){
        $data = $request->validate([
            "challenge_id" => ["required", "uuid"],
            "otp" => ["required", "digits:6"]
        ]);

        return $this->verify_otp_service->verifyOtp($data);
    }
}
