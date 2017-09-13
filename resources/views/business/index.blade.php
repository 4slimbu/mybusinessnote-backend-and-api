@extends('layouts/master')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h3>Business Directory</h3></div>

                <div class="panel-body panel-business-list">
                    <p class="lead">
                        Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Duis mollis, est non commodo luctus.
                    </p>

                    @foreach ($businesses as $business)
                        <div class="card">
                            <div class="card-header">
                                <h4>{{ $business->business_name }}</h4>
                            </div>
                            <div class="card-body">
                                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                                <a href="{{ $business->path() }}" class="btn btn-primary">View Details</a>
                            </div>
                            <div class="card-footer text-muted">
                                2 days ago
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
@endsection