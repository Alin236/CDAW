<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Pokemon;

class PokemonControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testApiShowPokemon()
    {
        // Initialisation
        $pokemonAttendu = Pokemon::find(1);

        // Actions
        $response = $this->get('api/pokemon/1');

        // Assertions
        $response->assertSuccessful();
        $response->assertExactJson($pokemonAttendu->toArray());
    }
}
