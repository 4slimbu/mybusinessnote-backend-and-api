@extends('admin/layouts/master')

@section('content')
    <div class="row">

        @include('admin.layouts.sidemenu')

        <main class="col-sm-9 ml-sm-auto col-md-10 pt-3" role="main">
            <h1>Admin Dashboard</h1>

            <h2>Manage Business Options</h2>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Tooltip</th>
                        
                        
                        <th>Actions</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($businessOptions as $businessOption)
                        <tr>
                            <td>{{ $businessOption->id }}</td>
                            <td>{{ $businessOption->name }}</td>
                            <td>{{ $businessOption->tooltip }}</td>
                            
                            
                            <td><a href="<!-- {{url('admin/business_option/edit')}}/{{$businessOption->id}} -->" class="btn btn-primary">Edit</a>

                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </main>
    </div>



@endsection
