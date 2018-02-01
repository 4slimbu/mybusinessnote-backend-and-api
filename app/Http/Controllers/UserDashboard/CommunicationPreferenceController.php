<?php

namespace App\Http\Controllers\UserDashboard;


use App\Events\UserUpdated;
use App\Models\User;
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
        $data['user'] = User::with('business')->where('id', Auth::user()->id)->first();

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
        //remove secure fields if present
        $input = [
            'is_3rd_party_integration' => $request->get('is_3rd_party_integration') ? 1 : 0,
            'is_marketing_emails' => $request->get('is_marketing_emails') ? 1 : 0,
            'is_free_isb_subscription' => $request->get('is_free_isb_subscription') ? 1 : 0,
        ];

        $user = User::where('id', Auth::user()->id)->first();
        $oldUser = clone $user;
        $user->update($input);

        event(new UserUpdated($oldUser, $user));
        Session::flash('success', $this->panel_name.' updated successfully.');
        return redirect()->route($this->base_route);
    }

}
