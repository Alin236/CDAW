@extends('template')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/menuCombat.css') }}">
@endsection

@section('content')
<div class="row row-cols-1 row-cols-md-2 g-4">
    <a class="col" href="">
        <div class="card h-100">
            <h3 class="card-header text-center">Combat classique</h3>
            <div class="card-body">
                <h4 class="text-center text-warning">Mode de jeu à venir</h4>
                <h5 class="card-title">Règle</h5>
                <ul>
                    <li>3 pokémons vs 3 pokémons</li>
                    <li>Pokémons choisi</li>
                    <li>Ordre choisi par le dresseur</li>
                    <li>Tours jouer par le dresseur</li>
                    <ul><li>Durée d'un tour : 30s</li><ul>
                </ul>
            </div>
        </div>
    </a>
    <a class="col" href="">
        <div class="card h-100">
            <h3 class="card-header text-center">Combat semi-automatique</h3>
            <div class="card-body">
                <h4 class="text-center text-warning">Mode de jeu à venir</h4>
                <h5 class="card-title">Règle</h5>
                <ul>
                    <li>3 pokémons vs 3 pokémons</li>
                    <li>Pokémons aléatoire</li>
                    <li>Ordre choisi par le dresseur</li>
                    <li>Tours jouer par le dresseur</li>
                </ul>
            </div>
        </div>
    </a>
    <a class="col" href="">
        <div class="card h-100">
            <h3 class="card-header text-center">Combat automatique</h3>
            <div class="card-body">
                <h4 class="text-center text-warning">Mode de jeu à venir</h4>
                <h5 class="card-title">Règle</h5>
                <ul>
                    <li>3 pokémons vs 3 pokémons</li>
                    <li>Pokémons aléatoire</li>
                    <li>Ordre aléatoire</li>
                    <li>Tours automatique</li>
                </ul>
            </div>
        </div>
    </a>
</div>
@endsection

@section('javascript')
    <script type="text/javascript">
        function modeAVenir(){
            alert('Mode de jeu indisponible');
            return false;
        }

        $('a.col').attr('onclick', 'return modeAVenir()');
    </script>
@endsection

@section('navbarActiveIndex')
    3
@endsection
