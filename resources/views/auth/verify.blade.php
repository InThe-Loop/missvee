@extends('layouts.app')
@section('title', 'Verification')
@section('content')


<section class="login">
    <div class="login_box h-100">
        <div class="col-md-6 login-left">
            <a class="go-back" href="#">
                <div class="arrow"> Back</div>
            </a>
            <div class="contact">
                <p>{{ __('Verify Your Email Address') }}</p>

                @if (session('resent'))
                    <div class="alert alert-success" role="alert">
                        {{ __('A fresh verification link has been sent to your email address.') }}
                    </div>
                @endif

                {{ __('Before proceeding, please check your email for a verification link.') }}
                {{ __('If you did not receive the email') }},
                <form method="POST" class="d-inline" action="{{ route('verification.resend') }}">
                    @csrf
                    <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
                </form>
            </div>
        </div>
        <div class="col-md-6 login-right">
            <div class="right-text">
                <h2>New password</h2>
            </div>
        </div>
    </div>
</section>

@endsection
