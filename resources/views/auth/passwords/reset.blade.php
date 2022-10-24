@extends('layouts.app')
@section('title', 'New password')
@section('content')

<section class="login">
    <div class="login_box h-100">
        <div class="col-md-6 login-left">
            <a class="go-back" href="#">
                <div class="arrow"> Back</div>
            </a>
            <div class="contact">
                <form method="POST" action="{{ route('password.update') }}">
                    @csrf

                    <input type="hidden" name="token" value="{{ $token }}">

                    <div class="form-group row">
                        <div class="col-md-12">
                        <label for="email" class="text-dark">{{ __('Email address') }}</label>
                        <input id="email" type="email" class="form-control my-input @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus />

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row mt-3">
                        <div class="col-md-12">
                            <label for="password" class="text-dark">{{ __('Password') }}</label>
                            <input id="password" type="password" class="form-control my-input @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" />

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row mt-3">
                        <div class="col-md-12">
                            <label for="password-confirm" class="text-dark">{{ __('Confirm password') }}</label>
                            <input id="password-confirm" type="password" class="form-control my-input" name="password_confirmation" required autocomplete="new-password" />
                        </div>
                    </div>

                    <div class="form-group row mt-3 mb-0">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-secondary no-border">
                                {{ __('Reset password') }}
                            </button>
                        </div>
                    </div>
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
