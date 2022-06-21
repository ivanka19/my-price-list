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
                            <h1>Категорії</h1>
                        </div>
                        <div class="col col-12">
                            <p class="ps-4">На цій сторінці Ви можете змінити основну інформацію про категорії товарів.
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

            <form method="post" action="{{ route('addCategory') }}" class="">
                @csrf
                @include('includes.message')

                <input type="text" class="form-control" hidden id="id" name="id" value="{{$company->companyId}}">

                <div class="row mb-3 align-items-center">
                    <div class="col col-12">
                        <h3 class="text-start mb-3">Створити нову категорію</h3>
                    </div>

                    <div class="col col-12 col-md-6">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="new-category" name="new-category" placeholder="Назва категорії" title="Введіть назву категорії">
                            <label for="new-category">Назва категорії</label>
                        </div>
                    </div>

                    <div class="col col-12 col-md-6">
                        <div class="form-floating mb-3">
                            <button type="submit" class="btn btn-success w-100 p-3" title="Зберегти зміну">Додати</button>
                        </div>
                    </div>
                </div>
            </form>

            <form action="">
                @csrf
                
                <div class="row align-items-center">
                    <div class="col col-12">
                        <h3 class="text-start mb-3">Редагувати існуючі категорії</h3>
                    </div>
                </div>

                @foreach ($company->categories as $category)
                    <div class="row align-items-center mb-3 mb-md-0">
                        <div class="col col-12 col-md-4">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="company-category-{{$category->categoryId}}" name="company-category-{{$category->categoryId}}" placeholder="Назва категорії" value="{{$category->categoryName}}" required>
                                <label for="company-category-{{$category->categoryId}}">Назва категорії</label>
                            </div>
                        </div>

                        <div class="col col-12 col-md-4">
                            <div class="form-floating mb-3">
                                <a href="" class="btn btn-outline-success w-100 p-3" title="Зберегти">Зберегти</a>
                            </div>
                        </div>
                        <div class="col col-12 col-md-4">
                            <div class="form-floating mb-3">
                                <a href="" class="btn btn-outline-danger w-100 p-3" title="Видалити">Видалити</a>
                            </div>
                        </div>
                    </div>
                @endforeach


            </form>

        </div>
    </section>

    
@endsection