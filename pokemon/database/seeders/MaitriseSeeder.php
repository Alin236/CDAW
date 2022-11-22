<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\{Trainer, Energy};

class MaitriseSeeder extends Seeder
{
    private $energies;
    private $trainer;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('maitrise')->insert(['id_trainer' => 1, 'id_energy' => 15]);
        DB::table('maitrise')->insert(['id_trainer' => 1, 'id_energy' => 10]);
        DB::table('maitrise')->insert(['id_trainer' => 2, 'id_energy' => 18]);
        DB::table('maitrise')->insert(['id_trainer' => 2, 'id_energy' => 8]);

        $this->energies = Energy::all();
        Trainer::all()
            ->filter(function ($trainer) {
                return $trainer->id != 1 && $trainer->id != 2;
            })
            ->each(function ($trainer){
                $this->trainer = $trainer;
                $number = rand(1,10);
                $energiesMastered = $this->energies->random($number);
                $energiesMastered->each(function ($energyMastered){
                    DB::table('maitrise')->insert(['id_trainer' => $this->trainer->id, 'id_energy' => $energyMastered->id]);
                });
            });
    }
}
