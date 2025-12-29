<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Services\user\UserService;
use Illuminate\Http\Request;

class GetUserController extends Controller
{
    public function __construct(private UserService $userService)
    {
    }

    public function getUser(Request $request) {
        if(!$request->user()) {
            return response()->json([
                ["error" => "You have to login first"]
            ]);
        }

        return response()->json([
            "user" => $this->userService->getAll()->get()
        ]);
    }

    public function getUserById($id) {
        return response()->json([
            "user" => $this->userService->getById($id)->get()
        ]);
    }
}
