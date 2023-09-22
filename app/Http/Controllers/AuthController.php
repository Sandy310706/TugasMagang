<?php

namespace App\Http\Controllers;

use session;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function authtentication(Request $request)
    {
        $credential = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required'
        ],
        [
            'email.required' => 'Email wajib di isi',
            'email.email' => 'Format email wajib di isi',
            'password' => 'Password wajib di isi'
        ]);
        if(Auth::attempt($credential)) {
            if(Auth::user()->role == 'guest'){
                $request->session()->regenerate();
                return redirect('');
            }elseif(Auth::user()->role == 'admin'){
                $request->session()->regenerate();
                return redirect('admin/dashboard');
            }elseif(Auth::user()->role == 'operator'){
                $request->session()->regenerate();
                return redirect('/operator/dashboard');
            }
        }else{
            return back()->with('gagal', 'Email atau Password anda salah');
        }

    }

    public function registrasi()
    {
        return view('auth.registrasi');
    }

    public function store(Request $request)
    {
        $dataValidasi = $request->validate([
            'nama' => ['required', 'max:100'],
            'email' => ['required', 'email:dns', 'unique:users'],
            'password' => ['required', 'min:7, max:20']
        ],[
            'nama.required' => 'Nama wajib di isi',
            'email.required' => 'Email wajib di isi',
            'email.email' => 'Format email wajib di tulis',
            'password' => 'Password wajib di isi',
        ]);
        Hash::make($dataValidasi['password']);
        User::create($dataValidasi);
        return redirect('/login')->with('login', 'Akun berhasil di login');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
