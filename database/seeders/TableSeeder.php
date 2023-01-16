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
                'usingId' => false,
            ],
            [
                'table' => 'Ver Diagnosticos',
                'route' => 'diagnostic.index',
                'usingId' => false,
            ],
            [
                'table' => 'Ver Citas',
                'route' => 'date.index',
                'usingId' => true,
            ],
            [
                'table' => 'Ver Usuarios',
                'route' => 'user.index',
                'usingId' => false,
            ],
            [
                'table' => 'Ver Especialidades',
                'route' => 'speciality.index',
                'usingId' => false,
            ],
            [
                'table' => 'Ver Promociones',
                'route' => 'promotion.index',
                'usingId' => false,
            ],
            [
                'table' => 'Ver Llaves',
                'route' => 'key.index',
                'usingId' => false,
            ],
            [
                'table' => 'Ver Especialidades de doctores',
                'route' => 'doctorSpeciality.index',
                'usingId' => false,
            ],
            [
                'table' => 'Ver Enfermedades',
                'route' => 'disease.index',
                'usingId' => false,
            ],
        ]);
    }
}
