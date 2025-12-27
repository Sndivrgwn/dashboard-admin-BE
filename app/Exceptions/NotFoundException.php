<?php 

namespace App\Exceptions;

use Exception;
use Throwable;

class NotFoundException extends Exception {
    public function __construct(string $message = "", int $code = 404, Throwable|null $previous = null)
    {
        return parent::__construct($message, $code, $previous);
    }
}