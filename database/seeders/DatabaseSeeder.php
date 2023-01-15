<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(SpecialitySeeder::class);
        $this->call(DiseaseSeeder::class);
        $this->call(DoctorSpecialitySeeder::class);
        $this->call(DiagnosticSeeder::class);
        $this->call(ReservationSeeder::class);
        $this->call(DateSeeder::class);
        $this->call(PromotionSeeder::class);
        $this->call(TableSeeder::class);
        $this->call(KeySeeder::class);
    }
}
