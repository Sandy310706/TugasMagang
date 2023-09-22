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
            'nama' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => HASH::make('admin'),
            'role' => 'admin',
        ]);
        DB::table('menus')->insert([
        //     'nama' => 'nasi',
        //     'foto' => 'nasi.jpg',
        //     'kategori' => 'makanan',
        //     'harga' => '5000',
        // ]);
    //      ([
            'nama' => 'milo',
            'foto' => 'nasi.jpg',
            'kategori' => 'minuman',
            'harga' => '5000',
        ]);
    }
}
