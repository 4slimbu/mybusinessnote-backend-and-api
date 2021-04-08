{{--Password--}}
<div class="form-group">
    <label>Password:</label>
    {{ Form::password('password', ['class' => 'form-control']) }}
    @if($errors->has('password'))
        <span class="text-danger">{{ $errors->first('password') }}</span>
    @endif
</div>

{{--Confirm Password--}}
<div class="form-group">
    <label>Confirm Password:</label>
    {{ Form::password('password_confirmation', ['class' => 'form-control']) }}
    @if($errors->has('password_confirmation'))
        <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
    @endif
</div>