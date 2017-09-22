@extends('admin/layouts/master')

@section('content')
    <div class="row">

        @include('admin.layouts.sidemenu')

        <main class="col-sm-9 ml-sm-auto col-md-10 pt-3" role="main">
            <h1>Admin Dashboard</h1>

            <h2>Update Partners</h2>

            <form class="col-sm-6"  action="{{url('admin/partners/update')}}/{{$partner->id}}" method="POST">
                {{ csrf_field() }}

                <input type="hidden" name="role_id" value="{{$partner->role_id}}">
                <input type="hidden" name="verified" value="{{$partner->verified}}">    

                <div class="form-group">
                    <label for="first_name">First Name</label> {!! $errors->first('first_name') !!}
                    <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Enter First Name" value="{{$partner->first_name}}" >
                </div>

                <div class="form-group">
                    <label for="last_name">Last Name</label> {!! $errors->first('last_name') !!}
                    <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Enter Last Name" value="{{$partner->last_name}}" >
                </div>

                <div class="form-group">
                    <label for="phone_number">Phone Number</label> {!! $errors->first('phone_number') !!}
                    <input type="text" class="form-control" id="phone_number" name="phone_number" placeholder="Enter Phone Number" value="{{$partner->phone_number}}" >
                </div>

                <div class="form-group">
                    <label for="email">Email</label> {!! $errors->first('email') !!}
                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email" value="{{$partner->email}}" >
                </div>

                

                <div class="form-group">
                    <label for="company">Company</label> {!! $errors->first('company') !!}
                    <input type="text" class="form-control" id="company" name="company" placeholder="Enter Company" value="{{$partner->company}}" >
                </div>

                <div class="form-group">
                    <label>Billing Address</label>
                    <div class="form-group">
                    <label for="billing_street1">Street Address 1</label> {!! $errors->first('billing_street1') !!}
                    <input type="text" class="form-control" id="billing_street1" name="billing_street1" placeholder="Enter Street Address" value="{{$partner->billing_street1}}" >
                </div>

                <div class="form-group">
                    <label for="billing_street2">Street Address 2</label> {!! $errors->first('billing_street2') !!}
                    <input type="text" class="form-control" id="billing_street2" name="billing_street2" placeholder="Enter Street Address 2" value="{{$partner->billing_street2}}" >
                </div>

                <div class="form-group">
                    <label for="billing_postcode">Postcode/Zipcode</label> {!! $errors->first('billing_postcode') !!}
                    <input type="text" class="form-control" id="billing_postcode" name="billing_postcode" placeholder="Enter Billing Postcode/Zipcode" value="{{$partner->billing_postcode}}" >
                </div>

                <div class="form-group">
                    <label for="billing_state">State Name</label> {!! $errors->first('billing_state') !!}
                    <input type="text" class="form-control" id="billing_state" name="billing_state" placeholder="Enter Billing State Name" value="{{$partner->billing_state}}" >
                </div>

                <div class="form-group">
                    <label for="billing_suburb">Suburb Name</label> {!! $errors->first('billing_suburb') !!}
                    <input type="text" class="form-control" id="billing_suburb" name="billing_suburb" placeholder="Enter Billing Suburb Name" value="{{$partner->billing_suburb}}" >
                </div>

                <div class="form-group">
                    <label for="billing_country">Country Name</label> {!! $errors->first('billing_country') !!}
                    <input type="text" class="form-control" id="billing_country" name="billing_country" placeholder="Enter Billing Country Name" value="{{$partner->billing_country}}" >
                </div>
                </div>
                
                <div class="form-group ">
                    <label>Residential Address</label>
                    <div class="form-group">
                    <label for="residential_street1">Street Address 1</label> {!! $errors->first('residential_street1') !!}
                    <input type="text" class="form-control" id="residential_street1" name="residential_street1" placeholder="Enter Street Address 1"   value="{{$partner->residential_street1}}" >
                </div>

                <div class="form-group">
                    <label for="residential_street2">Street Address 2</label> {!! $errors->first('residential_street2') !!}
                    <input type="text" class="form-control" id="residential_street2" name="residential_street2" placeholder="Enter Street Address 2"   value="{{$partner->residential_street2}}" >
                </div>

                <div class="form-group">
                    <label for="residential_postcode">Postcode/Zipcode</label> {!! $errors->first('residential_postcode') !!}
                    <input type="text" class="form-control" id="residential_postcode" name="residential_postcode" placeholder="Enter residential Postcode/Zipcode"   value="{{$partner->residential_postcode}}" >
                </div>

                <div class="form-group">
                    <label for="residential_state">State Name</label> {!! $errors->first('residential_state') !!}
                    <input type="text" class="form-control" id="residential_state" name="residential_state" placeholder="Enter residential State Name"   value="{{$partner->residential_state}}" >
                </div>

                <div class="form-group">
                    <label for="residential_suburb">Suburb Name</label> {!! $errors->first('residential_suburb') !!}
                    <input type="text" class="form-control" id="residential_suburb" name="residential_suburb" placeholder="Enter residential Suburb Name"   value="{{$partner->residential_suburb}}" >
                </div>

                <div class="form-group">
                    <label for="residential_country">Country Name</label> {!! $errors->first('residential_country') !!}
                    <input type="text" class="form-control" id="residential_country" name="residential_country" placeholder="Enter residential Country Name"  value="{{$partner->residential_country}}"  >
                </div>
                
                

                
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>

        </main>
    </div>
@endsection