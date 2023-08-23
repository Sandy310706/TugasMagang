<?php

namespace App\Http\Controllers;

use session;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
    public function authtentication(Request $request)
    {
        $credential = $request->validate([
            'email' => ['required', 'email:dns'],
            'password' => 'required'
        ]);
        if(Auth::attempt($credential)) {
            if(Auth::user()->role == 'guest'){
                $request->session()->regenerate();
                return view('user.dashboard');
            }elseif(Auth::user()->role == 'admin'){
                $request->session()->regenerate();
                return view('user.dashboard');
            }elseif(Auth::user()->role == 'operator'){
                $request->session()->regenerate();
                return redirect('/operator/dashboard');
            }
        }else{
            return back()->withErrors('Email atau Password anda salah !!');
        }
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
