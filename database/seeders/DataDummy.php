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
            'nama' => 'budi',
            'email' => 'budi@super.com',
            'password' => Hash::make('budi'),
            'role' => 'superadmin',
        ]);
    }
}
