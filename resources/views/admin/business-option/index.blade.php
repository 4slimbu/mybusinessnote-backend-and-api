@extends('admin.layouts.default')

@section('content')
    <div class="content-wrapper">
        
        <useraction title="{{ $panel_name }}" useractions="{{ json_encode($panel_actions) }}"></useraction>
        
        {{--<p>Note: Supported nesting depth: 4 <br />--}}
            {{--Eg: Top Business Option -> Business Option -> Child Business Option -> Grand Child Business Option--}}
        {{--</p>--}}
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>BusinessOption</th>
                    <th>Level</th>
                    <th>Section</th>
                    <th>Show On</th>
                    <th>Actions</th>

                </tr>
                </thead>
                <tbody>
                @if(isset($data['rows']) && $data['rows']->count() > 0)
                <!-- Top Business Option -->
                @foreach ($data['rows'] as $businessOption)
                    <tr>
                        <td>{{ $businessOption->name }}</td>
                        <td>{{ $businessOption->section->level->name }}</td>
                        <td>{{ $businessOption->section->name }}</td>
                        <td>{{ ViewHelper::generateList($businessOption->businessCategories) }}</td>
                        <td>
                            <div class="">
                                <a href="{{ route('admin.business-option.edit', $businessOption->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                <form class="form-inline" method="POST" action="{{ route('admin.business-option.destroy', $businessOption->id) }}">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button onclick="javascript: return confirm('Are you sure?');" type="submit" class="btn btn-sm btn-danger">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @if(!empty($businessOption->children))
                        <!-- Business Options -->
                        @foreach($businessOption->children as $BO)
                            <tr>
                                <td style="padding-left: 100px;">{{ $BO->name }}</td>
                                <td>{{ $BO->section->level->name }}</td>
                                <td>{{ $BO->section->name }}</td>
                                <td>{{ ViewHelper::generateList($BO->businessCategories) }}</td>
                                <td>
                                    <div class="">
                                        <a href="{{ route('admin.business-option.edit', $BO->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                        <form class="form-inline" method="POST" action="{{ route('admin.business-option.destroy', $BO->id) }}">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <button onclick="javascript: return confirm('Are you sure?');" type="submit" class="btn btn-sm btn-danger">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @if(!empty($BO->children))
                                <!-- Child Business Options -->
                                @foreach($BO->children as $childBO)
                                    <tr>
                                        <td style="padding-left: 150px;">{{ $childBO->name }}</td>
                                        <td>{{ $childBO->section->level->name }}</td>
                                        <td>{{ $childBO->section->name }}</td>
                                        <td>{{ ViewHelper::generateList($childBO->businessCategories) }}</td>
                                        <td>
                                            <div class="">
                                                <a href="{{ route('admin.business-option.edit', $childBO->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                                <form class="form-inline" method="POST" action="{{ route('admin.business-option.destroy', $childBO->id) }}">
                                                    {{ csrf_field() }}
                                                    {{ method_field('DELETE') }}
                                                    <button onclick="javascript: return confirm('Are you sure?');" type="submit" class="btn btn-sm btn-danger">Delete</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    @if(!empty($childBO->children))
                                        <!-- Grand Child Business Options -->
                                        @foreach($childBO->children as $grandChildBO)
                                            <tr>
                                                <td style="padding-left: 200px;">{{ $grandChildBO->name }}</td>
                                                <td>{{ $grandChildBO->section->level->name }}</td>
                                                <td>{{ $grandChildBO->section->name }}</td>
                                                <td>{{ ViewHelper::generateList($grandChildBO->businessCategories) }}</td>
                                                <td>
                                                    <div class="">
                                                        <a href="{{ route('admin.business-option.edit', $grandChildBO->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                                        <form class="form-inline" method="POST" action="{{ route('admin.business-option.destroy', $grandChildBO->id) }}">
                                                            {{ csrf_field() }}
                                                            {{ method_field('DELETE') }}
                                                            <button onclick="javascript: return confirm('Are you sure?');" type="submit" class="btn btn-sm btn-danger">Delete</button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                @endforeach
                            @endif
                        @endforeach
                    @endif
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