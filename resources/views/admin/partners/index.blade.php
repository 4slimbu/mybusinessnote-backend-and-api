@extends('admin/layouts/master')

@section('content')
    <div class="row">

        @include('admin.layouts.sidemenu')

        <main class="col-sm-9 ml-sm-auto col-md-10 pt-3" role="main">
            <h1>Admin Dashboard</h1>

            <h2>Manage Partners</h2>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Contact Name</th>
                        <th>E-Mail</th>
                        <th>Company</th>
                        <th>Phone Number</th>
                        <th>Actions</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($partner as $partner)
                        <tr>
                            <td>{{ $partner->id }}</td>
                            <td>{{ $partner->first_name }} {{ $partner->last_name }}</td>
                            <td>{{ $partner->email }}</td>
                            <td>{{ $partner->company }}</td>
                            <td>{{ $partner->phone_number }}</td>
                            
                            <td>

                                <a href="{{url('admin/partners/edit')}}/{{$partner->id}}" class="btn btn-primary">Edit</a>

                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </main>
    </div>



@endsection
