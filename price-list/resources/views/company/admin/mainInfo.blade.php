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
                            <h1>Основна інформація</h1>
                        </div>
                        <div class="col col-12">
                            <p class="ps-4">На цій сторінці Ви можете змінити основну інформацію про Вашу компанію, а
                                також персоналізувати її під власний стиль. Будь ласка, не забувайте зберігати дані
                                форми!</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <section class="section my-5">
        <div class="container-xxl">
            <form method="post" action="{{ route('changemaininfo') }}" enctype="multipart/form-data">
                @csrf
                @include('includes.message')
                
                <input type="text" class="form-control" hidden id="companyId" name="companyId" value="{{$company->companyId}}">

                <div class="row mb-3">
                    <div class="col col-12 col-md-6">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="companyName" name="companyName" placeholder="Назва компанії" title="Назва Вашого магазину" value="{{$company->companyName}}" readonly>
                            <label for="company-name">Назва компанії</label>
                        </div>
                    </div>

                    <div class="col col-12 col-md-6">
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" id="company-email" name="company-email" placeholder="Електронна адреса" title="Електронна адреса" value="{{$company->user()->email}}" readonly>
                            <label for="company-email">Електронна адреса</label>
                        </div>
                    </div>

                    <div class="col col-12 col-md-6">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="city" name="city" placeholder="Місто розташування" title="Місто розташування" value="{{$company->city}}">
                            <label for="city">Місто розташування</label>
                        </div>
                    </div>

                    <div class="col col-12 col-md-6">
                        <div class="form-floating mb-3">
                            <input type="tel" class="form-control" id="tel" name="tel" placeholder="Номер телефону" title="Номер телефону" value="{{$company->phone}}">
                            <label for="tel">Номер телефону</label>
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col col-12">
                        <h3 class="text-start mb-3">Оформлення сторінки</h3>
                    </div>

                    <div class="col col-12 col-md-4">
                        <div class="mb-3 text-start">
                            <input class="form-control" type="file" id="logo-file" name="logo-file"title="Завантажте зображення нового логотипу">
                            <label for="logo-file" class="form-label">Завантажте зображення нового логотипу</label>
                        </div>

                        <div class="mb-3 text-start">
                            <input type="color" class="form-control form-control-color w-100" id="color" name="color" title="Оберіть основний колір" value="{{$company->color}}">
                            <label for="color" class="form-label">Оберіть основний колір</label>
                        </div>
                    </div>
                    <div class="col col-12 col-md-8">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="shortDescr" name="shortDescr" placeholder="Короткий опис" title="Короткий опис магазину. Буде відображений разом з назвою" value="{{$company->shortDescr}}">
                            <label for="shortDescr">Короткий опис</label>
                        </div>
                        <div class="form-floating">
                            <textarea class="form-control" placeholder="Опис компанії" id="descr" name="descr" style="min-height: 150px; max-height: 300px;" title="Розгорнутий опис магазину">{{$company->companyDescription}}</textarea>
                            <label for="descr">Опис компанії</label>
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col col-12">
                        <h3 class="text-start mb-3">Соціальні мережі</h3>
                    </div>

                    <div class="col col-12 col-md-6">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="instagram" name="instagram" placeholder="TikTok" value="{{$company->instagram}}" title="Введіть посилання на соціальну мережу">
                            <label for="instagram">Instagram</label>
                        </div>
                    </div>
                    <div class="col col-12 col-md-6">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="facebook" name="facebook" placeholder="TikTok" value="{{$company->facebook}}" title="Введіть посилання на соціальну мережу">
                            <label for="facebook">Facebook</label>
                        </div>
                    </div>
                    <div class="col col-12 col-md-6">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="youtube" name="youtube" placeholder="TikTok" value="{{$company->youTube}}" title="Введіть посилання на соціальну мережу">
                            <label for="youtube">YouTube</label>
                        </div>
                    </div>
                    <div class="col col-12 col-md-6">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="tiktok" name="company-tiktok" placeholder="TikTok" value="{{$company->tikTok}}" title="Введіть посилання на соціальну мережу">
                            <label for="tiktok">TikTok</label>
                        </div>
                    </div>
                </div>

                <div class="row justify-content-center">
                    <div class="col col-10 col-md-3 mb-3">
                        <button type="submit" class="btn btn-success w-100 p-3" title="Зберегти зміни">Зберегти</button>
                    </div>
                    <div class="col col-10 col-md-3 mb-3">
                        <a href="{{route('main-info-admin', $company->companyName)}}" class="btn btn-secondary w-100 p-3" title="Відмінити зміни">Скинути</a>
                    </div>
                </div>
            </form>
        </div>
    </section>

    
@endsection