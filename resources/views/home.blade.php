@extends('layouts/master')

@section('content')
    <div class="row">

        @include('layouts.sidemenu')

        <main class="col-md-10 ml-sm-auto col-lg-10 pt-3 px-4" role="main">
            

			<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3">
			<h2 class="h2">My Business Profile</h2>
			<div class="btn-toolbar mb-2 mb-md-0">
			    <div class="btn-group mr-2">
			        <a href="{{ route('admin.level.create') }}" class="btn btn-sm btn-outline-secondary"><i class="fa fa-file-pdf-o" aria-hidden="true"></i>
 Export to PDF</a>
			       
			    </div>
			</div>
			</div>

        </main>
    </div>
@endsection