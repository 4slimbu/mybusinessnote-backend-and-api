<?php

namespace App\Http\Controllers\Admin;


use App\Http\Requests\Admin\DashboardValidation\CreateFormValidation;
use App\Http\Requests\Admin\DashboardValidation\UpdateFormValidation;
use App\Models\Role;
use App\Models\User;
use Session, AppHelper;


class DashboardController extends AdminBaseController
{
    /**
     * Path to base view folder
     * @var string
     */
    protected $view_path = 'admin.dashboard';

    /**
     * Base route
     * @var string
     */
    protected $base_route = 'admin';

    /**
     * Title of page using this controller
     * @var string
     */
    protected $panel_name = 'Dashboard';

    /**
     * Display the dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view(parent::loadViewData($this->view_path . '.index'), compact('data'));
    }

}
