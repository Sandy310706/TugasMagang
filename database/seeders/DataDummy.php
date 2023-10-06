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
>>>>>>> 89a538fed3b6827678cff80262b548f2296c624a
        // DB::table('users')->insert([
        //     'nama' => 'robinGay',
        //     'email' => 'robin@gmail.com',
        //     'role'  => 'guest',
        //     'password' => hash::make('robin'),
        // ]);
<<<<<<< HEAD

=======
>>>>>>> 89a538fed3b6827678cff80262b548f2296c624a
    }
}
