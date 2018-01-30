<?php

namespace App\Http\Controllers\PartnerDashboard;


use App\Models\AffiliateLinkTracker;
use App\Traits\Authenticable;
use Illuminate\Support\Facades\Auth;
use Session, AppHelper;


class LeadController extends BaseController
{
    /**
     * Path to base view folder
     * @var string
     */
    protected $view_path = 'partner-dashboard.lead';

    /**
     * Base route
     * @var string
     */
    protected $base_route = 'partner-dashboard.lead';

    /**
     * Title of page using this controller
     * @var string
     */
    protected $panel_name = 'Lead';

    /**
     * Display a listing of the lead.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //initialize
        $data = [];

        //get data
        $partner_id = Auth::user()->id;
        $data['rows'] = AffiliateLinkTracker::with('user', 'business', 'businessOption')->withAndWhereHas('affiliateLink', function($query) use ($partner_id){
            $query->where('user_id', $partner_id);
        })
            ->paginate(10);

        return view(parent::loadViewData($this->view_path . '.index'), compact('data'));
    }

}
