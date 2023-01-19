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
            <label>Mot de passe : <input type="password" name="password"></label>
            <br>
            <button type="button" class="btn btn-primary" onclick="authenticate()">Se connecter</button>
            <p class="text-danger"></p>
        </div>
    </div>
    <div id="choix">
        <h2>Joueur <span></span> choisi son pokémon n°<span></span></h2>
        <div class="card-columns">
        </div>
    </div>
    <form id="form" hidden action="" method="post">
        @csrf
        <div id="formInput">
            <input type="text" name="joueur1">
            <input type="text" name="joueur2">
            <input type="text" name="pokemon11">
            <input type="text" name="pokemon12">
            <input type="text" name="pokemon13">
            <input type="text" name="pokemon21">
            <input type="text" name="pokemon22">
            <input type="text" name="pokemon23">
            <input type="text" name="firstJoueur">
            <input type="text" name="battleType" value="{{ $battleType->id }}">
        </div>
    </form>
@endsection

@section('javascript')
    <script type="text/javascript" src="{{ asset('js/choixPokemon.js') }}"></script>
@endsection

@section('navbarActiveIndex')
    3
@endsection
