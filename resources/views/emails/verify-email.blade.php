@component('mail::message')

# Hello {{$user->email}}!

Please Verify your email to get all features of our app.

Your verification code is {{$code}}.


Regards,<br>
{{ config('app.name') }}
@endcomponent
