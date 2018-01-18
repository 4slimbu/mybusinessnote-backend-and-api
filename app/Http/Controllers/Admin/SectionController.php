<?php

namespace App\Http\Controllers\Admin;


use App\Http\Requests\Admin\SectionValidation\CreateFormValidation;
use App\Http\Requests\Admin\SectionValidation\UpdateFormValidation;
use App\Models\Level;
use App\Models\Role;
use App\Models\Section;
use Session, AppHelper;


class SectionController extends AdminBaseController
{
    /**
     * Path to base view folder
     * @var string
     */
    protected $view_path = 'admin.section';

    /**
     * Base route
     * @var string
     */
    protected $base_route = 'admin.section';

    /**
     * Title of page using this controller
     * @var string
     */
    protected $panel_name = 'Section';

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
        $data['rows'] = Section::with('level')
//            ->orderBy('menu_order')
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
        $data['levels'] = Level::pluck('name', 'id');

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
        $input['slug'] = str_slug($request->get('name'));
        Section::create($inputs);

        Session::flash('success', $this->panel_name.' created successfully.');
        return redirect()->route($this->base_route);

    }

    /**
     * Display the specified business option.
     *
     * @param  \App\Models\Section $section
     * @return \Illuminate\Http\Response
     */
    public function show(Section $section)
    {
        //
    }

    /**
     * Show the form for editing the specified business option.
     *
     * @param  \App\Models\Section $section
     * @return \Illuminate\Http\Response
     */
    public function edit(Section $section)
    {
        //initialize
        $data = [];

        //get data
        $data['row'] = $section;
        $data['levels'] = Level::pluck('name', 'id');

        return view(parent::loadViewData($this->view_path . '.edit'), compact('data'));
    }

    /**
     * Update the specified business option in storage.
     *
     * @param UpdateFormValidation|\Illuminate\Http\Request $request
     * @param  \App\Models\Section $section
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFormValidation $request, Section $section)
    {

        $input = $request->all();
        $section->fill($input)->save();

        Session::flash('success', $this->panel_name.' updated successfully.');
        return redirect()->route($this->base_route);
    }

    /**
     * Remove the specified business option from storage.
     *
     * @param  \App\Models\Section $section
     * @return \Illuminate\Http\Response
     */
    public function destroy(Section $section)
    {
        $section->delete();

        Session::flash('success', $this->panel_name.' deleted successfully.');
        return redirect()->route($this->base_route);
    }
}
