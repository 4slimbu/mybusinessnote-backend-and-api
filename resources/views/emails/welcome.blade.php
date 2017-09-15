@component('mail::message')
    Hello {{ $user->first_name }},

The body of your message.


@component('mail::button', ['url' => url('/register/verify/'.$user->token)])
Verify Now
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
