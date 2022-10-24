@component('mail::message')
<p>
<center style="margin-bottom: 20px;">
    <img src="{{ asset('images/logo.png') }}" alt="{{ config('app.name') }}" width="100" />
</center>
</p>

<p>Online contact message. See details below:</p>

<p style="background-color: #ccc; color: #000; font-size: 12px; padding: 10px;">
From: {{ $details['name'] }} <br />
Email: {{ $details['email'] }} <br />
Contact number: {{ $details['number'] }} <br />
Subject line: {{ $details['subject'] }}
</p>

<div style="background-color: #ccc; color: #000; font-size: 12px; padding: 10px; marign-bottom: 15px;">
Message: <br />
{{ $details['message'] }}
</div>

<p>Best Regards,
<br />
{{ config('app.name') }} Online Team
</p>
<center style="font-size: 12px;">{{ config('app.name') }} Mailer v1</center>
@endcomponent
