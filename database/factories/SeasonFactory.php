<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Season>
 */
class SeasonFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->name(),
            'animal' => fake()->name(),
            'quota' => fake()->numberBetween(1,10),
            'dateDebut' => fake()->date(),
            'dateFin' => fake()->date(),
        ];
    }
}
