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
            return DataTables::eloquent(User::with('kantin')->select('users.*'))
            ->addColumn('nama_kantin', function($kantin){
                return $kantin->kantin ? $kantin->kantin->namaKantin : 'Bukan admin';
            })->addIndexColumn()
            ->addColumn('action', function($row){
                return view('layouts.superadmin.button', compact('row'));
            })->rawColumns(['action'])->make(true);
        }
    }

    public function tambah(Request $request)
    {
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
            'password.required' => 'Kolom password wajib di isi.',
            'email.required' => 'Kolom email wajib di isi.',
            'role.required' => 'Role wajib di isi pilih.',
            'kantin.required' => 'Jika admin kantin wajib di pilih.'
        ]);
        if($dataValidasi->fails()){
        return response()->json(['errors' => $dataValidasi->errors()], 422);
        }
        $newData = new User;
        $newData->nama = $request->nama;
        $newData->email = $request->email;
        $newData->password = $request->password;
        $newData->role = $request->role;
        $newData->id_kantin = $request->kantin;
        $newData->save();
        return response()->json(['success', 'Berhasil menambahkan user baru']);
    }

    public function edit($id)
    {
        $data = User::where('id', $id)->with('kantin')->first();
        return response()->json($data);
    }

    public function update(Request $request,$id)
    {
        $data = User::find($id);
        $data ->nama=$request->nama;
        $data ->email=$request->email;
        $data ->role=$request->role;
        $data->save();
        return response()->json(['success' => 'Data User berhasil di update.']);
    }

    public function hapus($id) {
        $data = User::find($id);
        $data->delete();
        return response()->json(['success' => "Akun berhasil di hapus."]);
    }
}
