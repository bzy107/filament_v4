<?php

namespace Database\Factories;

use App\Models\AffiliationRoom;
use App\Models\Breed;
use App\Models\Owner;
use App\Models\Profile;
use App\Models\Rank;
use App\Models\Vaccine;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Patient>
 */
class PatientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $informationDate = fake()->dateTimeBetween('1980-01-01', '2000-12-31');

        return [
            // 'registered_at' => fake()->date('Y-m-d', 'now'),
            // 'patient_name' => fake()->firstName(),
            // 'type' => fake()->randomElement(['Dog', 'Cat', 'Bird', 'Rabbit', 'Other']),
            // 'owner_id' => Owner::factory(),
            // 'vaccine_id' => Vaccine::factory(),
            // 'breed_id' => Breed::factory(),

            'owner_id' => Owner::factory(),
            'breed_id' => Breed::factory(),
            'vaccine_id' => Vaccine::factory(),
            'name_history' => fake()->optional()->firstName(),
            'height' => fake()->numberBetween(150.0, 200.0),
            'weight' => fake()->numberBetween(150.0, 200.0),
            'information_date' => $informationDate->format('Y-m-d'),
        ];
    }
}
