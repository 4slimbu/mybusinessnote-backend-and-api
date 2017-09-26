@extends('layouts/master')

@section('content')
    <div class="row">

        @include('layouts.sidemenu')

        <main class="col-sm-9 ml-sm-auto col-md-10 pt-3" role="main">
            <h1>User Dashboard</h1>

            <h2>View User Businesses</h2>

            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Business Name</th>
                        <th>Business E-Mail</th>
                        <th>Badge Image</th>
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
                            
                            <td>

                                <div class="">
                                    <a href="{{url('business/edit')}}/{{$bus->id}}" class="btn btn-primary">Edit</a>
                                     
                        
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

        </main>
    </div>
@endsection