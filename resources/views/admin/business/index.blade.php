@extends('admin/layouts/master')

@section('content')
    <div class="row">

        @include('admin.layouts.sidemenu')

        <main class="col-sm-9 ml-sm-auto col-md-10 pt-3" role="main">
            <h1>Admin Dashboard</h1>

            <h2>Manage Customers</h2>
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
                                    <a href="{{url('admin/businesses/edit')}}/{{$bus->id}}" class="btn btn-primary">Edit</a>


                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </main>
    </div>



@endsection
