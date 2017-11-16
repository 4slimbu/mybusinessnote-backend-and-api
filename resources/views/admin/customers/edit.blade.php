@extends('admin.layouts.default')

@section('content')
    <div class="row">

        @include('admin.layouts.partials.side-menu')

        <main class="col-sm-9 ml-sm-auto col-md-10 pt-3" role="main">
            <h1>Admin Dashboard</h1>

            <h2>Update Customer Info</h2>

            <form class="col-sm-6" method="POST" action="{{url('admin/customers/update')}}/{{ $customer->id }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="col-md-12 form-group">
                    <label>Name</label>
                    <div class="col-md-6">
                        <label>First Name</label>
                        <input class="form-control" type="text" name="first_name" value="{{$customer->first_name}}"></input>
                    </div>

                    <div class="col-md-6">
                        <label>Last Name</label>
                        <input class="form-control" type="text" name="last_name" value="{{$customer->last_name}}"></input>
                    </div>

                </div>


                <div class="form-group">
                    <label for="tooltip">E-Mail</label> {!! $errors->first('message') !!}
                    <input class="form-control" name="email" type="text" value="{{$customer->email}}"></input>
                    
                </div>

                <div class="form-group">
                    <label for="tooltip">Phone Number</label> {!! $errors->first('icon') !!}
                    <input class="form-control" name="phone_number" type="text" value="{{$customer->phone_number}}"></input>
                </div>

                <button type="submit" class="btn btn-primary">Update</button>

            </form>

        </main>
    </div>



@endsection
