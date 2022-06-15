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
                            <h1>Знижки</h1>
                        </div>
                        <div class="col col-12">
                            <p class="ps-4">На цій сторінці Ви можете змінити основну інформацію про знижки.
                                Будь ласка, не забувайте зберігати дані
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
                <div class="row mb-3 align-items-center">
                    <div class="col col-12">
                        <h3 class="text-start mb-3">Додати знижку</h3>
                    </div>

                    <div class="col col-12 col-md-3">
                        <select class="form-select p-3 mb-3" id="company-new-sale-category">
                            <option selected>Оберіть категорію</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div>

                    <div class="col col-12 col-md-3">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="company-new-sale-percent"
                                placeholder="Відсоток знижки" title="Введіть відсоток знижки" required>
                            <label for="company-new-sale-percent">Відсоток знижки</label>
                        </div>
                    </div>

                    <div class="col col-12 col-md-3">
                        <div class="form-floating mb-3">
                            <input type="date" class="form-control" id="company-new-sale-date"
                                title="Введіть дату завершення знижки" required>
                            <label for="company-new-sale-date">Дата завершення</label>
                        </div>
                    </div>

                    <div class="col col-12 col-md-3">
                        <div class="form-floating mb-3">
                            <button type="submit" class="btn btn-success w-100 p-3"
                                title="Зберегти зміну">Зберегти</button>
                        </div>
                    </div>
                </div>
            </form>

            <form action="">
                <div class="row align-items-center">
                    <div class="col col-12">
                        <h3 class="text-start mb-3">Видалити знижку</h3>
                    </div>
                </div>

                <div class="row align-items-center">
                    <div class="col col-12 col-md-3">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="company-sale-category-" placeholder="Категорія"
                                value="Name of categore" required>
                            <label for="company-sale-category-">Категорія</label>
                        </div>
                    </div>

                    <div class="col col-12 col-md-3">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="company-sale-percent-"
                                placeholder="Відсоток знижки" value="25" required>
                            <label for="company-sale-percent-">Відсоток знижки</label>
                        </div>
                    </div>

                    <div class="col col-12 col-md-3">
                        <div class="form-floating mb-3">
                            <input type="date" class="form-control" id="company-sale-date-"
                                title="Введіть дату завершення знижки" value="2022-06-25" required>
                            <label for="company-sale-date-">Дата завершення</label>
                        </div>
                    </div>

                    <div class="col col-12 col-md-3">
                        <div class="form-floating mb-3">
                            <a href="" class="btn btn-outline-danger w-100 p-3" title="Видалити">Видалити</a>
                        </div>
                    </div>
                </div>

            </form>

        </div>
    </section>

    

    @include('company.includes.footer', $company)
@endsection