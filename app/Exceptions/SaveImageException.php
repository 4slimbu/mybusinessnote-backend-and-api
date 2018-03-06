<?php

namespace App\Exceptions;

use Exception;

class SaveImageException extends Exception
{
    protected $message = "Failed to save image";
}
