@component('mail::message')
# Hello {{ $user }},

Rencontre prevu avec {{ $nom }} demain

{{--@component('mail::button', ['url' => ''])
retourner au site
@endcomponent--}}

Merci,<br>
{{ config('app.name') }}
@endcomponent
