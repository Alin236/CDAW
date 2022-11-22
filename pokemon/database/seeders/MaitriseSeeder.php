<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MaitriseSeeder extends Seeder
{
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
        
    }
}
