{{--3rd Party Integration--}}


<div class="form-group">

    {{ Form::checkbox('is_3rd_party_integration') }}
    <label class="form-check-label" for="invalidCheck">
        3rd Party Integration
    </label>
    <small id="emailHelp" class="form-text text-muted">Opt in/out if you don't want any partners to contact you</small>

</div>

<div class="form-group">

    {{ Form::checkbox('is_marketing_emails') }}
    <label class="form-check-label" for="invalidCheck">
        Marketing Emails
    </label>
    <small id="emailHelp" class="form-text text-muted">Opt in/out if you don't want to get our occasioanl marketing
        email from us
    </small>

</div>

<div class="form-group">

    {{ Form::checkbox('is_free_isb_subscription') }}
    <label class="form-check-label" for="invalidCheck">
        Free Subscription to ISB Magazine
    </label>
    <small id="emailHelp" class="form-text text-muted">Opt in/out if you don't want Free ISB Digital Magazine.</small>
</div>