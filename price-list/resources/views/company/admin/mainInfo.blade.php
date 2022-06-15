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
            <form action="" class="">
                @csrf

                <input type="text" class="form-control" hidden id="company-id" name="company-id" value="{{$company->companyId}}">

                <div class="row mb-3">
                    <div class="col col-12 col-md-6">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="company-name" name="company-name" placeholder="Назва компанії" title="Назва Вашого магазину" value="{{$company->companyName}}" readonly>
                            <label for="company-name">Назва компанії</label>
                        </div>
                    </div>

                    <div class="col col-12 col-md-6">
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" id="company-email" name="company-email" placeholder="Електронна адреса" title="Електронна адреса" value="{{$company->user->email}}" readonly>
                            <label for="company-email">Електронна адреса</label>
                        </div>
                    </div>

                    {{-- <div class="col col-12 col-md-6">
                        <!-- Ім'я продавця -->
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="company-user" placeholder="Ім'я продавця" title="Ім'я продавця">
                            <label for="company-user">Ім'я продавця</label>
                        </div>
                    </div> --}}

                    <div class="col col-12 col-md-6">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="company-city" name="company-city" placeholder="Місто розташування" title="Місто розташування" value="{{$company->city}}">
                            <label for="company-city">Місто розташування</label>
                        </div>
                    </div>

                    <div class="col col-12 col-md-6">
                        <div class="form-floating mb-3">
                            <input type="tel" class="form-control" id="company-tel" name="company-tel" placeholder="Номер телефону" title="Номер телефону" value="{{$company->phone}}">
                            <label for="company-tel">Номер телефону</label>
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col col-12">
                        <h3 class="text-start mb-3">Оформлення сторінки</h3>
                    </div>

                    <div class="col col-12 col-md-4">
                        <div class="mb-3 text-start">
                            <input class="form-control" type="file" id="company-logo-file" name="company-logo-file"title="Завантажте зображення нового логотипу">
                            <label for="company-logo-file" class="form-label">Завантажте зображення нового логотипу</label>
                        </div>

                        <div class="mb-3 text-start">
                            <input type="color" class="form-control form-control-color w-100" id="company-color" name="company-color" title="Оберіть основний колір" value="{{$company->color}}">
                            <label for="company-color" class="form-label">Оберіть основний колір</label>
                        </div>
                    </div>
                    <div class="col col-12 col-md-8">
                        <div class="form-floating mb-3">
                            <input type="url" class="form-control" id="company-shortDescr" name="company-shortDescr" placeholder="Короткий опис" title="Короткий опис магазину. Буде відображений разом з назвою" value="{{$company->shortDescr}}">
                            <label for="company-shortDescr">Короткий опис</label>
                        </div>
                        <div class="form-floating">
                            <textarea class="form-control" placeholder="Опис компанії" id="company-descr" name="company-descr" style="min-height: 150px; max-height: 300px;" title="Розгорнутий опис магазину">{{$company->companyDescription}}</textarea>
                            <label for="company-descr">Опис компанії</label>
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col col-12">
                        <h3 class="text-start mb-3">Соціальні мережі</h3>
                    </div>

                    <div class="col col-12 col-md-6">
                        <div class="form-floating mb-3">
                            <input type="url" class="form-control" id="company-instagram" name="company-instagram" placeholder="TikTok" value="{{$company->instagram}}" title="Введіть посилання на соціальну мережу">
                            <label for="company-instagram">Instagram</label>
                        </div>
                    </div>
                    <div class="col col-12 col-md-6">
                        <div class="form-floating mb-3">
                            <input type="url" class="form-control" id="company-facebook" name="company-facebook" placeholder="TikTok" value="{{$company->facebook}}" title="Введіть посилання на соціальну мережу">
                            <label for="company-facebook">Facebook</label>
                        </div>
                    </div>
                    <div class="col col-12 col-md-6">
                        <div class="form-floating mb-3">
                            <input type="url" class="form-control" id="company-youtube" name="company-youtube" placeholder="TikTok" value="{{$company->youTube}}" title="Введіть посилання на соціальну мережу">
                            <label for="company-youtube">YouTube</label>
                        </div>
                    </div>
                    <div class="col col-12 col-md-6">
                        <div class="form-floating mb-3">
                            <input type="url" class="form-control" id="company-tiktok" name="company-tiktok" placeholder="TikTok" value="{{$company->tikTok}}" title="Введіть посилання на соціальну мережу">
                            <label for="company-tiktok">TikTok</label>
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

    

    @include('company.includes.footer', $company)
@endsection