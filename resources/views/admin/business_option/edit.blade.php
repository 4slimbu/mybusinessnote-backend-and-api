@extends('admin/layouts/master')

@section('content')
    <div class="row">

        @include('admin.layouts.sidemenu')

        <main class="col-sm-9 ml-sm-auto col-md-10 pt-3" role="main">
            <h1>Admin Dashboard</h1>

            <h2>Update Business Option</h2>

            <form class="col-sm-6" method="POST" action="{{url('/admin/businessoption/update')}}/{{$businessOption->id}}">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="title">Business Option Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{$businessOption->name}}">
                </div>

                <div class="form-group">
                    <label for="title">Parent Business Option (Leave blank for the top level)</label>
                    <select name="parent_id" class="form-control">
                        <option value="0">Choose a Parent</option>
                           @foreach($businessOptions as $bo)
                           <option value="{{$bo->id}}"@if($businessOption->parent_id == $bo->id) selected='selected' @endif>{{$bo->name}}</option>
                           @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="title">Business Category(Choose which business type/categories this option belongs to)</label><br>
                     @foreach($businessOption->categories as $businessCategory)
                      @php $selectedCategory[]=$businessCategory->id; @endphp
                      @endforeach
                    @foreach($businessCategories as $bc)

                        <input type="checkbox" name="business_category_id[]"  value="{{$bc->id}}" @if(in_array($bc->id,$selectedCategory)) checked='checked' @endif  > {{$bc->title}}
                        <br> 
                       
                    
                    @endforeach
                </div>

                <div class="form-group" id="partners-app">
                    <label for="title">Choose Partner</label><br>
                    <autoedit partner='{{$businessOption->partners[0]}}' ></autoedit>
                </div>
                <div class="form-group">
                    <label for="tooltip">Tooltip</label>
                    <textarea class="form-control" id="tooltip" name="tooltip" rows="3" placeholder=""> {{$businessOption->tooltip}} </textarea>
                    <small id="toolTipHelp" class="form-text text-muted">Tooltip to display on the front-end for users</small>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>

        </main>
    </div>
@endsection