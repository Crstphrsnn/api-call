<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ListJobsFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title' => fake()->jobTitle(),
            'description' => fake()->paragraph(),
            'company' => fake()->company(),
            'location' => fake()->city(),
            'salary' => fake()->randomFloat(2, 50000, 150000),
        ];
    }
}