<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Department;
use App\Models\Hunt;
use App\Models\Hunter;
use App\Models\Kill;
use App\Models\Role;
use App\Models\User;
use App\Models\Society;
use App\Models\Federation;
use App\Models\Season;
use Database\Factories\DepartmentFactory;
use Database\Factories\RoleFactory;
use Faker\Factory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Factory::create('fr_FR');
        Role::factory(1) -> create();
        User::factory(3) -> create();
        Hunter::factory(3)->create();
        Hunt::factory(3)->create();
        Kill::factory(3)->create();
        Season::factory(3)->create();
        Society::factory(3)->create();
        Federation::factory(1)->create();
    }
}
