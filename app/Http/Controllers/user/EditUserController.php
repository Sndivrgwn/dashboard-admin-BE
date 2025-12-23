<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EditUserController extends Controller
{
    public function update(Request $request)
    {
        $data = $request->validate([
            "first_name" => "nullable|string",
            "last_name" => "nullable|string",
            "bio" => "nullable|string",
            "phone" => "nullable|string|min:7|max:20",
            "job_title" => "nullable|string",
            "country" => "nullable|string",
            "city_state" => "nullable|string",
            "postal_code" => "nullable|string",
            "tax_id" => "nullable|string",
        ]);

        $user = auth()->user();

        if(!$user) {
            return response()->json([
                "message" => "User not found"
            ], 404);
        }

        $user->update($data);

        $change = $user->getChanges();

        return response()->json([
            "message" => "User has successfuly updated!",
            "user" => $change
        ]);
    }
}
