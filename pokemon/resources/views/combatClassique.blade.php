@extends('pageEnConstruction')

@section('css')
@endsection

@section('construction')
    <p>Le combat classique en tour par tour</p>
@endsection

@section('javascript')
    <script type="text/javascript">
        let joueurs = {!! $joueurs !!};
        let pokemons = {!! $pokemons !!};
        let pokemonActuelIndex = [1,2];
    </script>
    <script type="text/javascript" src="{{ asset('js/systemeCombat.js') }}"></script>
    
@endsection

@section('navbarActiveIndex')
    3
@endsection
