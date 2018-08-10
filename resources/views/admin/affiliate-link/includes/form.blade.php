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
    {{ Form::text('description', null, ['class' => 'form-control']) }}
    @if($errors->has('description'))
        <span class="text-danger">{{ $errors->first('description') }}</span>
    @endif
</div>

{{--Link--}}
<div class="form-group">
    <label>Link:</label>
    {{ Form::text('link', null, ['class' => 'form-control']) }}
    @if($errors->has('link'))
        <span class="text-danger">{{ $errors->first('link') }}</span>
    @endif
</div>

{{--Partner--}}
<div class="form-group">
    <label class="display-block text-semibold">Partner:</label>
    {{ Form::select('user_id', $data['partners'], null, ['class' => 'form-control', 'placeholder' => '-- Select Partner --']) }}
    @if($errors->has('user_id'))
        <span class="text-danger">{{ $errors->first('user_id') }}</span>
    @endif
</div>