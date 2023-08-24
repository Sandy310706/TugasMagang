<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DataDummy extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
<<<<<<< HEAD
            'nama' => 'Operator',
            'email' => 'operator@gmail.com',
            'password' => Hash::make('operator'),
=======
            'nama' => 'Jonathan',
            'email' => 'jonathan@gmail.com',
            'password' => Hash::make('jonathan'),
>>>>>>> f257a199979c8112b6f31ccd12f82344fc07dcbe
            'role' => 'operator'
        ]);
    }
}