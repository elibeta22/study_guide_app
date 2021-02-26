@component('mail::message')
# Hi

You are receiving this email because we received a password reset request for your account..

Your verification code is {{$code}}.

Thanks,<br>
{{ config('app.name') }}
@endcomponent
