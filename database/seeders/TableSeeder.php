<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tables')->insert([
            [
                'table' => 'Ver Reservaciones',
                'route' => 'reservation.index',
            ],
            [
                'table' => 'Ver Diagnosticos',
                'route' => 'diagnostic.index',
            ],
            [
                'table' => 'Ver Citas',
                'route' => 'date.index',
            ],
            [
                'table' => 'Ver Usuarios',
                'route' => 'user.index',
            ],
            [
                'table' => 'Ver Especialidades',
                'route' => 'speciality.index',
            ],
        ]);
    }
}
