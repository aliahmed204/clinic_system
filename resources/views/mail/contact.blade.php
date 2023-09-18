<x-mail::message>
# Introduction

    Name: {{ $data['name'] }}
    Phone: {{ $data['phone'] }}
    Email: {{ $data['email'] }}
<p>
    {{$data['message']}}
</p>
<x-mail::button :url="route('index')">
Go to clinic
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
