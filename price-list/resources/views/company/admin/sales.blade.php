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

            @include('includes.message')
            
            <form method="post" action="{{ route('addSale') }}" class="">
                @csrf

                <div class="row mb-3 align-items-center">
                    <div class="col col-12">
                        <h3 class="text-start mb-3">Додати знижку</h3>
                    </div>

                    <div class="col col-12 col-md-4">
                        <select class="form-select p-3 mb-3" id="categoryId" name="categoryId">
                            <option value="" selected>Оберіть категорію</option>
                            @foreach ($company->categories as $category)
                                <option value="{{$category->categoryId}}">{{$category->categoryName}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col col-12 col-md-4">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="new-sale-percent" name="new-sale-percent" placeholder="Відсоток знижки" title="Введіть відсоток знижки" value="{{old('new-sale-percent')}}">
                            <label for="new-sale-percent">Відсоток знижки</label>
                        </div>
                    </div>

                    <div class="col col-12 col-md-4">
                        <div class="form-floating mb-3">
                            <button type="submit" class="btn btn-success w-100 p-3" title="Зберегти зміну">Зберегти</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
        
    <section class="section my-5">
        <div class="container-xxl">
            <div class="row align-items-center">
                <div class="col col-12">
                    <h3 class="text-start mb-3">Видалити знижку</h3>
                </div>
            </div>

            @foreach ($company->sales as $sale)
                <form action="">
                    <div class="row align-items-center">
                        <div class="col col-12 col-md-3">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="sale-category" name="sale-category" placeholder="Категорія" value="{{$sale->category->categoryName}}">
                                <label for="sale-category">Категорія</label>
                            </div>
                        </div>

                        <div class="col col-12 col-md-3">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="sale-percent" name="sale-percent" placeholder="Відсоток знижки" value="{{$sale->percent}}">
                                <label for="sale-percent">Відсоток знижки</label>
                            </div>
                        </div>

                        <div class="col col-12 col-md-3">
                            <div class="form-floating mb-3">
                                <a href="{{ route('deleteSale', $sale->saleId) }}" class="btn btn-outline-danger w-100 p-3" title="Видалити">Видалити</a>
                            </div>
                        </div>
                    </div>
                </form>
            @endforeach
        </div>
    </section>

    
@endsection