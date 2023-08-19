<?php

namespace App\Http\Controllers;

use session;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function store(Request $request)
    {
        $dataValidasi = $request->validate([
            'nama' => ['required', 'max:100'],
            'email' => ['required', 'email:dns', 'unique:users'],
            'notelpn' => ['required', 'min:12'],
            'kelamin' => ['required'],
            'password' => ['required'],
        ]);
        Hash::make($dataValidasi['password']);
        User::create($dataValidasi);
        return redirect('/registrasi')->with('berhasil', 'Akun berhasil di tambahkan');
    }
}
