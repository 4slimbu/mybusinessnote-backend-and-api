<?php

namespace App\Http\Controllers\PartnerDashboard;


use App\Http\Requests\PartnerDashboard\ProfileValidation\UpdateFormValidation;
use App\Http\Requests\PartnerDashboard\ProfileValidation\UpdatePasswordFormValidation;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Session, AppHelper;


class ProfileController extends BaseController
{
    /**
     * Path to base view folder
     * @var string
     */
    protected $view_path = 'partner-dashboard.profile';

    /**
     * Base route
     * @var string
     */
    protected $base_route = 'partner-dashboard.profile';

    /**
     * Title of page using this controller
     * @var string
     */
    protected $panel_name = 'Profile';

    public function index()
    {
        //initialize
        $data = [];

        //get data
        $partner = User::where('id', Auth::user()->id)->first();
        $data['row'] = $partner;
        $data['userProfile'] = $partner->userProfile;
        $data['affiliateLink'] = $partner->affiliateLinks->first();
        $data['roles'] = Role::pluck('name', 'id');

        return view(parent::loadViewData($this->view_path . '.edit'), compact('data'));
    }

    /**
     * Update the specified profile.
     *
     * @param UpdateFormValidation|\Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     * @internal param User $profile
     */
    public function update(UpdateFormValidation $request)
    {
        //remove secure fields if present
        $request->offsetUnset('role_id', 'password');
        $input = $request->all();

        $partner = User::where('id', Auth::user()->id)->first();
        $partner->update($input);
        $partner->userProfile->update($input);

        if ($request->get('affiliate_link_label') && $request->get('affiliate_link')) {
            $affiliateLink = $partner->affiliateLinks->first();
            $affiliateLink->name = $request->get('affiliate_link_label');
            $affiliateLink->link = $request->get('affiliate_link');
            $affiliateLink->save();
        }

        Session::flash('success', $this->panel_name.' updated successfully.');
        return redirect()->route($this->base_route);
    }


    public function editPassword()
    {
        //initialize

        return view(parent::loadViewData($this->view_path . '.edit-password'));
    }


    /**
     * Update the specified business option in storage.
     *
     * @param UpdatePasswordFormValidation|UpdateFormValidation|\Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     * @internal param User $profile
     */
    public function updatePassword(UpdatePasswordFormValidation $request)
    {
        $input = $request->only('password', 'password_confirmation');
        $profile = User::where('id', Auth::user()->id)->first();
        $profile->fill($input)->save();

        Session::flash('success', $this->panel_name.' updated successfully.');
        return redirect()->back();
    }

}
