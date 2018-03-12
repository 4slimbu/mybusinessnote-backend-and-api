{{--Business Name--}}
<div class="form-group">
    <label>Business Name:</label>
    {{ Form::text('business_name', null, ['class' => 'form-control']) }}
    @if($errors->has('business_name'))
        <span class="text-danger">{{ $errors->first('business_name') }}</span>
    @endif
</div>

{{--Owner Name--}}
<div class="form-group">
    <label class="display-block text-semibold">Owner:</label>
    {{ Form::select('user_id', $data['users'], null, ['class' => 'form-control']) }}
    @if($errors->has('user_id'))
        <span class="text-danger">{{ $errors->first('user_id') }}</span>
    @endif
</div>

{{--Business Category--}}
<div class="form-group">
    <label class="display-block text-semibold">Business Category:</label>
    {{ Form::select('business_category_id', $data['businessCategories'], null, ['class' => 'form-control']) }}
    @if($errors->has('business_category_id'))
        <span class="text-danger">{{ $errors->first('business_category_id') }}</span>
    @endif
</div>

{{--Website--}}
<div class="form-group">
    <label>Website:</label>
    {{ Form::text('website', null, ['class' => 'form-control']) }}
    @if($errors->has('website'))
        <span class="text-danger">{{ $errors->first('website') }}</span>
    @endif
</div>

{{--ABN--}}
<div class="form-group">
    <label>ABN:</label>
    {{ Form::text('abn', null, ['class' => 'form-control']) }}
    @if($errors->has('abn'))
        <span class="text-danger">{{ $errors->first('abn') }}</span>
    @endif
</div>

{{--ACN--}}
<div class="form-group">
    <label>ACN:</label>
    {{ Form::text('acn', null, ['class' => 'form-control']) }}
    @if($errors->has('acn'))
        <span class="text-danger">{{ $errors->first('acn') }}</span>
    @endif
</div>

{{--Business Email--}}
<div class="form-group">
    <label>Business Email:</label>
    {{ Form::text('business_email', null, ['class' => 'form-control']) }}
    @if($errors->has('business_email'))
        <span class="text-danger">{{ $errors->first('business_email') }}</span>
    @endif
</div>

{{--Business Mobile--}}
<div class="form-group">
    <label>Business Mobile:</label>
    {{ Form::text('business_mobile', null, ['class' => 'form-control']) }}
    @if($errors->has('business_mobile'))
        <span class="text-danger">{{ $errors->first('business_mobile') }}</span>
    @endif
</div>

{{--Business General Phone--}}
<div class="form-group">
    <label>Business General Phone:</label>
    {{ Form::text('business_general_phone', null, ['class' => 'form-control']) }}
    @if($errors->has('business_general_phone'))
        <span class="text-danger">{{ $errors->first('business_general_phone') }}</span>
    @endif
</div>

{{--Address--}}
<div class="form-group">
    <label>Address:</label>
    {{ Form::text('address', null, ['class' => 'form-control']) }}
    @if($errors->has('address'))
        <span class="text-danger">{{ $errors->first('address') }}</span>
    @endif
</div>