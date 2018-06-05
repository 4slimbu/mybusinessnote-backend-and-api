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
    <label class="display-block text-semibold">Level:</label>
    {{ Form::select('level_id', $data['levels'], null, ['class' => 'form-control']) }}
    @if($errors->has('level_id'))
        <span class="text-danger">{{ $errors->first('level_id') }}</span>
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

{{--Tool Tip Title--}}
<div class="form-group">
    <label>Tool Tip Title:</label>
    {{ Form::text('tooltip_title', null, ['class' => 'form-control']) }}
    @if($errors->has('tooltip_title'))
        <span class="text-danger">{{ $errors->first('tooltip_title') }}</span>
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