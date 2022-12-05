<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PokemonControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testRoutePokedex()
    {
        // Actions
        $response = $this->get('pokedex');

        // Assertions
        $response->assertSuccessful();
        $response->assertViewHas('pokemons');
    }
}
