@component('mail::message')
<p>
<center style="margin-bottom: 20px;">
    <img src="{{ asset('images/logo.png') }}" alt="{{ config('app.name') }}" width="100" />
</center>
</p>

<p>Online hire rerservation. See details below:</p>
<p style="background-color: #ccc; color: #000; font-size: 12px; padding: 10px;">
<strong>Customer details:</strong><br />
From: {{ $details['name'] }} <br />
Email: {{ $details['email'] }} <br />
Contact number: {{ $details['phone'] }} <br />
Address: {{ $details['address'] }}
</p>

<div style="background-color: #ccc; color: #000; font-size: 12px; padding: 10px; marign-bottom: 15px;">
<strong>Reservation details:</strong><br />
Reference #: {{ $details['code'] }}<br />
Product name: {{ $details['pname'] }}<br />
Hire price: R{{ format($details['price']) }}<br />
Total due: R{{ format($details['total']) }}<br />
Hire days ({{ $details['days']}}): {{ $details['dates'] }}
</div>

<p></p>
<p>Best Regards,
<br />
{{ config('app.name') }} Online Team
</p>
<center style="font-size: 12px;">{{ config('app.name') }} Mailer v1</center>
@endcomponent
