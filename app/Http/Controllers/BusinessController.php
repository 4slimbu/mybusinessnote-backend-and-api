<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Business;

class BusinessController extends Controller
{


    public function __construct(){

        $this->middleware('auth')->only('store');

    }
    /**
     * Display a listing of the businesses.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $businesses = Business::latest()->get();
        return view('business.index', compact('businesses'));
    }


    /**
     * Display a specific business.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Business $business)
    {
        return view('business.show', compact('business'));
    }


    /**
     * Register a  business.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

       $business =  Business::create([

            'business_category_id' => 1,
            'badge_id' => 1,
            'business_name' => request('business_name'),
            'website' => request('website'),
            'abn' => request('abn'),
            'acn' => request('acn'),
            'business_email' => request('business_email'),
            'business_mobile' => request('business_mobile'),
            'business_general_phone' => request('business_general_phone'),
            'address' => request('address'),


        ]);

       return redirect($business->path());

    }
}
