{{--Name--}}
<div class="form-group">
    <label>Name:</label>
    {{ Form::text('name', null, ['placeholder' => 'Enter Name', 'class' => 'form-control']) }}
    @if($errors->has('name'))
        <span class="text-danger">{{ $errors->first('name') }}</span>
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