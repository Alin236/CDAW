@extends('template')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/accueil.css') }}"/>
@endsection

@section('content')
    <h1 class="text-center">Les news :</h1>
    <div id="carousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li class="active"></li>
            <li></li>
            <li></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <a href="https://scarletviolet.pokemon.com">
                    <img class="d-block w-100" src="{{ asset('img/pokemon_SV.png') }}">
                </a>
            </div>
            <div class="carousel-item">
                <a href="https://www.pokeclicker.com">
                    <img class="d-block w-100" src="{{ asset('img/pokeclickerlogo.png') }}">
                </a>
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="{{ asset('img/pokemon_pub.png') }}">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carousel" data-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </a>
        <a class="carousel-control-next" href="#carousel" data-slide="next">
            <span class="carousel-control-next-icon"></span>
        </a>
    </div>
@endsection

@section('navbarActiveIndex')
    1
@endsection
