<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Owner>
 */
class OwnerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $birthday = fake()->dateTimeBetween('1980-01-01', '2000-12-31');

        return [
            'email' => fake()->unique()->safeEmail(),
            'owner_name' => fake()->unique()->lastName(),
            'phone' => fake()->phoneNumber(),
        ];
    }
}
