<?php

namespace App\Utilities;

class ApiSession
{
    protected $data = [];

    public function attach($key, $value)
    {
        if ($key && $value) {
            $this->data[$key] = $value;

            return true;
        }

        return false;
    }

    public function get($key)
    {
        if (key_exists($key, $this->data)) {
            return $this->data[$key];
        }

        return false;
    }
}