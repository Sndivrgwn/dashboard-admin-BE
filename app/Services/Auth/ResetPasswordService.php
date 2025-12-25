<?php 

namespace App\Services\Auth;

use App\Exceptions\Auth\TokenInvalidException;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;

class ResetPasswordService {
    public function resetPassword(array $data) {
        $status = Password::reset(
            $data,
            function($user, $password) {
                $user->forceFill([
                    "password" => Hash::make($password)
                ])->save();
            }
        );

        return $status === Password::PASSWORD_RESET 
        ? true
        : throw new TokenInvalidException();
    }
}