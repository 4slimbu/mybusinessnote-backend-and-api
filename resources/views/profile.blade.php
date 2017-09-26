@extends('layouts/master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h3>Profile of {{Auth::user()->first_name}} </h3></div>

                <div class="panel-body">
                    <p class="lead">
                    Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Duis mollis, est non commodo luctus.
                    </p>
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Business Name</th>
                        <th>Business E-Mail</th>
                        <th>Badge Image</th>
                        <th>User Name</th>
                        <th>Actions</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($business as $bus)
                        <tr>
                            <td>{{ $bus->id }}</td>
                            <td>{{ $bus->business_name }} </td>
                            <td>{{ $bus->business_email }}</td>
                            <td><img src="{{url('images/badges/')}}/{{$bus->badge->icon}}" alt="{{$bus->badge->name}}" width="150px" height="150px"></td>
                            <td>{{$bus->user->first_name}} {{$bus->user->last_name}}</td>
                            <td>

                                <div class="">
                                    <a href="{{url('user')}}/{{$bus->id}}" class="btn btn-primary">View Business</a>
                                     
                        
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        </div>
    </div>
@endsection