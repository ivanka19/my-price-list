@extends('layouts.layout')

@section('title')
    {{$company->companyName}} -- Прайс-лист
@endsection

@section('content')
    <style>
        *::selection {
            background: rgb(184, 184, 184);
        }
    </style>

    @include('company.includes.header', $company)

    <div class="intro company-intro mt-5 d-print-none">
        <div class="container-xxl">
            <div class="row justify-content-between align-items-center">
                <div class="col col-12 col-md-9">
                    <div class="row">
                        <div class="col col-12 mb-4">
                            <h1>{{$company->companyName}} - {{$company->shortDescr}}</h1>
                        </div>
                        <div class="col col-12">
                            <p class="ps-4">{{$company->companyDescription}}</p>
                        </div>
                    </div>
                </div>

                <div class="col col-12 col-md-1 mt-3 mt-md-0">
                    <div class="row justify-content-center">

                        @if ($company->instagram)
                            <div class="col col-2 col-md-12 mb-md-3">
                                <a href="{{$company->instagram}}" class="company-social text-center" target="_blank">
                                    <span class="fa-brands fa-instagram-square"></span>
                                </a>
                            </div>
                        @endif
                        @if ($company->facebook)
                            <div class="col col-2 col-md-12 mb-md-3">
                                <a href="{{$company->facebook}}" class="company-social text-center" target="_blank">
                                    <span class="fa-brands fa-facebook-square"></span>
                                </a>
                            </div>
                        @endif
                        @if ($company->youTube)
                            <div class="col col-2 col-md-12 mb-md-3">
                                <a href="{{$company->youTube}}" class="company-social text-center" target="_blank">
                                    <span class="fa-brands fa-youtube"></span>
                                </a>
                            </div>
                        @endif
                        @if ($company->tikTok)
                            <div class="col col-2 col-md-12 mb-md-3">
                                <a href="{{$company->tikTok}}" class="company-social text-center" target="_blank">
                                    <span class="fa-brands fa-tiktok"></span>
                                </a>
                            </div>
                        @endif

                        <div class="col col-2 col-md-12">
                            <a href="mailto:{{$company->email}}" class="company-social text-center" target="_blank">
                                <span class="fa-solid fa-envelope"></span>
                            </a>
                        </div>
                        
                    </div>

                </div>
            </div>
        </div>
    </div>

    <section class="section my-5">
        <div class="container-xxl">
            <div class="row">
                <div class="col col-12 col-md-3 col-lg-2 d-print-none">
                    <nav class="navbar navbar-expand-md">
                        <div class="container-fluid">
                            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                                <span class="navbar-toggler-icon"></span> Категорії ({{$company->categories->count()}})
                            </button>

                            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                                <div class="offcanvas-header">
                                    <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Категорії ({{$company->categories->count()}})</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                                </div>

                                <div class="offcanvas-body">
                                    <div class="row">
                                        @if (isset($chosenCategory))
                                            @foreach ($company->categories as $category)
                                                @if ($category->categoryName == $chosenCategory)
                                                    <a class="btn btn-secondary w-100 p-2 mb-3" href="{{route('companyWithCategory',  ['companyName'=>$company->companyName, 'chosenCategory'=>$category->categoryName])}}">{{$category->categoryName}}</a>
                                                @else
                                                    <a class="btn btn-light w-100 p-2 mb-3" href="{{route('companyWithCategory',  ['companyName'=>$company->companyName, 'chosenCategory'=>$category->categoryName])}}">{{$category->categoryName}}</a>
                                                @endif
                                            @endforeach
                                        @else
                                            @foreach ($company->categories as $category)
                                                <a class="btn btn-light w-100 p-2 mb-3" href="{{route('companyWithCategory', ['companyName'=>$company->companyName, 'chosenCategory'=>$category->categoryName])}}">{{$category->categoryName}}</a>
                                            @endforeach
                                        @endif
                                        <div class="col-12 p-0">
                                            <a class="btn btn-light w-100 p-2 mb-3" href="{{route('company', $company->companyName)}}">Всі товари</a>
                                        </div>
                                        <div class="col-12 p-0">
                                            <a class="btn btn-light w-100 p-2 mb-3" href=" ">В наявності</a>
                                        </div>
                                        <div class="col-12 p-0">
                                            <a class="btn  btn-outline-secondary w-100 p-2 mb-3" href="" onclick="window.print();return false;">Роздрукувати</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </nav>
                </div>
                
                <div class="col col-12 col-md-9 col-lg-10">
                    <div class="row justify-content-center justify-content-sm-start" style="min-height: 300px;">
                        @if (isset($chosenCategory))
                            <h3 class="text-start d-none d-print-block">{{$chosenCategory}}</h3>
                            @foreach ($company->itemsFromCategory($chosenCategory) as $item)
                                @include('company.includes.item', compact('company', 'item'))
                            @endforeach
                        @else
                            @foreach ($company->items as $item)
                                @include('company.includes.item', compact('company', 'item'))
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('company.includes.footer', $company)
@endsection