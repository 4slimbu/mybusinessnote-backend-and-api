{{--Name--}}
<div class="form-group">
    <label>Name:</label>
    {{ Form::text('name', null, ['class' => 'form-control']) }}
    @if($errors->has('name'))
        <span class="text-danger">{{ $errors->first('name') }}</span>
    @endif
</div>

{{--Key--}}
<div class="form-group">
    <label>Key:</label>
    {{ Form::text('key', null, ['class' => 'form-control']) }}
    @if($errors->has('key'))
        <span class="text-danger">{{ $errors->first('key') }}</span>
    @endif
</div>

{{--Template--}}
<div class="form-group">
    <label  class="display-block text-semibold">Template:</label>
    {{ Form::select('edit_template', $data['edit_templates'], null, ['class' => 'form-control']) }}
    @if($errors->has('edit_template'))
        <span class="text-danger">{{ $errors->first('edit_template') }}</span>
    @endif
</div>

{{--Edit Template--}}
<div class="sub-field-group">
@if(isset($data['edit_template']) && view()->exists('admin.setting.includes.form-partials.' . $data['edit_template']))
        <div class="form-group">
            @include('admin.setting.includes.form-partials.' . $data['edit_template'])
        </div>
    @endif
</div>

{{--Status--}}
<div class="form-group">
    <label class="display-block text-semibold">Status:</label>
    <label class="radio-inline">
        {{ Form::radio('status', '1', true,  ['class' => 'styled']) }} Enable
    </label>
    <label class="radio-inline">
        {{ Form::radio('status', '0', false, ['class' => 'styled']) }} Disable
    </label>
    @if($errors->has('status'))

        <span class="text-danger-800">{{ $errors->first('status') }}</span>
    @endif
</div>