<?php

namespace App\Http\Controllers\Admin;


use App\Http\Requests\Admin\LevelValidation\CreateFormValidation;
use App\Http\Requests\Admin\LevelValidation\UpdateFormValidation;
use App\Models\Role;
use App\Models\Level;
use Session, AppHelper;


class LevelController extends AdminBaseController
{
    /**
     * Path to base view folder
     * @var string
     */
    protected $view_path = 'admin.level';

    /**
     * Base route
     * @var string
     */
    protected $base_route = 'admin.level';

    /**
     * Title of page using this controller
     * @var string
     */
    protected $panel_name = 'Level';

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
        $data['rows'] = Level::with('sections')
            ->orderBy('menu_order')
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

        Level::create($inputs);

        Session::flash('success', $this->panel_name.' created successfully.');
        return redirect()->route($this->base_route);

    }

    /**
     * Display the specified business option.
     *
     * @param  \App\Models\Level $level
     * @return \Illuminate\Http\Response
     */
    public function show(Level $level)
    {
        //
    }

    /**
     * Show the form for editing the specified business option.
     *
     * @param  \App\Models\Level $level
     * @return \Illuminate\Http\Response
     */
    public function edit(Level $level)
    {
        //initialize
        $data = [];

        //get data
        $data['row'] = $level;
        $data['roles'] = Role::pluck('name', 'id');
        $data['levels'] = Level::where('id', '!=', $level->id)->pluck('name', 'id');

        return view(parent::loadViewData($this->view_path . '.edit'), compact('data'));
    }

    /**
     * Update the specified business option in storage.
     *
     * @param UpdateFormValidation|\Illuminate\Http\Request $request
     * @param  \App\Models\Level $level
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFormValidation $request, Level $level)
    {

        $input = $request->all();
        $level->fill($input)->save();

        Session::flash('success', $this->panel_name.' updated successfully.');
        return redirect()->route($this->base_route);
    }

    /**
     * Remove the specified business option from storage.
     *
     * @param  \App\Models\Level $level
     * @return \Illuminate\Http\Response
     */
    public function destroy(Level $level)
    {
        $level->delete();

        Session::flash('success', $this->panel_name.' deleted successfully.');
        return redirect()->route($this->base_route);
    }
}
