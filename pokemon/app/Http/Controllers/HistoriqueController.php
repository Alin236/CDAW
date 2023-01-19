<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Battle;
use Illuminate\Support\Facades\Auth;

class HistoriqueController extends Controller
{
    function index(){
        $battles = Battle::where('id_joueur_1', Auth::user()->id)->orWhere('id_joueur_2', Auth::user()->id)->orderBy('created_at', 'desc')->get();
        return view('historique', compact('battles'));
    }
}
