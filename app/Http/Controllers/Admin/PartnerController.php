<?php

namespace App\Http\Controllers\Admin;


use App\Http\Requests\Admin\PartnerValidation\CreateFormValidation;
use App\Http\Requests\Admin\PartnerValidation\UpdateFormValidation;
use App\Models\AffiliateLink;
use App\Models\Role;
use App\Models\User;
use App\Models\UserProfile;
use Session, AppHelper;


class PartnerController extends AdminBaseController
{
    /**
     * Path to base view folder
     * @var string
     */
    protected $view_path = 'admin.partner';

    /**
     * Base route
     * @var string
     */
    protected $base_route = 'admin.partner';

    /**
     * Title of page using this controller
     * @var string
     */
    protected $panel_name = 'Partner';

    /**
     * Display a listing of the partner.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //initialize
        $data = [];

        //get data
        $data['rows'] = User::with('userProfile')->partner()->orderBy('id', 'desc')
            ->paginate(AppHelper::getSystemConfig('pagination'));

        return view(parent::loadViewData($this->view_path . '.index'), compact('data'));
    }

    /**
     * Show the form for creating a new partner.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //initialize
        $data = [];
        $data['userProfile'] = new UserProfile;

        return view(parent::loadViewData($this->view_path . '.create'), compact('data'));
    }

    /**
     * Store a newly created partner in storage.
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

        $inputs['role_id'] = 3;

        $user = User::create($inputs);
        if (! $user->userProfile) {
            $inputs['user_id'] = $user->id;
            UserProfile::create($inputs);
        }

        if ($request->get('affiliate_link_label') && $request->get('affiliate_link')) {
            $affiliateLink = new AffiliateLink;
            $affiliateLink->user_id = $user->id;
            $affiliateLink->name = $request->get('affiliate_link_label');
            $affiliateLink->link = $request->get('affiliate_link');
            $affiliateLink->save();
        }

        Session::flash('success', $this->panel_name.' created successfully.');
        return redirect()->route($this->base_route);

    }

    /**
     * Display the specified partner.
     *
     * @param User $partner
     * @return \Illuminate\Http\Response
     */
    public function show(User $partner)
    {
        //
    }

    /**
     * Show the form for editing the specified partner.
     *
     * @param User $partner
     * @return \Illuminate\Http\Response
     * @internal param \App\Models\Partner $partner
     */
    public function edit(User $partner)
    {
        //initialize
        $data = [];

        //get data
        $data['row'] = $partner;
        $data['userProfile'] = $partner->userProfile;
        $data['affiliateLink'] = $partner->affiliateLinks->first();
        $data['roles'] = Role::pluck('name', 'id');

        return view(parent::loadViewData($this->view_path . '.edit'), compact('data'));
    }

    /**
     * Update the specified partner in storage.
     *
     * @param UpdateFormValidation $request
     * @param User $partner
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFormValidation $request, User $partner)
    {
        $request->offsetUnset('role_id');
        $input = $request->all();
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

    /**
     * Remove the specified partner from storage.
     *
     * @param  \App\Models\User $partner
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $partner)
    {
        $partner->delete();
        $partner->userProfile->delete();

        Session::flash('success', $this->panel_name.' deleted successfully.');
        return redirect()->route($this->base_route);
    }
}
