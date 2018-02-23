@extends('user-dashboard.layouts.default')

@section('content')
    <div class="content-wrapper">

		<h2>
			{{ $panel_name }}
		</h2>

		<div class="card">
			<div class="card-header">
				Business Status Grouped By Categories
			</div>
			<div class="card-body">
				@if(count($data['groupedBusinessOptions']) > 0)
				@foreach($data['groupedBusinessOptions'] as $section)
					<div class="col-md-12">
						<h4>{{ $section['name'] }}</h4>
						<table class="table bo-display-table">
							<tbody>
							@if(count($section['businessOptions']) > 0)
							@foreach($section['businessOptions'] as $bo)
								<tr>
									<td><a href="{{ $bo['url'] }}" target="_blank">{{ $bo['name'] }}</a></td>
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
							@else
								<tr>
									<td>Not completed any {{$section['name']}} options</td>
									<td></td>
								</tr>
							@endif
							</tbody>
						</table>
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