@extends('template')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/menuCombat.css') }}">
@endsection

@section('content')
    <div class="card-deck">
        <div class="card">
            <a href="{{ route('initialise combat classique') }}">
                <h3 class="card-header text-center">Combat classique</h3>
                <div class="card-body">
                    <h5 class="card-title">Règle</h5>
                    <ul>
                        <li>3 pokémons vs 3 pokémons</li>
                        <li>Pokémons choisi</li>
                        <li>Ordre choisi par le dresseur</li>
                        <li>Tours jouer par le dresseur</li>
                    </ul>
                </div>
            </a>
        </div>
        <div class="card">
            <a href="{{ route('initialise combat semi-automatique') }}">
                <h3 class="card-header text-center">Combat semi-automatique</h3>
                <div class="card-body">
                    <h5 class="card-title">Règle</h5>
                    <ul>
                        <li>3 pokémons vs 3 pokémons</li>
                        <li>Pokémons aléatoire</li>
                        <li>Ordre choisi par le dresseur</li>
                        <li>Tours jouer par le dresseur</li>
                    </ul>
                </div>
            </a>
        </div>
        <div class="card">
            <a href="{{ route('initialise combat automatique') }}">
                <h3 class="card-header text-center">Combat automatique</h3>
                <div class="card-body">
                    <h5 class="card-title">Règle</h5>
                    <ul>
                        <li>3 pokémons vs 3 pokémons</li>
                        <li>Pokémons aléatoire</li>
                        <li>Ordre aléatoire</li>
                        <li>Tours automatique</li>
                    </ul>
                </div>
            </a>
        </div>
    </div>
@endsection

@section('navbarActiveIndex')
    3
@endsection
