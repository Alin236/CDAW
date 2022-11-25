<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\{User, Energy};

class MaitriseSeeder extends Seeder
{
    private $energies;
    private $user;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('maitrise')->insert(['id_user' => 1, 'id_energy' => 15]);
        DB::table('maitrise')->insert(['id_user' => 1, 'id_energy' => 10]);
        DB::table('maitrise')->insert(['id_user' => 2, 'id_energy' => 18]);
        DB::table('maitrise')->insert(['id_user' => 2, 'id_energy' => 8]);

        $this->energies = Energy::all();
        User::all()
            ->filter(function ($user) {
                return $user->id != 1 && $user->id != 2;
            })
            ->each(function ($user){
                $this->user = $user;
                $number = rand(1,10);
                $energiesMastered = $this->energies->random($number);
                $energiesMastered->each(function ($energyMastered){
                    DB::table('maitrise')->insert(['id_user' => $this->user->id, 'id_energy' => $energyMastered->id]);
                });
            });
    }
}
