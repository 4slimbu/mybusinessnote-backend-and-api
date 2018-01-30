@extends('partner-dashboard.layouts.default')

@section('content')
    <div class="content-wrapper">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3">
        <h2 class="h2">Manage {{ $panel_name }} List</h2>
            <div class="btn-toolbar mb-2 mb-md-0">
                <div class="btn-group mr-2">
                    <a href={{ route('partner-dashboard.lead.download') }} class="btn btn-sm btn-outline-secondary">Export</a>
                </div>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Link Name</th>
                    <th>User</th>
                    <th>Email</th>
                    <th>Browser</th>
                    <th>IP</th>
                    <th>Clicked On</th>

                </tr>
                </thead>
                <tbody>
                @if(isset($data['rows']) && $data['rows']->count() > 0)
                @foreach ($data['rows'] as $item)
                    <tr>
                        <td></td>
                        <td>{{ $item->affiliateLink->name }}</td>
                        <td>{{ $item->user->first_name }}</td>
                        <td>{{ $item->user->email }}</td>
                        <td>{{ $item->browser }}</td>
                        <td>{{ $item->ip }}</td>
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