<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PokemonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $limit = 150;
        $url = "https://pokeapi.co/api/v2/pokemon?limit=$limit";
        $jsonResults = json_decode(file_get_contents($url))->results;
        for($i=1; $i<=Count($jsonResults); $i++){
            DB::table('pokemon')
                ->insert([
                    'id' => $i,
                    'name' => $jsonResults[$i-1]->name,
                    'pv_max' => rand(20,30),
                    'level' => rand(1,10),
                    'attack'=> rand(1, 10),
                    'special_attack'=> rand(1, 10),
                    'special_defense'=> rand(1, 10),
                    'path' => "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/$i.png",
                    'energy_id'=> rand(1, 10),
                ]);
        }
    }
}