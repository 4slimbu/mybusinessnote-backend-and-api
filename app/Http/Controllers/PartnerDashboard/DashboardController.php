<?php

namespace App\Http\Controllers\PartnerDashboard;


use AppHelper;
use Session;


class DashboardController extends BaseController
{
    /**
     * Path to base view folder
     * @var string
     */
    protected $view_path = 'partner-dashboard.dashboard';

    /**
     * Base route
     * @var string
     */
    protected $base_route = 'partner-dashboard.dashboard';

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
        //initialize
        $data = [];

        return view(parent::loadViewData($this->view_path . '.index'), compact('data'));
    }

}
