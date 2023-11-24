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
        //     'email' => 'robin@gmail.com',
        //     'role' => 'guest',
        //     'password' => hash::make('robin'),
        // ]);

        // DB::table('kantin')->insert([
        //     'foto'=>'kantin.jpg',
        //     'namaKantin' => 'KantinMaele',

        // ]);

        DB::table('menus')->insert([
            'nama' => 'Tempe',
            'harga' => '5000',
            'quantity' => '1',
            'kategori' => 'makanan',
            'stok' => '10',
            'foto' => 'tempe.jpg',
            'id_kantin'=>'1',
            'per'=>'0',
            'is_konfirmasi' =>'0',

        ]);
    }
}
