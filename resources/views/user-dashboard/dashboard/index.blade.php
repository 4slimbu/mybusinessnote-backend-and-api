@extends('user-dashboard.layouts.default')

@section('content')
    <div class="content-wrapper">
  
         <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3">
            <h1 class="h2">{{ $panel_name }}</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
              <div class="btn-group mr-2">
                <a href="#" class="btn btn-sm btn-outline-secondary"><i class="fas fa-file-pdf" aria-hidden="true"></i> Export Profile to PDF</a>
              </div>
            </div>
        </div>


		<div class="card">
			<div class="card-header">
			Business Profile
				<a href="{{ route('user-dashboard.profile.edit') }}" class="btn btn-sm pull-right">Edit</a>
			</div>
			<div class="card-body">
				<table class="table">
					<tbody>
					<tr>
						<td>First Name : </td>
						<td>{{ $data['user']->first_name }}</td>
					</tr>
					<tr>
						<td>Last Name : </td>
						<td>{{ $data['user']->last_name }}</td>
					</tr>
					<tr>
						<td>Password : </td>
						<td>Your Secret Password (<a href="{{ route('user-dashboard.profile.edit-password') }}">Update</a>)</td>
					</tr>
					<tr>
						<td>User Email : </td>
						<td>{{ $data['user']->email }}</td>
					</tr>
					<tr>
						<td>Company Name (Business Name) : </td>
						<td>{{ $data['user']->business->business_name }}</td>
					</tr>
					<tr>
						<td>Company Domain (Business Website) : </td>
						<td>{{ $data['user']->business->website }}</td>
					</tr>
					<tr>
						<td>ABN : </td>
						<td>{{ $data['user']->business->abn }}</td>
					</tr>
					<tr>
						<td>ACN : </td>
						<td>{{ $data['user']->business->acn }}</td>
					</tr>

					<tr>
						<td>Email : </td>
						<td>{{ $data['user']->business->business_email }}</td>
					</tr>
					<tr>
						<td>Phone (Mobile) : </td>
						<td>{{ $data['user']->business->business_mobile }}</td>
					</tr>
					<tr>
						<td>Phone (General) : </td>
						<td>{{ $data['user']->business->business_general_phone }}</td>
					</tr>
					<tr>
						<td>Address : </td>
						<td>{{ $data['user']->business->address }}</td>
					</tr>
					</tbody>
				</table>
			</div>
			<div class="card-footer text-muted">
			updated on: {{ $data['user']->updated_at > $data['user']->business->updated_at ? $data['user']->updated_at : $data['user']->business->updated_at }}
			</div>
		</div>
		<br /><br /><br />

		<div class="card">
			<div class="card-header">
				Business Report
			</div>
			<div class="card-body">
				<div>
					<h3>Getting Started</h3>
					<div class="col-md-12">
						<table class="table">
							<tbody>
							<tr>
								<td>Business Category : </td>
								<td>{{ $data['user']->business->businessCategory->name }}</td>
							</tr>
							<tr>
								<td>Sell Goods : </td>
								<td>{{ ($data['user']->business->sell_goods || $data['user']->business->business_category_id === 4 ) ? 'Yes' : 'No' }}</td>
							</tr>
							</tbody>
						</table>
					</div>
				</div>
				@if(count($data['groupedBusinessOptions']) > 0):
				@foreach($data['groupedBusinessOptions'] as $level)
				<div>
					<h3>{{ $level['name']}}</h3>
					@if(count($level['sections']) > 0)
						@foreach($level['sections'] as $section)
							<div class="col-md-12">
								<h4>{{ $section['name'] }}</h4>
								<table class="table">
									<tbody>
									@foreach($section['businessOptions'] as $bo)
											<tr>
												<td>{{ $bo['name'] }}</td>
												<td>
													@if($bo['status'] === 'done')
														@if($bo['businessMetas'])
															@foreach($bo['businessMetas'] as $bo_meta)
																{!! $bo_meta['value'] !!} <br />
															@endforeach
														@endif
													@else
														{{ $bo['status'] }}
													@endif
												</td>
											</tr>
									@endforeach
									</tbody>
								</table>
							</div>
						@endforeach
					@endif
				</div>
				@endforeach
				@endif
			</div>
			<div class="card-footer text-muted">
				updated on: {{ $data['user']->updated_at }}
			</div>
		</div>
		<br /><br /><br />

    </div>
@endsection