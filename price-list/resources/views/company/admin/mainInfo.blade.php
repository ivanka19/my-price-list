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

                <div class="row mb-3">
                    <div class="col col-12">
                        <h3 class="text-start mb-3">Інформація про користувача</h3>
                    </div>

                    <div class="col col-12 col-md-6">
                        <!-- Назва компанії -->
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="company-name" readonly
                                placeholder="Назва компанії" title="Назва Вашого магазину">
                            <label for="company-name">Назва компанії</label>
                        </div>
                    </div>

                    <div class="col col-12 col-md-6">
                        <!-- Електронна адреса -->
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" id="company-email" readonly
                                placeholder="Електронна адреса" title="Електронна адреса">
                            <label for="company-email">Електронна адреса</label>
                        </div>
                    </div>

                    <div class="col col-12 col-md-6">
                        <!-- Ім'я продавця -->
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="company-user" placeholder="Ім'я продавця"
                                title="Ім'я продавця">
                            <label for="company-user">Ім'я продавця</label>
                        </div>
                    </div>

                    <div class="col col-12 col-md-6">
                        <!-- Місто розташування -->
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="company-city" placeholder="Місто розташування"
                                title="Місто розташування">
                            <label for="company-city">Місто розташування</label>
                        </div>
                    </div>

                    <div class="col col-12 col-md-6">
                        <!-- Номер телефону -->
                        <div class="form-floating mb-3">
                            <input type="tel" class="form-control" id="company-tel" placeholder="Номер телефону"
                                title="Номер телефону">
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
                            <input class="form-control" type="file" id="company-logo-file"
                                title="Завантажте зображення нового логотипу">
                            <label for="company-logo-file" class="form-label">Завантажте зображення нового
                                логотипу</label>
                        </div>

                        <div class="mb-3 text-start">
                            <input type="color" class="form-control form-control-color w-100" id="company-color"
                                value="#563d7c" title="Оберіть основний колір">
                            <label for="company-color" class="form-label">Оберіть основний колір</label>
                        </div>

                    </div>
                    <div class="col col-12 col-md-8">
                        <div class="form-floating mb-3">
                            <input type="url" class="form-control" id="company-shortDescr" placeholder="Короткий опис"
                                title="Короткий опис магазину. Буде відображений разом з назвою">
                            <label for="company-shortDescr">Короткий опис</label>
                        </div>
                        <div class="form-floating">
                            <textarea class="form-control" placeholder="Опис компанії" id="company-descr"
                                style="min-height: 150px; max-height: 300px;"
                                title="Розгорнутий опис магазину"></textarea>
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
                            <input type="url" class="form-control" id="company-instagram" placeholder="TikTok"
                                value="https://www.instagram.com/" title="Введіть посилання на соціальну мережу">
                            <label for="company-instagram">Instagram</label>
                        </div>
                    </div>
                    <div class="col col-12 col-md-6">
                        <div class="form-floating mb-3">
                            <input type="url" class="form-control" id="company-facebook" placeholder="TikTok" value=""
                                title="Введіть посилання на соціальну мережу">
                            <label for="company-facebook">Facebook</label>
                        </div>
                    </div>
                    <div class="col col-12 col-md-6">
                        <div class="form-floating mb-3">
                            <input type="url" class="form-control" id="company-youtube" placeholder="TikTok" value=""
                                title="Введіть посилання на соціальну мережу">
                            <label for="company-youtube">YouTube</label>
                        </div>
                    </div>
                    <div class="col col-12 col-md-6">
                        <div class="form-floating mb-3">
                            <input type="url" class="form-control" id="company-tiktok" placeholder="TikTok" value=""
                                title="Введіть посилання на соціальну мережу">
                            <label for="company-tiktok">TikTok</label>
                        </div>
                    </div>
                </div>

                <div class="row justify-content-center">
                    <div class="col col-10 col-md-3 mb-3">
                        <button type="submit" class="btn btn-success w-100 p-3" title="Зберегти зміну">Зберегти</button>
                    </div>
                    <div class="col col-10 col-md-3 mb-3">
                        <button type="reset" class="btn btn-secondary w-100 p-3"
                            title="Відмінити зміни">Скинути</button>
                    </div>
                </div>
            </form>
        </div>
    </section>

    

    @include('company.includes.footer', $company)
@endsection