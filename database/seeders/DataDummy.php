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


    //  DB::table('users')->insert([
    //         'nama'=>('robin'),
    //         'email'=>('robin@gmail.com'),
    //         'role'=>('guest'),
    //         'password'=>hash::make('robin'),
    //     ]);
        DB::table('menus')->insert([
            'nama' => 'tehes',
            'foto' => 'nasi.jpg',
            'kategori' => 'makanan',
            'harga' => '5000',
        ]);
    }
}
