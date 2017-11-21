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
    {{ Form::select('level_id', $data['levels'], null, ['class' => 'form-control', 'placeholder' => '-- Select Level --']) }}
    @if($errors->has('level_id'))
        <span class="text-danger">{{ $errors->first('level_id') }}</span>
    @endif
</div>

{{--Parent Business Option--}}
<div class="form-group">
    <label  class="display-block text-semibold">Parent Business Option:</label>
    {{ Form::select('parent_id', $data['businessOptions'], null, ['placeholder' => '-- Choose Parent Busines Option --', 'class' => 'form-control']) }}
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

{{--Tool Tip--}}
<div class="form-group">
    <label>Tool Tip:</label>
    {{ Form::textarea('tooltip', null, ['class' => 'form-control']) }}
    @if($errors->has('tooltip'))
        <span class="text-danger">{{ $errors->first('tooltip') }}</span>
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