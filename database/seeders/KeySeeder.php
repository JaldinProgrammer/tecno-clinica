<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KeySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('keys')->insert([
            [
                'key' => 'reservaciones',
                'table_id' => 1,
            ],
            [
                'key' => 'reservations',
                'table_id' => 1,
            ],
            [
                'key' => 'reservar',
                'table_id' => 1,
            ],
            [
                'key' => 'reservaciones',
                'table_id' => 1,
            ],
            [
                'key' => 'agendar',
                'table_id' => 1,
            ],
            [
                'key' => 'diagnostico',
                'table_id' => 2,
            ],
            [
                'key' => 'diagnosticar',
                'table_id' => 2,
            ],
            [
                'key' => 'Diagnostico',
                'table_id' => 2,
            ],
            [
                'key' => 'checkeo',
                'table_id' => 2,
            ],

        ]);
    }
}
