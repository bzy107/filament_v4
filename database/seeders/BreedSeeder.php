<?php

namespace Database\Seeders;

use App\Models\Breed;
use App\Models\Patient;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BreedSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Breed::factory(20)->create();
    }
}
