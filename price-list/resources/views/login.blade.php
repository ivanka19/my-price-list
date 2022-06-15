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

                        <p>Ще не зареєстровані? <a href="{{route('registration')}}">Створити акаунт</a></p>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection