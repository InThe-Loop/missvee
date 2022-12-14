@extends('layouts.app')
@section('title', 'Sign in')
@section('content')

<section class="login">
    <div class="login_box">
        <div class="col-md-6 login-left">
            <a class="go-back" href="#">
                <div class="arrow"> Back</div>
            </a>
            <div class="contact">
                <form id="signin-form" action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <label for="email" class="text-dark">{{ __('Email address') }}</label>
                            <input id="email" type="email" class="form-control my-input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus maxlength="100" />

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <label for="password" class="text-dark">{{ __('Password') }}</label>
                            <input id="password" type="password" class="form-control my-input @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" maxlength="12" />
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-2">
                            <button type="submit" class="btn btn-secondary no-border">
                                {{ __('Sign in') }}
                            </button>
                        </div>
                        <div class="col-md-10">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} />
                                <label class="form-check-label col-form-label text-dark" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            @if (Route::has('password.request'))
                                <a class="link" href="{{ route('password.request') }}">
                                    {{ __('Forgot your password?') }}
                                </a>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            <label class="form-check-label">Don't have an account yet? You can <a href="{{ route('register') }}">sign up here</a> or just login with your socials below.</label>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            @if (str_replace(url('/'), '', url()->previous()) == '/cart')
                                <a href="{{ route('checkout.guest'  ) }}" class="btn btn-warning no-border mr-1">
                                    Guest checkout
                                </a>
                            @endif
                            <a href="{{ route('facebook.login') }}" class="btn btn-primary social">
                                <i class="fab fa-facebook fa-fw"></i> Login with Facebook
                            </a>
                            <a href="{{ route('google.login') }}" class="btn btn-google-signin">
                                <img src="{{ asset('images/icons/google-icon.png') }}" alt="Sign in with Google" /> <span>Sign in with Google</span>
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-7 login-right">
            <div class="right-text">
                <h2>Sign in</h2>
            </div>
        </div>
    </div>
</section>

@endsection
