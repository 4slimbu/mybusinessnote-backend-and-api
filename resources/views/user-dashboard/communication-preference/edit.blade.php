@extends('user-dashboard.layouts.default')

@section('content')
<div class="row">
    <div class="content-wrapper">
        <h2>
            {{ $panel_name }}
        </h2>


        <div class="col-md-10">
            {{ Form::model($data['user'], ['method' => 'POST', 'route' => [$base_route.'.update']]) }}
           
                    @include($view_path . '.includes.form')

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Save changes</button>
                        <a href="{{ route('user-dashboard.dashboard') }}" class="btn btn-default">Cancel</a>
                    </div>

            
            {{ Form::close() }}
        </div>
    </div>
</div>
@endsection