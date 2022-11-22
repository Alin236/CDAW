@extends('template')

@section('content')
    <p>Liste des pokémons :</p>
    <table id="pokedex">
        <thead>
            <tr>
                <th>N°</th>
                <th>Nom</th>
                <th>Type</th>
                <th>PV Max</th>
                <th>Level</th>
                <th>Image</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pokemons as $pokemon)
                <tr>
                    <td>{{ $pokemon->id }}</td>
                    <td>{{ $pokemon->name }}</td>
                    <td>{{ $energies->find($pokemon->energy)->name }}</td>
                    <td>{{ $pokemon->pv_max }}</td>
                    <td>{{ $pokemon->level }}</td>
                    <td><img src="{{ $pokemon->path }}"></td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

@section('javascript')
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
    <script type="text/javascript" src="//cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="{{ asset('js/pokedex.js') }}">
    </script>
@endsection