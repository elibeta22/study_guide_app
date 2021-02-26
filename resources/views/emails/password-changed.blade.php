@component('mail::message')
# Hi {{$user->name}}

You've successfully changed your {{ config('app.name') }} app password.

Thanks for using {{ config('app.name') }}.


Thanks,<br>
{{ config('app.name') }}
@endcomponent
