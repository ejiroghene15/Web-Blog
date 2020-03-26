@component('mail::message')
Hello {{$name}},  your account has been created. Please verify your account

@component('mail::button', ['url' => 'http://localhost:5000/verifyaccount', 'color' => 'success'])
Verify Account
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
