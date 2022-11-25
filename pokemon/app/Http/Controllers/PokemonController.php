<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pokemon;
use App\Models\Energy;

class PokemonController extends Controller
{
    public function index()
    {
        $pokemons = Pokemon::all();
        return view('pokedex', compact('pokemons'));
    }

    public function apiShowPokemon($id){
        return Pokemon::find($id);
    }
}
