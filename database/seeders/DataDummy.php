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
        DB::table('users')->insert([
            'nama' => 'robins',
            'email' => 'robins@email.com',
            'password' => Hash::make('robin'),
            'role' => 'guest',
        ]);

        // DB::table('menus')->insert([
        //     'nama' => 'ayam',
        //     'harga' => '5000',
        //     'kategori' => 'makanan',
        //     'foto' => 'ayam.jpg',
        //     'stok' => '50',
        //     'toko' => 'kantin2',
        // ]);

        //

    }
}
