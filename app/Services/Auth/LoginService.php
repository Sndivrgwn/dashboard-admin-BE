<?php

namespace App\Services\Auth;

use App\Exceptions\Auth\InvalidCredentialException;
use App\Exceptions\Auth\UserNotFoundException;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class LoginService
{
    public function login(array $data)
    {
        $user = User::where("email", $data["email"])->first();

        if (!$user) {
            throw new UserNotFoundException();
        }

        if (!Hash::check($data["password"], $user->password)) {
            throw new InvalidCredentialException();
        }

        $token = $user->createToken('api')->plainTextToken;

        return [$token, $user];
    }
}
