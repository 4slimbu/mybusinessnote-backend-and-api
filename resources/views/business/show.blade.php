@extends('layouts/master')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h1>Business Detail</h1></div>

                <div class="panel-body">

                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">{{ $business->business_name }}</h4>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk
                                of the card's content.</p>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Web: <a target="_blank"
                                                                href="{{ $business->website }}">{{ $business->website }}</a>
                            </li>
                            <li class="list-group-item">Address: {{ $business->address }}</li>
                            <li class="list-group-item">Created: {{ $business->created_at }}</li>
                        </ul>
                        <div class="card-body">
                            <a href="#" class="card-link">Edit</a>
                        </div>
                    </div>


                </div>

            </div>
        </div>
    </div>
    </div>
@endsection