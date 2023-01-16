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
            [
                'key' => 'cita',
                'table_id' => 3,
            ],
            [
                'key' => 'Cita',
                'table_id' => 3,
            ],
            [
                'key' => 'date',
                'table_id' => 3,
            ],
            [
                'key' => 'reservacion',
                'table_id' => 3,
            ],
            [
                'key' => 'programacion',
                'table_id' => 3,
            ],
            [
                'key' => 'encuentro',
                'table_id' => 3,
            ],
            [
                'key' => 'perfiles',
                'table_id' => 4,
            ],
            [
                'key' => 'cuentas',
                'table_id' => 4,
            ],
            [
                'key' => 'usuarios',
                'table_id' => 4,
            ],
            [
                'key' => 'Especialidades',
                'table_id' => 5,
            ],
            [
                'key' => 'Speciality',
                'table_id' => 5,
            ],
            [
                'key' => 'Titulos',
                'table_id' => 5,
            ],
            [
                'key' => 'Promotions',
                'table_id' => 6,
            ],
            [
                'key' => 'Offers',
                'table_id' => 6,
            ],
            [
                'key' => 'Promociones',
                'table_id' => 6,
            ],
            [
                'key' => 'Promos',
                'table_id' => 6,
            ],
            [
                'key' => 'Ofertas',
                'table_id' => 6,
            ],
            [
                'key' => 'llaves',
                'table_id' => 7,
            ],
            [
                'key' => 'claves',
                'table_id' => 7,
            ],
            [
                'key' => 'complemento',
                'table_id' => 7,
            ],
            [
                'key' => 'Especialidades',
                'table_id' => 8,
            ],
            [
                'key' => 'Doctores',
                'table_id' => 8,
            ],
            [
                'key' => 'especialidades',
                'table_id' => 8,
            ],
            [
                'key' => 'titulos',
                'table_id' => 8,
            ],
            [
                'key' => 'rangos',
                'table_id' => 8,
            ],
            [
                'key' => 'Enfermedades',
                'table_id' => 9,
            ],
            [
                'key' => 'Casos',
                'table_id' => 9,
            ],
            //falta poner los demas indexes
        ]);
    }
}
