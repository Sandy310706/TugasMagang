<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Kantin;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class KelolaakunController extends Controller
{
    public function index() {
        $data = User::latest()->paginate(10);
        $kantin = Kantin::find($data);
        return view('superadmin.kelolaakun', compact('data', 'kantin'));
    }
    public function getData(Request $request)
    {
        if($request->ajax()) {
            $data = User::latest()->paginate(10);
            $kantin = Kantin::find($data);
            return DataTables::of($kantin)->addIndexColumn()
            ->addColumn('action', function($row){
                return view('layouts.superadmin.button', compact('row'));
            })->rawColumns(['action'])->make(true);
        }
    }

    public function tambah(Request $request) {
        $dataValidasi = Validator::make($request->all(), [
            'nama' => 'required',
            'email' => ['required', 'unique:users', 'email'],
            'password' => ['required', 'min:8'],
            'role' => 'required',
            'kantin' => Rule::requiredIf($request->user()->role == 'admin'),
        ],
        [
            'nama.required' => 'Kolom nama wajib di isi.',
            'email.email' => 'Format email wajib di tulis.',
            'email.unique' => 'Email sudah di pakai.',
            'password.unique' => 'Password wajib di isi.',
            'password.min' => 'Password minimal 8 digit.',
            'role.required' => 'Role wajib di isi pilih.',
            'kantin.required' => 'Jika admin kantin wajib di pilih.'
        ]);
        if($dataValidasi->fails()){
        return redirect()->route('Superadmin.Akun')->withErrors($dataValidasi)->withInput();
        }
        $newData = new User;
        $newData->nama = $request->nama;
        $newData->email = $request->email;
        $newData->password = $request->password;
        $newData->role = $request->role;
        $newData->id_kantin = $request->kantin;
        $newData->save();
        Alert::success('Berhasil', 'Akun berhasil di tambahkan');
        return redirect()->back();
    }

    public function edit(Request $request,$id) {
        $data = User::find($id);
        $data ->nama=$request->nama;
        $data ->email=$request->email;
        $data ->role=$request->role;
        $data->save();
        Alert::success('success', 'Akun berhasil diperbarui');
        return redirect()->route('Superadmin.Akun');
    }

    public function hapus($id) {
        $data = User::find($id);
        $data->delete();
        return response()->json(['success' => "Akun berhasil di hapus."]);
    }
}
