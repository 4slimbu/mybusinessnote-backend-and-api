<?php

namespace App\Exceptions;

use Exception;

class InvalidImageException extends Exception
{
    protected $message = "Invalid Image";
}
