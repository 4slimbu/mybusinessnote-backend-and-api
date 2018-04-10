<?php

namespace App\Http\Controllers\Admin;


use App\Http\Requests\Admin\BusinessOptionValidation\CreateFormValidation;
use App\Http\Requests\Admin\BusinessOptionValidation\UpdateFormValidation;
use App\Models\AffiliateLink;
use App\Models\BusinessCategory;
use App\Models\BusinessOption;
use App\Models\Section;
use AppHelper;
use form;
use Session;


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
     * Array of panel actions
     * @var string
     */
    protected $panel_actions = [

        ['link' => 'business-option/create', 'label' => 'Add New'],

    ];

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

        $data['businessCategoriesCount'] = BusinessCategory::count();

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

            return [$item->id => $prefix . $item->name];
        });

        $data['businessOptions'] = BusinessOption::pluck('name', 'id');
        $data['businessCategories'] = BusinessCategory::pluck('name', 'id');
        $data['elements'] = BusinessOption::elements();

        // Html Collective Form is expecting these variables
        $data['selectedElement'] = [];
        $data['selectedBusinessCategories'] = [];
        $data['selectedAffiliateLinkLabel'] = '';
        $data['selectedAffiliateLinks'] = [];
        $data['showEveryWhere'] = true;

        $affiliateLinks = AffiliateLink::with('partner', 'partner.userProfile')->get();
        $data['affiliateLinks'] = $affiliateLinks->mapWithKeys(function ($item) {
            return [$item->id => $item->partner->userProfile->company . ' - ' . $item->name];
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


        // set menu_order
        $lastItemInSection = BusinessOption::select('id', 'menu_order')->where('section_id', $input['section_id'])
            ->orderBy('menu_order', 'desc')->first();

        $this->moveTo($businessOption, $lastItemInSection->menu_order);

        // set related tables
        if (isset($input['affiliate_link_id']) && $input['affiliate_link_id']) {
            $syncData = [];
            foreach (array_filter($input['affiliate_link_id']) as $id) {
                $syncData[$id] = [
                    'label' => ($input['affiliate_link_label']) ? $input['affiliate_link_label'] : '',
                ];
            }
            $businessOption->affiliateLinks()->sync($syncData);
        }

        if ($input['show_everywhere']) {
            $businessOption->businessCategories()->sync(BusinessCategory::all()->pluck('id'));
        } else {
            if (isset($input['business_category_id']) && $input['business_category_id']) {
                $businessOption->businessCategories()->sync(array_filter($input['business_category_id']));
            }
        }

        Session::flash('success', $this->panel_name . ' created successfully.');

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
        $labels = $businessOption->affiliateLinks()->pluck('label');
        $data['selectedAffiliateLinkLabel'] = count($labels) > 0 ? $labels[0] : '';
        $data['selectedAffiliateLinks'] = $businessOption->affiliateLinks->pluck('id');
        $data['selectedElement'] = $businessOption->element;

        $sections = Section::with('level')
            ->get();
        $data['sections'] = $sections->mapWithKeys(function ($item) {
            $prefix = isset($item->level) ? $item->level->name . ' - ' : '';

            return [$item->id => $prefix . $item->name];
        });

        $data['businessOptions'] = BusinessOption::where('id', '!=', $businessOption->id)->pluck('name', 'id');
        $data['businessCategories'] = BusinessCategory::pluck('name', 'id');
        $data['elements'] = BusinessOption::elements();
        $data['showEveryWhere'] = ($businessOption->businessCategories->count() === BusinessCategory::count()) ? 1 : 0;

        $affiliateLinks = AffiliateLink::with('partner', 'partner.userProfile')->get();
        $data['affiliateLinks'] = $affiliateLinks->mapWithKeys(function ($item) {
            return [$item->id => $item->partner->userProfile->company . ' - ' . $item->name];
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

        if ($request->get('section_id') && $businessOption->section_id !== $request->get('section_id')) {
            // set menu_order
            $lastItemInSection = BusinessOption::select('id', 'menu_order')->where('section_id', $request->get('section_id'))
                ->orderBy('menu_order', 'desc')->first();

            $this->moveTo($businessOption, $lastItemInSection->menu_order);
        }

        // Save business option
        $businessOption->fill($input)->save();

        // set related tables
        if (isset($input['affiliate_link_id']) && $input['affiliate_link_id']) {
            $syncData = [];
            foreach (array_filter($input['affiliate_link_id']) as $id) {
                $syncData[$id] = [
                    'label' => ($input['affiliate_link_label']) ? $input['affiliate_link_label'] : '',
                ];
            }
            $businessOption->affiliateLinks()->sync($syncData);
        }

        if ($input['show_everywhere']) {
            $businessOption->businessCategories()->sync(BusinessCategory::all()->pluck('id'));
        } else {
            if (isset($input['business_category_id']) && $input['business_category_id']) {
                $businessOption->businessCategories()->sync(array_filter($input['business_category_id']));
            }
        }

        Session::flash('success', $this->panel_name . ' updated successfully.');

        return redirect()->route($this->base_route);
    }

    /**
     * Remove the specified business option from storage.
     *
     * @param  \App\Models\BusinessOption $businessOption
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(BusinessOption $businessOption)
    {
        $businessOption->delete();

        Session::flash('success', $this->panel_name . ' deleted successfully.');

        return redirect()->route($this->base_route);
    }


    public function moveUp(BusinessOption $businessOption)
    {
        dd("here");
        $previousBusinessOption = BusinessOption::where('menu_order', '<', $businessOption->menu_order)
            ->orderBy('menu_order', 'desc')
            ->first();

        if ($previousBusinessOption) {
            $previousMenuOrder = $previousBusinessOption->menu_order;
            $currentMenuOrder = $businessOption->menu_order;

            $previousBusinessOption->fill(['menu_order' => 999999999])->save();
            $businessOption->fill(['section_id' => $previousBusinessOption->section_id, 'menu_order' => $previousMenuOrder])->save();
            $previousBusinessOption->fill(['menu_order' => $currentMenuOrder])->save();
        }

        return redirect()->back();
    }

    public function moveDown(BusinessOption $businessOption)
    {
        $nextBusinessOption = BusinessOption::where('menu_order', '>', $businessOption->menu_order)
            ->orderBy('menu_order', 'asc')
            ->first();

        if ($nextBusinessOption) {
            $nextMenuOrder = $nextBusinessOption->menu_order;
            $currentMenuOrder = $businessOption->menu_order;

            $nextBusinessOption->fill(['menu_order' => 999999999])->save();
            $businessOption->fill(['section_id' => $nextBusinessOption->section_id, 'menu_order' => $nextMenuOrder])->save();
            $nextBusinessOption->fill(['menu_order' => $currentMenuOrder])->save();
        }

        return redirect()->back();
    }

    private function moveTo(BusinessOption $businessOption, $to)
    {
        if (!$businessOption || !$to) {
            return false;
        }

        if (!$businessOption->menu_order) {
            // case: insert
            $inBetweenBusinessOptions = BusinessOption::where('menu_order', '>', $to)
                ->orderBy('menu_order', 'desc')
                ->get();

            if (count($inBetweenBusinessOptions) === 0) return false;

            foreach ($inBetweenBusinessOptions as $inBetweenBusinessOption) {
                $inBetweenBusinessOption->fill(['menu_order' => $inBetweenBusinessOption->menu_order + 1])->save();
            }

            $finalDestination = BusinessOption::where('menu_order', $to)->select('id', 'section_id')->first();

            $businessOption->fill(['section_id' => $finalDestination->section_id, 'menu_order' => $to + 1])->save();

        } elseif ($businessOption->menu_order > $to) {
            // case: move down
            // get the affected business option by the move in desc order
            $inBetweenBusinessOptions = BusinessOption::whereBetween('menu_order', [$to, $businessOption->menu_order])
                ->where('menu_order', '!=', $businessOption->menu_order)
                ->where('menu_order', '!=', $to)
                ->orderBy('menu_order', 'desc')
                ->get();

            if (count($inBetweenBusinessOptions) === 0) return false;

            // get destination section
            $toSection = BusinessOption::where('menu_order', $to)->select('id', 'section_id')->first()->section_id;

            // set the last item in the range, which is current business option, to very high menu_order
            $businessOption->fill(['menu_order' => 999999])->save();
            // as the last item has menu_order set very high, its position can be considered vacant and let's
            // increase menu_order of business Options in between the range by one
            foreach ($inBetweenBusinessOptions as $inBetweenBusinessOption) {
                $inBetweenBusinessOption->fill(['menu_order' => $inBetweenBusinessOption->menu_order + 1])->save();
            }

            // now let's save the business option to destination place with new section
            $businessOption->fill(['section_id' => $toSection, 'menu_order' => ($to + 1)])->save();
        } else {
            // case: move up
            // get the affected business option by the move in asc order
            $inBetweenBusinessOptions = BusinessOption::whereBetween('menu_order', [$businessOption->menu_order, $to])
                ->orderBy('menu_order', 'asc')
                ->get();

            if (count($inBetweenBusinessOptions) === 0) return false;

            // get destination section
            $toSection = $inBetweenBusinessOptions->last()->section_id;

            // set the first item in the range, which is current business option, to very high menu_order
            $businessOption->fill(['menu_order' => 999999])->save();

            // as the last item has menu_order set very high, its position can be considered vacant and let's
            // decrease menu_order of business Options in between the range by one
            foreach ($inBetweenBusinessOptions as $inBetweenBusinessOption) {
                $inBetweenBusinessOption->fill(['menu_order' => $inBetweenBusinessOption->menu_order - 1])->save();
            }

            // now let's save the business option to destination place with new section
            $businessOption->fill(['section_id' => $toSection, 'menu_order' => $to])->save();
        }


    }

}
