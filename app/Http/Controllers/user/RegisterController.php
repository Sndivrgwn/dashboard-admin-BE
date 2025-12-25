<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRegisterRequest;
use App\Services\Auth\RegisterService;

class RegisterController extends Controller
{
    public function __construct(private RegisterService $register_service)
    {
    }

    public function register(StoreRegisterRequest $request) {
        $data = $request->validated();
        
        $user = $this->register_service->register($data);

        return response()->json([
            "user" => $user
        ]);
    }
}
