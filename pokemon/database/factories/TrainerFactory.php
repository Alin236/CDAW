<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Trainer>
 */
class TrainerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'pseudo' => $this->faker->unique()->name(),
            'password' => Str::random(4),
            'mail' => $this->faker->unique()->safeEmail(),
            'level' => rand(1,10)
        ];
    }
}
