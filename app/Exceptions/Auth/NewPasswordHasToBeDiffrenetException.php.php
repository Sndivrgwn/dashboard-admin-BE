<?php 

namespace App\Exceptions\Auth;

use Exception;

class NewPasswordHasToBeDiffrenetException extends Exception {
    protected $message = "New password must be different from current password";
    protected $code = 422;
}