<?php

namespace App\Exceptions;

use Exception;

class InvalidRequestException extends Exception
{
    protected $message = 'Invalid Request';
}
