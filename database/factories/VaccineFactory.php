<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Vaccine>
 */
class VaccineFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // return [
        //     'vaccine_name' => fake()->randomElement(['Rabies', 'Parvovirus', 'Feline Leukemia', 'Distemper', 'Influenza']),
        //     'description' => fake()->sentence(),
        //     'duration_in_months' => fake()->randomElement([12, 36]),
        // ];

        return [
            'link_id' => fake()->unique()->numberBetween(1, 9999),
            'room_name' => fake()->word(),
            'postal_code' => fake()->sentence(),
            'address' => fake()->sentence(),
        ];
    }
}
