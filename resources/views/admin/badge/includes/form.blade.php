{{--Name--}}
<div class="form-group">
    <label>Name:</label>
    {{ Form::text('name', null, ['class' => 'form-control']) }}
    @if($errors->has('name'))
        <span class="text-danger">{{ $errors->first('name') }}</span>
    @endif
</div>

{{--Icon--}}
<div class="form-group">
    <label class="display-block text-semibold">Icon:</label>
    {{ Form::file('icon', null, ['class' => 'form-control']) }}
    @if($errors->has('icon'))
        <span class="text-danger">{{ $errors->first('icon') }}</span>
    @endif
</div>

{{--Message--}}
<div class="form-group">
    <label>Message:</label>
    {{ Form::text('message', null, ['class' => 'form-control']) }}
    @if($errors->has('message'))
        <span class="text-danger">{{ $errors->first('message') }}</span>
    @endif
</div>