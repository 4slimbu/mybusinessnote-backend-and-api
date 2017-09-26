@extends('admin/layouts/master')

@section('content')
    <div class="row">

        @include('admin.layouts.sidemenu')

        <main class="col-sm-9 ml-sm-auto col-md-10 pt-3" role="main">
            <h1>Admin Dashboard</h1>

            <h2>Add New Third Party Integration</h2>

            <form class="col-sm-6" method="POST" action="{{url('/admin/third-party-integration')}}">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="title">Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter Third Party name">
                </div>

                <div class="form-group">
                    <label for="title">Parent</label>
                    <select name="third_party_integration_id" class="form-control"> 
                        <option value="0">Choose a Parent</option>
                           @foreach($parent as $par)
                           <option value="{{$par->id}}">{{$par->name}}</option>
                           @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="title" >Partner</label><br>  
                    @foreach($partner as $ptr)
                        <input type="checkbox" name="user_id[]" value="{{$ptr->id}}" > {{$ptr->first_name}} {{$ptr->last_name}} <br>  
                    @endforeach
                </div>

                <div class="form-group">
                    <label for="title">Business Category</label><br>   
                    @foreach($category as $cat)
                        <input type="checkbox" name="business_category_id[]"  value="{{$cat->id}}" > {{$cat->title}}
                        <br> 
                    @endforeach
                </div>

                <div class="form-group">
                    <label for="tooltip">Tooltip</label>
                    <textarea class="form-control" id="tooltip" name="tooltip" rows="3" placeholder="Enter category tooltip"></textarea>
                    <small id="toolTipHelp" class="form-text text-muted">Tooltip to display on the front-end for users</small>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>

        </main>
    </div>



@endsection