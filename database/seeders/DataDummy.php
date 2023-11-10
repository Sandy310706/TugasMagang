<?php

namespace Database\Seeders;

use Nette\Utils\Random;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

use function Laravel\Prompts\password;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DataDummy extends Seeder
{
    public function run(): void
    {

        // DB::table('users')->insert([
        //     'nama' => 'robin',
        //     'email' => 'robin@email.com',
        //     'password' => Hash::make('robin'),
        //     'role' => 'guest',
        // ]);




        DB::table('menus')->insert([
            'nama' => 'ikan tenggiri',
            'harga' => '5000',
            'kategori' => 'makanan',
            'foto' => 'ayam.jpg',
            'stok' => '50',
            'id_kantin' => '3',
        ]);


        // DB::table('users')->insert([
        //     'nama' => 'admin',
        //     'email' => 'admin@gmail.com',
        //     'password' => Hash::make('admin'),
        //     'role' => 'superadmin',
        // ]);


        // DB::table('kantin')->insert([
        //     'namaKantin' => 'Kantin Selalu Kalah',
        // ]);

        // DB::table('users')->insert([
        //     'nama' => 'Budi',
        //     'email' => 'Budi@super.com',
        //     'role' => 'SuperAdmin',
        //     'password' => Hash::make('budi'),
        // ]);

        // DB::table('users')->insert([
        //     'nama' => 'Budi',
        //     'email' => 'Budi@super.com',
        //     'role' => 'SuperAdmin',
        //     'password' => Hash::make('budi'),
        // ]);


    }
}
