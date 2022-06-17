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
                        <select class="form-select p-3 mb-3" id="new-sale-category" name="new-sale-category" required>
                            <option selected>Оберіть категорію</option>
                            @foreach ($company->categories as $category)
                                <option value="{{$category->categoryId}}">{{$category->categoryName}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col col-12 col-md-3">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="new-sale-percent" name="new-sale-percent" placeholder="Відсоток знижки" title="Введіть відсоток знижки" required>
                            <label for="new-sale-percent">Відсоток знижки</label>
                        </div>
                    </div>

                    <div class="col col-12 col-md-3">
                        <div class="form-floating mb-3">
                            <input type="date" class="form-control" id="new-sale-date" name="new-sale-date" title="Введіть дату завершення знижки" required>
                            <label for="new-sale-date">Дата завершення</label>
                        </div>
                    </div>

                    <div class="col col-12 col-md-3">
                        <div class="form-floating mb-3">
                            <button type="submit" class="btn btn-success w-100 p-3" title="Зберегти зміну">Зберегти</button>
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


                @foreach ($company->sales as $sale)
                    <div class="row align-items-center">
                        <div class="col col-12 col-md-3">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="sale-category-{{$sale->saleId}}" placeholder="Категорія" value="{{$sale->category->categoryName}}" required>
                                <label for="sale-category-{{$sale->saleId}}">Категорія</label>
                            </div>
                        </div>

                        <div class="col col-12 col-md-3">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="sale-percent-{{$sale->saleId}}" placeholder="Відсоток знижки" value="{{$sale->percent}}" required>
                                <label for="sale-percent-{{$sale->saleId}}">Відсоток знижки</label>
                            </div>
                        </div>

                        <div class="col col-12 col-md-3">
                            <div class="form-floating mb-3">
                                <input type="date" class="form-control" id="sale-date-{{$sale->saleId}}" title="Введіть дату завершення знижки" value="{{$sale->dataEnd}}" required>
                                <label for="sale-date-{{$sale->saleId}}">Дата завершення</label>
                            </div>
                        </div>

                        <div class="col col-12 col-md-3">
                            <div class="form-floating mb-3">
                                <a href="" class="btn btn-outline-danger w-100 p-3" title="Видалити">Видалити</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </form>
        </div>
    </section>

    

    @include('company.includes.footer', $company)
@endsection