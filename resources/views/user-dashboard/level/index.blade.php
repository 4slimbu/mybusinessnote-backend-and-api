@extends('admin.layouts.default')

@section('content')
    <div class="content-wrapper">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3">
        <h2 class="h2">Manage {{ $panel_name }} List</h2>
            <div class="btn-toolbar mb-2 mb-md-0">
                <div class="btn-group mr-2">
                    <a href="{{ route('admin.level.create') }}" class="btn btn-sm btn-outline-secondary">Add New</a>
                   
                </div>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Sections</th>
                    <th>Actions</th>

                </tr>
                </thead>
                <tbody>
                @if(isset($data['rows']) && $data['rows']->count() > 0)
                @foreach ($data['rows'] as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->name }}</td>
                        <td>
                            @if($item->sections)
                                @foreach($item->sections as $section)
                                    <div>{{ $section->name }} </div>
                                @endforeach
                            @endif
                        </td>
                        <td>
                            <div class="">
                                <a href="{{ route('admin.level.edit', $item->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                <form class="form-inline" method="POST" action="{{ route('admin.level.destroy', $item->id) }}">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button onclick="javascript: return confirm('Are you sure?');" type="submit" class="btn btn-sm btn-danger">Delete</button>
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