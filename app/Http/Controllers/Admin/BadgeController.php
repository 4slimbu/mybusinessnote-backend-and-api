<?php

namespace App\Http\Controllers\Admin;


use App\Http\Requests\Admin\BadgeValidation\CreateFormValidation;
use App\Http\Requests\Admin\BadgeValidation\UpdateFormValidation;
use App\Models\Badge;
use App\Models\BusinessCategory;
use AppHelper;
use Session;


class BadgeController extends AdminBaseController
{
    /**
     * Path to base view folder
     * @var string
     */
    protected $view_path = 'admin.badge';

    /**
     * Base route
     * @var string
     */
    protected $base_route = 'admin.badge';

    /**
     * Title of page using this controller
     * @var string
     */
    protected $panel_name = 'Badge';

    /**
     * Upload directory relative to public folder
     * @var string
     */
    protected $upload_directory = 'images/badges/';

    /**
     * Display a listing of the badge.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //initialize
        $data = [];

        //get data
        $data['rows'] = Badge::paginate(AppHelper::getSystemConfig('pagination'));

        return view(parent::loadViewData($this->view_path . '.index'), compact('data'));
    }

    /**
     * Show the form for creating a new badge.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view(parent::loadViewData($this->view_path . '.create'), compact('data'));
    }

    /**
     * Store a newly created badge in storage.
     *
     * @param CreateFormValidation $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateFormValidation $request)
    {
        //Image Upload
        if ($request->file('icon')->isValid()) {
            $file = $request->file('icon');
            $destinationPath = public_path($this->upload_directory);
            $fileName = str_random('32') . '.' . $file->getClientOriginalExtension();
            $file->move($destinationPath, $fileName);
        }

        $input = $request->all();
        $input['icon'] = $fileName;

        Badge::create($input);

        Session::flash('success', $this->panel_name . ' created successfully.');

        return redirect()->route($this->base_route);

    }

    /**
     * Display the specified badge.
     *
     * @param \App\Models\Badge $badge
     * @return \Illuminate\Http\Response
     */
    public function show(Badge $badge)
    {
        //
    }

    /**
     * Show the form for editing the specified badge.
     *
     * @param \App\Models\Badge $badge
     * @return \Illuminate\Http\Response
     */
    public function edit(Badge $badge)
    {
        //initialize
        $data = [];

        //get data
        $data['row'] = $badge;
        $data['badges'] = Badge::pluck('name', 'id');
        $data['businessCategories'] = BusinessCategory::pluck('name', 'id');

        return view(parent::loadViewData($this->view_path . '.edit'), compact('data'));
    }

    /**
     * Update the specified badge in storage.
     *
     * @param UpdateFormValidation|\Illuminate\Http\Request $request
     * @param  \App\Models\Badge $badge
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFormValidation $request, Badge $badge)
    {
        $input = $request->all();

        //Image Upload
        if ($request->file('icon') && $request->file('icon')->isValid()) {
            $file = $request->file('icon');
            $destinationPath = public_path($this->upload_directory);
            $fileName = str_random('32') . '.' . $file->getClientOriginalExtension();
            $file->move($destinationPath, $fileName);
            $input['icon'] = $fileName;

            //Remove old image
            if (!empty($badge->icon) && file_exists(public_path($this->upload_directory . $badge->icon))) {
                unlink(public_path($this->upload_directory . $badge->icon));
            }
        }

        $badge->fill($input)->save();

        Session::flash('success', $this->panel_name . ' updated successfully.');

        return redirect()->route($this->base_route);
    }

    /**
     * Remove the specified badge from storage.
     *
     * @param  \App\Models\Badge $badge
     * @return \Illuminate\Http\Response
     */
    public function destroy(Badge $badge)
    {
        if (file_exists(public_path($this->upload_directory . $badge->icon))) {
            unlink(public_path($this->upload_directory . $badge->icon));
        }

        $badge->delete();

        Session::flash('success', $this->panel_name . ' deleted successfully.');

        return redirect()->route($this->base_route);
    }
}
