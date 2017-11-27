@extends('admin.layouts.default')

@section('content')
    <div class="content-wrapper">
        <h2>
            Manage {{ $panel_name }} List
        </h2>
        <p>Note: Supported nesting depth: 5 <br />
            Eg: Level->Sub Level->Business Option->Child Business Option->Grand Child Business Option
        </p>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Level/SubLevel/BusinesOption</th>
                    <th>SubLevel/BusinessOption</th>
                    <th>Show On</th>
                    <th>Actions</th>

                </tr>
                </thead>
                <tbody>
                @if(isset($data['rows']) && $data['rows']->count() > 0)
                <!-- Levels -->
                @foreach ($data['rows'] as $level)
                    <tr>
                        <td>L: {{ $level->level->name or 'No Level' }}</td>
                        <td>BO: {{ $level->name }}</td>
                        <td>{{ ViewHelper::generateList($level->businessCategories) }}</td>
                        <td>
                            <div class="">
                                <a href="{{ route('admin.business-option.edit', $level->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                <form class="form-inline" method="POST" action="{{ route('admin.business-option.destroy', $level->id) }}">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button onclick="javascript: return confirm('Are you sure?');" type="submit" class="btn btn-sm btn-danger">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @if(isset($data['sub-rows']) && $data['sub-rows']->count() > 0)
                        <!-- Sub Levels -->
                        @foreach ($data['sub-rows'] as $subLevel)
                            <tr>
                                <td style="padding-left: 50px;">SL: {{ $subLevel->level->name or 'No Level' }}</td>
                                <td>BO: {{ $subLevel->name }}</td>
                                <td>{{ ViewHelper::generateList($subLevel->businessCategories) }}</td>
                                <td>
                                    <div class="">
                                        <a href="{{ route('admin.business-option.edit', $subLevel->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                        <form class="form-inline" method="POST" action="{{ route('admin.business-option.destroy', $subLevel->id) }}">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <button onclick="javascript: return confirm('Are you sure?');" type="submit" class="btn btn-sm btn-danger">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @if(!empty($subLevel->children))
                                <!-- Business Options -->
                                @foreach($subLevel->children as $BO)
                                    <tr>
                                        <td style="padding-left: 100px;">BO: {{ $BO->name }}</td>
                                        <td>SL: {{ $BO->level->name or 'No Parent' }}</td>
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
                                                <td style="padding-left: 150px;">BO: {{ $childBO->name }}</td>
                                                <td>SL: {{ $childBO->level->name or 'No Parent' }}</td>
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
                                                        <td style="padding-left: 200px;">BO: {{ $grandChildBO->name }}</td>
                                                        <td>SL: {{ $grandChildBO->level->name or 'No Parent' }}</td>
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