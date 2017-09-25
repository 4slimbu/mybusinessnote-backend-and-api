@extends('admin/layouts/master')

@section('content')
    <div class="row">

        @include('admin.layouts.sidemenu')

        <main class="col-sm-9 ml-sm-auto col-md-10 pt-3" role="main">
            <h1>Admin Dashboard</h1>

            <h2>Update Business Badge</h2>

            <form class="col-sm-6" method="POST" action="{{url('admin/badge/update')}}/{{ $badge->id }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="name">Title</label> {!! $errors->first('name') !!}
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter badge name" value="{{$badge->name}}">
                </div>


                <div class="form-group">
                    <label for="tooltip">Message</label> {!! $errors->first('message') !!}
                    <textarea class="form-control" id="message" name="message" rows="3" placeholder="Enter business badge earn message"> {{$badge->message}} </textarea>
                    <small id="toolTipHelp" class="form-text text-muted">Message to the user when they complete this level.</small>
                    
                </div>

                <div class="form-group">
                    <label for="tooltip">Badge Icon</label> {!! $errors->first('icon') !!}
                    <input class="form-control" type="file" name="icon"></input>
                    <p>Old Icon:</p>
                                        <p><img src="{{url('images\badges')}}/{{$badge->icon}}" width="150px" height="150px"></p>

                </div>

                <button type="submit" class="btn btn-primary">Update</button>

            </form>

        </main>
    </div>



@endsection