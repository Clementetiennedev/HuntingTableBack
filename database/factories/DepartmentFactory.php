<?php

namespace Database\Factories;

use App\Models\Department;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Http;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Hunter>
 */
class DepartmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $response = Http::get('https://api.gouv.fr/api/departements&token=');
        $departments = $response->json();

        $departmentData = $departments[$this->faker->numberBetween(0, count($departments) - 1)];

        return [
            'name' => $departmentData['nom'],
            'code' => $departmentData['code'],
        ];
    }
}
