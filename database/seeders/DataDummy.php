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

        DB::table('users')->insert([
            'nama' => 'admin neraka',
            'email' => 'admin@gmail.com',
            'role' => 'admin',
            'password' => hash::make('admin'),
        ]);

        // DB::table('kantin')->insert([
        //     'foto'=>'kantin.jpg',
        //     'namaKantin' => 'KantinMaele',

        // ]);


        // DB::table('menus')->insert([
        //     'nama' => 'Tahu',
        //     'harga' => '5000',
        //     'quantity' => '1',
        //     'kategori' => 'makanan',
        //     'stok' => '10',
        //     'foto' => 'tempe.jpg',
        //     'id_kantin'=>'1',
        //     'per'=>'0',
        //     'is_konfirmasi' =>'0',

        // ]);
    }
}
