@component('mail::message')
Hello {{ $data['Data']['first_name'] }},

A password reset request has been made to this email. If you are not the one who made this 
request, then ignore this email. Otherwise, follow this link to reset your password.


@component('mail::button', ['url' => $data['Data']['reset_password_link']])
    Reset Password
@endcomponent

Thanks,<br>
{{ config('app.name') }} Team
@endcomponent
