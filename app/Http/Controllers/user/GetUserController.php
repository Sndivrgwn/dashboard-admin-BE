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

        $user = $this->userService->getById($request->user()->id);

        return response()->json([
            "user" => $user,
            "role" => $user?->getRoleNames(),
        ]);
    }

    public function getUserById($id) {
        $user = $this->userService->getById($id);

        return response()->json([
            "user" => $user,
            "role" => $user?->getRoleNames(),
        ]);
    }
}
