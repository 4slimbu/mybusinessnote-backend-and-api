{{--First Name--}}
<div class="form-group">
    <label>First Name:</label>
    {{ Form::text('first_name', null, ['class' => 'form-control']) }}
    @if($errors->has('first_name'))
        <span class="text-danger">{{ $errors->first('first_name') }}</span>
    @endif
</div>

{{--Last Name--}}
<div class="form-group">
    <label>Last Name:</label>
    {{ Form::text('last_name', null, ['class' => 'form-control']) }}
    @if($errors->has('last_name'))
        <span class="text-danger">{{ $errors->first('last_name') }}</span>
    @endif
</div>

{{--Phone No--}}
<div class="form-group">
    <label>Phone No:</label>
    {{ Form::text('phone_number', null, ['class' => 'form-control']) }}
    @if($errors->has('phone_number'))
        <span class="text-danger">{{ $errors->first('phone_number') }}</span>
    @endif
</div>

{{--Email--}}
<div class="form-group">
    <label>Email:</label>
    {{ Form::text('email', null, ['class' => 'form-control']) }}
    @if($errors->has('email'))
        <span class="text-danger">{{ $errors->first('email') }}</span>
    @endif
</div>

{{--Password--}}
<div class="form-group">
    <label>Password:</label>
    {{ Form::password('password', ['class' => 'form-control']) }}
    @if($errors->has('password'))
        <span class="text-danger">{{ $errors->first('password') }}</span>
    @endif
</div>

{{--Company--}}
<div class="form-group">
    <label>Company:</label>
    {{ Form::text('company', null, ['class' => 'form-control']) }}
    @if($errors->has('company'))
        <span class="text-danger">{{ $errors->first('company') }}</span>
    @endif
</div>

{{--Billing Street 1--}}
<div class="form-group">
    <label>Billing Street 1:</label>
    {{ Form::text('billing_street1', null, ['class' => 'form-control']) }}
    @if($errors->has('billing_street1'))
        <span class="text-danger">{{ $errors->first('billing_street1') }}</span>
    @endif
</div>

{{--Billing Street 2--}}
<div class="form-group">
    <label>Billing Street 2:</label>
    {{ Form::text('billing_street2', null, ['class' => 'form-control']) }}
    @if($errors->has('billing_street2'))
        <span class="text-danger">{{ $errors->first('billing_street2') }}</span>
    @endif
</div>

{{--Billing Post Code--}}
<div class="form-group">
    <label>Billing Post Code:</label>
    {{ Form::text('billing_postcode', null, ['class' => 'form-control']) }}
    @if($errors->has('billing_postcode'))
        <span class="text-danger">{{ $errors->first('billing_postcode') }}</span>
    @endif
</div>

{{--Billing State--}}
<div class="form-group">
    <label>Billing State:</label>
    {{ Form::text('billing_state', null, ['class' => 'form-control']) }}
    @if($errors->has('billing_state'))
        <span class="text-danger">{{ $errors->first('billing_state') }}</span>
    @endif
</div>

{{--Billing Sub Urb--}}
<div class="form-group">
    <label>Billing Sub Urb:</label>
    {{ Form::text('billing_suburb', null, ['class' => 'form-control']) }}
    @if($errors->has('billing_suburb'))
        <span class="text-danger">{{ $errors->first('billing_suburb') }}</span>
    @endif
</div>

{{--Billing Country--}}
<div class="form-group">
    <label>Billing Country:</label>
    {{ Form::text('billing_country', null, ['class' => 'form-control']) }}
    @if($errors->has('billing_country'))
        <span class="text-danger">{{ $errors->first('billing_country') }}</span>
    @endif
</div>

@if(! isset($data['row']))
    <p>
        <a href="javascript:void(0)" class="show-more" >
            {{ Form::checkbox('same_address') }}
        </a> Is Physical Address same as Business Address?
    </p>
@endif

{{--Street 1--}}
<div class="form-group more-inputs">
    <label>Street 1:</label>
    {{ Form::text('residential_street1', null, ['class' => 'form-control']) }}
    @if($errors->has('residential_street1'))
        <span class="text-danger">{{ $errors->first('residential_street1') }}</span>
    @endif
</div>

{{--Street 2--}}
<div class="form-group more-inputs">
    <label>Street 2:</label>
    {{ Form::text('residential_street2', null, ['class' => 'form-control']) }}
    @if($errors->has('residential_street2'))
        <span class="text-danger">{{ $errors->first('residential_street2') }}</span>
    @endif
</div>

{{--Post Code--}}
<div class="form-group more-inputs">
    <label>Post Code:</label>
    {{ Form::text('residential_postcode', null, ['class' => 'form-control']) }}
    @if($errors->has('residential_postcode'))
        <span class="text-danger">{{ $errors->first('residential_postcode') }}</span>
    @endif
</div>

{{--State--}}
<div class="form-group more-inputs">
    <label>State:</label>
    {{ Form::text('residential_state', null, ['class' => 'form-control']) }}
    @if($errors->has('residential_state'))
        <span class="text-danger">{{ $errors->first('residential_state') }}</span>
    @endif
</div>

{{--Sub Urb--}}
<div class="form-group more-inputs">
    <label>Sub Urb:</label>
    {{ Form::text('residential_suburb', null, ['class' => 'form-control']) }}
    @if($errors->has('residential_suburb'))
        <span class="text-danger">{{ $errors->first('residential_suburb') }}</span>
    @endif
</div>

{{--Country--}}
<div class="form-group more-inputs">
    <label>Country:</label>
    {{ Form::text('residential_country', null, ['class' => 'form-control']) }}
    @if($errors->has('residential_country'))
        <span class="text-danger">{{ $errors->first('residential_country') }}</span>
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

{{--Role--}}
<div class="form-group">
    <label  class="display-block text-semibold">Role:</label>
    {{ Form::select('role_id', $data['roles'], null, ['class' => 'form-control']) }}
    @if($errors->has('role_id'))
        <span class="text-danger">{{ $errors->first('role_id') }}</span>
    @endif
</div>

{{--Status--}}
<div class="form-group">
    <label class="display-block text-semibold">Status:</label>
    <label class="radio-inline">
        {{ Form::radio('verified', '1', true,  ['class' => 'styled']) }} Verified
    </label>
    <label class="radio-inline">
        {{ Form::radio('verified', '0', false, ['class' => 'styled']) }} Un-verified
    </label>
    @if($errors->has('verified'))

        <span class="text-danger-800">{{ $errors->first('verified') }}</span>
    @endif
</div>