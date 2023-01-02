<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ActionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('action')->insert(['name' => 'Attaque']);
        DB::table('action')->insert(['name' => 'Attaque spéciale']);
        DB::table('action')->insert(['name' => 'Défense spéciale']);
        DB::table('action')->insert(['name' => 'Fuite']);
    }
}
