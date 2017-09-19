@extends('admin/layouts/master')

@section('content')
    <div class="row">

        @include('admin.layouts.sidemenu')

        <main class="col-sm-9 ml-sm-auto col-md-10 pt-3" role="main">
            <h1>Admin Dashboard</h1>

            <h2>Manage Business Badges</h2>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Badge Name</th>
                        <th>Congratulation Message</th>
                        <th>Icon</th>
                        <th>Actions</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($badges as $badge)
                        <tr>
                            <td>{{ $badge->id }}</td>
                            <td>{{ $badge->name }}</td>
                            <td>{{ $badge->message }}</td>
                            <td>{{ $badge->icon }}</td>
                            <td>

                                <div class="">
                                    <a href="/admin/badge/edit/{{ $badge->id }}" class="btn btn-primary">Edit</a>
                                    <form class="form-inline" method="POST" action="/admin/badge/{{ $badge->id }}">
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