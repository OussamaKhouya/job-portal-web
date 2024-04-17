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
                            <h5><i data-feather="user"></i>Reset your password</h5>
                        </div>


                        <form method="POST" action="{{ route('password.store') }}">
                            @csrf

                            <!-- Password Reset Token -->
                            <input type="hidden" name="token" value="{{ $request->route('token') }}">

                            <!-- Email Address -->
                            <div class="form-group">
                                <input type="email" name="email" placeholder="Email Address" value="{{old('email', $request->email)}}" class="form-control {{$errors->has('email')? 'is-invalid':''}}" autofocus>
                                <x-input-error :messages="$errors->get('email')"   class="mt-2"  />
                            </div>
                            <!-- Password -->
                            <div class="form-group">
                                <input type="password" name="password" placeholder="New Password" class="form-control {{$errors->has('password')? 'is-invalid':''}}" />
                                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                            </div>
                            <!-- Confirm Password -->
                            <div class="form-group">
                                <input type="password" name="password_confirmation" placeholder="{{__('Confirm Password')}}" class="form-control {{$errors->has('password_confirmation')? 'is-invalid':''}}" />
                                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                            </div>


                            <button class="button primary-bg btn-block">
                                {{ __('Reset Password') }}
                            </button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection




