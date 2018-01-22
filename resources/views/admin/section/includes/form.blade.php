{{--Name--}}
<div class="form-group">
    <label>Name:</label>
    {{ Form::text('name', null, ['class' => 'form-control']) }}
    @if($errors->has('name'))
        <span class="text-danger">{{ $errors->first('name') }}</span>
    @endif
</div>

{{--Level--}}
<div class="form-group">
    <label  class="display-block text-semibold">Level:</label>
    {{ Form::select('level_id', $data['levels'], null, ['class' => 'form-control']) }}
    @if($errors->has('level_id'))
        <span class="text-danger">{{ $errors->first('level_id') }}</span>
    @endif
</div>

{{--Tool Tip--}}
<div class="form-group">
    <label>Tool Tip:</label>
    {{ Form::textarea('tooltip', null, ['class' => 'form-control myeditablediv']) }}
    @if($errors->has('tooltip'))
        <span class="text-danger">{{ $errors->first('tooltip') }}</span>
    @endif
</div>