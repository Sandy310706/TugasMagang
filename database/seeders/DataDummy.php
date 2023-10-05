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

        DB::table('users')->insert([
            'nama' => 'admin ganteng',
            'email' => 'admin@gmail.com',
            'role'  => 'admin',
            'password' => hash::make('admin'),
        ]);

    }
}
