<?php 

namespace App\Services\Auth;

use App\Exceptions\Auth\CurrentPasswordInvalidException;
use App\Exceptions\Auth\NewPasswordHasToBeDiffrenetException;
use App\Exceptions\Auth\UserNotFoundException;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class EditUserService {
    public function Update(array $data) {
        $user = auth()->user();

        if(!$user) {
            throw new UserNotFoundException();
        }

        $user->update($data);

        return true;
    }

    public function updatePassword(array $data) {
        $user = auth()->user();

        if (!$user) {
            throw new UserNotFoundException();
        }

        if (!Hash::check($data["current_password"], $user->password)) {
            throw new CurrentPasswordInvalidException();
        }

        if (Hash::check($data["new_password"], $user->password)) {
            throw new NewPasswordHasToBeDiffrenetException();
        }

        $user->password = Hash::make($data["new_password"]);
        $user->save();

        return true;
    }

    public function updateAvatar(array $data) {
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

        return $avatarPath;
    }
}