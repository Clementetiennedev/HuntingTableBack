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
     * @throws \Exception
     */
    public function definition(): array
    {
        $animaux = [
            'Sangliers',
            'Chevreuils',
            'Becasses'
        ];
        $animal = $animaux[random_int(0, 2)];

        return [
            'title' => 'Saison des ' . $animal,
            'animal' => $animal,
            'quota' => fake()->numberBetween(1,10),
            'dateDebut' => fake()->date(),
            'dateFin' => fake()->date(),
            'society_id' => '1'
        ];
    }
}
