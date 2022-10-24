@extends('layouts.app')
@section('title', 'Checkout')
@section('content')

<!-- start page content -->
<div class="container">
    <div class="row">
        <div class="col-md-12 mt-3">
            <h1 class="lead text-dark">Checkout</h1>
            <hr />
        </div>
        <div class="col-md-6 mb-3">
            <h3 class="lead text-dark">Billing details</h3>
            <form id="payment-form" action="{{ route('checkout.store') }}" method="POST">
                @csrf()
                <input type="hidden" name="currency" value="ZAR" />
                <input type="hidden" id="token" name="token" value="" />
                <input type="hidden" id="amountInCents" name="amountInCents" value="{{ $total * 100 }}" />

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="email" class="light-text">Email address</label>
                            @guest
                                <input type="email" id="email" name="email" class="form-control my-input" required />
                            @else
                                <input type="email" id="email" name="email" class="form-control my-input" value="{{ auth()->user()->email }}" readonly required />
                            @endguest
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name" class="light-text">Full name</label>
                            @guest
                                <input type="text" id="name" name="name" class="form-control my-input" required />
                            @else
                                <input type="text" id="name" name="name" class="form-control my-input" value="{{ auth()->user()->name }}" required />
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="phone" class="text-dark">Phone</label>
                            <input type="number" id="phone" name="phone" class="form-control my-input" required />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group" id="locationField">
                            <label for="autocomplete" class="text-dark">Lookup address or fill in manually
                                <div class="d-inline-block">
                                    <span id="addr-show" class="show-add-fields">+</span>
                                    <span id="addr-hide" class="show-add-fields hide">-</span>
                                </div>
                            </label>
                            <input type="text" class="form-control" id="autocomplete" name="autocomplete" onFocus="geolocate()" placeholder="" required />
                        </div>
                    </div>
                    <div class="hide col-md-12" id="billing-info">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Street Address</label>
                                    <input type="text" class="form-control" id="address" name="address" required />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Suburb</label>
                                    <input type="text" class="form-control" id="suburb" name="city" required />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Province</label>
                                    <input type="text" class="form-control" id="region" name="province" required />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Postal Code</label>
                                    <input type="text" class="form-control" id="postal_code" name="postal_code" required />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Country</label>
                                    <input type="text" class="form-control" id="country" name="Country" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <h3 class="lead text-dark mt-3">Payment details</h3>
                        <div class="form-group">
                            <label>Name on card</label>
                            <input type="text" class="form-control" id="name_on_card" name="name_on_card" required />
                        </div>

                        <div class="form-group" id="card-frame">
                        	<!-- Yoco Inline form will be added here -->
                        	<span class="text-center">Loading card form. Please wait... </span>
                        </div>
                        
                        <p class="success-payment-message" />

                        <div class="row m-auto m-0">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="agree" id="agree" {{ old('agree') ? 'checked' : '' }} required />
                                <label class="form-check-label col-form-label text-dark" for="agree">
                                    I have read and agree to the <a data-toggle="modal" data-target="#termsModal" href="">Terms and Conditions</a>
                                </label>
                                <span id="errorToShow"></span>
                            </div>
                            
                            <button id="pay-button" type="submit" class="w-100 btn btn-success no-border mr-0 loading-button">
                                Pay R{{ format($total) }}
                            </button>
                            <span class="hide m-auto" id="processing-payment">Start payment process ...</span>
                            <span class="hide m-auto" id="email-notification">Wrapping up and sending email notification ...</span>
                            <span class="m-auto" id="payment-error"></span>
                        </div>
                    </div>
                </div>
                
                <div class="row mt-5 m-2">
                    <small id="ip-address"></small>
                </div>
            </form>
        </div>
        <div class="col-md-6 mb-3">
            <h3 class="lead text-dark">Your Order</h3>
            <table class="table table-borderless table-responsive">
                <tbody>
                    @foreach (Cart::instance('default')->content() as $item)
                        <tr>
                            <td class="align-top">
                                <img src="{{ productImage($item->model->image) }}" class="order-image" /></td>
                            <td>
                            <td class="w-75 align-top">
                                <h3 class="lead text-dark">{{ $item->model->name }}</h3>
                                <p class="text-dark">{{ $item->model->details }}</p>
                                <h3 class="text-dark lead text-small">R{{ format($item->model->price) }}</h3>
                            </td>
                            <td>
                                <span class="quantity-square">{{ $item->qty }}</span>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <hr>
            <div class="row">
                <div class="col">
                    <span class="text-dark">Subtotal</span>
                </div>
                <div class="col text-right">
                    <span class="text-dark">R{{ format($subtotal) }}</span>
                </div>
            </div>
            <!-- @if (session()->has('coupon'))
                <div class="row">
                    <div class="col-md-4">
                        <span class="light-text inline">Discount({{ session('coupon')['code'] }})</span>
                    </div>
                    <div class="col-md-4">
                        <form class="form-inline" action="{{ route('coupon.destroy') }}" method="POST" style="display:inline">
                            @csrf()
                            @method('DELETE')
                            <button class="inline-form-button" type="submit">Remove</button>
                        </form>
                    </div>
                    <div class="col-md-4">
                        <span class="light-text" style="display: inline">- ${{ format($discount) }}</span>
                    </div>
                </div><hr>
                <div class="row">
                    <div class="col-md-4">
                        <span class="light-text">New Subtotal</span>
                    </div>
                    <div class="col-md-4 offset-md-4">
                        <span class="light-text" style="display: inline-block">${{ format($newSubtotal) }}</span>
                    </div>
                </div>
            @endif -->
            <div class="row">
                <div class="col">
                    <span>Total</span>
                </div>
                <div class="col text-right">
                    <span class="text-dark">R{{ format($total) }}</span>
                </div>
            </div>
            <hr>
            <!-- @if (!session()->has('coupon'))
                <form action="{{ route('coupon.store') }}" method="POST">
                    @csrf()
                    <label for="coupon_code">Have a coupon ?</label>
                    <input type="text" name="coupon_code" id="coupon" class="form-control my-input" placeholder="123456" required>
                    <button type="submit" class="btn btn-success custom-border-success btn-block">Apply Coupon</button>
                </form>
            @endif -->
        </div>
    </div>
</div>
<!-- end page content -->

<!-- Yoco Integration -->
<script src="https://js.yoco.com/sdk/v1/yoco-sdk-web.js"></script>
<script src="{{ asset('js/checkout.js') }}"></script>
<!-- Google Geolocation API -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDwJxlBfVQZAj0BYgJl-xYz0ftFoRvSVGU&libraries=places&callback=initAutocomplete" async defer></script>
<script src="{{ asset('js/google-address-lookup.js') }}"></script>

@endsection
