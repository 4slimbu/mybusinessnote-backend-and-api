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
    <label  class="display-block text-semibold">Icon:</label>
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
    <label  class="display-block text-semibold">Badge Icon:</label>
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

{{--Tool Tip--}}
<div class="form-group">
    <label>Tool Tip:</label>
    {{ Form::textarea('tooltip', null, ['class' => 'form-control myeditablediv']) }}
    @if($errors->has('tooltip'))
        <span class="text-danger">{{ $errors->first('tooltip') }}</span>
    @endif
</div>