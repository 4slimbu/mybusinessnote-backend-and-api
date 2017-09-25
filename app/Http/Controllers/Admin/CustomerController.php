<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $customer = User::where('role_id','2')->get();
        return view('admin.customers.index', compact('customer'));
    }

    public function edit($customer)
    {
        $customer = User::find($customer);
        return view('admin.customers.edit',compact('customer'));
    }

    public function update(Request $request , $customer)
    {
        $customer = User::find($customer);

        $customer->first_name = request('first_name');
        $customer->last_name = request('last_name');
        $customer->email = request('email');
        $customer->phone_number = request('phone_number');

        $customer->save();

        return redirect('admin/customers')->with('success','The Customer info has been updated');
    }
}
