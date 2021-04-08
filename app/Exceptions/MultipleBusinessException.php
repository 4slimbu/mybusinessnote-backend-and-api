<?php

namespace App\Exceptions;

use Exception;

class MultipleBusinessException extends Exception
{
    protected $message = "User can't have multiple business";
}
