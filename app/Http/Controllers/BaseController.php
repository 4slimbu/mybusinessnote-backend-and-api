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

    public function generatePrevNextLinks($model)
    {
        $data = [];

        if ($model instanceof Level) {
            $data['prev'] = route('start.section', $model->parent && $model->parent->first()->id);
            $data['next'] = route('start.section', $model->children->first() && $model->children->first()->id);
        }
        if ($model instanceof \App\Models\BusinessOption) {
            if ($model->parent_id === null) {
                dd('main business option');
            }
            dd('normal business option');
        }
    }
}
