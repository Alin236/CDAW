<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class listePokemonsController extends Controller
{
    function getListePokemons($param = NULL){
        return view('listePokemons', ['param' => $param]);
    }
}
