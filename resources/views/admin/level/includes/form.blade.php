{{--Name--}}
<div class="form-group">
    <label>Name:</label>
    {{ Form::text('name', null, ['class' => 'form-control']) }}
    @if($errors->has('name'))
        <span class="text-danger">{{ $errors->first('name') }}</span>
    @endif
</div>

{{--Parent Level--}}
<div class="form-group">
    <label  class="display-block text-semibold">Parent Level:</label>
    {{ Form::select('parent_id', $data['levels'], null, ['placeholder' => '-- Choose Parent Level --', 'class' => 'form-control']) }}
    @if($errors->has('parent_id'))
        <span class="text-danger">{{ $errors->first('parent_id') }}</span>
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

{{--Content--}}
<div class="form-group">
    <label>Content:</label>
    {{ Form::textarea('content', null, ['class' => 'form-control']) }}
    @if($errors->has('content'))
        <span class="text-danger">{{ $errors->first('content') }}</span>
    @endif
</div>