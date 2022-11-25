<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(['name' => 'Alin', 'password' => Hash::make('admin'), 'email' => 'alin@mail.com', 'level' => 9]);
        DB::table('users')->insert(['name' => 'Pinky', 'password' => Hash::make('admin'), 'email' => 'pinky@mail.com', 'level' => 9]);
        User::factory(8)->create();
    }
}