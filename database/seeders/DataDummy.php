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

            'nama' => 'jonathan',
            'email' => 'jonathan@gmail.com',
            'password' => hash::make('jonathan'),
            'role' => 'admin',
        ]);
    }
}
