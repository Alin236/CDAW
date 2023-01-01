<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{User, Pokemon};

class CombatController extends Controller
{
    public function menu()
    {
        return view('menuCombat');
    }

    public function getCombatClassique(){
        $joueurs = User::whereIn('id', [1,2])->get();
        $pokemons = collect([Pokemon::whereIn('id', [1,2,3])->get()->toArray(), Pokemon::whereIn('id', [4,5,6])->get()->toArray()]);
        return view('combatClassique', Compact('joueurs', 'pokemons'));
    }
}
