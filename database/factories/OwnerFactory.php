<?php

namespace Database\Factories;

use Faker\Factory as FakerFactory;
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
            // 'email' => fake()->unique()->safeEmail(),
            // 'owner_name' => fake()->unique()->lastName(),
            // 'phone' => fake()->phoneNumber(),

            'link_id' => fake()->unique()->numberBetween(1, 999),
            'last_name' => fake()->unique()->lastName(),
            'first_name' => fake()->unique()->firstName(),
            'last_name_kana' => FakerFactory::create('ja_JP')->unique()->lastKanaName(),
            'first_name_kana' => FakerFactory::create('ja_JP')->unique()->firstKanaName(),
            'real_name' => fake()->unique()->lastName() . ' ' . fake()->unique()->firstName(),
            'birthday' => $birthday->format('Y-m-d'),
            'country' => fake()->country(),
            'place_of_birth' => fake()->state() . fake()->city(),
            'is_retired' => fake()->randomElement([0, 0, 0, 0, 1]),
            'image_url' => null,
        ];
    }
}
