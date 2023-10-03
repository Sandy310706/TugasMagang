<?php

namespace App\Http\Controllers;

use session;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function phei()
    {
        return view('auth.loginAlternatif');
    }
    public function login()
    {
        return view('auth.login');
    }

    public function authtentication(Request $request)
    {
        $credential = Validator::make($request->all(), [
            'email' => ['required', 'email'],
            'password' => 'required'
        ],
        [
            'email.required' => 'Email wajib di isi',
            'email.email' => 'Format email wajib di isi',
            'password' => 'Password wajib di isi'
        ]);
        if($credential->fails()){
            return redirect()->back()
            ->withErrors($credential)
            ->withInput();
        }
        $userEmail = User::where('email', $request->email)->first();
        if (!$userEmail) {
            return redirect()->back()
            ->withErrors(['email' => 'Email tidak terdaftar']);
        }
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $request->session()->regenerate();
            $user = Auth::user();
            if ($user->role == 'guest') {
                return redirect('/');
            } elseif ($user->role == 'admin') {
                return redirect('admin/dashboard');
            } elseif ($user->role == 'operator') {
                return redirect('/operator/dashboard');
            }
        } else {
            return redirect()->back()->withErrors(['password' => 'Password salah']);
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
            'password' => ['required', 'min:8, max:20']
        ],[
            'nama.required' => 'Nama wajib di isi',
            'nama.max' => 'Maksimal 100 digit',
            'email.required' => 'Email wajib di isi',
            'email.email' => 'Format email wajib di tulis',
            'email.unique' => 'Email sudah di pakai',
            'password.required' => 'Password wajib di isi',
            'password.min' => 'Minimal 8 digit',
            'password.max' => 'Maksimal 20 digit',
        ]);
        Hash::make($dataValidasi['password']);
        User::create($dataValidasi);
        return redirect('/login')->with('berhasil', 'Akun berhasil di di buat, Silahkan login');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
