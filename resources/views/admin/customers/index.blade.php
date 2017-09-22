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
                        <th>Customer Full Name</th>
                        <th>E-Mail</th>
                        <th>Phone Number</th>
                        <th>Actions</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($customer as $cus)
                        <tr>
                            <td>{{ $cus->id }}</td>
                            <td>{{ $cus->first_name }} {{ $cus->last_name }}</td>
                            <td>{{ $cus->email }}</td>
                            <td>{{$cus->phone_number}}</td>
                            <td>

                                <div class="">
                                    <a href="{{url('admin/customers/edit')}}/{{$cus->id}}" class="btn btn-primary">Edit</a>
                                     
                        
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </main>
    </div>



@endsection