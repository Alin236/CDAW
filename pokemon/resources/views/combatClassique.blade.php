@extends('template')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/combat.css') }}"/>
@endsection

@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <h1>Tour de <span>X</span></h1>
    <div class="card-deck">
        <div class="card border-primary shadow">
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
        <div class="card border-primary shadow">
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
        <div class="card border-primary shadow">
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
    <div id="commandeBox" class="bg-white">
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
        <div class="card border-danger shadow">
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
        <div class="card border-danger shadow">
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
        <div class="card border-danger shadow">
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
        let joueurActuelIndex = joueurs[0].id == {{ $joueurActuel }} ? 0 : 1;
        let idPartie = {{ $idPartie }};
        let pokemonActuelIndex = [0,0];
        let idBattleType = {{ $idBattleType }}
    </script>
    <script type="text/javascript" src="{{ asset('js/systemeCombat.js') }}"></script>
    @if($idBattleType == 4)
        <script type="text/javascript">
            let actionsReplay = {{ $tours->transform(function($tour){return $tour->id_action;}) }}
            let dicoAction = [Action.attaque, Action.attaqueSpe, Action.defenseSpe, Action.fuite]
            actionsReplay.forEach(function(idAction, i){
                actionsReplay[i] = dicoAction[idAction-1];
            })
        </script>
    @endif
@endsection

@section('navbarActiveIndex')
    3
@endsection
