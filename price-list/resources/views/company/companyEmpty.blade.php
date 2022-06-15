@extends('layouts.layout')

@section('title', 'Щось пішло не так...')

@section('content')
    <section class="section company-list my-5" id="companies">
        <div class="container">
            <div class="alert alert-warning text-start">
                <h1>Отакої!</h1>
                <p>В нас не вийшло знайти заданої сторінки :(</p>
                <a href="javascript:history.back()" class="btn btn-secondary p-2">Повернутись назад</a>
            </div>
        </div>
    </section>
@endsection
