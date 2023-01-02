@extends('template')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/combat.css') }}"/>
@endsection

@section('content')
    <h1>Tour du joueur <span>X</span></h1>
    <div class="card-deck">
        <div class="card border-primary">
            <h5 class="card-header text-center border-primary"></h5>
            <div class="card-body">
                <ul>
                    <li>PV : <span></span></li>
                    <li>Defense : <span></span></li>
                </ul>
                <hr class="hr border-primary" />
                <img src="">
                <hr class="hr border-primary" />
                <ul>
                    <li>Attaque : <span></span></li>
                    <li>Attaque spé : <span></span></li>
                    <li>Defense spé : <span></span></li>
                </ul>
            </div>
        </div>
        <div class="card border-primary">
            <h5 class="card-header text-center border-primary"></h5>
            <div class="card-body">
                <ul>
                    <li>PV : <span></span></li>
                    <li>Defense : <span></span></li>
                </ul>
                <hr class="hr border-primary" />
                <img src="">
                <hr class="hr border-primary" />
                <ul>
                    <li>Attaque : <span></span></li>
                    <li>Attaque spé : <span></span></li>
                    <li>Defense spé : <span></span></li>
                </ul>
            </div>
        </div>
        <div class="card border-primary">
            <h5 class="card-header text-center border-primary"></h5>
            <div class="card-body">
                <ul>
                    <li>PV : <span></span></li>
                    <li>Defense : <span></span></li>
                </ul>
                <hr class="hr border-primary" />
                <img src="">
                <hr class="hr border-primary" />
                <ul>
                    <li>Attaque : <span></span></li>
                    <li>Attaque spé : <span></span></li>
                    <li>Defense spé : <span></span></li>
                </ul>
            </div>
        </div>
    </div>
    <div id="commandeBox">
        <div class="commande">
            <button onclick="jouer(Action.attaque)" type="button" class="btn">attaque</button>
            <button onclick="jouer(Action.attaqueSpe)" type="button" class="btn">attaque spé</button>
        </div>
        <div id="description">
            <p></p>
        </div>
        <div class="commande">
            <button onclick="jouer(Action.defenseSpe)" type="button" class="btn">defense spé</button>
            <button onclick="jouer(Action.fuite)" type="button" class="btn">fuite</button>
        </div>
    </div>
    <div class="card-deck">
        <div class="card border-danger">
            <h5 class="card-header text-center border-danger"></h5>
            <div class="card-body">
                <ul>
                    <li>PV : <span></span></li>
                    <li>Defense : <span></span></li>
                </ul>
                <hr class="hr border-danger" />
                <img src="">
                <hr class="hr border-danger" />
                <ul>
                    <li>Attaque : <span></span></li>
                    <li>Attaque spé : <span></span></li>
                    <li>Defense spé : <span></span></li>
                </ul>
            </div>
        </div>
        <div class="card border-danger">
            <h5 class="card-header text-center border-danger"></h5>
            <div class="card-body">
                <ul>
                    <li>PV : <span></span></li>
                    <li>Defense : <span></span></li>
                </ul>
                <hr class="hr border-danger" />
                <img src="">
                <hr class="hr border-danger" />
                <ul>
                    <li>Attaque : <span></span></li>
                    <li>Attaque spé : <span></span></li>
                    <li>Defense spé : <span></span></li>
                </ul>
            </div>
        </div>
        <div class="card border-danger">
            <h5 class="card-header text-center border-danger"></h5>
            <div class="card-body">
                <ul>
                    <li>PV : <span></span></li>
                    <li>Defense : <span></span></li>
                </ul>
                <hr class="hr border-danger" />
                <img src="">
                <hr class="hr border-danger" />
                <ul>
                    <li>Attaque : <span></span></li>
                    <li>Attaque spé : <span></span></li>
                    <li>Defense spé : <span></span></li>
                </ul>
            </div>
        </div>
    </div>
    
@endsection

@section('javascript')
    <script type="text/javascript">
        let joueurs = {!! $joueurs !!};
        let pokemons = {!! $pokemons !!};
        let pokemonActuelIndex = [0,0];
        let idPartie = 1;
    </script>
    <script type="text/javascript" src="{{ asset('js/systemeCombatGeneral.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/systemeCombatClassique.js') }}"></script>
    
@endsection

@section('navbarActiveIndex')
    3
@endsection
