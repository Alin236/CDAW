<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{User, Pokemon, Battle, Tour, Action};
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\AllRequest;


class CombatController extends Controller
{
    public function menu()
    {
        return view('menuCombat');
    }

    public function initiateCombatClassique(){
        return view('choixCombatPokemon');
    }
    
    public function launchCombatClassique(Request $request){

        $joueurs = User::whereIn('id', [$request->input('joueur1'),$request->input('joueur2')])->get();
        $pokemons = collect([Pokemon::whereIn('id', [$request->input('pokemon11'),$request->input('pokemon12'),$request->input('pokemon13')])->get()->toArray(),
            Pokemon::whereIn('id', [$request->input('pokemon21'),$request->input('pokemon22'),$request->input('pokemon23')])->get()->toArray()]);
        $joueurActuel = $request->input('firstJoueur');

        $battle = new Battle;
        $battle->id_joueur_1 = $joueurs[0]->id;
        $battle->id_joueur_2 = $joueurs[1]->id;
        $battle->id_first = $joueurActuel;
        $battle->id_pokemon_J1_1 = $pokemons[0][0]['id'];
        $battle->id_pokemon_J1_2 = $pokemons[0][1]['id'];
        $battle->id_pokemon_J1_3 = $pokemons[0][2]['id'];
        $battle->id_pokemon_J2_1 = $pokemons[1][0]['id'];
        $battle->id_pokemon_J2_2 = $pokemons[1][1]['id'];
        $battle->id_pokemon_J2_3 = $pokemons[1][2]['id'];
        $battle->save();
        $idPartie = $battle->id;
        return view('combatClassique', Compact('joueurs', 'pokemons', 'joueurActuel', 'idPartie'));
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
        $pokemons1 = Pokemon::whereIn('energy_id', $energiesId)->where('level', '<', $joueur1->level)->get();

        $energies = $joueur2->energies;
        $energiesId = [];
        foreach($energies as $energy){
            array_push($energiesId,$energy->id);
        }
        $pokemons2 = Pokemon::whereIn('energy_id', $energiesId)->where('level', '<', $joueur2->level)->get();

        return ['joueur1' => $joueur1, 'joueur2' => $joueur2, 'pokemons1' => $pokemons1, 'pokemons2' => $pokemons2];
    }

    public function save(AllRequest $request){
        $battle = Battle::find($request->idPartie);
        $battle->id_gagnant = $request->gagnant['id'];
        $battle->save();

        $allAction = Action::all();
        
        foreach($request->actions as $action){
            $tour = new Tour;
            $tour->id_battle = $request->idPartie;
            if($action == "Attaque")
                $tour->id_action = 1;
            if($action == "Attaque spéciale")
                $tour->id_action = 2;
            if($action == "Défense spéciale")
                $tour->id_action = 3;
            if($action == "Fuite")
                $tour->id_action = 4;
            $tour->save();
        }
    }
}
