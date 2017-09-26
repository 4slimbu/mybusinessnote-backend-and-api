<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Business;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $business = Business::where('user_id',Auth::user()->id)->get();
        return view('home',compact('business'));
    }

    public function profile(Request $request , $user)
    {  
        $business = Business::where('user_id',$user)->get();
        //dump($business); 
        return view('profile',compact('business'));
    }

    public function business($businessid)
    {
        $business = Business::find($businessid);
        return view('business',compact('business'));
    }

    public function businessEdit($business)
    {
        $business = Business::find($business);
        return view('edit-business',compact('business'));
    }

    public function businessUpdate(Request $request , $business)
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

        return redirect('/home')->with('success','Business Info has been updated');
    }
}
