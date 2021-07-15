@component('mail::message')
Hello {{ $data['Data']['first_name'] }},

The body of your message.


@component('mail::button', ['url' => $data['Data']['continue_where_you_left']])
    Verify Now
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
