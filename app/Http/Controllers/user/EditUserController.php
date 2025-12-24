<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class EditUserController extends Controller
{
    public function update(Request $request)
    {
        $data = $request->validate([
            "first_name" => "nullable|string",
            "last_name" => "nullable|string",
            "email" => "nullable|email",
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

    public function updatePassword(Request $request)
    {
        $data = $request->validate([
            "current_password" => "required",
            "new_password" => "required|min:8|confirmed",
        ]);

        $user = auth()->user();

        if (!$user) {
            return response()->json([
                "message" => "User not found"
            ], 404);
        }

        if (!Hash::check($data["current_password"], $user->password)) {
            return response()->json([
                "message" => "Current password is incorrect"
            ], 422);
        }

        if (Hash::check($data["new_password"], $user->password)) {
            return response()->json([
                "message" => "New password must be different from current password"
            ], 422);
        }

        $user->password = Hash::make($data["new_password"]);
        $user->save();

        return response()->json([
            "message" => "Password updated successfully"
        ]);
    }

    public function updateAvatar(Request $request)
    {
        $data = $request->validate([
            "avatar" => "required|image|max:2048",
        ]);

        $user = auth()->user();

        if (!$user) {
            return response()->json([
                "message" => "User not found"
            ], 404);
        }

        $avatarPath = $data["avatar"]->store("avatars", "public");

        if (!empty($user->avatar)) {
            Storage::disk("public")->delete($user->avatar);
        }

        $user->avatar = $avatarPath;
        $user->save();

        return response()->json([
            "message" => "Avatar updated successfully",
            "avatar" => $avatarPath
        ]);
    }
}
