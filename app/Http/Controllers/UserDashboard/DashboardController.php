<?php

namespace App\Http\Controllers\UserDashboard;


use App\Http\Requests\Admin\UserValidation\CreateFormValidation;
use App\Http\Requests\Admin\UserValidation\UpdateFormValidation;
use App\Models\Role;
use App\Models\User;
use Session, AppHelper;


class DashboardController extends BaseController
{
    /**
     * Path to base view folder
     * @var string
     */
    protected $view_path = 'user-dashboard.dashboard';

    /**
     * Base route
     * @var string
     */
    protected $base_route = 'user-dashboard.dashboard';

    /**
     * Title of page using this controller
     * @var string
     */
    protected $panel_name = 'User Dashboard';

    /**
     * Displays user dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //initialize
        $data = [];

        return view(parent::loadViewData($this->view_path . '.index'), compact('data'));
    }

}
