<div class="col-md-10">
    <div class="form-group">
        <label class="display-block text-semibold">Meta Key:</label>
        {{ Form::text('element_data[meta_key]', isset($data['selectedElementData']['meta_key']) ? $data['selectedElementData']['meta_key'] : '', ['class' => 'form-control']) }}
    </div>
    <div class="form-group">
        <label class="display-block text-semibold">Select Field:</label>
        <div class="row">
            <div class="col-md-12">
                {{ Form::radio('element_data[single_field]', 'image', $data['selectedElementData']['single_field'] === 'image') }}
                Image
            </div>
            <div class="col-md-12">
                {{ Form::radio('element_data[single_field]', 'text', $data['selectedElementData']['single_field'] === 'text') }}
                Text
            </div>
            <div class="col-md-12">
                {{ Form::radio('element_data[single_field]', 'color_picker', $data['selectedElementData']['single_field'] === 'color_picker') }}
                Color Picker
            </div>
        </div>
    </div>
</div>