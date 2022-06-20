@extends('layouts.layout')

@section('title', 'Price-list')

@section('content')

    {{-- Підключення заголовку --}}
    @include('includes.main-header')

    <div class="intro">
        <div class="container-xxl">
            <div class="row">
                <div class="col-12 col-md-10 mb-4">
                    <h1>Розробіть прейскурант для свого бізнесу за лічені хвилини</h1>
                </div>
                <div class="col-12 col-md-9 mb-4 mb-md-5">
                    <p class="ps-4">Вітаємо Вас на сервісі створення прайс-листів <strong>My Price-List</strong>. 
                        Якщо Ви власник невеликого інтернет-магазину та приймаєте замовлення переважно через соціальні 
                        мережі та месенджери, або більшість замовлень виконуєте індивідуально тоді Ви потрапили у правильне 
                        місце. Даний сервіс дозволить Вашим клієнтам отримувати актуальну інформацію про наявність та ціни на товари. 
                        Дізнатись про всі етапи створення своєї сторінки можна <a href="{{ route('help') }}">тут</a>.</p>
                </div>
            </div>
            <div class="row buttons justify-content-center justify-content-sm-start">

                
                @guest
                    <div class="col-10 col-sm-7 col-md-4 col-xl-3 my-2 my-md-0">
                        <a href="{{ route('login') }}" class="btn-intro-yellow p-3"> Увійти </a>
                    </div>
                    <div class="col-10 col-sm-7 col-md-4 col-xl-3 my-2 my-md-0">
                        <a href="{{ route('register') }}" class="btn-intro-pink p-3"> Зареєструватись </a>
                    </div>
                @endguest

                @auth
                    <div class="col-10 col-sm-7 col-md-4 col-xl-3 my-2 my-md-0">
                        <a href=" {{route('getAdminPage', session('authUser'))}} " class="btn-intro-yellow p-3"> Панель адміністрування </a>
                    </div>
                    <div class="col-10 col-sm-7 col-md-4 col-xl-3 my-2 my-md-0">
                        <a href=" {{route('logout')}} " class="btn-intro-pink p-3"> Вийти </a>
                    </div>
                @endauth
                
            </div>
        </div>
    </div>

    @if (isset($companiesData) && $companiesData->count() > 0)
    <section class="section company-list my-5" id="companies">
        <div class="container-xxl">
            <h2 class="mb-5 px-4">Створені прайс-листи</h2>

            <div id="carouselExampleControls" class="carousel carousel-dark slide" data-bs-ride="carousel">
                <div class="carousel-inner">

                    {{-- Вивід даних компанії --}}
                    @for ($i = 0; $i < $companiesData->count(); $i++)
                        @if ($i == 0)
                        <div class="carousel-item active">
                        @else
                        <div class="carousel-item">
                        @endif
                            <div class="row justify-content-center">
                                <div class="col-8 col-md-3">
                                    <a class="card m-2" href ="{{route('company', $companiesData[$i]->companyName)}}">
                                        <div class="row justify-content-center">
                                            <div class="col-8 col-sm-12">
                                                <div class="ratio ratio-1x1">
                                                    @if ($companiesData[$i]->logo != NULL)
                                                        <div class="card-logo"  style="background-image: URL('{{asset('storage/images/'.$companiesData[$i]->companyName.'/'.$companiesData[$i]->logo)}}')"></div>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="card-body">
                                                    <h4 class="card-title">{{$companiesData[$i]->companyName}}</h4>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
    
                            </div>
                        </div>
                    @endfor
                </div>

                <button class="carousel-control-prev" type="button"
                    data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                    <i class="fa-solid fa-circle-arrow-left"></i>
                </button>
                <button class="carousel-control-next" type="button"
                    data-bs-target="#carouselExampleControls" data-bs-slide="next">
                    <i class="fa-solid fa-circle-arrow-right"></i>
                </button>
            </div>
        </div>
    </section>
    @endif

    <section class="section my-5" id="feedback-form">
        <div class="container-xxl">
            <h2 class="mb-5 px-4">Зв’яжіться з нами</h2>
            <div class="row justify-content-center">
                <div class="col-12 col-sm-8 col-md-5">

                    @include('includes.message')
                    <form method="post" action="{{ route('feedback-submit') }}" class="form mb-4">
                        @csrf
                        <!-- Обробка форми -->
                        <div class="row">
                            <div class="col-12 mb-3">
                                <input class="p-2" type="text" placeholder="Ваше ім'я" id="name" name="name" value="{{ old('name') }}">
                            </div>
                            <div class="col-12 mb-3">
                                <input class="p-2" type="text" placeholder="Електронна адреса" id="email" name="email" value="{{ old('email') }}">
                            </div>
                            <div class="col-12 mb-4">
                                <textarea class="p-2" placeholder="Ваше повідомлення..." id="message" name="message">{{ old('message') }}</textarea>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="p-3">Надіслати</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </section>

    <footer class="footer mt-5 pb-4">
        <div class="container-xxl">
            <div class="row justify-content-center">
                <div class="col-12 col-md-6">
                    <img src="images/logo.svg" alt="logo" class="logo">
                </div>
            </div>

            <div class="row justify-content-center align-items-center  nav mb-4">
                <div class="col col-12 col-md-3 text-center mb-1 mb-md-0">
                    <a href="{{ route('help') }}">Правила користування</a>
                </div>
                <div class="col col-12 col-md-3 text-center mb-1 mb-md-0">
                    <a href="{{ route('login') }}">Вхід до системи</a>
                </div>
                <div class="col col-12 col-md-3 text-center mb-1 mb-md-0">
                    <a href="{{ route('register') }}">Реєстрація</a>
                </div>
            </div>
            <p>© 2022 Всі права захищені.</p>
        </div>
    </footer>

@endsection
