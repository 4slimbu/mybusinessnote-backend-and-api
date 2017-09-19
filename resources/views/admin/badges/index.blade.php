@extends('admin/layouts/master')

@section('content')
    <div class="row">

        @include('admin.layouts.sidemenu')

        <main class="col-sm-9 ml-sm-auto col-md-10 pt-3" role="main">
            <h1>Admin Dashboard</h1>

            <h2>Manage Business Badges</h2>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Badge Name</th>
                        <th>Congratulation Message</th>
                        <th>Icon</th>
                        <th>Actions</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($badges as $badge)
                        <tr>
                            <td>{{ $badge->id }}</td>
                            <td>{{ $badge->name }}</td>
                            <td>{{ $badge->message }}</td>
                            <td>{{ $badge->icon }}</td>
                            <td>

                                <div class="">
                                    <a href="{{url('admin/badge/edit')}}/{{$badge->id}}" class="btn btn-primary">Edit</a>
                                     <a href="" data-toggle="modal" data-target="#modal-default{{$badge->id}}" class="btn btn-danger fa fa-trash-o"> Delete</a>
                        <div class="modal fade" id="modal-default{{$badge->id}}">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                
                  
                <h4 class="modal-title"><strong>Warning !</strong></h4>
              </div>
              <div class="modal-body">
                <p>Are You sure you want to delete level: <b>{{$badge->name}}</b> </p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <a href="{{url('admin/badge/delete')}}/{{$badge->id}}"><button type="button" class="btn btn-danger">Delete</button></a>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
                                </div>

                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </main>
    </div>



@endsection