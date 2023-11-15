<?php

namespace Database\Seeders;

use App\Models\Menu;
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
            'nama' => 'ayam',
            'quantity' => '1',
            'kategori'=> 'makanan',
            'harga'=> '15000',
            'stok' => '10',
            'foto' => 'ayam',
            'id_kantin' => '2',
        ]);

        DB::table('menus')->insert([
            'nama' => 'teh es',
            'harga' => '10000',
            'stok' => '10',
            'kategori' => 'minuman',
            'foto' => 'tehes.jpg',
            'id_kantin' => '2',
        ]);

    }
}
