<?php

namespace App\Http\Controllers\Admin;


use App\Models\BusinessOption;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Hash;
use App\Models\User;
use App\Models\BusinessCategory;
use App\Models\Badge;
use DB;

class BusinessOptionController extends AdminBaseController
{
     public function index()
    {
        $businessOptions = BusinessOption::all();
        return view('admin.business_option.index',compact('businessOptions'));
    }

    public function create()
    {
        $businessCategories = BusinessCategory::all();
        $businessOptions = BusinessOption::all();
        $badges = Badge::all();
    	return view('admin.business_option.create',compact('businessCategories','businessOptions','badges'));

    }

    public function store(Request $request)
    {

        $this->validate($request, [
            'name' => 'required',
            'badge_id' => 'required',
            'business_category_id' => 'required'
        ]);
        
       $businessOption = BusinessOption::create([
            'badge_id'=>request('badge_id'),
            'name'=>request('name'),
            'parent_id'=>request('parent_id'),
            'tooltip'=>request('tooltip')
       ]);


        $businessOption->categories()->attach(request('business_category_id'));
        $businessOption->partners()->attach(request('user_id'));


        return back()->with('success','Business option successfully added');

    }

    public function edit(Request $request , $businessOption)
    {
        $businessOption = BusinessOption::find($businessOption);


        $businessOptions = BusinessOption::all();
        $businessCategories = BusinessCategory::all();

        $selectedCategory = [];

        

        return view('admin.business_option.edit',compact('businessOption','businessOptions','businessCategories'));
    }

    public function update(Request $request , $option)
    {
        $businessOption = BusinessOption::find($option);
        
        $businessOption->name = request('name');
        $businessOption->tooltip = request('tooltip');

        
        $businessOption->save();

        $businessOption->categories()->sync(request('business_category_id'));
        $businessOption->partners()->sync(request('user_id'));

        return redirect('admin/businessoption')->with('success','data updated');

    }


}