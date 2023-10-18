<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Kelolaakun;
use Illuminate\Http\Request;

class KelolaakunController extends Controller
{
    public function index() {
        $data = User::all();
        return view('superadmin.kelolaakun', compact('data'));
    }

    public function tambah(Request $request) {
        $validate = $request->validate([
            'nama' => 'required',
            'email' => 'required',
            'password' => 'required',
            'role' => 'required',
        ]);
        $data = User::create($request->all());
        return redirect()->route('Kelolaakun');
    }

    public function edit(Request $request,$id) {
        $data = User::find($id);

        $data ->nama=$request->nama;
        $data ->email=$request->email;
        $data ->role=$request->role;

        $data->save();

        return redirect()->route('Kelolaakun');
    }

    public function hapus($id) {
        $data = User::find($id);
        $data->delete();
        return redirect()->route('Kelolaakun');
    }
}
