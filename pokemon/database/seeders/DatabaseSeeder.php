<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call(EnergySeeder::class);
        $this->call(PokemonSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(MaitriseSeeder::class);
        $this->call(BattleTypeSeeder::class);
        $this->call(ActionSeeder::class);

        //Le seeder suivant utilise beaucoup de fois l'API pokéapi, il a été désactiver pour ne pas poser de problème lors des évaluations
        //$this->call(PokemonTrueStatSeeder::class);
    }
}
