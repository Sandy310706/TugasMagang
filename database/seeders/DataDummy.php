<?php

namespace Database\Seeders;

use Nette\Utils\Random;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

use function Laravel\Prompts\password;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DataDummy extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // DB::table('users')->insert([
        //     'nama' => 'admin',
        //     'email' => 'admin@gmail.com',
        //     'role' => 'admin',
        //     'password' => hash::make('admin'),
        // ]);
        DB::table('menus')->insert([
            'nama' => 'nasgor',
            'harga' => '10000',
            'kategori' => 'makanan',
            'foto' => 'makanan',
        ]);

    }
}
