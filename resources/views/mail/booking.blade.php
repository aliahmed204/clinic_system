<x-mail::message>
# Introduction

    Name: {{ $data['name'] }}
    Phone: {{ $data['phone'] }}
    Email: {{ $data['email'] }}
    booking_date: {{ $data['booking_date'] }}

<x-mail::button :url="route('index')">
visit VCare
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
