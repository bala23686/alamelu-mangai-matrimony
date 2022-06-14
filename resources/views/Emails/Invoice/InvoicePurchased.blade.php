@component('mail::message')

#Thanks . Mr/Ms : {{$user->username}}

You have Process Have Been Completed  with {{ config('app.name') }} . Invoice Will be sent Sortly after a Verification

@component('mail::button', ['url' => $url])
Find Partner
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
