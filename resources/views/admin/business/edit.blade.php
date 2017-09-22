@extends('admin/layouts/master')

@section('content')
    <div class="row">

        @include('admin.layouts.sidemenu')

        <main class="col-sm-9 ml-sm-auto col-md-10 pt-3" role="main">
            <h1>Admin Dashboard</h1>

            <h2>Update Business Info</h2>

            <form class="col-sm-6" method="POST" action="{{url('admin/businesses/update')}}/{{ $business->id }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label>Name</label>
                    <input class="form-control" type="text" name="business_name" value="{{$business->business_name}}"></input>

                </div>

                <div class="form-group">
                    <label for="tooltip">Website</label> 
                    <input class="form-control" name="website" type="text" value="{{$business->website}}"></input>
                    
                </div>

                <div class="form-group">
                    <label for="tooltip">ABN</label>
                    <input class="form-control" name="abn" type="text" value="{{$business->abn}}"></input>
                    
                </div>

                <div class="form-group">
                    <label for="tooltip">ACN</label>
                    <input class="form-control" name="acn" type="text" value="{{$business->acn}}"></input>
                    
                </div>

                <div class="form-group">
                    <label for="tooltip">E-Mail</label> {!! $errors->first('message') !!}
                    <input class="form-control" name="business_email" type="email" value="{{$business->business_email}}"></input>
                    
                </div>

                <div class="form-group">
                    <label for="tooltip">Business Mobile Number</label>
                    <input class="form-control" name="business_mobile" type="text" value="{{$business->business_mobile}}"></input>
                </div>

                <div class="form-group">
                    <label for="tooltip">Business Phone</label>
                    <input class="form-control" name="business_general_phone" type="text" value="{{$business->business_general_phone}}"></input>
                </div>

                <div class="form-group">
                    <label for="tooltip">Address</label>
                    <input class="form-control" name="address" type="text" value="{{$business->address}}"></input>
                </div>

                <button type="submit" class="btn btn-primary">Update</button>

            </form>

        </main>
    </div>



@endsection