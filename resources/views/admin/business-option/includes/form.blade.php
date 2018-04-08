{{--Name--}}
<div class="form-group">
    <label>Name:</label>
    {{ Form::text('name', null, ['class' => 'form-control']) }}
    @if($errors->has('name'))
        <span class="text-danger">{{ $errors->first('name') }}</span>
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

{{--Show Everywhere--}}
<div class="form-group">
    {{ Form::checkbox('show_everywhere', $data['showEveryWhere'], $data['showEveryWhere'], ['id' => 'show_everywhere']) }}
    <label class="display-block text-semibold">Show Everywhere</label>
    <p>If ticked, this will show this business option on each and every business category.</p>
</div>

{{--Business Category--}}
<div id="business_categories" class="form-group more-inputs">
    <label class="display-block text-semibold">Business Category:</label>
    {{ Form::select('business_category_id[]', $data['businessCategories'], $data['selectedBusinessCategories'], ['placeholder' => '-- Choose Business Category --', 'class' => 'form-control', 'multiple' => 'multiple', 'height' => 200]) }}
    @if($errors->has('business_category_id'))
        <span class="text-danger">{{ $errors->first('business_category_id') }}</span>
    @endif
</div>

{{--Parent Business Option--}}
{{--<div class="form-group">--}}
{{--<label  class="display-block text-semibold">Parent Business Option:</label>--}}
{{--{{ Form::select('parent_id', $data['businessOptions'], null, ['placeholder' => '-- Choose Parent Busines Option --', 'class' => 'form-control']) }}--}}
{{--@if($errors->has('parent_id'))--}}
{{--<span class="text-danger">{{ $errors->first('parent_id') }}</span>--}}
{{--@endif--}}
{{--</div>--}}

{{--Content--}}
<div class="form-group">
    <label>Content:</label>
    {{ Form::textarea('content', null, ['class' => 'form-control myeditablediv']) }}
    @if($errors->has('content'))
        <span class="text-danger">{{ $errors->first('content') }}</span>
    @endif
</div>

{{--Elements--}}
<div class="form-group">
    <label class="display-block text-semibold">Element:</label>
    {{ Form::select('element', $data['elements'], $data['selectedElement'], ['placeholder' => '-- Choose Element --', 'class' => 'form-control']) }}
    @if($errors->has('element'))
        <span class="text-danger">{{ $errors->first('element') }}</span>
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