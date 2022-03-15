@component('mail::message')
# Introduction

Please, confirm you email address through this link.

<a href="{{ url()->current() . '/users/' . $user->id . '/verify' }}">Click Here</a>

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
