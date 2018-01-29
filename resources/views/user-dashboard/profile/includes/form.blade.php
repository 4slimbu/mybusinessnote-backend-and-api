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

{{--Email--}}
<div class="form-group">
    <label>Email:</label>
    {{ Form::text('email', null, ['class' => 'form-control']) }}
    @if($errors->has('email'))
        <span class="text-danger">{{ $errors->first('email') }}</span>
    @endif
</div>

{{--Status--}}
<div class="form-group">
    <label class="display-block text-semibold">Status:</label>
    <label class="radio-inline">
        {{ Form::radio('verified', '1', true,  ['class' => 'styled']) }} Verified
    </label>
    <label class="radio-inline">
        {{ Form::radio('verified', '0', false, ['class' => 'styled']) }} Un-verified
    </label>
    @if($errors->has('verified'))

        <span class="text-danger-800">{{ $errors->first('verified') }}</span>
    @endif
</div>