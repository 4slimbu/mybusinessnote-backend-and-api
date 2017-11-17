{{--Name--}}
<div class="form-group">
    <label>Name:</label>
    {{ Form::text('name', null, ['class' => 'form-control']) }}
    @if($errors->has('name'))
        <span class="text-danger">{{ $errors->first('name') }}</span>
    @endif
</div>
{{--Badge--}}
<div class="form-group">
    <label  class="display-block text-semibold">Badge:</label>
    {{ Form::select('badge_id', $data['badges'], null, ['class' => 'form-control']) }}
    @if($errors->has('badge_id'))
        <span class="text-danger">{{ $errors->first('badge_id') }}</span>
    @endif
</div>

{{--Parent Business Option--}}
<div class="form-group">
    <label  class="display-block text-semibold">Parent Business Option:</label>
    {{ Form::select('parent_id', $data['businessOptions'], null, ['placeholder' => 'Choose Parent Busines Option', 'class' => 'form-control']) }}
    @if($errors->has('parent_id'))
        <span class="text-danger">{{ $errors->first('parent_id') }}</span>
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