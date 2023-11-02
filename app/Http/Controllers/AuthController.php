<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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
            return redirect()->back()->withErrors($credential)->withInput();
        }
        $userEmail = User::where('email', $request->email)->first();
        if (!$userEmail) {
            return redirect()->back()->withErrors(['email' => 'Email tidak ditemukan']);
        }
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $request->session()->regenerate();
            $user = Auth::user();
            if ($user->role == 'guest') {
                return redirect('/');
            } elseif ($user->role == 'admin') {
                return redirect('admin/dashboard');
            } elseif ($user->role == 'superadmin') {
                return redirect()->route('Superadmin.Akun');
            }
        } else {
            return redirect()->back()->withErrors(['password' => 'Password salah'])->withInput();
        }
    }

    public function registrasi()
    {
        return view('auth.registrasi');
    }

    public function store(Request $request)
    {
        $dataValidasi = Validator::make($request->all(), [
            'nama' => ['required', 'max:100'],
            'email' => ['required', 'email:dns', 'unique:users'],
            'password' => ['required', 'min:8', 'max:20',],
            'konfirmasiPassword' => ['required','min:8', 'max:20',],
        ],
        [
            'nama.required' => 'Nama wajib di isi.
            ',
            'nama.max' => 'Maksimal 100 digit.',
            'email.required' => 'Email wajib di isi.',
            'email.email' => 'Format email wajib di tulis.',
            'email.unique' => 'Email sudah di pakai.',
            'password.required' => 'Password wajib di isi.',
            'password.min' => 'Minimal 8 digit.',
            'password.max' => 'Maksimal 20 digit.',
            'konfirmasiPassword.required' => 'Konfirmasi Password wajib di isi.',
            'konfirmasiPassword.min' => 'Minimal 8 digit.',
            'konfirmasiPassword.max' => 'Maksimal 20 digit.',
        ]);
        if($dataValidasi->fails()) {
            return redirect()->back()->withErrors($dataValidasi)->withInput();
        }
        $HashPassword = Hash::make($request->password);
        $HashKonfirmasiPassword = Hash::make($request->konfirmasiPassword);
        if(Hash::check($request->password, $HashKonfirmasiPassword)){
            $newAccount = new User;
            $newAccount->nama = $request->nama;
            $newAccount->email = $request->email;
            $newAccount->password = $HashPassword;
            $newAccount->save();
            return redirect('/login')->with('berhasil', 'Akun berhasil di di buat, Silahkan login');
        }else{
            return redirect()->back()->withErrors(['konfirmasiPassword' => 'Konfirmasi password tidak cocok dengan password.'])->withInput();
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
