@extends('layouts/master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <b>Name of Business Owner : {{$business->user->first_name}} {{$business->user->last_name}}</b>

                <br>

                <b>Bsuiness Name : {{$business->business_name}} </b>

                <br>

                <b>Company Domain : {{$business->website}} </b>

                <br>

                <b>ABN : {{$business->abn}} </b>

                <br>

                <b>ACN : {{$business->acn}} </b>

                <br>

                <b>Email Address : {{$business->business_email}} </b>

                <br>

                <b>Business Mobile : {{$business->business_mobile}} </b>

                <br>

                <b>Business General Phone : {{$business->business_general_phone}} </b>

                <br>

                <b>Address : {{$business->address}} </b>
        </div>
        </div>
    </div>
</div>
@endsection