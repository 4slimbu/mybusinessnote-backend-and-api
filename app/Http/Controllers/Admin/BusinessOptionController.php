<?php

namespace App\Http\Controllers\Admin;


use App\BusinessOption;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Hash;
use App\User;
use App\BusinessCategory;
use DB;

class BusinessOptionController extends Controller
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
    	return view('admin.business_option.create',compact('businessCategories','businessOptions'));
    }

    public function store(Request $request)
    {

        $this->validate($request, [
            'name' => 'required',
            'business_category_id' => 'required'
        ]);
        
       $businessOption = BusinessOption::create([
                'name'=>request('name'),
                'parent_id'=>request('parent_id'),
                'tooltip'=>request('tooltip')
       ]);


        $businessOption->categories()->attach(request('business_category_id'));
        $businessOption->partners()->attach(request('user_id'));


        return back()->with('success','Business option successfully added');

    }


}
