<?php

namespace App\Http\Controllers\UserDashboard;


use App\Http\Requests\UserDashboard\ProfileValidation\UpdateFormValidation;
use App\Http\Requests\UserDashboard\ProfileValidation\UpdatePasswordFormValidation;
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
    protected $view_path = 'user-dashboard.profile';

    /**
     * Base route
     * @var string
     */
    protected $base_route = 'user-dashboard.profile';

    /**
     * Title of page using this controller
     * @var string
     */
    protected $panel_name = 'Profile';


     /**
     * Array of panel actions
     * @var string
     */
    protected $panel_actions = array( 

        [ 'link' => '/user-dashboard/dashboard/profile/pdf', 'label' => 'Export to PDF']
    );

    /**
     * Show the edit page for Profile
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit()
    {
        //initialize
        $data = [];

        //get data
        $user = User::where('id', Auth::user()->id)->first();
        $data['row'] = $user;
        $data['userProfile'] = $user->userProfile;
        $data['affiliateLink'] = $user->affiliateLinks->first();
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

        $user = User::where('id', Auth::user()->id)->first();
        $user->update($input);

        Session::flash('success', $this->panel_name.' updated successfully.');
        return redirect()->back();
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
