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
                            <p class="ps-4">На цій сторінці Ви можете додати товари, прив'язуючи їх до категорії: один товар може мати лише одну категорію. Ціни необхідно вводити через крапку (наприклад, 125.30).
                                Зверніть увагу: при редагуванні товару Ви не зможете змінити категорії та фото товару. Найкращим рішенням у цьому випадку буде видалити товар та додати новий.
                                При зміні ціни на всі товари категорії Ви можете вводити від'ємні числа для зменшення ціни.
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
        </div>
    </section>
    
    <section class="section my-5">
        <div class="container-xxl">
                        
            <form method="post" action="{{ route('changePriceOnCategory') }}" class="">
                @csrf
                <div class="row mb-3">
                    <div class="col col-12">
                        <h3 class="text-start mb-3">Змінити ціну на категорію товару</h3>
                    </div>

                    <div class="col col-12 col-md">
                        <select class="form-select p-3 mb-3" id="calculate-category" name="calculate-category">
                            <option value="" selected>Оберіть категорію</option>
                            @foreach ($company->categories as $category)
                                <option value="{{$category->categoryId}}">{{$category->categoryName}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col col-12 col-md">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="calculate-price" name="calculate-price" placeholder="Введіть різницю між сторою ціною" title="Введіть різницю між сторою ціною" value="{{ old('calculate-price') }}">
                            <label for="calculate-price">Введіть різницю між сторою ціною</label>
                        </div>
                    </div>
                    <div class="col col-12 col-md">
                        <div class="form-floating mb-3">
                            <button type="submit" class="btn btn-success w-100 p-3" title="Зберегти">Зберегти</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
    
    <section class="section my-5">
        <div class="container-xxl">
            <div class="row mb-3">
                <div class="col col-12 col-md-8">
                    <h3 class="text-start mb-3">Редагувати або видалити товари</h3>
                </div>

                <div class="col col-12 col-md-4 text-end">
                    <a class="btn btn-outline-secondary p-2 px-5" data-bs-toggle="offcanvas" href="#offcanvas" role="button" aria-controls="offcanvas">
                        <span class="fa-solid fa-list me-1"></span> Категорії ({{$company->categories->count()}})
                    </a>
                    
                    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvas" aria-labelledby="offcanvasLabel">
                        <div class="offcanvas-header">
                            <h5 class="offcanvas-title" id="offcanvasLabel">Категорії ({{$company->categories->count()}})</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                        </div>

                        <div class="offcanvas-body">
                            <div class="row">
                                @foreach ($company->categories as $category)
                                    <a class="btn @if (isset($chosenCategory) && $category->categoryName == $chosenCategory) btn-secondary @else btn-light @endif
                                        w-100 p-2 mb-3" href="{{route('items-admin', ['companyName'=>$company->companyName, 'chosenCategory'=>$category->categoryName])}}">
                                        {{$category->categoryName}} ({{$category->items->count()}})
                                    </a>
                                @endforeach

                                <div class="col-12 p-0">
                                    <a class="btn btn-light w-100 p-2 mb-3" href="{{route('items-admin', $company->companyName)}}">Всі товари</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @foreach ($items as $item)
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
                                        <textarea class="form-control" placeholder="Опис товару" id="item-descr" name="item-descr" style="min-height: 130px; max-height: 170px;" title="Опис товару">{{$item->description}}</textarea>
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