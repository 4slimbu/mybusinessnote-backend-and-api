{{--Name--}}
<div class="form-group">
    <label>Name:</label>
    {{ Form::text('name', null, ['class' => 'form-control']) }}
    @if($errors->has('name'))
        <span class="text-danger">{{ $errors->first('name') }}</span>
    @endif
</div>

{{--Short Name--}}
<div class="form-group">
    <label>Short Name:</label>
    <div><small>This name will be used on modal box layout where there is less space</small></div>
    {{ Form::text('short_name', null, ['class' => 'form-control']) }}
    @if($errors->has('short_name'))
        <span class="text-danger">{{ $errors->first('short_name') }}</span>
    @endif
</div>


{{--Section--}}
<div class="form-group">
    <label class="display-block text-semibold">Section:</label>
    {{ Form::select('section_id', $data['sections'], null, ['class' => 'form-control', 'placeholder' => '-- Select Section --']) }}
    @if($errors->has('section_id'))
        <span class="text-danger">{{ $errors->first('section_id') }}</span>
    @endif
</div>

{{--Business Category--}}
<div id="business_categories" class="form-group more-inputs">
    <label  class="display-block text-semibold">Select categories where this option should be visible:</label>
    @if($data['businessCategories'])
        @foreach($data['businessCategories'] as $key => $item)
            <div class="row">
                <div class="col-md-12">
                    {{ Form::checkbox('business_category_id[]', $key, isset($data['selectedBusinessCategories']) && in_array($key, $data['selectedBusinessCategories'])) }}
                    {{ $item }}
                </div>
            </div>
        @endforeach
    @endif
    @if($errors->has('business_category_id'))
        <span class="text-danger">{{ $errors->first('business_category_id') }}</span>
    @endif
</div>

{{--Parent Business Option--}}
<div class="form-group">
    <label class="display-block text-semibold">Parent Business Option:</label>
    {{ Form::select('parent_id', $data['businessOptions'], null, ['placeholder' => '-- Choose Parent Busines Option --', 'class' => 'form-control']) }}
    @if($errors->has('parent_id'))
        <span class="text-danger">{{ $errors->first('parent_id') }}</span>
    @endif
</div>

{{--Icon--}}
<div class="form-group">
    <label class="display-block text-semibold">Icon:</label>
    {{ Form::file('icon', null, ['class' => 'form-control']) }}
    @if(isset($data['row']) && $data['row']->icon)
        <img width="50" src="{{ asset($upload_directory . $data['row']->icon) }}" alt="">
    @endif
    @if($errors->has('icon'))
        <span class="text-danger">{{ $errors->first('icon') }}</span>
    @endif
</div>

{{--Hover Icon--}}
<div class="form-group">
    <label class="display-block text-semibold">Hover Icon:</label>
    {{ Form::file('hover_icon', null, ['class' => 'form-control']) }}
    @if(isset($data['row']) && $data['row']->hover_icon)
        <img width="50" src="{{ asset($upload_directory . $data['row']->hover_icon) }}" alt="">
    @endif
    @if($errors->has('hover_icon'))
        <span class="text-danger">{{ $errors->first('hover_icon') }}</span>
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

{{--Elements--}}
{{--<div class="form-group">--}}
    {{--<label  class="display-block text-semibold">Element:</label>--}}
    {{--{{ Form::select('element', $data['elements'], $data['selectedElement'], ['placeholder' => '-- Choose Element --', 'class' => 'form-control element-data-trigger', 'data-bo-id' => isset($data['row']) ? $data['row']->id : '']) }}--}}
    {{--@if($errors->has('element'))--}}
        {{--<span class="text-danger">{{ $errors->first('element') }}</span>--}}
    {{--@endif--}}
{{--</div>--}}

{{--Elements Data--}}
{{--<div class="element-data sub-field-group">--}}
    {{--@if($data['selectedElement'] && view()->exists('admin.business-option.includes.elements.' . $data['selectedElement']))--}}
        {{--<div class="form-group">--}}
            {{--<label  class="display-block text-semibold">Element Settings:</label>--}}
            {{--@include('admin.business-option.includes.elements.' . $data['selectedElement'])--}}
        {{--</div>--}}
    {{--@endif--}}
{{--</div>--}}

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

{{--Affiliate Link Label--}}
<div class="form-group">
    <label>Affiliate Link Label:</label>
    {{ Form::text('affiliate_link_label', $data['selectedAffiliateLinkLabel'], ['class' => 'form-control']) }}
    @if($errors->has('affiliate_link_label'))
        <span class="text-danger">{{ $errors->first('affiliate_link_label') }}</span>
    @endif
</div>

{{--Partner Affiliate Links--}}
<div class="form-group">
    <label class="display-block text-semibold">Affiliate Links:</label>
    {{ Form::select('affiliate_link_id[]', $data['affiliateLinks'], $data['selectedAffiliateLinks'], ['placeholder' => '-- Choose Affiliate Links --', 'class' => 'form-control']) }}
    @if($errors->has('affiliate_link_id'))
        <span class="text-danger">{{ $errors->first('affiliate_link_id') }}</span>
    @endif
</div>


{{--Weight--}}
<div class="form-group">
    <label>Weight:</label>
    {{ Form::text('weight', null, ['class' => 'form-control']) }}
    @if($errors->has('weight'))
        <span class="text-danger">{{ $errors->first('weight') }}</span>
    @endif
</div>

{{--Template--}}
<div class="form-group">
    <label class="display-block text-semibold">Template:</label>
    {{ Form::select('template', ['default' => 'Default', 'modal_box' => 'Modal Box'], null, ['class' => 'form-control']) }}
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