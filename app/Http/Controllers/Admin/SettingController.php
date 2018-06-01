<?php

namespace App\Http\Controllers\Admin;


use App\Http\Requests\Admin\SettingValidation\CreateFormValidation;
use App\Http\Requests\Admin\SettingValidation\UpdateFormValidation;
use App\Models\Setting;
use Session, AppHelper;


class SettingController extends AdminBaseController
{
    /**
     * Path to base view folder
     * @var string
     */
    protected $view_path = 'admin.setting';

    /**
     * Base route
     * @var string
     */
    protected $base_route = 'admin.setting';

    /**
     * Title of page using this controller
     * @var string
     */
    protected $panel_name = 'Setting';


     /**
     * Array of panel actions
     * @var string
     */
    protected $panel_actions = array( 

        [ 'link' => 'setting/create', 'label' => 'Add New']
        
    );

    /**
     * Upload directory relative to public folder
     * @var string
     */
    protected $upload_directory = 'images/settings/';

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
        $data['rows'] = Setting::paginate(AppHelper::getSystemConfig('pagination'));

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
	    $data['edit_templates'] = $this->getEditTemplatesList();

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
        $input = $request->all();

        Setting::create($input);

        Session::flash('success', $this->panel_name.' created successfully.');
        return redirect()->route($this->base_route);

    }

    /**
     * Display the specified business option.
     *
     * @param  \App\Models\Setting $setting
     * @return \Illuminate\Http\Response
     */
    public function show(Setting $setting)
    {
        //
    }

    /**
     * Show the form for editing the specified business option.
     *
     * @param  \App\Models\Setting $setting
     * @return \Illuminate\Http\Response
     */
    public function edit(Setting $setting)
    {
        //initialize
        $data = [];

        //get data
        $data['row'] = $setting;
	    $data['edit_templates'] = $this->getEditTemplatesList();
	    $data['edit_template'] = $setting->edit_template;

        return view(parent::loadViewData($this->view_path . '.edit'), compact('data'));
    }

    /**
     * Update the specified business option in storage.
     *
     * @param UpdateFormValidation|\Illuminate\Http\Request $request
     * @param  \App\Models\Setting $setting
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFormValidation $request, Setting $setting)
    {
        $input = $request->all();

        $setting->fill($input)->save();

        Session::flash('success', $this->panel_name.' updated successfully.');
        return redirect()->route($this->base_route);
    }

    /**
     * Remove the specified business option from storage.
     *
     * @param  \App\Models\Setting $setting
     * @return \Illuminate\Http\Response
     */
    public function destroy(Setting $setting)
    {
        if (file_exists(public_path($this->upload_directory . $setting->icon))) {
            unlink(public_path($this->upload_directory . $setting->icon));
        }

        $setting->delete();

        Session::flash('success', $this->panel_name.' deleted successfully.');
        return redirect()->route($this->base_route);
    }

	private function getEditTemplatesList() {
		$templateDirectory = resource_path(str_replace('.', DIRECTORY_SEPARATOR, 'views.' . $this->view_path . '.includes.form-partials'));
		$files = scandir($templateDirectory);

		$matchedFileNames = [];
		if ($files) {
			foreach ( $files as $key => $file ) {
				if (preg_match("/^([-a-zA-Z]*).blade.php$/", $file, $matches)) {
					$matchedFileNames[$matches[1]] = $matches[1];
				}
			}
		}

		return array_sort( $matchedFileNames );
	}
}
