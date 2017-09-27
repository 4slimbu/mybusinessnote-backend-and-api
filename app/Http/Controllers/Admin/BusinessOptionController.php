<?php

namespace App\Http\Controllers\Admin;

use App\Admin\ThirdPartyBusinessCategory;
use App\Admin\BusinessOption;
use App\Admin\ThirdPartyPartner;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Hash;
use App\User;
use App\Admin\BusinessCategory;
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
        
        BusinessOption::create([
                'name'=>request('name'),
                'parent_id'=>request('parent_id'),
                'tooltip'=>request('tooltip'),

        ]);

        return back()->with('success','Business option successfully added');

    }


}
