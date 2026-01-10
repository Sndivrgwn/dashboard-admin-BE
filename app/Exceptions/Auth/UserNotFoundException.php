<?php 

namespace App\Exceptions\Auth;

use Exception;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Throwable;

class UserNotFoundException extends HttpException {
    public function __construct()
    {
        parent::__construct(404, 'User Not found');
    }
}