@extends('template')

@section('content')
    <p>Navigation :</p>
    <p><a href="{{ route('accueil') }}">Accueil</a></p>
    <p><a href="{{ route('pokedex') }}">Pokedex</a></p>
    <p><a>Historique</a></p>
    <p><a>Lancer un combat</a></p>
    <p>
        @auth
            <a href="{{ route('profile.edit') }}">Mon profil</a>
        @else
            <a href="{{ route('login') }}">Se connecter</a>
        @endauth
    </p>
@endsection