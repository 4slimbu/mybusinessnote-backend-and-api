@component('mail::message')
Hello {{ $data['Data']['first_name'] }},

Welcome to <strong>{{ config('app.name') }}</strong>. 
You are just a step away from taking note about your business journey. Please verify your email and make your journey smoother.

@component('mail::button', ['url' => $data['Data']['continue_where_you_left']])
    Verify Now
@endcomponent

Thanks,<br>
{{ config('app.name') }} Team
@endcomponent
