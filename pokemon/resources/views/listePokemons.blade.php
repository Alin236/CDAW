@extends('template')

@section('content')
    @isset($param)
        <p>Paramètre : {{ $param }}</p>
    @endisset
    <p>Liste des pokémons</p>
@endsection