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
                            <h1>Товари</h1>
                        </div>
                        <div class="col col-12">
                            <p class="ps-4">На цій сторінці Ви можете додати товари, прив'язуючи їх до категорії: один товар може мати лише одну категорію. 
                                Також, зверніть увагу: при редагуванні товару Ви не зможете змінити категорії та фото товару. Найкращим рішенням у цьому випадку буде видалити товар та додати новий.
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
            
            <form method="post" action="{{ route('addItem') }}" class="" enctype="multipart/form-data">
                @csrf
                
                <div class="row mb-3">
                    <div class="col col-12">
                        <h3 class="text-start mb-3">Додати новий товар</h3>
                    </div>

                    <div class="col col-12 col-md-6">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="new-item-name" name="new-item-name" placeholder="Назва товару" title="Введіть назву нового товару" value="{{ old('new-item-name') }}">
                            <label for="new-item-name">Назва товару</label>
                        </div>

                        <select class="form-select p-3 mb-3" id="new-item-category" name="new-item-category">
                            <option value="" selected>Оберіть категорію</option>
                            @foreach ($company->categories as $category)
                                <option value="{{$category->categoryId}}">{{$category->categoryName}}</option>
                            @endforeach
                        </select>

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="new-item-price" name="new-item-price" placeholder="Ціна товару" title="Введіть ціну" value="{{ old('new-item-price') }}">
                            <label for="new-item-price">Ціна товару</label>
                        </div>
                    </div>

                    <div class="col col-12 col-md-6">
                        <div class="mb-3 text-start">
                            <input class="form-control" type="file" id="new-item-file" name="new-item-file" title="Завантажте зображення нового логотипу">
                            <label for="new-item-file" class="form-label">Завантажте зображення товару</label>
                        </div>

                        <div class="form-floating">
                            <textarea class="form-control" placeholder="Опис товару" id="new-item-descr" name="new-item-descr" style="min-height: 120px; max-height: 200px;" title="Опис товару">{{ old('new-item-descr') }}</textarea>
                            <label for="new-item-descr">Опис товару</label>
                        </div>
                    </div>
                </div>

                <div class="row mb-3 align-items-center justify-content-center">
                    <div class="col col-12 col-md-4">
                        <div class="form-floating mb-3">
                            <button type="submit" class="btn btn-success w-100 p-3" title="Зберегти">Зберегти</button>
                        </div>
                    </div>
                </div>
            </form>

            <div class="row mb-3">
                <div class="col col-12">
                    <h3 class="text-start mb-3">Редагувати або видалити товари</h3>
                </div>
            </div>

            @foreach ($company->items as $item)
                <form method="post" action="{{ route('updateItem', $item->itemId) }}">
                    @csrf

                    <div class="row mb-3">
                        <div class="col col-12 col-md-3">
                            <div class="company-product-img ratio ratio-1x1" style="background-image: URL('{{asset('storage/images/'.$item->category->company->companyName.'/'.$item->itemPhoto)}}')"> </div>
                        </div>

                        <div class="col col-12 col-md-9">
                            <div class="row">
                                <div class="col col-12 col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="item-name" name="item-name" placeholder="Назва товару" title="Назва товару" value="{{$item->itemName}}">
                                        <label for="item-name">Назва товару</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="item-category" name="item-category" placeholder="Категорія" readonly value="{{$item->category->categoryName}}">
                                        <label for="item-category">Категорія</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="item-price" name="item-price" placeholder="Ціна товару" title="Введіть ціну" value="{{$item->price}}">
                                        <label for="item-price">Ціна товару</label>
                                    </div>
                                </div>
                                <div class="col col-12 col-md-6">
                                    <div class="form-floating mb-3">
                                        <textarea class="form-control" placeholder="Опис товару" id="item-descr" name="item-descr" style="min-height: 130px; max-height: 200px;" title="Опис товару">{{$item->description}}</textarea>
                                        <label for="item-descr">Опис товару</label>
                                    </div>
                                    <div class="form-check text-start">
                                        <input class="form-check-input" type="checkbox" id="avaible" name="avaible" value="{{$item->available}}">
                                        <label class="form-check-label" for="avaible">
                                            В наявності
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row justify-content-center">
                                <div class="col col-12 col-md-4">
                                    <div class="form-floating">
                                        <button type="submit" class="btn btn-outline-success w-100 p-3" title="Зберегти">Зберегти</button>
                                    </div>
                                </div>
                                <div class="col col-12 col-md-4">
                                    <div class="form-floating">
                                        <a href="{{ route('deleteItem', $item->itemId) }}" class="btn btn-outline-danger w-100 p-3" title="Видалити">Видалити</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            @endforeach
        </div>
    </section>
    
@endsection