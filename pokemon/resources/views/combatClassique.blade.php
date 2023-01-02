@extends('template')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/combat.css') }}"/>
@endsection

@section('content')
    <div class="card-deck">
        <div class="card">
            <h5 class="card-header text-center"></h5>
            <div class="card-body">
                <ul>
                    <li>PV : <span></span></li>
                    <li>Defense : <span></span></li>
                </ul>
                <hr class="hr" />
                <img src="">
                <hr class="hr" />
                <ul>
                    <li>Attaque : <span></span></li>
                    <li>Attaque spé : <span></span></li>
                    <li>Defense spé : <span></span></li>
                </ul>
            </div>
        </div>
        <div class="card">
            <h5 class="card-header text-center"></h5>
            <div class="card-body">
                <ul>
                    <li>PV : <span></span></li>
                    <li>Defense : <span></span></li>
                </ul>
                <hr class="hr" />
                <img src="">
                <hr class="hr" />
                <ul>
                    <li>Attaque : <span></span></li>
                    <li>Attaque spé : <span></span></li>
                    <li>Defense spé : <span></span></li>
                </ul>
            </div>
        </div>
        <div class="card">
            <h5 class="card-header text-center"></h5>
            <div class="card-body">
                <ul>
                    <li>PV : <span></span></li>
                    <li>Defense : <span></span></li>
                </ul>
                <hr class="hr" />
                <img src="">
                <hr class="hr" />
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
            <button onclick="jouer(Action.attaque)">attaque</button>
            <button onclick="jouer(Action.attaqueSpe)">attaque spé</button>
        </div>
        <div id="description">
            <p></p>
        </div>
        <div class="commande">
            <button onclick="jouer(Action.defenseSpe)">defense spé</button>
            <button onclick="jouer(Action.fuite)">fuite</button>
        </div>
    </div>
    <div class="card-deck">
        <div class="card">
            <h5 class="card-header text-center"></h5>
            <div class="card-body">
                <ul>
                    <li>PV : <span></span></li>
                    <li>Defense : <span></span></li>
                </ul>
                <hr class="hr" />
                <img src="">
                <hr class="hr" />
                <ul>
                    <li>Attaque : <span></span></li>
                    <li>Attaque spé : <span></span></li>
                    <li>Defense spé : <span></span></li>
                </ul>
            </div>
        </div>
        <div class="card">
            <h5 class="card-header text-center"></h5>
            <div class="card-body">
                <ul>
                    <li>PV : <span></span></li>
                    <li>Defense : <span></span></li>
                </ul>
                <hr class="hr" />
                <img src="">
                <hr class="hr" />
                <ul>
                    <li>Attaque : <span></span></li>
                    <li>Attaque spé : <span></span></li>
                    <li>Defense spé : <span></span></li>
                </ul>
            </div>
        </div>
        <div class="card">
            <h5 class="card-header text-center"></h5>
            <div class="card-body">
                <ul>
                    <li>PV : <span></span></li>
                    <li>Defense : <span></span></li>
                </ul>
                <hr class="hr" />
                <img src="">
                <hr class="hr" />
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
        let pokemonActuelIndex = [1,2];
    </script>
    <script type="text/javascript" src="{{ asset('js/systemeCombatGeneral.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/systemeCombatClassique.js') }}"></script>
    
@endsection

@section('navbarActiveIndex')
    3
@endsection
