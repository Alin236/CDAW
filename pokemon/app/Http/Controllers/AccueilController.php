<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pokemon;

class AccueilController extends Controller
{
    public function index()
    {
        $pokemons = Pokemon::all()->take(-4);
        return view('accueil', Compact('pokemons'));
    }
}
