
@extends('auth.layouts.master')

@section('contents')
    <header class="header-2 access-page-nav">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="header-top">
                        <div class="logo-area">
                            <a href="/"><img src="{{asset('frontend/images/logo-2.png')}}" alt=""></a>
                        </div>
                        <div class="top-nav">
                            <a href="{{route('login')}}" class="account-page-link">Login</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="padding-top-90 padding-bottom-90 access-page-bg">
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-md-6">
                    <div class="access-form">
                        <div class="form-header">
                            <h5><i data-feather="user"></i>Forgot your password?</h5>

                        </div>
                        <p>
                            {{ __(' No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
                        </p>
                        <!-- Session Status -->
                        <x-auth-session-status class="mb-4" :status="session('status')" />

                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf

                            <!-- Email Address -->
                            <div class="form-group">
                                <input type="email" name="email" placeholder="Email Address" value="{{old('email')}}" class="form-control {{$errors->has('email')? 'is-invalid':''}}" autofocus>
                                <x-input-error :messages="$errors->get('email')"   class="mt-2"  />
                            </div>


                            <button class="button primary-bg btn-block">{{ __('Email Password Reset Link') }}</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection



