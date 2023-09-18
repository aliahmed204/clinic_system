<x-mail::message>
# Introduction

Welcome to VCare .
    Your name is {{$data['name']}} :
    Your Email is {{$data['email']}}

<x-mail::button :url="route('index')">
Visit clinic website
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
