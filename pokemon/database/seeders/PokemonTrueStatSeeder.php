<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\{Pokemon, Energy};

class PokemonTrueStatSeeder extends Seeder
{
    private $energies;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->energies = Energy::all();
        Pokemon::all()->each(function($pokemon){
            $url = "https://pokeapi.co/api/v2/pokemon/" . $pokemon->id;
            $jsonResults = json_decode(file_get_contents($url));
            $pokemon->update(['energy_id'=>($this->energies->firstWhere('name', $jsonResults->types[0]->type->name))->id]);
        });
    }
}
