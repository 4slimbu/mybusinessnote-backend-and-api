@extends('admin.layouts.default')

@section('content')
    <div class="row">

        @include('admin.layouts.partials.side-menu')

        <main class="col-sm-9 ml-sm-auto col-md-10 pt-3" role="main">
            <h1>Admin Dashboard</h1>

            <h2>Add New Business Badge</h2>

            <form class="col-sm-6"  action="{{url('admin/badge')}}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="name">Title</label> {!! $errors->first('name') !!}
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter badge name">
                </div>


                <div class="form-group">
                    <label for="tooltip">Message</label> {!! $errors->first('message') !!}
                    <textarea class="form-control" id="message" name="message" rows="3" placeholder="Enter business badge earn message"></textarea>
                    <small id="toolTipHelp" class="form-text text-muted">Message to the user when they complete this level.</small>
                    
                </div>

                <div class="form-group">
                    <label for="tooltip">Badge Icon</label>{!! $errors->first('icon') !!}
                </div>

                <div class="form-group">

                    <label class="custom-file">
                        <input type="file" id="file" class="custom-file-input" name="icon" required>
                        <span class="custom-file-control"></span>
                    </label>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>

        </main>
    </div>
@endsection