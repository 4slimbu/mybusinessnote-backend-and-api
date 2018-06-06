<div class="col-md-10">
    <div class="form-group">
        <label  class="display-block text-semibold">Meta Key:</label>
        {{ Form::text('element_data[meta_key]', isset($data['selectedElementData']['meta_key']) ? $data['selectedElementData']['meta_key'] : '', ['class' => 'form-control']) }}
    </div>
    <div class="form-group">
        <label  class="display-block text-semibold">Select Categories:</label>
        @if($data['businessCategories'])
            @foreach($data['businessCategories'] as $key => $item)
                <div class="row">
                    <div class="col-md-12">
                        {{ Form::checkbox('element_data[categories][]', $key, isset($data['selectedElementData']['categories']) && in_array($key, $data['selectedElementData']['categories'])) }}
                        {{ $item }}
                    </div>
                </div>

            @endforeach
        @endif
    </div>
</div>