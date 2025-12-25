<?php

namespace App\Exceptions\Auth;

use Exception;
use Throwable;

class InvalidCredentialException extends Exception {
    public function __construct(string $message = "Invalid Credentials", int $code = 401, Throwable|null $previous = null)
    {
        return parent::__construct($message, $code, $previous);
    }
}