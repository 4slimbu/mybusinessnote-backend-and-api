<?php

namespace App\Http\Controllers\UserDashboard;


use App\Http\Requests\Admin\UserValidation\CreateFormValidation;
use App\Http\Requests\Admin\UserValidation\UpdateFormValidation;
use App\Models\Role;
use App\Models\User;
use Session, AppHelper;


class ProfileController extends AdminBaseController
{
    /**
     * Path to base view folder
     * @var string
     */
    protected $view_path = 'admin.profile';

    /**
     * Base route
     * @var string
     */
    protected $base_route = 'admin.profile';

    /**
     * Title of page using this controller
     * @var string
     */
    protected $panel_name = 'User';

    /**
     * Display a listing of the business option.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //initialize
        $data = [];

        //get data
        $data['rows'] = User::with('role')->orderBy('id', 'desc')
            ->paginate(AppHelper::getSystemConfig('pagination'));

        return view(parent::loadViewData($this->view_path . '.index'), compact('data'));
    }

    /**
     * Show the form for creating a new business option.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //initialize
        $data = [];

        //get data
        $data['roles'] = Role::pluck('name', 'id');

        return view(parent::loadViewData($this->view_path . '.create'), compact('data'));
    }

    /**
     * Store a newly created business option in storage.
     *
     * @param CreateFormValidation|\Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateFormValidation $request)
    {
        $inputs = $request->all();
        if ($inputs['same_address']) {
            $inputs['residential_street1'] = $inputs['billing_street1'];
            $inputs['residential_street2'] = $inputs['billing_street2'];
            $inputs['residential_postcode'] = $inputs['billing_postcode'];
            $inputs['residential_state'] = $inputs['billing_state'];
            $inputs['residential_suburb'] = $inputs['billing_suburb'];
            $inputs['residential_country'] = $inputs['billing_country'];
        }

        User::create($inputs);

        Session::flash('success', $this->panel_name.' created successfully.');
        return redirect()->route($this->base_route);

    }

    /**
     * Display the specified business option.
     *
     * @param  \App\Models\User $profile
     * @return \Illuminate\Http\Response
     */
    public function show(User $profile)
    {
        //
    }

    /**
     * Show the form for editing the specified business option.
     *
     * @param  \App\Models\User $profile
     * @return \Illuminate\Http\Response
     */
    public function edit(User $profile)
    {
        //initialize
        $data = [];

        //get data
        $data['row'] = $profile;
        $data['roles'] = Role::pluck('name', 'id');

        return view(parent::loadViewData($this->view_path . '.edit'), compact('data'));
    }

    /**
     * Update the specified business option in storage.
     *
     * @param UpdateFormValidation|\Illuminate\Http\Request $request
     * @param  \App\Models\User $profile
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFormValidation $request, User $profile)
    {

        $input = $request->all();
        $profile->fill($input)->save();

        Session::flash('success', $this->panel_name.' updated successfully.');
        return redirect()->route($this->base_route);
    }

    /**
     * Remove the specified business option from storage.
     *
     * @param  \App\Models\User $profile
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $profile)
    {
        $profile->delete();

        Session::flash('success', $this->panel_name.' deleted successfully.');
        return redirect()->route($this->base_route);
    }
}
