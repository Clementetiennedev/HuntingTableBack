<?php

namespace Database\Factories;

use GuzzleHttp\Client;
use App\Models\Department;
use GuzzleHttp\Exception\GuzzleException;
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
     * @throws GuzzleException
     */
    public function definition(): array
    {
        $client = new Client();
        $response = $client->request('GET', 'https://api.gouv.fr/api/departements');

        $statusCode = $response->getStatusCode();
        if ($statusCode === 200) {
            $users = json_decode($response->getBody(), true);
            dd(response()->json($users));
        } else {
            dd(response()->json(['error' => 'La requête a échoué. Statut : ' . $statusCode], 500));
        }

        //$response = Http::get('https://api.gouv.fr/api/departements');
        //$departments = $response->json();

        //$departmentData = $departments[$this->faker->numberBetween(0, count($departments) - 1)];

        //return [
        //    'name' => $departmentData['nom'],
        //    'code' => $departmentData['code'],
        //];
    }
}
