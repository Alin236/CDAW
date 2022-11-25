@extends('template')

@section('content')
    <p>Liste des pokémons :</p>
    <table id="pokedex">
        <thead>
            <tr>
                <th>N°</th>
                <th>Nom</th>
                <th>Type</th>
                <th>Image</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pokemons as $pokemon)
                <tr>
                    <td>{{ $pokemon->id }}</td>
                    <td>{{ $pokemon->name }}</td>
                    <td>{{ $pokemon->energy->name }}</td>
                    <td><img src="{{ $pokemon->path }}"></td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div id="box" style="position: fixed">
        <p>Nom : <span></span></p>
        <p>Level : <span></span></p>
        <p>PV Max : <span></span></p>
        <p>Attaque : <span></span></p>
        <p>Attaque spé : <span></span></p>
        <p>Defense spé : <span></span></p>
    </div>
@endsection

@section('javascript')
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
    <script type="text/javascript" src="//cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="{{ asset('js/pokedex.js') }}">
    </script>
@endsection