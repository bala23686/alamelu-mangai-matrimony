@component('mail::message')

#Thanks . Mr/Ms : {{$user->username}}

@component('mail::button', ['url' => $url])
Find Partner
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
