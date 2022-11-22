<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

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
        \App\Models\Trainer::factory(8)->create();
    }
}