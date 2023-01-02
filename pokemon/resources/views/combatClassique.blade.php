@extends('pageEnConstruction')

@section('css')
@endsection

@section('construction')
    <p>Le combat classique en tour par tour</p>
    <button onclick="jouer(Action.attaque)">attaque</button>
    <button onclick="jouer(Action.attaqueSpe)">attaque spé</button>
    <br>
    <button onclick="jouer(Action.defenseSpe)">defense spé</button>
    <button onclick="jouer(Action.fuite)">fuite</button>
@endsection

@section('javascript')
    <script type="text/javascript">
        let joueurs = {!! $joueurs !!};
        let pokemons = {!! $pokemons !!};
        let pokemonActuelIndex = [1,2];
    </script>
    <script type="text/javascript" src="{{ asset('js/systemeCombatGeneral.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/systemeCombatClassique.js') }}"></script>
    
@endsection

@section('navbarActiveIndex')
    3
@endsection
