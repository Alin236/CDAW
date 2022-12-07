@extends('template')

@section('content')
    <div id="carousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li class="active"></li>
            <li></li>
            <li></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="{{ asset('img/img.png') }}">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="{{ asset('img/pokemon_SV.png') }}">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="{{ asset('img/img.png') }}">
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
