<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'Carlos Jaldin',
                'email' => 'jaldin@gmail.com',
                'ci' => '6250035',
                'cellphone' => '76041031',
                'is_admin' => true,
                'is_doctor' => true,
                'password' => Hash::make('1234')
            ],
            [
                'name' => 'Valeria Coronado',
                'email' => 'vale@gmail.com',
                'ci' => '10023241',
                'cellphone' => '712342342',
                'is_admin' => true,
                'is_doctor' => false,
                'password' => Hash::make('1234')
            ],
            [
                'name' => 'Dua lipa',
                'email' => 'dualipa@gmail.com',
                'ci' => '98023241',
                'cellphone' => '72234121',
                'is_admin' => false,
                'is_doctor' => true,
                'password' => Hash::make('1234')
            ],
            [
                'name' => 'Felix Panduro',
                'email' => 'felix@gmail.com',
                'ci' => '98023241',
                'cellphone' => '660213101',
                'is_admin' => false,
                'is_doctor' => false,
                'password' => Hash::make('1234')
            ],
        ]);
    }
}
