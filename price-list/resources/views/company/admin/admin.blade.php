@extends('layouts.layout')

@section('title')
    Адміністрування {{$company->companyName}} 
@endsection

@section('content')
    <style>
        *::selection {
            background: rgb(184, 184, 184);
        }
    </style>

    @include('company.includes.header', $company)
    @include('company.includes.navigation', $company)

    <div class="intro">
        <div class="container-xxl">
            <div class="row justify-content-between">
                <div class="col col-12 col-md-10">
                    <div class="row">
                        <div class="col col-12 mb-4">
                            <h1>Адміністрування</h1>
                        </div>
                        <div class="col col-12">
                            <p class="ps-4">
                                Вітаємо! <br>У цьому розділі Ви можете ввести всю необхідну інформацію для персоналізації сторінки Вашого магазину, 
                                а також зможете додати інформацію про категорії, товари та знижки. Для переходу на відповідні сторінки скористайтесь посиланнями у навігаційній панелі у верхній частині екрану.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection