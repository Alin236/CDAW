<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class EnergySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Etape 1
        /*
        DB::table('energy')->insert([
             'name' => Str::random(10)
            ]);
        */
        //Etape 2
        //\App\Models\Energy::factory(10)->create();

        $limit = NULL;
        $url = "https://pokeapi.co/api/v2/type?limit=$limit";
        $jsonResults = json_decode(file_get_contents($url))->results;
        for($i=1; $i<=Count($jsonResults); $i++){
            DB::table('energy')->insert(['id' => $i, 'name' => $jsonResults[$i-1]->name]);
        }
    }
}