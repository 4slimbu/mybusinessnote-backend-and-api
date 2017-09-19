@extends('admin/layouts/master')

@section('content')
    <div class="row">

        @include('admin.layouts.sidemenu')

        <main class="col-sm-9 ml-sm-auto col-md-10 pt-3" role="main">
            <h1>Admin Dashboard</h1>

            <h2>Add New Business Badge</h2>

            <form class="col-sm-6" method="POST" action="/admin/badges/">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="name">Title</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter badge name">
                </div>


                <div class="form-group">
                    <label for="tooltip">Message</label>
                    <textarea class="form-control" id="message" name="message" rows="3" placeholder="Enter business badge earn message"></textarea>
                    <small id="toolTipHelp" class="form-text text-muted">Message to the user when they complete this level.</small>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>

        </main>
    </div>
@endsection