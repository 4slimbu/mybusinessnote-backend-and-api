{{--Name--}}
<div class="form-group">
    <label>Name:</label>
    {{ Form::text('name', null, ['placeholder' => 'Enter Name', 'class' => 'form-control']) }}
    @if($errors->has('name'))
        <span class="text-danger">{{ $errors->first('name') }}</span>
    @endif
</div>

{{--Icon--}}
<div class="form-group">
    <label class="display-block text-semibold">Icon:</label>
    {{ Form::file('icon', null, ['class' => 'form-control']) }}
    @if(isset($data['row']) && $data['row']->icon)
        <img width="150" src="{{ asset($upload_directory . $data['row']->icon) }}" alt="">
    @endif
    @if($errors->has('icon'))
        <span class="text-danger">{{ $errors->first('icon') }}</span>
    @endif
</div>

{{--Hover Icon--}}
<div class="form-group">
    <label class="display-block text-semibold">Hover Icon:</label>
    {{ Form::file('hover_icon', null, ['class' => 'form-control']) }}
    @if(isset($data['row']) && $data['row']->hover_icon)
        <img width="150" src="{{ asset($upload_directory . $data['row']->hover_icon) }}" alt="">
    @endif
    @if($errors->has('hover_icon'))
        <span class="text-danger">{{ $errors->first('hover_icon') }}</span>
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