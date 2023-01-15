<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DiseaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('diseases')->insert([
            [
                'name' => 'Resfrio'
            ],
            [
                'name' => 'Covid 19'
            ],
            [
                'name' => 'Herpes'
            ],
            [
                'name' => 'Papiloma'
            ],
            [
                'name' => 'Bronquitis'
            ],
            [
                'name' => 'Sinusitis'
            ],
            [
                'name' => 'Anemia'
            ],
            [
                'name' => 'Cirrosis'
            ],
            [
                'name' => 'Colon irritable'
            ],
            [
                'name' => 'Ebola'
            ],
            [
                'name' => 'Gonorrea'
            ],
        ]);
    }
}
