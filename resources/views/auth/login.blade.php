
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
                            <a href="{{route('register')}}" class="account-page-link">Register</a>
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
                            <h5><i data-feather="user"></i>Login</h5>
                        </div>
                        <!-- Session Status -->
                        <x-auth-session-status class="mb-4" :status="session('status')" />

                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <!-- Email Address -->
                            <div class="form-group">
                                <input type="email" name="email" placeholder="Email Address" value="{{old('email')}}" class="form-control {{$errors->has('email')? 'is-invalid':''}}">
                                <x-input-error :messages="$errors->get('email')"   class="mt-2"  />
                            </div>

                            <!-- Password -->
                            <div class="form-group">
                                <input type="password" name="password" placeholder="Password" class="form-control {{$errors->has('password')? 'is-invalid':''}}" />
                                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                            </div>

                            <div class="more-option">
                                <!-- Remember Me -->
                                <div class="mt-0 terms">
                                    <input class="custom-radio" type="checkbox" id="radio-4" name="remember">
                                    <label for="radio-4">
                                        <span class="dot"></span> Remember Me
                                    </label>
                                </div>
                                <a href="{{ route('password.request') }}">Forget Password?</a>
                            </div>
                            <button class="button primary-bg btn-block">{{ __('Log in') }}</button>
                        </form>
                        <div class="shortcut-login">

                            <p>Don't have an account? <a href="{{route('register')}}">Register</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


