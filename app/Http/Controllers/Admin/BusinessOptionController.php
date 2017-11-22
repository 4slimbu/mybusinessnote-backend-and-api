<?php

namespace App\Http\Controllers\Admin;


use App\Http\Requests\Admin\BusinessOptionValidation\CreateFormValidation;
use App\Http\Requests\Admin\BusinessOptionValidation\UpdateFormValidation;
use App\Models\Badge;
use App\Models\BusinessOption;
use App\Models\BusinessCategory;
use App\Models\User;
use Session, AppHelper;


class BusinessOptionController extends AdminBaseController
{
    /**
     * Path to base view folder
     * @var string
     */
    protected $view_path = 'admin.business-option';

    /**
     * Base route
     * @var string
     */
    protected $base_route = 'admin.business-option';

    /**
     * Title of page using this controller
     * @var string
     */
    protected $panel_name = 'Business Option';

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
        $data['rows'] = BusinessOption::with('level', 'parent')
            ->orderBy('id', 'desc')
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
        $data['levels'] = Badge::pluck('name', 'id');
        $data['businessOptions'] = BusinessOption::pluck('name', 'id');
        $data['businessCategories'] = BusinessCategory::pluck('name', 'id');


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
        BusinessOption::create($request->all());

        Session::flash('success', $this->panel_name.' created successfully.');
        return redirect()->route($this->base_route);

    }

    /**
     * Display the specified business option.
     *
     * @param  \App\Models\BusinessOption $businessOption
     * @return \Illuminate\Http\Response
     */
    public function show(BusinessOption $businessOption)
    {
        //
    }

    /**
     * Show the form for editing the specified business option.
     *
     * @param  \App\Models\BusinessOption $businessOption
     * @return \Illuminate\Http\Response
     */
    public function edit(BusinessOption $businessOption)
    {
        //initialize
        $data = [];

        //get data
        $data['row'] = $businessOption;
        $data['levels'] = Badge::pluck('name', 'id');
        $data['businessOptions'] = BusinessOption::where('id', '!=', $businessOption->id)->pluck('name', 'id');
        $data['businessCategories'] = BusinessCategory::pluck('name', 'id');

        return view(parent::loadViewData($this->view_path . '.edit'), compact('data'));
    }

    /**
     * Update the specified business option in storage.
     *
     * @param UpdateFormValidation|\Illuminate\Http\Request $request
     * @param  \App\Models\BusinessOption $businessOption
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFormValidation $request, BusinessOption $businessOption)
    {

        $input = $request->all();
        $businessOption->fill($input)->save();

        Session::flash('success', $this->panel_name.' updated successfully.');
        return redirect()->route($this->base_route);
    }

    /**
     * Remove the specified business option from storage.
     *
     * @param  \App\Models\BusinessOption $businessOption
     * @return \Illuminate\Http\Response
     */
    public function destroy(BusinessOption $businessOption)
    {
        $businessOption->delete();

        Session::flash('success', $this->panel_name.' deleted successfully.');
        return redirect()->route($this->base_route);
    }
}
