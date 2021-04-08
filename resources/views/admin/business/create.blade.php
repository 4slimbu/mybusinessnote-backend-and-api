@extends('admin.layouts.default')

@section('content')
    <div class="content-wrapper">
        <h2>
            Create New {{ $panel_name }}
        </h2>
        <div class="col-md-10">
            <p>
                Business is always associated with a customer so <a href="{{ route('admin.customer.create') }}" >create customer</a> and
                business for that customer will be automatically created.
            </p>
        </div>

    </div>
@endsection