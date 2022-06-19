@extends('layouts.layout')

@section('title', 'Авторизація')

@section('content')

    {{-- Підключення заголовку --}}
    @include('includes.main-header')

    <div class="new-intro">
        <div class="container-xxl mt-5">
            <div class="row justify-content-center mt-md-5">
                <div class="col-12 col-sm-8 col-md-5 mt-lg-5">

                    @include('includes.message')
                    <form method="post" action="" class="form mb-4" name="login-form">
                    {{-- <form method="post" action="{{route('login-submit')}}" class="form mb-4" name="login-form"> --}}
                        @csrf
                        <div class="row">
                            <div class="col-12 mb-3">
                                <input class="p-2" type="email" placeholder="Електронна адреса" name="email" id="email" value="{{ old('email') }}">
                            </div>
                            <div class="col-12 mb-4">
                                <input class="p-2" type="password" placeholder="Пароль" name="password" id="password" value="">
                            </div>
                            
                            <div class="col-12 mb-4">
                                <input type="submit" class="p-3 autorization-submit" value="Увійти">
                            </div>
                        </div>

                        <p>Ще не зареєстровані? <a href="{{route('register')}}">Створити акаунт</a></p>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection





{{-- 
<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-button class="ml-3">
                    {{ __('Log in') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout> --}}
