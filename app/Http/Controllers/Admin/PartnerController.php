<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Hash;

class PartnerController extends Controller
{
    public function index()
    {
    	return view('admin.partners.create');
    }

    public function store(Request $request)
    {
    	$this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'phone_number' => 'required',
            'email' => 'required|unique:users',
            'company' => 'required',
            'billing_street1' => 'required',
            'billing_street2' => 'required',
            'billing_postcode' => 'required',
            'billing_state' => 'required',
            'billing_suburb' => 'required',
            'billing_country' => 'required',
            'password' => 'required',
        ]);

        //dd($request->all());

        if(request('residential_street1') == 0)
        {
        	$bill_street1 = request('billing_street1');
        	$bill_street2 = request('billing_street2');
        	$bill_post = request('billing_postcode');
        	$bill_state = request('billing_state');
        	$bill_sub = request('billing_suburb');
        	$bill_con = request('billing_country');
        	$pass = Hash::make(request('password'));

        	User::create([
        		'first_name' => request('first_name'),
            	'last_name' => request('last_name'),
            	'phone_number' => request('phone_number'),
            	'email' => request('email'),
            	'company' => request('company'),
            	'billing_street1' => request('billing_street1'),
            	'billing_street2' => request('billing_street2'),
            	'billing_postcode' => request('billing_postcode'),
            	'billing_state' => request('billing_state'),
            	'billing_suburb' => request('billing_suburb'),
            	'billing_country' => request('billing_country'),
            	'residential_street1' => $bill_street1,
            	'residential_street2' => $bill_street2,
            	'residential_postcode' => $bill_post,
            	'residential_state' => $bill_state,
            	'residential_suburb' => $bill_sub,
            	'residential_country' => $bill_con, 
            	'password' => $pass,
            	'role_id' => request('role'),
            	'verified' => request('verified')
        	]);

        	  return back()->with('success','New partner has been created!');
        }
        else
        {
        	$pass = Hash::make(request('password'));
        	User::create([
        		'first_name' => request('first_name'),
            	'last_name' => request('last_name'),
            	'phone_number' => request('phone_number'),
            	'email' => request('email'),
            	'company' => request('company'),
            	'billing_street1' => request('billing_street1'),
            	'billing_street2' => request('billing_street2'),
            	'billing_postcode' => request('billing_postcode'),
            	'billing_state' => request('billing_state'),
            	'billing_suburb' => request('billing_suburb'),
            	'billing_country' => request('billing_country'),
            	'residential_street1' => request('residential_street1'),
            	'residential_street2' => request('residential_street2'),
            	'residential_postcode' => request('residential_postcode'),
            	'residential_state' => request('residential_state'),
            	'residential_suburb' => request('residential_suburb'),
            	'residential_country' => request('residential_country'), 
            	'password' => $pass,
            	'role_id' => request('role'),
            	'verified' => request('verified')
        	]);
        	  return back()->with('success','New badge has been created!');
        }

        
    }


    public function list(){


    }

    
    public function view(Request $request)
    {

        if( $request->ajax() ) {

            $search = request('q');
            $partner = User::where('role_id', '=', 3)
                            ->where('company', 'LIKE', "$search%")
                            ->get();

            return $partner;

        }

        $partner = User::where('role_id',3)->get();

        return view('admin.partners.index',compact('partner'));

    }

    public function edit($partner)
    {
        $partner = User::find($partner);
        return view('admin.partners.edit',compact('partner'));
    }

    public function update($partner)
    {
        $partner = User::find($partner);

        $partner->first_name = request('first_name');
        $partner->last_name = request('last_name');
        $partner->phone_number = request('phone_number');
        $partner->email = request('email');
        $partner->company = request('company');
        $partner->billing_street1 = request('billing_street1');
        $partner->billing_street2 = request('billing_street2');
        $partner->billing_postcode = request('billing_postcode');
        $partner->billing_state = request('billing_state');
        $partner->billing_suburb = request('billing_suburb');
        $partner->billing_country = request('billing_country');
        $partner->residential_street1 = request('residential_street1');
        $partner->residential_street2 = request('residential_street2');
        $partner->residential_postcode = request('residential_postcode');
        $partner->residential_state = request('residential_state');
        $partner->residential_suburb = request('residential_suburb');
        $partner->residential_country = request('residential_country');

        $partner->save();

        return redirect('admin/partners')->with('success','Partner Data is updated');
    }

}
