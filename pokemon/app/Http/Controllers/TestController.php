<?php

namespace App\Http\Controllers;

use Illuminate\Http\request;
use App\Http\Requests\EnergyRequest;
use App\Models\Energy;

class TestController extends Controller
{
    public function getTest()
    {
        return view('getTest');
    }

    public function postTest(EnergyRequest $energyRequest)
    {
        $energy = new Energy;
        $energy->name = $energyRequest->name;
        $energy->color = $energyRequest->color;
        $energy->save();
        return $energy;
    }
}
