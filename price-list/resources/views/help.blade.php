@extends('layouts.layout')

@section('title', 'Правила користування')

@section('content')

    {{-- Підключення заголовку --}}
    @include('includes.main-header')

    <div class="new-intro">
        <div class="container-xxl mt-5">
            <div class="row justify-content-between align-items-center mb-5">
                <div class="col col-12 col-sm-3 mb-2 mb-sm-0">
                    <div class="ratio ratio-1x1">
                        <img src="/images/company-logo.png" alt="">
                    </div>
                </div>
                <div class="col col-12 col-sm-8">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec eros
                    enim, scelerisque non augue a, euismod porta massa. Praesent vestibulum commodo pharetra. Ut
                    ultricies, diam vitae maximus pretium, arcu nulla dapibus leo, in facilisis mi velit at urna. Donec
                    sagittis ultrices leo eget posuere. Pellentesque suscipit est vel dolor vehicula volutpat. Praesent
                    vestibulum commodo pharetra. Ut ultricies, diam vitae maximus pretium, arcu nulla dapibus leo, in
                    facilisis mi velit at urna. </div>
        
            </div>
            <div class="row justify-content-between align-items-center mb-5">
                <div class="col col-12 col-sm-3 mb-2 mb-sm-0 order-sm-last"><img src="/images/company-logo.png" alt="">
                </div>
                <div class="col col-12 col-sm-8 order-sm-first">Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                    Donec eros
                    enim, scelerisque non augue a, euismod porta massa. Praesent vestibulum commodo pharetra. Ut
                    ultricies, diam vitae maximus pretium, arcu nulla dapibus leo, in facilisis mi velit at urna. Donec
                    sagittis ultrices leo eget posuere. Pellentesque suscipit est vel dolor vehicula volutpat. Praesent
                    vestibulum commodo pharetra. Ut ultricies, diam vitae maximus pretium, arcu nulla dapibus leo, in
                    facilisis mi velit at urna. </div>
            </div>
        </div>
    </div>

@endsection 