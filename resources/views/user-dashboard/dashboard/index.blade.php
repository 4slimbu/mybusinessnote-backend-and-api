@extends('user-dashboard.layouts.default')

@section('content')
    <div class="content-wrapper">
  
         <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3">
            <h1 class="h2">{{ $panel_name }}</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
              <div class="btn-group mr-2">
                <a href="#" class="btn btn-sm btn-outline-secondary">Export Profile to PDF</a>
              </div>
            </div>
        </div>


		<div class="card text-center">
			<div class="card-header">
			Your Business Profile
			</div>
			<div class="card-body">
				<h3 class="card-title">Special title treatment</h3>
				<p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
				<a href="#" class="btn btn-primary">Go somewhere</a>
			</div>
			<div class="card-footer text-muted">
			2 days ago
			</div>
		</div>

    </div>
@endsection