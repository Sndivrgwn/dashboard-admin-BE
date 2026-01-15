<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Http\Requests\ResetPasswordRequest;
use App\Services\Auth\ResetPasswordService;

class ResetPasswordController extends Controller
{
    public function __construct(protected ResetPasswordService $reset_password_service)
    {
    }

    public function resetPassword(ResetPasswordRequest $request) {
        $data  = $request->validated();

        $res = $this->reset_password_service->resetPassword($data);

        return $res === true 
        ? response()->json(["message" => "Password has been reseted!"]) 
        : $res;
    }
}
