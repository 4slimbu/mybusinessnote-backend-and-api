<div class="col-md-10">
    <div class="form-group">
        <label  class="display-block text-semibold">Meta Key:</label>
        {{ Form::text('element_data[meta_key]', isset($data['selectedElementData']['meta_key']) ? $data['selectedElementData']['meta_key'] : '', ['class' => 'form-control']) }}
    </div>
    <div class="form-group">
        <label  class="display-block text-semibold">Select Fields:</label>
                <div class="row">
                    <div class="col-md-12">
                        {{ Form::checkbox('element_data[fields][]', 'first_name', isset($data['selectedElementData']['fields']) && in_array('first_name', $data['selectedElementData']['fields'])) }}
                        First Name
                    </div>
                    <div class="col-md-12">
                        {{ Form::checkbox('element_data[fields][]', 'last_name', isset($data['selectedElementData']['fields']) && in_array('last_name', $data['selectedElementData']['fields'])) }}
                        Last Name
                    </div>
                    <div class="col-md-12">
                        {{ Form::checkbox('element_data[fields][]', 'email', isset($data['selectedElementData']['fields']) && in_array('email', $data['selectedElementData']['fields'])) }}
                        Email
                    </div>
                    <div class="col-md-12">
                        {{ Form::checkbox('element_data[fields][]', 'phone_number', isset($data['selectedElementData']['fields']) && in_array('phone_number', $data['selectedElementData']['fields'])) }}
                        Phone Number
                    </div>
                    <div class="col-md-12">
                        {{ Form::checkbox('element_data[fields][]', 'password', isset($data['selectedElementData']['fields']) && in_array('password', $data['selectedElementData']['fields'])) }}
                        Password
                    </div>
                </div>

    </div>
</div>