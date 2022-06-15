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
        
                    {{-- <form method="post" action="{{route('registration-submit')}}" class="form mb-4" name="registration-form"> --}}

                    <form method="post" action="" class="form mb-4" name="registration-form">
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