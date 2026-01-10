<?php

namespace App\Exceptions\Auth;

use Exception;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Throwable;

class InvalidCredentialException extends HttpException {
    public function __construct()
    {
        parent::__construct(401, 'Invalid credentials');
    }
}