<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PokemonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $limit = 50;
        $url = "https://pokeapi.co/api/v2/pokemon?limit=$limit";
        $jsonResults = json_decode(file_get_contents($url))->results;
        for($i=1; $i<=Count($jsonResults); $i++){
            DB::table('pokemon')->insert(['id' => $i, 'energy'=> rand(1, 10), 'name' => $jsonResults[$i-1]->name, 'pv_max' => rand(20,30), 'level' => rand(1,10), 'path' => "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/$i.png"]);
        }
    }
}