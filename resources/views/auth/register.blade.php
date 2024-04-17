{{--
<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
--}}



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
                            <h5><i data-feather="edit"></i>Register Account </h5>
                        </div>

                        <form method="POST" action="{{ route('register') }}">
                            @csrf


                            <div class="account-type">
                                <label for="idRegisterCan">
                                    <input id="idRegisterCan" value="candidate"  type="radio" name="account_type">
                                    <span>Candidate</span>
                                </label>
                                <label for="idRegisterEmp">
                                    <input id="idRegisterEmp" value="company" type="radio" name="account_type">
                                    <span>Employer</span>
                                </label>
                            </div>
                            <x-input-error2 :messages="$errors->get('account_type')" />

                            <!-- Name -->
                            <div class="form-group">
                                <input type="text"  name="name" value="{{old('name')}}"  placeholder="Name" class="form-control {{$errors->has('name')? 'is-invalid':''}}" required>
                                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                            </div>
                            <!-- Email Address -->
                            <div class="form-group">
                                <input type="email" name="email" value="{{old('email')}}" placeholder="Email Address" class="form-control {{$errors->has('email')? 'is-invalid':''}}" required>
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>
                            <!-- Password -->
                            <div class="form-group">
                                <input type="password" name="password" placeholder="Password" class="form-control {{$errors->has('password')? 'is-invalid':''}}" required>
                                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                            </div>

                            <!-- Confirm Password -->
                            <div class="form-group">
                                <input type="password" name="password_confirmation" placeholder="Confirm Password" class="form-control {{$errors->has('password_confirmation')? 'is-invalid':''}}" required>
                                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                            </div>

                            <button type="submit" class="button primary-bg btn-block">Register</button>
                        </form>
                        <div class="shortcut-login">
                            <p>{{ __('Already registered?') }} <a href="{{route('login')}}">Login</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
