<div class="col-md-10">
    <div class="form-group">
        <label  class="display-block text-semibold">Meta Key:</label>
        {{ Form::text('element_data[meta_key]', isset($data['selectedElementData']['meta_key']) ? $data['selectedElementData']['meta_key'] : '', ['class' => 'form-control']) }}
    </div>
    <div class="form-group">
        <label  class="display-block text-semibold">Select Fields:</label>
                <div class="row">
                    <div class="col-md-12">
                        {{ Form::checkbox('element_data[fields][]', 'business_name', isset($data['selectedElementData']['fields']) && in_array('business_name', $data['selectedElementData']['fields'])) }}
                        Business Name
                    </div>
                    <div class="col-md-12">
                        {{ Form::checkbox('element_data[fields][]', 'website', isset($data['selectedElementData']['fields']) && in_array('website', $data['selectedElementData']['fields'])) }}
                        Website
                    </div>
                    <div class="col-md-12">
                        {{ Form::checkbox('element_data[fields][]', 'abn', isset($data['selectedElementData']['fields']) && in_array('abn', $data['selectedElementData']['fields'])) }}
                        ABN
                    </div>
                </div>

    </div>
</div>