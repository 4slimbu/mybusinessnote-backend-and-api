<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use View;

class AdminBaseController extends Controller
{
    protected function loadViewData($path)
    {
        View::composer($path, function ($view) {
            $view->with('root_route', 'backend.dashboard');
            $view->with('base_route', $this->base_route);
            $view->with('view_path', $this->view_path);
            $view->with('panel_name', $this->panel_name);

            if (isset($this->panel_actions)) {
                $view->with('panel_actions', $this->panel_actions);
            }

            if (property_exists($this, 'upload_directory')) {
                $view->with('upload_directory', $this->upload_directory);
            }
        });

        return $path;
    }

}
