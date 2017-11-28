<?php

namespace App\Http\Controllers;

use App\Models\Level;
use Illuminate\Support\Facades\View;

class BaseController extends Controller
{
    protected function loadViewData($path)
    {
        View::composer($path, function($view)
        {
            //get data
            $levels = Level::with('children')->where('parent_id', null)->get();
            $view->with('levels', $levels);

        });

        return $path;
    }
}
