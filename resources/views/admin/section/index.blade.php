@extends('admin.layouts.default')

@section('content')
    <div class="content-wrapper">
        <h2>
            Manage {{ $panel_name }} List
        </h2>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Level</th>
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
                            {{ $item->level->name }}
                        </td>
                        <td>
                            <div class="">
                                <a href="{{ route('admin.section.edit', $item->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                <form class="form-inline" method="POST" action="{{ route('admin.section.destroy', $item->id) }}">
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