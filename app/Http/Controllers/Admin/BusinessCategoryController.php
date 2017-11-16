<?php

namespace App\Http\Controllers\Admin;


use App\Models\BusinessCategory;
use Session, AppHelper;
use Illuminate\Http\Request;


class BusinessCategoryController extends AdminBaseController
{
    /**
     * Path to base view folder
     * @var string
     */
    protected $view_path = 'admin.business-category';

    /**
     * Base route
     * @var string
     */
    protected $base_route = 'admin.business-category';

    /**
     * Title of page using this controller
     * @var string
     */
    protected $panel_name = 'Business Category';

    /**
     * Display a listing of the business category.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //initialize
        $data = [];

        //get data
        $data['rows'] = BusinessCategory::paginate(AppHelper::getSystemConfig('pagination'));

        return view(parent::loadViewData($this->view_path . '.index'), compact('data'));
    }

    /**
     * Show the form for creating a new business category.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view(parent::loadViewData($this->view_path . '.create'));
    }

    /**
     * Store a newly created business category in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'title' => 'required'
        ]);

        BusinessCategory::create([

            'title' => request('title'),
            'tooltip' => request('tooltip')

        ]);

        Session::flash('success', $this->panel_name.' created successfully.');
        return redirect()->route($this->base_route);

    }

    /**
     * Display the specified business category.
     *
     * @param  \App\Models\BusinessCategory $businessCategory
     * @return \Illuminate\Http\Response
     */
    public function show(BusinessCategory $businessCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified business category.
     *
     * @param  \App\Models\BusinessCategory $businessCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(BusinessCategory $businessCategory)
    {
        //initialize
        $data = [];

        //get data
        $data['row'] = $businessCategory;

        return view(parent::loadViewData($this->view_path . '.edit'), compact('data'));
    }

    /**
     * Update the specified business category in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Models\BusinessCategory $businessCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BusinessCategory $businessCategory)
    {
        $this->validate($request, [
            'title' => 'required'
        ]);

        $input = $request->all();
        $businessCategory->fill($input)->save();

        Session::flash('success', $this->panel_name.' updated successfully.');
        return redirect()->route($this->base_route);
    }

    /**
     * Remove the specified business category from storage.
     *
     * @param  \App\Models\BusinessCategory $businessCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(BusinessCategory $businessCategory)
    {
        $businessCategory->delete();

        Session::flash('success', $this->panel_name.' deleted successfully.');
        return redirect()->route($this->base_route);
    }
}
