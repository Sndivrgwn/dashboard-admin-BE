<?php 

namespace App\Exceptions\Auth;

use Exception;

class CurrentPasswordInvalidException extends Exception {
    protected $message = "Current password is incorrect";
    protected $code = 422;
}