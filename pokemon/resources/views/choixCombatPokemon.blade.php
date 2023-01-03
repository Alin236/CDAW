@extends('template')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/choixPokemon.css') }}"/>
@endsection

@section('content')
    <div id="authentifier">
        <h2>Authentifier le 2e joueur</h2>
        <div>
            <meta name="csrf-token" content="{{ csrf_token() }}">
            <label>Email : <input type="text" name="email"></label>
            <br>
            <label>Mot de passe : <input type="text" name="password"></label>
            <br>
            <button type="button" class="btn btn-primary" onclick="authenticate()">Se connecter</button>
        </div>
    </div>
    <div id="choix" hidden>
        <div class="card-deck">
            <div class="card">
                <div class="card-body">

                </div>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
    <script type="text/javascript" src="{{ asset('js/choixPokemon.js') }}"></script>
@endsection

@section('navbarActiveIndex')
    3
@endsection
