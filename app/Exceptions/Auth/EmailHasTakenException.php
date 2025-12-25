<?php 
namespace App\Exceptions\Auth;

use Exception;

class EmailHasTakenException extends Exception{
    protected $message = "Email Has taken!";
    protected $code = 429;
}