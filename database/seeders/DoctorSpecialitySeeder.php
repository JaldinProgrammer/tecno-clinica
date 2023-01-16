<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DoctorSpecialitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('doctor_specialities')->insert([
            [
                'speciality_id' => 1,
                'user_id' => 4
            ],
            [
                'speciality_id' => 2,
                'user_id' => 4
            ],
            [
                'speciality_id' => 4,
                'user_id' => 4
            ],
            [
                'speciality_id' => 1,
                'user_id' => 5
            ],
            [
                'speciality_id' => 2,
                'user_id' => 5
            ],
        ]);
    }
}
