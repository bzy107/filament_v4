<?php

namespace Database\Seeders;

use App\Models\Owner;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Patient;
use App\Models\Treatment;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(
            [
                UserSeeder::class,
                // TreatmentSeeder::class,
            ]
        );

        for ($i = 0; $i < 30; $i++) {
            Owner::factory()->create(['name' => $i + 1]);
        }

        $owners = Owner::all();

        for ($j = 0; $j < $owners->count(); $j++) {
            Patient::factory()->create(
                [
                    'name' => $j + 1,
                    'owner_id' => $owners->get($j)->id,
                ]
            );
        }

        $patients = Patient::all();

        for ($k = 0; $k < $patients->count(); $k++) {
            Treatment::factory()->create(
                [
                    'description' => $k + 1,
                    'patient_id' => $patients->get($k)->id,
                ]
            );
        }
    }
}
