<?php

namespace App\Http\Controllers\UserDashboard;


use App\Http\Requests\Admin\UserValidation\CreateFormValidation;
use App\Http\Requests\Admin\UserValidation\UpdateFormValidation;
use App\Models\Role;
use App\Models\User;
use Session, AppHelper;


class DashboardController extends AdminBaseController
{
    /**
     * Path to base view folder
     * @var string
     */
    protected $view_path = 'partner.dashboard';

    /**
     * Base route
     * @var string
     */
    protected $base_route = 'partner.dashboard';

    /**
     * Title of page using this controller
     * @var string
     */
    protected $panel_name = 'Partner Dashboard';

    /**
     * Displays partner dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        dd("here");
        //initialize
        $data = [];

        return view(parent::loadViewData($this->view_path . '.index'), compact('data'));
    }

}
