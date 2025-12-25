<?php

namespace App\Services\Auth;

use App\Exceptions\Auth\EmailHasTakenException;
use App\Exceptions\Auth\UserNotFoundException;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterService
{
    public function register(array $data)
    {
        if (User::emailHasTaken($data["email"])) {
            throw new EmailHasTakenException();
        }

        $password = Hash::make($data["password"]);

        $user = User::create([
            "email" => $data["email"],
            "first_name" => $data["first_name"],
            "last_name" => $data["last_name"],
            "password" => $password
        ]);

        if (!$user) {
            throw new UserNotFoundException();
        }

        return $user;
    }
}
