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
                            <p class="ps-4">
                                На цій сторінці Ви можете змінити інформацію про категорії товарів та додати нові.
                                Зверніть увагу: при видаленні категорії Ви видаляєте всі товари, що в ній знаходяться.
                                Будь ласка, не забувайте зберігати дані форми!
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <section class="section my-5">
        <div class="container-xxl">
            
            @include('includes.message')

            <form method="post" action="{{ route('addCategory') }}" class="">
                @csrf

                <input type="text" class="form-control" hidden id="company-id" name="company-id" value="{{$company->companyId}}">

                <div class="row mb-3 align-items-center">
                    <div class="col col-12">
                        <h3 class="text-start mb-3">Створити нову категорію</h3>
                    </div>

                    <div class="col col-12 col-md-6">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="new-category" name="new-category" placeholder="Назва категорії" title="Введіть назву категорії" value="{{ old('new-category') }}">
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
        </div>
    </section>
        
    <section class="section my-5">
        <div class="container-xxl">    
            <div class="row align-items-center">
                <div class="col col-12">
                    <h3 class="text-start mb-3">Редагувати існуючі категорії</h3>
                </div>
            </div>
            
            @foreach ($company->categories as $category)
                <form method="post" action="{{ route('updateCategory', $category->categoryId) }}">
                    @csrf
                    <div class="row align-items-center mb-3 mb-md-0">
                        {{-- <input type="text" class="form-control" id="category-id" name="category-id" placeholder="Назва категорії" value="{{$category->categoryId}}" hidden> --}}
                        
                        <div class="col col-12 col-md-4">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="category-name" name="category-name" placeholder="Назва категорії" value="{{$category->categoryName}}" required>
                                <label for="category-name">Назва категорії</label>
                            </div>
                        </div>
                        <div class="col col-12 col-md-4">
                            <div class="form-floating mb-3">
                                <button type="submit" class="btn btn-outline-success w-100 p-3" title="Зберегти">Зберегти</button>
                            </div>
                        </div>
                        <div class="col col-12 col-md-4">
                            <div class="form-floating mb-3">
                                <a href="{{ route('deleteCategory', $category->categoryId) }}" class="btn btn-outline-danger w-100 p-3" title="Видалити">Видалити</a>
                            </div>
                        </div>
                    </div>
                </form>
            @endforeach
        </div>
    </section>

    
@endsection