@extends('admin/layouts/master')

@section('content')
    <div class="row">

        @include('admin.layouts.sidemenu')

        <main class="col-sm-9 ml-sm-auto col-md-10 pt-3" role="main">
            <h1>Admin Dashboard</h1>

            <h2>Add New Business Category</h2>

            <form class="col-sm-6" method="POST" action="/admin/businesscategory/">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Enter category title">
                </div>


                <div class="form-group">
                    <label for="tooltip">Tooltip</label>
                    <textarea class="form-control" id="tooltip" name="tooltip" rows="3" placeholder="Enter category tooltip"></textarea>
                    <small id="toolTipHelp" class="form-text text-muted">Tooltip to display on the front-end for users</small>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>

        </main>
    </div>



@endsection