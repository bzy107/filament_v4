<?php

namespace Database\Seeders;

use App\Models\Breed;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Owner;
use App\Models\Patient;
use App\Models\Rank;
use App\Models\Treatment;
use App\Models\Vaccine;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

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
                // PatientSeeder::class,
            ]
        );

        for ($i = 0; $i < 30; $i++) {
            Vaccine::factory()->create(['vaccine_name' => $i + 1]);
            Owner::factory()->create(
                [
                    'owner_name' => $i + 1,
                    'email' => $i + 1 . '@test.com',
                    'phone' => str_pad($i + 1, 11, '0', STR_PAD_LEFT),
                ]
            );
        }

        $vaccines = Vaccine::all();
        $owners = Owner::all();

        for ($j = 0; $j < $owners->count(); $j++) {
            Breed::factory()->create(
                [
                    'breed_name' => $j + 1,
                    'note' => $j + 1,
                ]
            );
        }

        $breeds = Breed::all();

        for ($l = 0; $l < $owners->count(); $l++) {
            for ($n = 0; $n < 10; $n++) {
                Patient::factory()->create(
                    [
                        'patient_name' => $l + 1,
                        'owner_id' => $owners->get($l)->id,
                        'breed_id' => $breeds->get($l)->id,
                        'vaccine_id' => $vaccines->get($l)->id,
                        'type' => $breeds->get($l)->species,
                        'registered_at' => Carbon::now()->subDays($n)->toDateString(),
                    ]
                );
            }
        }
    }
}
