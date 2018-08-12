{{--Name--}}
<div class="form-group">
    <label>Name:</label>
    {{ Form::text('name', null, ['class' => 'form-control']) }}
    @if($errors->has('name'))
        <span class="text-danger">{{ $errors->first('name') }}</span>
    @endif
</div>

{{--Meta Title--}}
<div class="form-group">
    <label>Meta Title:</label>
    {{ Form::text('meta_title', null, ['class' => 'form-control']) }}
    @if($errors->has('meta_title'))
        <span class="text-danger">{{ $errors->first('meta_title') }}</span>
    @endif
</div>

{{--Meta Description--}}
<div class="form-group">
    <label>Meta Description:</label>
    {{ Form::textarea('meta_description', null, ['class' => 'form-control', 'rows' => 3]) }}
    @if($errors->has('meta_description'))
        <span class="text-danger">{{ $errors->first('meta_description') }}</span>
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

{{--Badge Icon--}}
<div class="form-group">
    <label class="display-block text-semibold">Badge Icon:</label>
    {{ Form::file('badge_icon', null, ['class' => 'form-control']) }}
    @if(isset($data['row']) && $data['row']->badge_icon)
        <img width="150" src="{{ asset($upload_directory . $data['row']->badge_icon) }}" alt="">
    @endif
    @if($errors->has('badge_icon'))
        <span class="text-danger">{{ $errors->first('badge_icon') }}</span>
    @endif
</div>

{{--Badge Message--}}
<div class="form-group">
    <label>Badge Message:</label>
    {{ Form::textarea('badge_message', null, ['class' => 'form-control myeditablediv']) }}
    @if($errors->has('badge_message'))
        <span class="text-danger">{{ $errors->first('badge_message') }}</span>
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

{{--Template--}}
<div class="form-group">
    <label class="display-block text-semibold">Template:</label>
    {{ Form::select('template', ['default' => 'Default'], null, ['class' => 'form-control']) }}
    @if($errors->has('template'))
        <span class="text-danger">{{ $errors->first('template') }}</span>
    @endif
</div>

{{--Is Active--}}
<div class="form-group">
    <label class="display-block text-semibold">Is Active:</label>
    <label class="radio-inline">
        {{ Form::radio('is_active', '1', true,  ['class' => 'styled']) }} Active
    </label>
    <label class="radio-inline">
        {{ Form::radio('is_active', '0', false, ['class' => 'styled']) }} In-Active
    </label>
    @if($errors->has('is_active'))

        <span class="text-danger-800">{{ $errors->first('is_active') }}</span>
    @endif
</div>

{{--Is Down--}}
<div class="form-group">
    <label class="display-block text-semibold">Is Down:</label>
    <label class="radio-inline">
        {{ Form::radio('is_down', '1', true,  ['class' => 'styled']) }} Yes
    </label>
    <label class="radio-inline">
        {{ Form::radio('is_down', '0', false, ['class' => 'styled']) }} No
    </label>
    @if($errors->has('is_down'))

        <span class="text-danger-800">{{ $errors->first('is_down') }}</span>
    @endif
</div>

{{--Down Message--}}
<div class="form-group">
    <label>Down Message:</label>
    {{ Form::textarea('down_message', null, ['class' => 'form-control myeditablediv']) }}
    @if($errors->has('down_message'))
        <span class="text-danger">{{ $errors->first('down_message') }}</span>
    @endif
</div>