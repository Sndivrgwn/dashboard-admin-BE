<?php 

namespace App\Exceptions\Auth;

use Exception;

class TokenInvalidException extends Exception {
    protected $message = "Token Invalid!";
    protected $code = 400;
}