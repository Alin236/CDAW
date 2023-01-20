@extends('template')

@section('css')
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/buttons/2.3.2/css/buttons.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/pokedex.css') }}"/>
@endsection

@section('content')
    @auth
        <div id="divSwitch">
            <label for="switch" id="labelSwitch1">Tous les pokémons</label>
            <div class="custom-control custom-switch">
                <input type="checkbox" class="custom-control-input" id="switch">
                <label class="custom-control-label" for="switch" id="labelSwitch2">Mes pokémons</label>
            </div>
        </div>
    @endauth
    <table id="pokedex">
        <thead>
            <tr>
                <th>N°</th>
                <th>Nom</th>
                <th>Type</th>
                <th>Image</th>
                <th>Level</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pokemons as $pokemon)
                <tr>
                    <td>{{ $pokemon->id }}</td>
                    <td>{{ $pokemon->name }}</td>
                    <td>{{ $pokemon->energy->name }}</td>
                    <td><img src="{{ $pokemon->path }}"></td>
                    <td>{{ $pokemon->level }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div id="box" class="card">
        <h5 class="card-header text-center"></h5>
        <div class="card-body">
            <ul>
                <li>Level : <span></span></li>
                <li>PV Max : <span></span></li>
                <li>Attaque : <span></span></li>
                <li>Attaque spé : <span></span></li>
                <li>Defense spé : <span></span></li>
            <ul>
        </div>
    </div>
@endsection

@section('javascript')
    <script type="text/javascript" src="//cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="//cdn.datatables.net/buttons/2.3.2/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="{{ asset('js/pokedex.js') }}"></script>
    <script type="text/javascript">
        @auth
            mesMaitrise = ""
            @foreach(Auth::user()->energies as $energy)
                mesMaitrise += "{{ $energy->name }}" + "|";
            @endforeach
            mesMaitrise = mesMaitrise.slice(0, -1);

            level = {{ Auth::user()->level }};
        @else
            $(document).ready( function () {
                $(".dt-button:first").hide();
            });
        @endauth
    </script>
@endsection

@section('navbarActiveIndex')
    2
@endsection
