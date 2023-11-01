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
    public function run(): void
    {
        DB::table('menus')->insert([
            'nama' => 'Geprek Mael',
            'foto' =>  'foto',
            'quantity' => 1,
            'kategori' => 'makanan',
            'harga' => 1000,
            'stok' => 99,
            'id_kantin' => 1,
        ]);
    }
}
