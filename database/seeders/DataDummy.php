<?php

namespace Database\Seeders;

use Nette\Utils\Random;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


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

        // DB::table('menus')->insert([
        //     'nama' => 'teh es',
        //     'harga' => '10000',
        //     'stok' => '10',
        //     'kategori' => 'minuman',
        //     'foto' => 'tehes.jpg',
        //     'id_kantin' => '3',
        // ]);

        DB::table('kantin')->insert([
            'namaKantin' => 'Kantin Murah',
        ]);



    }
}
