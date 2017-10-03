@extends('layouts/master')

@section('content')
    <div class="row">

        @include('layouts.sidemenu')

        <main class="col-sm-9 ml-sm-auto col-md-10 pt-3" role="main">
            <h1>User Dashboard</h1>

            <h2>Change Password</h2>

            <form class="col-sm-6" method="POST" action="{{url('password-change')}}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label>Enter New Password</label> {{ $errors->first('password') }}
                    <input class="form-control" type="password" name="password" placeholder="Enter New Password" ></input>

                </div>

                <div class="form-group">
                    <label for="tooltip">Repeat New Password</label> {{ $errors->first('repeat') }}
                    <input class="form-control" name="repeat" type="password" placeholder="Repeat New Password" ></input>
                    
                </div>
                <button type="submit" class="btn btn-primary">Update</button>

            </form>

        </main>
    </div>



@endsection