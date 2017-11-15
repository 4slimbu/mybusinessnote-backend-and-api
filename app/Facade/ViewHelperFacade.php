<?php
namespace App\Facade;

use Illuminate\Support\Facades\Facade;

class ViewHelperFacade extends Facade
{
    protected static function getFacadeAccessor() {return 'viewhelper';}
}