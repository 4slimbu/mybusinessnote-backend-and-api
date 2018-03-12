<?php

namespace App\Http\Controllers\UserDashboard;

use App\Http\Controllers\Controller;
use App\Traits\Authenticable;
use Illuminate\Support\Facades\Auth;
use View;

class BaseController extends Controller
{
    use Authenticable;

    protected function loadViewData($path)
    {
        View::composer($path, function ($view) {
            $view->with('react_app_url', getenv('REACT_APP_URL'));
            $view->with('jwt_token', $this->getTokenFromUser(Auth::user()));
            $view->with('root_route', 'user.dashboard');
            $view->with('base_route', $this->base_route);
            $view->with('view_path', $this->view_path);
            $view->with('panel_name', $this->panel_name);

            if (isset($this->panel_actions))
                $view->with('panel_actions', $this->panel_actions);

            if (property_exists($this, 'upload_directory')) {
                $view->with('upload_directory', $this->upload_directory);
            }

        });

        return $path;
    }

}
