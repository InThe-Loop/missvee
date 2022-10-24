@extends('layouts.app')
@section('title', 'Password reset')
@section('content')

<section class="login">
    <div class="login_box h-100">
        <div class="col-md-6 login-left">
            <a class="go-back" href="#">
                <div class="arrow"> Back</div>
            </a>
            <div class="contact">
                <form method="POST" action="{{ route('password.email') }}">
                    @csrf

                    <div class="form-group row">
                        <div class="col-md-12">
                            <label for="email" class="text-dark">{{ __('Email address') }}</label>
                            <input id="email" type="email" class="form-control my-input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus />

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row mt-3 mb-0">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-secondary no-border">
                                {{ __('Send password reset link') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-6 login-right">
            <div class="right-text">
                <h2>Password reset</h2>
            </div>
        </div>
    </div>
</section>

@endsection
