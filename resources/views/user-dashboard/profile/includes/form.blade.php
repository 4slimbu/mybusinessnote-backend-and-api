{{--First Name--}}
<div class="form-group">
    <label>First Name:</label>
    {{ Form::text('first_name', null, ['class' => 'form-control']) }}
    @if($errors->has('first_name'))
        <span class="text-danger">{{ $errors->first('first_name') }}</span>
    @endif
</div>

{{--Last Name--}}
<div class="form-group">
    <label>Last Name:</label>
    {{ Form::text('last_name', null, ['class' => 'form-control']) }}
    @if($errors->has('last_name'))
        <span class="text-danger">{{ $errors->first('last_name') }}</span>
    @endif
</div>

{{--Phone No--}}
<div class="form-group">
    <label>Phone No:</label>
    {{ Form::text('phone_number', null, ['class' => 'form-control']) }}
    @if($errors->has('phone_number'))
        <span class="text-danger">{{ $errors->first('phone_number') }}</span>
    @endif
</div>