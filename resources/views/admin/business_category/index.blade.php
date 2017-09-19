@extends('admin/layouts/master')

@section('content')
    <div class="row">

        @include('admin.layouts.sidemenu')

        <main class="col-sm-9 ml-sm-auto col-md-10 pt-3" role="main">
            <h1>Admin Dashboard</h1>

            <h2>Manage Business Categories</h2>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Category Title</th>
                        <th>Tooltip</th>
                        <th>Actions</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($businessCategories as $businessCategory)
                        <tr>
                            <td>{{ $businessCategory->id }}</td>
                            <td>{{ $businessCategory->title }}</td>
                            <td>{{ $businessCategory->tooltip }}</td>
                            <td>

                                <div class="">
                                    <a href="/admin/businesscategory/edit/{{ $businessCategory->id }}" class="btn btn-primary">Edit</a>
                                    <form class="form-inline" method="POST" action="/admin/businesscategory/{{ $businessCategory->id }}">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <button onclick="javascript: return confirm('Are you sure?');" type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </div>

                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </main>
    </div>



@endsection