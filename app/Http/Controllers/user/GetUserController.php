<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GetUserController extends Controller
{
    public function getUser(Request $request) {
        if(!$request->user()) {
            return response()->json([
                ["error" => "You have to login first"]
            ]);
        }

        return response()->json([
            "user" => $request->user()
        ]);
    }
}
