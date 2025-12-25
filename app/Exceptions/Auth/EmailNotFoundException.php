<?php 

namespace App\Exceptions\Auth;

use Exception;

class EmailNotFoundException extends Exception {
    protected $message = "Email not found!";
    protected $code = 404;
}