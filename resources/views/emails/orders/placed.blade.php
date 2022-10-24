@component('mail::message')
<p>
<center style="margin-bottom: 20px;">
    <img src="{{ asset('images/logo.png') }}" alt="{{ config('app.name') }}" width="100" />
</center>
</p>

<p>Good day,</p>
<p>
    Your {{ config('app.name') }} order has been placed succefully. We're working on getting it to you very soon.
    Our orders take up to 14 days to reach you. Please allow 14 days to pass before making an inquiry.
</p>

<h3>Your order details: </h3>

<p style="background-color: #ccc; color: #000; font-size: 12px; padding: 10px;">
<ul>
<li>Order number: <strong>MV-000-{{ $order->id }}</strong> (always use this number when inquiring)</li>
<li>Your Name: {{ $order->billing_name }}</li>
<li>Your Address: {{ $order->billing_address }}</li>
<li>City: {{ $order->billing_city }}</li>
<li>Privince: {{ $order->billing_province }}</li>
<li>Total: <strong>R{{ format($order->billing_total) }}</strong></li>
</ul>
</p>

<h4>Your items: </h4>
<p style="background-color: #ccc; color: #000; font-size: 12px; padding: 10px;">
@foreach ($order->products as $product)
    {{ $product->name }}: 
    <li>Qauntity: {{ $product->pivot->quantity }}</li>
@endforeach
</p>

@component('mail::button', ['url' => config('app.url')])
{{ config('app.name') }}
@endcomponent

<p>Best Regards,
<br />
{{ config('app.name') }} Online Team
</p>

<center style="font-size: 12px;">{{ config('app.name') }} Mailer v1</center>
@endcomponent
