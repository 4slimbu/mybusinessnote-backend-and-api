<?php

namespace App\Http\Controllers\Admin;


use App\Http\Requests\Admin\BusinessOptionValidation\CreateFormValidation;
use App\Http\Requests\Admin\BusinessOptionValidation\UpdateFormValidation;
use App\Models\AffiliateLink;
use App\Models\BusinessOption;
use App\Models\BusinessCategory;
use App\Models\Level;
use App\Models\Section;
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
        $data['rows'] = BusinessOption::with('section', 'section.level', 'parent', 'children', 'businessCategories')
            ->where('parent_id', null)
            ->orderBy('menu_order')
            ->paginate(100);

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
        $sections = Section::with('level')
            ->get();
        $data['sections'] = $sections->mapWithKeys(function ($item) {
            $prefix = isset($item->level) ? $item->level->name . ' - ' : '';
            return [ $item->id => $prefix . $item->name ];
        });

        $data['businessOptions'] = BusinessOption::pluck('name', 'id');
        $data['businessCategories'] = BusinessCategory::pluck('name', 'id');
        $data['elements'] = BusinessOption::elements();
        $data['selectedElement'] = []; //dynamic form is expecting this variable
        $data['selectedBusinessCategories'] = []; //dynamic form is expecting this variable
        $data['selectedAffiliateLinks'] = []; //dynamic form is expecting this variable

        $affiliateLinks = AffiliateLink::with('partner', 'partner.userProfile')->get();
        $data['affiliateLinks'] = $affiliateLinks->mapWithKeys(function ($item) {
           return [ $item->id => $item->partner->userProfile->company . ' - ' . $item->name ];
        });

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
        $input['slug'] = str_slug($request->get('name'));
        $input['level_id'] = Section::findOrFail($input['section_id'])->level_id;
        $input['show_everywhere'] = isset($input['show_everywhere']) ? 1 : 0;

        $businessOption = BusinessOption::create($input);

        if (isset($input['affiliate_link_id']) && $input['affiliate_link_id']) {
            $businessOption->affiliateLinks()->sync(array_filter($input['affiliate_link_id']));
        }

        if ($input['show_everywhere']) {
            $businessOption->businessCategories()->sync(BusinessCategory::all()->pluck('id'));
        } else {
            if (isset($input['business_category_id']) && $input['business_category_id']) {
                $businessOption->businessCategories()->sync(array_filter($input['business_category_id']));
            }
        }

        Session::flash('success', $this->panel_name.' created successfully.');
        return redirect()->route($this->base_route);

    }

    /**
     * Display the specified business option.
     *
     * @param  \App\Models\BusinessOption $businessOption
     * @return void
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
        $data['selectedBusinessCategories'] = $businessOption->businessCategories->pluck('id');
        $data['selectedAffiliateLinks'] = $businessOption->affiliateLinks->pluck('id');
        $data['selectedElement'] = $businessOption->element;

        $sections = Section::with('level')
            ->get();
        $data['sections'] = $sections->mapWithKeys(function ($item) {
            $prefix = isset($item->level) ? $item->level->name . ' - ' : '';
            return [ $item->id => $prefix . $item->name ];
        });

        $data['businessOptions'] = BusinessOption::where('id', '!=', $businessOption->id)->pluck('name', 'id');
        $data['businessCategories'] = BusinessCategory::pluck('name', 'id');
        $data['elements'] = BusinessOption::elements();

        $affiliateLinks = AffiliateLink::with('partner', 'partner.userProfile')->get();
        $data['affiliateLinks'] = $affiliateLinks->mapWithKeys(function ($item) {
            return [ $item->id => $item->partner->userProfile->company . ' - ' . $item->name ];
        });

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
        $input['show_everywhere'] = isset($input['show_everywhere']) ? 1 : 0;
        $businessOption->fill($input)->save();

        if (isset($input['affiliate_link_id']) && $input['affiliate_link_id']) {
            $businessOption->affiliateLinks()->sync(array_filter($input['affiliate_link_id']));
        }

        if ($input['show_everywhere']) {
            $businessOption->businessCategories()->sync(BusinessCategory::all()->pluck('id'));
        } else {
            if (isset($input['business_category_id']) && $input['business_category_id']) {
                $businessOption->businessCategories()->sync(array_filter($input['business_category_id']));
            }
        }

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
