<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use function Laravel\Prompts\password;

class DataDummy extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
<<<<<<< HEAD

        // DB::table('users')->insert([
        //     'nama' => 'robin',
        //     'email' => 'robin@gmail.com',
        //     'role'  => 'guest',
        //     'password' => hash::make('robin'),
        // ]);

        DB::table('users')->insert([
            'nama' => 'admin ganteng',
            'email' => 'admin@gmail.com',
            'role'  => 'admin',
            'password' => hash::make('admin'),
=======
        DB::table('users')->insert([
            'nama' => 'operator',
            'email' => 'operator@email.com',
            'role' => 'operator',
            'password' => Hash::make('operator'),
>>>>>>> fc8d5e6854672fb487bdcf1f7e088b7319a9ca1d
        ]);
    }
}
