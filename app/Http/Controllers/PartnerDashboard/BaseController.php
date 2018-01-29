<?php

namespace App\Http\Controllers\PartnerDashboard;

use App\Http\Controllers\Controller;
use View;
class BaseController extends Controller
{
    protected function loadViewData($path)
    {
        View::composer($path, function($view)
        {
            $view->with('root_route', 'partner.dashboard');
            $view->with('base_route', $this->base_route);
            $view->with('view_path', $this->view_path);
            $view->with('panel_name', $this->panel_name);
            if (property_exists($this, 'upload_directory')) {
                $view->with('upload_directory', $this->upload_directory);
            }

        });

        return $path;
    }

}
