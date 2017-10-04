<?php

namespace App\Http\Controllers\Admin;

use App\Admin\ThirdPartyBusinessCategory;
use App\Admin\BusinessOption;
use App\Admin\BusinessOptionCategory;
use App\Admin\BusinessOptionPartners;
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

        public function autoSuggest()
    {
        $string = $_GET['suggestString'];

        if(!empty($string)){
            $user = User::where([['first_name','like','%'.$string.'%'] , ['role_id','=',3] ])->get();
        }else{
            $user=['status'=>'empty'];
        }
        

        return response()->json($user);
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

                $id = DB::getPdo()->lastInsertId();

        BusinessOptionPartners::create([
            'business_option_id'=>$id,
            'partner_id'=>request('partner_id'),
        ]);

        for($i=0; $i<count(request('business_category_id')); $i++)
        {
            $bci = request('business_category_id');
            BusinessOptionCategory::create([
            'business_option_id'=>$id,
            'business_category_id'=>$bci[$i],
        ]);
        }


        return back()->with('success','Business option successfully added');

    }


}
