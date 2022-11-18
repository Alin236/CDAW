@extends('template')

@section('content')
    <p>Liste des pokémons :</p>
    <table>
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