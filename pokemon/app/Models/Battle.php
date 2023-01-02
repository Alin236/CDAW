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
        return collect([Pokemon::whereIn('id', [$this->id_pokemon_J1_1,$this->id_pokemon_J1_2,$this->id_pokemon_J1_3])->get()->toArray(),
        Pokemon::whereIn('id', [$this->id_pokemon_J2_1,$this->id_pokemon_J2_2,$this->id_pokemon_J2_3])->get()->toArray()]);
    }

    public function joueurs()
    {
        return User::whereIn('id', [$this->id_joueur_1,$this->id_joueur_2])->get();
    }

    public function gagnant()
    {
        return $this->belongsTo(User::class, 'id_gagnant');
    }
}
