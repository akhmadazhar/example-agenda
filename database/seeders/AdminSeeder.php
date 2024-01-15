<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'id_jabatan' => 0,
            'nik' => 0,
            'name' => 'admin',
            'email' => 'admin@example.com',
            'username' => 'admin',
            'password' => Hash::make('12345678'),
        ]);
    }
}
