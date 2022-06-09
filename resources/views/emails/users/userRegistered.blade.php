@component('mail::message')

#Thanks . Mr/Ms : {{$user->username}}
    <p>Welcome to Alamelu Mangai Matrimony
    Thanks for signing up, Alamelu Mangai Matrimony.</p>
   <p> We are glad you’re here</p>


@component('mail::button', ['url' => $url])
Find Partner
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
