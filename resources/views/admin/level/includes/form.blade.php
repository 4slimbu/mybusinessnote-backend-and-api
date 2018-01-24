{{--Name--}}
<div class="form-group">
    <label>Name:</label>
    {{ Form::text('name', null, ['class' => 'form-control']) }}
    @if($errors->has('name'))
        <span class="text-danger">{{ $errors->first('name') }}</span>
    @endif
</div>

{{--Content--}}
<div class="form-group">
    <label>Content:</label>
    {{ Form::textarea('content', null, ['class' => 'form-control myeditablediv']) }}
    @if($errors->has('content'))
        <span class="text-danger">{{ $errors->first('content') }}</span>
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