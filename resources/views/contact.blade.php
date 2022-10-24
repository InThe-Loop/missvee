@extends('layouts.app')
@section('title', 'Contact us')
@section('content')

<section class="login">
    <div class="login_box h-100">
        <div class="col-md-6 login-left">
            <a class="go-back" href="#">
                <div class="arrow"> Back</div>
            </a>
            <div class="contact">
                <form id="contact-form" action="{{ route('sendmail') }}" method="POST">
                    @csrf

                    <div class="form-group row">
                        <div class="col-md-6">
                            <label for="email" class="text-dark">{{ __('Email address') }}</label>
                            <input id="email" type="email" class="form-control my-input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required />

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="subject" class="text-dark">{{ __('Subject line') }}</label>
                            <select class="form-control my-input @error('subject') is-invalid @enderror" name="subject" value="{{ old('subject') }}" required>
                                <option value="">Please select a subject line</option>
                                <option value="Contact category: Shopping experience">Shopping experience</option>
                                <option value="Contact category: Compliments">Compliments</option>
                                <option value="Contact category: Orders">Orders</option>
                                <option value="Contact category: General enquiry">General enquiry</option>
                                <option value="Contact category: Complaint">Complaint</option>
                                <option value="Contact category: Other">Other</option>
                            </select>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="name" class="text-dark">{{ __('Full name') }}</label>
                            <input id="name" type="text" class="form-control my-input @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autofocus>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="phone" class="text-dark">{{ __('Phone number') }}</label>
                            <input id="phone" type="number" class="form-control my-input @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" />

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row mt-3">
                        <div class="col-md-12">
                            <label for="message" class="text-start">{{ __('Message') }}</label>
                            <textarea rows="4" id="message" name="message" class="form-control my-input @error('message') is-invalid @enderror" required></textarea>
                        </div>
                    </div>

                    <div class="form-group row mt-3 mb-0">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-secondary no-border">
                                {{ __('Send') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-6 login-right">
            <div class="right-text">
                <h2>Contact us</h2>
            </div>
        </div>
    </div>
</section>

@endsection
