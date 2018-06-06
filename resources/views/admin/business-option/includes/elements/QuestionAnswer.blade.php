<div class="col-md-10">
    <div class="form-group">
        <label  class="display-block text-semibold">Meta Key:</label>
        {{ Form::text('element_data[meta_key]', isset($data['selectedElementData']['meta_key']) ? $data['selectedElementData']['meta_key'] : '', ['class' => 'form-control']) }}
    </div>
    <div class="form-group">
        <label  class="display-block text-semibold">Type:</label>
        {{ Form::select('element_data[type]', ['yes_and_link' => 'Yes and Link', 'yes_and_no' => 'Yes and No', 'yes_and_cancel' => 'Yes and Cancel'], isset($data['selectedElementData']['type']) ? $data['selectedElementData']['type'] : 'yes_and_link', ['class' => 'form-control']) }}
    </div>
</div>