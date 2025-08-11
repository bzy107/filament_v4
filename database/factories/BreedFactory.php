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
        $breedName = '';

        if ($species === 'Dog') {
            $breedName = fake()->randomElement(['Golden Retriever', 'Poodle', 'Shiba Inu', 'Chihuahua', 'Bulldog']);
        } elseif ($species === 'Cat') {
            $breedName = fake()->randomElement(['Persian', 'Shorthair', 'Bengal', 'Siamese', 'Maine Coon']);
        } elseif ($species === 'Bird') {
            $breedName = fake()->randomElement(['Parrot', 'Canary', 'Finch']);
        } else {
            $breedName = fake()->word();
        }

        return [
            'breed_name' => fake()->unique()->word(),
            'species' => $species,
        ];
    }
}
