@extends('partner-dashboard.layouts.default')

@section('content')
    <div class="content-wrapper">

        <useraction title="{{ $panel_name }}" useractions="{{ json_encode($panel_actions) }}"></useraction>

        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Phone Number</th>
                    <th>Email</th>
                    <th>Clicked On</th>

                </tr>
                </thead>
                <tbody>
                @if(isset($data['rows']) && $data['rows']->count() > 0)
                    @foreach ($data['rows'] as $item)
                        <tr>
                            <td></td>
                            <td>{{ $item->user->first_name }}</td>
                            <td>{{ $item->user->last_name }}</td>
                            <td>{{ $item->user->phone_number }}</td>
                            <td>{{ $item->user->email }}</td>
                            <td>{{ $item->created_at }}</td>
                        </tr>

                    @endforeach
                @else
                    <tr>
                        <td>No records Found!</td>
                    </tr>
                @endif
                </tbody>
            </table>
            {{ $data['rows']->links() }}
        </div>
    </div>
@endsection