<?php 

namespace App\Services\Auth;

use App\Exceptions\Auth\EmailNotFoundException;
use Illuminate\Support\Facades\Password;

class ForgotPasswordService {
    public function forgotPassword(array $data) {
        $status =  Password::sendResetLink($data);

        return $status === Password::RESET_LINK_SENT 
        ? true 
        : throw new EmailNotFoundException();
    }
}