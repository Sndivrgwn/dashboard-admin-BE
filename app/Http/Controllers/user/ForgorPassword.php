<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Http\Requests\EmailRequest;
use App\Services\Auth\ForgotPasswordService;

class ForgorPassword extends Controller
{
    public function __construct(private ForgotPasswordService $forgot_password_service)
    {
    }

    public function forgotPassword(EmailRequest $request)
    {
        $data = $request->validated();

        $res = $this->forgot_password_service->forgotPassword($data);

        return $res === true 
        ? response()->json(["message" => "reset password link has been sended"]) 
        : $res;
    }
}
