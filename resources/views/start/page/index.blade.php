@extends('start.layouts.default')

@section('content')
    <section class="mid-sec bg-red mCustomScrollbar" data-mcs-theme="dark">
        <div class="content-wrapper step-one">
            <h5 class="obvious-h5">Getting started</h5>
            <span class="progress-label">5% complete</span> <span class="pull-right progress-label">1/4</span>
            <div class="progress">
                <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 5%;">
                </div>
            </div>
            <h1>Getting started</h1>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
            <p>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
            <div class="btn-wrap">
                <a href="level1_step_2.html" class="btn btn-default btn-md">Start</a>
            </div>
        </div>
    </section>
@endsection