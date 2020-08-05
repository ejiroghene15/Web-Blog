@component('mail::message')
Hello **{{$name}}**,  
Your account has been created. Please verify your account

@component('mail::button', ['url' => $link, 'color' => 'success'])
Verify Account
@endcomponent

{{ config('app.name') }}
@endcomponent
