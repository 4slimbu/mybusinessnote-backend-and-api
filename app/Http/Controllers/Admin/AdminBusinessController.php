<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Business;
use App\Models\BusinessCategory;
use App\Models\Badge;
use App\Models\Role;

class AdminBusinessController extends Controller
{
    public function index()
    {
         $business = Business::all();
         return view('admin.business.index',compact('business'));
    }

    public function edit($business)
    {
        $business = Business::find($business);
        return view('admin.business.edit',compact('business'));
    }

    public function update(Request $request , $business)
    {
        $business = Business::find($business);

        $business->business_name = request('business_name');
        $business->website = request('website');
        $business->abn = request('abn');
        $business->acn = request('acn');
        $business->business_email = request('business_email');
        $business->business_mobile = request('business_mobile');
        $business->business_general_phone = request('business_general_phone');
        $business->address = request('address');

        $business->save();

        return redirect('admin/businesses')->with('success','Business Info ahs been updated');

    }
}
