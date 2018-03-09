<?php

namespace App\Http\Controllers\UserDashboard;


use App\Events\BrontoSubscriptionUpdated;
use App\Events\CampaignMonitorSubscriptionUpdated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session, AppHelper, PDF;


class CommunicationPreferenceController extends BaseController
{
    /**
     * Path to base view folder
     * @var string
     */
    protected $view_path = 'user-dashboard.communication-preference';

    /**
     * Base route
     * @var string
     */
    protected $base_route = 'user-dashboard.communication-preference';

    /**
     * Title of page using this controller
     * @var string
     */
    protected $panel_name = 'Communication Preference';

    /**
     * Displays List of communication preferences.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //initialize
        $data = [];

        //get data
        $data['user'] = Auth::user()->load('business');

        return view(parent::loadViewData($this->view_path . '.edit'), compact('data'));
    }

    /**
     * Update User Communication Preferences.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        //ignore user value and set the boolean depending upon whether key is present in the request
        $input = [
            'is_3rd_party_integration' => $request->get('is_3rd_party_integration') ? 1 : 0,
            'is_marketing_emails' => $request->get('is_marketing_emails') ? 1 : 0,
            'is_free_isb_subscription' => $request->get('is_free_isb_subscription') ? 1 : 0,
        ];

        //update user
        $user = Auth::user();
        $user->update($input);

        //fire events
        event(new BrontoSubscriptionUpdated($user));
        event(new CampaignMonitorSubscriptionUpdated($user));

        //response
        Session::flash('success', $this->panel_name.' updated successfully.');
        return redirect()->route($this->base_route);
    }

}
