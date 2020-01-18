@component('mail::message')
# Introduction

Welcome to our saas app,  {{ $user->name }}

@component('mail::button', ['url' => ''])
Welcome
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
