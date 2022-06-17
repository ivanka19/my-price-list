@extends('layouts.layout')

@section('title', 'Реєстрація')

@section('content')

    {{-- Підключення заголовку --}}
    @include('includes.main-header')

    <div class="new-intro">
        <div class="container-xxl mt-5">
            <div class="row justify-content-center mt-md-5">
                <div class="col-12 col-sm-8 col-md-5 mt-lg-5">
                    
                    @include('includes.message')
        
                    <form method="post" action="{{route('register')}}" class="form mb-4" name="registration-form">
                        @csrf
                        <div class="row">
                            <div class="col-12 mb-3">
                                <input class="p-2" type="text" placeholder="Назва компанії" name="company-name" id="company-name" value="{{ old('company-name') }}">
                            </div>
                            <div class="col-12 mb-3">
                                <input class="p-2" type="text" placeholder="Ім'я користувача" name="user-name" id="user-name" value="{{ old('user-name') }}">
                            </div>
                            <div class="col-12 mb-3">
                                <input class="p-2" type="email" placeholder="Електронна адреса" name="email" id="email" value="{{ old('email') }}">
                            </div>
                            <div class="col-12 mb-3">
                                <input class="p-2" type="password" placeholder="Пароль" name="password" id="password">
                            </div>
                            <div class="col-12 mb-4">
                                <input class="p-2" type="password" placeholder="Повторіть пароль" name="password_confirmation" id="password_confirmation">
                            </div>
                            <p class="mb-4">Всі поля форми є обов'язковими до заповнення</p>
                            <div class="col-12 mb-4">
                                <input type="submit" class="p-3 registration-submit" value="Зареєструватись">
                            </div>
                        </div>
                        <p>Вже зареєстровані? <a href="{{route('login')}}">Увійти до системи</a></p>
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

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-label for="name" :value="__('Name')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout> --}}
