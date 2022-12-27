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
                'ci' => 'jaldin@gmail.com',
                'is_admin' => true,
                'is_doctor' => false,
                'password' => Hash::make('1234')
            ],
        ]);
    }
}
