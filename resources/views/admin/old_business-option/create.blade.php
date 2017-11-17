@extends('admin.layouts.default')

@section('content')
    <div class="row">

        @include('admin.layouts.partials.side-menu')

        <main class="col-sm-9 ml-sm-auto col-md-10 pt-3" role="main">
            <h1>Admin Dashboard</h1>

            <h2>Add New Business Option</h2>

            <form class="col-sm-6" method="POST" action="{{url('/admin/businessoption')}}">
                {{ csrf_field() }}



                <div class="form-group">
                    <label for="title">Business Option Name</label>
                    <input type="text" class="form-control" id="name" name="name">
                </div>

                <div class="form-group">
                    <label for="title">Parent Business Option (Leave blank for the top level)</label>
                    <select name="parent_id" class="form-control">
                        <option value="0">Choose a Parent</option>
                           @foreach($businessOptions as $businessOption)
                           <option value="{{$businessOption->id}}">{{$businessOption->name}}</option>
                           @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="tooltip">Tooltip</label>
                    <textarea class="form-control" id="tooltip" name="tooltip" rows="3" placeholder=""></textarea>
                    <small id="toolTipHelp" class="form-text text-muted">Tooltip to display on the front-end for users</small>
                </div>
                <hr>
                <div class="form-group">
                    <label for="badge_id">Badge</label>
                    <select name="badge_id" class="form-control">
                        <option value="0">Choose a Badge (Business step where this option belongs to)</option>
                        @foreach($badges as $badge)
                            <option value="{{$badge->id}}">{{$badge->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="title">Business Category(Choose which business type/categories this option belongs to)</label><br>
                    @foreach($businessCategories as $businessCategory)
                        <input type="checkbox" name="business_category_id[]"  value="{{$businessCategory->id}}" > {{$businessCategory->title}}
                        <br> 
                    @endforeach
                </div>

                <div class="form-group" id="partners-app">
                    <label for="title">Choose Partner</label><br>
                    <autocomplete></autocomplete>
                </div>




                <button type="submit" class="btn btn-primary">Submit</button>
            </form>

        </main>
    </div>
@endsection