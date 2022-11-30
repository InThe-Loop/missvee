@extends('layouts.app')
@section('title', 'Sign up')
@section('content')

<section class="login">
    <div class="login_box h-100">
        <div class="col-md-6 login-left">
            <a class="go-back" href="#">
                <div class="arrow"> Back</div>
            </a>
            <div class="contact">
                <form id="signup-form" action="{{ route('register') }}" method="POST">
                    @csrf

                    <div class="form-group row">
                        <div class="col-md-12">
                            <label for="name" class="text-dark">{{ __('Full name') }}</label>
                            <input id="name" type="text" class="form-control my-input @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus maxlength="30" />

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <label for="email" class="text-dark">{{ __('Email address') }}</label>
                            <input id="email" type="email" class="form-control my-input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" maxlength="100" />

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row mt-3">
                        <div class="col-md-6">
                            <label for="password" class="text-start">{{ __('Password') }}</label>
                            <input id="password" type="password" class="form-control my-input @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" maxlength="12" />

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="password_confirmation" class="text-dark">{{ __('Confirm password') }}</label>
                            <input id="password_confirmation" type="password" class="form-control my-input" name="password_confirmation" required autocomplete="new-password" maxlength="12" />
                        </div>
                    </div>

                    <div class="form-group row mt-3 mb-0">
                        <div class="col-md-2">
                            <button type="submit" class="btn btn-secondary no-border">
                                {{ __('Sign up') }}
                            </button>
                        </div>
                        <div class="col-md-10 pt-2">
                            <label class="form-check-label">Already registered? Please <a href="{{ route('login') }}">sign in here</a>.</label>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-6 login-right">
            <div class="right-text">
                <h2>Sign up</h2>
            </div>
        </div>
    </div>
</section>

@endsection
