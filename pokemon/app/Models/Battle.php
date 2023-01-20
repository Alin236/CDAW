<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Battle extends Model
{
    use HasFactory;

    protected $table = 'battle';
    protected $primaryKey = 'id';
    protected $connection = 'mysql';

    public function joueur1()
    { 
        return $this->belongsTo(User::class, 'id_joueur_1');
    }

    public function joueur2()
    { 
        return $this->belongsTo(User::class, 'id_joueur_2');
    }

    public function firstJoueur(){
        return $this->belongsTo(User::class, 'id_first');
    }

    public function pokemonJ1numero1()
    {
        return $this->belongsTo(Pokemon::class, 'id_pokemon_J1_1');
    }
    public function pokemonJ1numero2()
    {
        return $this->belongsTo(Pokemon::class, 'id_pokemon_J1_2');
    }
    public function pokemonJ1numero3()
    {
        return $this->belongsTo(Pokemon::class, 'id_pokemon_J1_3');
    }
    public function pokemonJ2numero1()
    {
        return $this->belongsTo(Pokemon::class, 'id_pokemon_J2_1');
    }
    public function pokemonJ2numero2()
    {
        return $this->belongsTo(Pokemon::class, 'id_pokemon_J2_2');
    }
    public function pokemonJ2numero3()
    {
        return $this->belongsTo(Pokemon::class, 'id_pokemon_J2_3');
    }

    public function pokemons()
    {
        $pokemons = collect([
            [
                Pokemon::find($this->id_pokemon_J1_1),
                Pokemon::find($this->id_pokemon_J1_2),
                Pokemon::find($this->id_pokemon_J1_3)
            ],
            [
                Pokemon::find($this->id_pokemon_J2_1),
                Pokemon::find($this->id_pokemon_J2_2),
                Pokemon::find($this->id_pokemon_J2_3)
            ]
        ]);
        return $pokemons;
    }

    public function joueurs()
    {
        $joueurs = collect([
            User::find($this->id_joueur_1),
            User::find($this->id_joueur_2)
        ]);
        return $joueurs;
    }

    public function gagnant()
    {
        return $this->belongsTo(User::class, 'id_gagnant');
    }

    public function battleType()
    {
        return $this->belongsTo(BattleType::class, 'id_battle_type');
    }

    public function tours()
    {
        return $this->hasMany(Tour::class, 'id_battle');
    }
}
