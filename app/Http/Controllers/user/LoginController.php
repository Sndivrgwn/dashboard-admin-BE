<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use App\Services\Auth\LoginService;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function __construct(private LoginService $login_service)
    {
    }

    public function login(LoginRequest $request) {
        $data = $request->validated();

        [$token, $user] = $this->login_service->login($data);
        

        return response()->json([
            "user" => $user,
            "token" =>$token
        ]);
    }
}
