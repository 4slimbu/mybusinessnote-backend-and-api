@extends('admin.layouts.default')

@section('content')
    <div class="content-wrapper">

        <useraction title="{{ $panel_name }}" useractions="{{ json_encode($panel_actions) }}"></useraction>

        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Link</th>
                    <th>Partner</th>
                    <th>Actions</th>

                </tr>
                </thead>
                <tbody>
                @if(isset($data['rows']) && $data['rows']->count() > 0)
                    @foreach($data['rows'] as $affiliateLink)
                        <tr>
                            <td>{{ $affiliateLink->id }}</td>
                            <td>{{ $affiliateLink->name }}</td>
                            <td>{{ $affiliateLink->description }}</td>
                            <td>{{ $affiliateLink->link }}</td>
                            <td>
                                <a href="{{ route('admin.customer.edit', isset($affiliateLink->partner) ? $affiliateLink->partner->id : '') }}">
                                    {{ isset($affiliateLink->partner) ? $affiliateLink->partner->first_name . ' ' . $affiliateLink->partner->last_name : ''}}
                                </a>
                            </td>
                            <td>
                                <div class="">
                                    <a href="{{ route('admin.affiliate-link.edit', $affiliateLink->id) }}"
                                       class="btn btn-sm btn-primary float-left">Edit</a>
                                    <form class="form-inline float-left" method="POST"
                                          action="{{ route('admin.affiliate-link.destroy', $affiliateLink->id) }}">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <button onclick="javascript: return confirm('Are you sure?');" type="submit"
                                                class="btn btn-sm btn-danger">Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
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