<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Services\Auth\ResendOtpService;
use Illuminate\Http\Request;

class ResendOtpController extends Controller
{
     public function __construct(private ResendOtpService $resend_otp_service)
    {
    }

     public function resendOtp(Request $request)
    {
        $data = $request->validate([
            'challenge_id' => ['required','uuid'],
        ]);

        return $this->resend_otp_service->resendOtp($data);
    }
}
