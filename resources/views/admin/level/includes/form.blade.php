{{--Name--}}
<div class="form-group">
    <label>Name:</label>
    {{ Form::text('name', null, ['class' => 'form-control']) }}
    @if($errors->has('name'))
        <span class="text-danger">{{ $errors->first('name') }}</span>
    @endif
</div>

{{--Description--}}
<div class="form-group">
    <label>Description:</label>
    {{ Form::textarea('description', null, ['class' => 'form-control']) }}
    @if($errors->has('description'))
        <span class="text-danger">{{ $errors->first('description') }}</span>
    @endif
</div>