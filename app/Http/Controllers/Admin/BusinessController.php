<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\BusinessValidation\CreateFormValidation;
use App\Http\Requests\Admin\BusinessValidation\UpdateFormValidation;
use App\Models\Business;
use App\Models\BusinessCategory;
use App\Models\User;
use AppHelper;
use Session;


class BusinessController extends AdminBaseController
{
    /**
     * Path to base view folder
     * @var string
     */
    protected $view_path = 'admin.business';

    /**
     * Base route
     * @var string
     */
    protected $base_route = 'admin.business';

    /**
     * Title of page using this controller
     * @var string
     */
    protected $panel_name = 'Business';

    /**
     * Array of panel actions
     * @var string
     */
    protected $panel_actions = [

        ['link' => 'business/create', 'label' => 'Add New'],
        ['link' => '#', 'label' => 'Export to Excel'],

    ];

    /**
     * Display a listing of the business.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //initialize
        $data = [];

        //get data
        $data['rows'] = Business::with('user', 'businessCategory')
            ->orderBy('id', 'desc')
            ->paginate(AppHelper::getSystemConfig('pagination'));

        return view(parent::loadViewData($this->view_path . '.index'), compact('data'));
    }

    /**
     * Show the form for creating a new business.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //initialize
        $data = [];

        //get data
        $users = User::select('id', 'first_name', 'last_name')->where('role_id', 2)->get();
        $data['users'] = $users->mapWithKeys(function ($item) {
            return [$item->id => $item->first_name . ' ' . $item->last_name];
        });

        $data['businessCategories'] = BusinessCategory::pluck('name', 'id');

        return view(parent::loadViewData($this->view_path . '.create'), compact('data'));
    }

    /**
     * Store a newly created business in storage.
     *
     * @param CreateFormValidation|\Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateFormValidation $request)
    {
        Business::create($request->except('user_id'));

        Session::flash('success', $this->panel_name . ' created successfully.');

        return redirect()->route($this->base_route);

    }

    /**
     * Display the specified business.
     *
     * @param  \App\Models\Business $business
     * @return \Illuminate\Http\Response
     */
    public function show(Business $business)
    {
        //
    }

    /**
     * Show the form for editing the specified business.
     *
     * @param  \App\Models\Business $business
     * @return \Illuminate\Http\Response
     */
    public function edit(Business $business)
    {
        //initialize
        $data = [];

        //get data
        $data['row'] = $business;
	    $business->load( 'user' );

        $data['businessCategories'] = BusinessCategory::pluck('name', 'id');

        return view(parent::loadViewData($this->view_path . '.edit'), compact('data'));
    }

    /**
     * Update the specified business in storage.
     *
     * @param UpdateFormValidation|\Illuminate\Http\Request $request
     * @param  \App\Models\Business $business
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFormValidation $request, Business $business)
    {
    	// Shouldn't be able to transfer business from one user to another
        $input = $request->except('user_id');

        $business->fill($input)->save();

        Session::flash('success', $this->panel_name . ' updated successfully.');

        return redirect()->route($this->base_route);
    }

    /**
     * Remove the specified business from storage.
     *
     * @param  \App\Models\Business $business
     * @return \Illuminate\Http\Response
     */
    public function destroy(Business $business)
    {
        $business->delete();

        Session::flash('success', $this->panel_name . ' deleted successfully.');

        return redirect()->route($this->base_route);
    }
}
