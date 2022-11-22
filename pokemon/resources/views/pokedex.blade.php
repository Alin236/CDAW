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
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
    <script src="//cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready( function () {
            $('#pokedex').DataTable();
        });
    </script>
@endsection