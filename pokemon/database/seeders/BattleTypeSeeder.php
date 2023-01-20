<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BattleTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('battle_type')->insert(['name' => 'Classique']);
        DB::table('battle_type')->insert(['name' => 'Semi-automatique']);
        DB::table('battle_type')->insert(['name' => 'Automatique']);
        DB::table('battle_type')->insert(['name' => 'Replay']);
    }
}
