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
        for($menu = 1; $menu <= 55; $menu++)
        {
            DB::table('menus')->insert([
                'foto' => 'P',
                'nama' => Str::random(5),
                'id_kantin' => 1,
                'harga' => 111,
                'kategori' => 'makanan',
                'stok' => 99,
            ]);
        }
    }
}
