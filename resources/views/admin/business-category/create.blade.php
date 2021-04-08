@extends('admin.layouts.default')

@section('content')
    <div class="content-wrapper">
        <h2>
            Create New {{ $panel_name }}
        </h2>

        <div class="col-md-10">
            {{ Form::open(['method' => 'POST','files' => true, 'route' => [$base_route.'.store']]) }}
            <div class="panel panel-flat">

                <div class="panel-body">

                    @include($view_path . '.includes.form')

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Save changes</button>
                        <a href="{{ route($base_route) }}" class="btn btn-default">Cancel</a>
                    </div>

                </div>
            </div>
            {{ Form::close() }}
        </div>

    </div>
@endsection