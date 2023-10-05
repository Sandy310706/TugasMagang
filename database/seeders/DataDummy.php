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
<<<<<<< HEAD

        DB::table('users')->insert([
            'nama' => 'robin',
            'email' => 'robin@gmail.com',
            'role'  => 'guest',
            'password' => hash::make('robin'),
        ]);

        // DB::table('menus')->insert([
        //     'nama' => 'ayam golek',
        //     'foto' => 'nasi.jpg',
        //     'kategori'  => 'makanan',
        //     'harga' => ('10000'),
        // ]);
=======
        // DB::table('users')->insert([
        //     'nama' => 'robinGay',
        //     'email' => 'robin@gmail.com',
        //     'role'  => 'guest',
        //     'password' => hash::make('robin'),
        // ]);

>>>>>>> ab83d73de6d2aec3b8d2c74364bc53b727f5ee4f
    }
}
