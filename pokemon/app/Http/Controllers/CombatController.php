<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{User, Pokemon};
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class CombatController extends Controller
{
    public function menu()
    {
        return view('menuCombat');
    }

    public function initiateCombatClassique(){
        $pokemons = Pokemon::all();
        return view('choixCombatPokemon', Compact('pokemons'));
    }
    
    public function getCombatClassique(){
        $joueurs = User::whereIn('id', [1,2])->get();
        $pokemons = collect([Pokemon::whereIn('id', [1,2,3])->get()->toArray(), Pokemon::whereIn('id', [4,5,6])->get()->toArray()]);
        return view('combatClassique', Compact('joueurs', 'pokemons'));
    }

    public function combatChoix(Request $request){

        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
    
        $joueur1 = Auth::user();

        $email = $request->input('email');
        $password = $request->input('password');
        $joueur2 = User::where('email', '=', $email)->get()->first();
        if(!Hash::check($password, $joueur2->password))
            return false;
        if($joueur1->email == $joueur2->email)
            return false;
        
        $energies = $joueur1->energies;
        $energiesId = [];
        foreach($energies as $energy){
            array_push($energiesId,$energy->id);
        }
        $pokemons1 = Pokemon::whereIn('energy_id', $energiesId)->get();

        $energies = $joueur2->energies;
        $energiesId = [];
        foreach($energies as $energy){
            array_push($energiesId,$energy->id);
        }
        $pokemons2 = Pokemon::whereIn('energy_id', $energiesId)->get();

        return ['joueur1' => $joueur1, 'joueur2' => $joueur2, 'pokemons1' => $pokemons1, 'pokemons2' => $pokemons2];
    }
}
