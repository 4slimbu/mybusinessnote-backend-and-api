<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Level;
use App\Models\BusinessOption;

class BaseApiController extends Controller
{
    protected $baseApiRoute = 'http://mbj.dev/api/';

    public function generatePrevNextLinks($model)
    {
        $data = [];

        if ($model instanceof Level) {
            $data['prev'] = route('start.section', $model->parent && $model->parent->first()->id);
            $data['next'] = route('start.section', $model->children->first() && $model->children->first()->id);
        }
        if ($model instanceof BusinessOption) {
            if ($model->parent_id === null) {
                dd('main business option');
            }
            dd('normal business option');
        }
    }
}
