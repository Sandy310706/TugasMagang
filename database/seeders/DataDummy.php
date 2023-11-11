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

        // DB::table('users')->insert([
        //     'nama' => 'robin',
        //     'email' => 'robin@email.com',
        //     'password' => Hash::make('robin'),
        //     'role' => 'guest',
        // ]);



    }
}
