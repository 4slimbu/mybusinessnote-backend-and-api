{{--Title--}}
<div class="form-group">
    <label>Title:</label>
    {{ Form::text('title', null, ['placeholder' => 'Enter Title', 'class' => 'form-control']) }}
    @if($errors->has('title'))
        <span class="text-danger">{{ $errors->first('title') }}</span>
    @endif
</div>

{{--Tool Tip--}}
<div class="form-group">
    <label>Tool Tip:</label>
    {{ Form::textarea('tooltip', null, ['placeholder' => 'Enter Tool Tip', 'class' => 'form-control', 'rows' => 5]) }}
    <small id="toolTipHelp" class="form-text text-muted">Tooltip to display on the front-end for users</small>
    @if($errors->has('tooltip'))
        <span class="text-danger">{{ $errors->first('tooltip') }}</span>
    @endif
</div>