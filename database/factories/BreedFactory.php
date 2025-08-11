<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Breed>
 */
class BreedFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $species = fake()->randomElement(['Dog', 'Cat', 'Bird', 'Rabbit']);

        return [
            'breed_name' => fake()->unique()->word(),
            'species' => $species,
            'note' => fake()->sentence(),
        ];
    }
}
