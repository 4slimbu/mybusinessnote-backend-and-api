<?php

namespace App\Http\Controllers\Admin;


use App\Http\Requests\Admin\BusinessCategoryValidation\CreateFormValidation;
use App\Http\Requests\Admin\BusinessCategoryValidation\UpdateFormValidation;
use App\Models\BusinessCategory;
use AppHelper;
use Illuminate\Http\Request;
use Session;


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
     * Array of panel actions
     * @var string
     */
    protected $panel_actions = [

        ['link' => 'business-category/create', 'label' => 'Add New'],

    ];

    /**
     * Upload directory relative to public folder
     * @var string
     */
    protected $upload_directory = 'images/business-categories/';

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
     * @param CreateFormValidation|Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateFormValidation $request)
    {
        //Image Upload
        $input = $request->all();
        if ($request->file('icon') && $request->file('icon')->isValid()) {
            $file = $request->file('icon');
            $destinationPath = public_path($this->upload_directory);
            $fileName = str_random('32') . '.' . $file->getClientOriginalExtension();
            $file->move($destinationPath, $fileName);
            $input['icon'] = $fileName;
        }

        if ($request->file('hover_icon') && $request->file('hover_icon')->isValid()) {
            $file = $request->file('hover_icon');
            $destinationPath = public_path($this->upload_directory);
            $fileName = str_random('32') . '.' . $file->getClientOriginalExtension();
            $file->move($destinationPath, $fileName);
            $input['hover_icon'] = $fileName;
        }

        BusinessCategory::create($input);

        Session::flash('success', $this->panel_name . ' created successfully.');

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
     * @param UpdateFormValidation|Request $request
     * @param  \App\Models\BusinessCategory $businessCategory
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFormValidation $request, BusinessCategory $businessCategory)
    {
        $input = $request->all();

        //Icon Upload
        if ($request->file('icon') && $request->file('icon')->isValid()) {
            $file = $request->file('icon');
            $destinationPath = public_path($this->upload_directory);
            $fileName = str_random('32') . '.' . $file->getClientOriginalExtension();
            $file->move($destinationPath, $fileName);
            $input['icon'] = $fileName;

            //Remove old image
            if (!empty($businessCategory->icon) && file_exists(public_path($this->upload_directory . $businessCategory->icon))) {
                unlink(public_path($this->upload_directory . $businessCategory->icon));
            }
        }

        //Hover Icon Upload
        if ($request->file('hover_icon') && $request->file('hover_icon')->isValid()) {
            $file = $request->file('hover_icon');
            $destinationPath = public_path($this->upload_directory);
            $fileName = str_random('32') . '.' . $file->getClientOriginalExtension();
            $file->move($destinationPath, $fileName);
            $input['hover_icon'] = $fileName;

            //Remove old image
            if (!empty($businessCategory->hover_icon) && file_exists(public_path($this->upload_directory . $businessCategory->hover_icon))) {
                unlink(public_path($this->upload_directory . $businessCategory->hover_icon));
            }
        }

        $businessCategory->fill($input)->save();

        Session::flash('success', $this->panel_name . ' updated successfully.');

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
        if (file_exists(public_path($this->upload_directory . $businessCategory->icon))) {
            unlink(public_path($this->upload_directory . $businessCategory->icon));
        }

        if (file_exists(public_path($this->upload_directory . $businessCategory->hover_icon))) {
            unlink(public_path($this->upload_directory . $businessCategory->hover_icon));
        }
        $businessCategory->delete();

        Session::flash('success', $this->panel_name . ' deleted successfully.');

        return redirect()->route($this->base_route);
    }
}
