<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Trainer;

class TrainerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('trainer')->insert(['pseudo' => 'Alin', 'password' => 'admin', 'mail' => 'alin@mail.com', 'level' => 9]);
        DB::table('trainer')->insert(['pseudo' => 'Pinky', 'password' => 'admin', 'mail' => 'pinky@mail.com', 'level' => 9]);
        Trainer::factory(8)->create();
    }
}