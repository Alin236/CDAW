<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CombatController extends Controller
{
    public function menu()
    {
        return view('menuCombat');
    }
}
