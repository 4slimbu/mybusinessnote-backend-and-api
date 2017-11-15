<?php
namespace App\Facade;

use Illuminate\Support\Facades\Facade;

class AppHelperFacade extends Facade
{
    protected static function getFacadeAccessor() {return 'apphelper';}
}