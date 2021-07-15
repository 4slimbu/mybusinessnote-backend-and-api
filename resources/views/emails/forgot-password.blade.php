@component('mail::message')
Hello {{ $data['Data']['first_name'] }},

Please click the link below to reset your password.


@component('mail::button', ['url' => $data['Data']['reset_password_link']])
    Verify Now
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
