<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Hunt>
 */
class HuntFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'date' => fake()->date,
            'title' => fake()->title,
            'description' => fake()->text(50),
            'participant' => fake()-> firstName(),
            'hunter_id' => '1',
        ];
    }
}
