<?php

namespace App\Http\Controllers\Admin;

use App\Admin\ThirdPartyBusinessCategory;
use App\Admin\ThirdPartyIntegration;
use App\Admin\ThirdPartyPartner;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Hash;
use App\User;
use App\Admin\BusinessCategory;
use DB;

class ThirdPartyController extends Controller
{
     public function index()
    {
        $thirdparty = ThirdPartyIntegration::all();
        return view('admin.third_party.index',compact('thirdparty'));
    }

    public function create()
    {
    	$partner = User::where('role_id',3)->get();
    	$category = BusinessCategory::all();
        $parent = ThirdPartyIntegration::all();
    	return view('admin.third_party.create',compact('partner','category','parent'));
    }

    public function post(Request $request)
    {
        
        ThirdPartyIntegration::create([
                'name'=>request('name'),
                'tooltip'=>request('tooltip'),
                'third_party_integration_id'=>request('third_party_integration_id')
        ]);
        //$num = count(request('business_category_id'));

        $tpi = DB::getPdo()->lastInsertId();

        $bci = request('business_category_id');

        for($i=0; $i < count($bci); $i++)
        {
            $tpbc = new ThirdPartyBusinessCategory;

            $tpbc->third_party_integration_id = $tpi;
            $tpbc->business_category_id = $bci[$i];

            $tpbc->save();
        }

        $pi = request('user_id');

        for($i=0; $i < count($pi); $i++)
        {
            $pp = new ThirdPartyPartner;

            $pp->third_party_integration_id = $tpi;
            $pp->user_id = $pi[$i];

            $pp->save();
        }


        return back()->with('success','data entered in database');
        exit();
    }


}
