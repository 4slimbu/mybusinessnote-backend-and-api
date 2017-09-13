@component('mail::message')

    <h1>
        Hello {{ $user->first_name }},
    </h1>

    <p>Click on the below button to verify your email address</p>

    @component('mail::button', ['url' => 'url("register/verify/".{{ $user->token }})'])
        Verify Now
    @endcomponent


    <p>Regards,<br>{{ config('app.name') }} </p>

@endcomponent