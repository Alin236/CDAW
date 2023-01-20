@extends('template')

@section('css')
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/buttons/2.3.2/css/buttons.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/historique.css') }}"/>
@endsection

@section('content')
    <table id="historique">
        <thead>
            <tr>
                <th>Joueur 1</th>
                <th>Pokémons J1</th>
                <th>Type de match</th>
                <th>Pokémons J2</th>
                <th>Joueur 2</th>
            </tr>
        </thead>
        <tbody>
            @foreach($battles as $battle)
                <tr onclick="location.assign('{{ route('replay', ['idBattle' => $battle->id]) }}')" class="{{ $battle->gagnant == null ? 'win-null' : ($battle->gagnant == $battle->joueur1 ? 'win-j1' : 'win-j2') }}">
                    <td>{{ $battle->joueur1->name }}</td>
                    <td class="pokemons-j1">
                        <img src="{{ $battle->pokemonJ1numero3->path }}">
                        <img src="{{ $battle->pokemonJ1numero2->path }}">
                        <img src="{{ $battle->pokemonJ1numero1->path }}">
                    </td>
                    <td>{{ $battle->battleType->name }}</td>
                    <td>
                        <img src="{{ $battle->pokemonJ2numero1->path }}">
                        <img src="{{ $battle->pokemonJ2numero2->path }}">
                        <img src="{{ $battle->pokemonJ2numero3->path }}">
                    </td>
                    <td>{{ $battle->joueur2->name }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

@section('javascript')
    <script type="text/javascript" src="//cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="//cdn.datatables.net/buttons/2.3.2/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="{{ asset('js/historique.js') }}"></script>
@endsection

@section('navbarActiveIndex')
    4
@endsection
