@extends('admin.layouts.default')

@section('content')
    <div class="row">

        @include('admin.layouts.partials.side-menu')

        <main class="col-sm-9 ml-sm-auto col-md-10 pt-3" role="main">
            <h1>Admin Dashboard</h1>

            <h2>Add New Partners</h2>

            <form class="col-sm-6"  action="{{url('admin/partners')}}" method="POST">
                {{ csrf_field() }}

                <input type="hidden" name="role" value="3">
                <input type="hidden" name="verified" value="1">    

                <div class="form-group">
                    <label for="first_name">First Name</label> {!! $errors->first('first_name') !!}
                    <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Enter First Name">
                </div>

                <div class="form-group">
                    <label for="last_name">Last Name</label> {!! $errors->first('last_name') !!}
                    <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Enter Last Name">
                </div>

                <div class="form-group">
                    <label for="phone_number">Phone Number</label> {!! $errors->first('phone_number') !!}
                    <input type="text" class="form-control" id="phone_number" name="phone_number" placeholder="Enter Phone Number">
                </div>

                <div class="form-group">
                    <label for="email">Email</label> {!! $errors->first('email') !!}
                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email">
                </div>

                <div class="form-group"> 
                    <label for="password">Password</label> {!! $errors->first('password') !!}
                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter password">
                </div>

                <div class="form-group">
                    <label for="company">Company</label> {!! $errors->first('company') !!}
                    <input type="text" class="form-control" id="company" name="company" placeholder="Enter Company">
                </div>

                <div class="form-group">
                    <label>Billing Address</label>
                    <div class="form-group">
                    <label for="billing_street1">Street Address 1</label> {!! $errors->first('billing_street1') !!}
                    <input type="text" class="form-control" id="billing_street1" name="billing_street1" placeholder="Enter Street Address">
                </div>

                <div class="form-group">
                    <label for="billing_street2">Street Address 2</label> {!! $errors->first('billing_street2') !!}
                    <input type="text" class="form-control" id="billing_street2" name="billing_street2" placeholder="Enter Street Address 2">
                </div>

                <div class="form-group">
                    <label for="billing_postcode">Postcode/Zipcode</label> {!! $errors->first('billing_postcode') !!}
                    <input type="text" class="form-control" id="billing_postcode" name="billing_postcode" placeholder="Enter Billing Postcode/Zipcode">
                </div>

                <div class="form-group">
                    <label for="billing_state">State Name</label> {!! $errors->first('billing_state') !!}
                    <input type="text" class="form-control" id="billing_state" name="billing_state" placeholder="Enter Billing State Name">
                </div>

                <div class="form-group">
                    <label for="billing_suburb">Suburb Name</label> {!! $errors->first('billing_suburb') !!}
                    <input type="text" class="form-control" id="billing_suburb" name="billing_suburb" placeholder="Enter Billing Suburb Name">
                </div>

                <div class="form-group">
                    <label for="billing_country">Country Name</label> {!! $errors->first('billing_country') !!}
                    <input type="text" class="form-control" id="billing_country" name="billing_country" placeholder="Enter Billing Country Name">
                </div>
                </div>
                                <p>Is it same as business address? <a href="javascript:void(0)" class="show-more" > <input  type="checkbox"></input> </a></p>
                <div class="form-group more-inputs" >
                    <label>Physical Address</label>

                  
                    <div class="form-group">
                    <label for="residential_street1">Street Address 1</label> {!! $errors->first('residential_street1') !!}
                    <input type="text" class="form-control" id="residential_street1" name="residential_street1" placeholder="Enter Street Address 1" value="{{Request::old('residential_street1')}}" >
                </div>

                <div class="form-group">
                    <label for="residential_street2">Street Address 2</label> {!! $errors->first('residential_street2') !!}
                    <input type="text" class="form-control" id="residential_street2" name="residential_street2" placeholder="Enter Street Address 2" value="{{Request::old('residential_street2')}}" >
                </div>

                <div class="form-group">
                    <label for="residential_postcode">Postcode/Zipcode</label> {!! $errors->first('residential_postcode') !!}
                    <input type="text" class="form-control" id="residential_postcode" name="residential_postcode" placeholder="Enter residential Postcode/Zipcode" value="{{Request::old('residential_postcode')}}" >
                </div>

                <div class="form-group">
                    <label for="residential_state">State Name</label> {!! $errors->first('residential_state') !!}
                    <input type="text" class="form-control" id="residential_state" name="residential_state" placeholder="Enter residential State Name" value="{{Request::old('residential_state')}}" >
                </div>

                <div class="form-group">
                    <label for="residential_suburb">Suburb Name</label> {!! $errors->first('residential_suburb') !!}
                    <input type="text" class="form-control" id="residential_suburb" name="residential_suburb" placeholder="Enter residential Suburb Name" value="{{Request::old('residential_suburb')}}" >
                </div>

                <div class="form-group">
                    <label for="residential_country">Country Name</label> {!! $errors->first('residential_country') !!}
                    <input type="text" class="form-control" id="residential_country" name="residential_country" placeholder="Enter residential Country Name" value="{{Request::old('residential_country')}}" >
                </div>
                </div>
                

                
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>

        </main>
    </div>
@endsection