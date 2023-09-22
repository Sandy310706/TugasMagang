<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class KelolaakunAjaxController extends Controller
{
    public function index()
    {
        $data = User::orderBy('nama', 'asc');
        return DataTables::of($data)->addIndexColumn()->addColumn('aksi', function($data){
            return view('ajax.button', compact('data'));
        })->make('true');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => "required|max:100|min:3",
            'email' => "required|email:dns|unique:users",
            'password' => "required|min:7",
            'role' => 'required'
        ]);
        if($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        }else{
            $data = [
                'nama' => $request->nama,
                'email' => $request->email,
                'password' => $request->password,
                'role' => $request->role
            ];
            User::create($data);
            return response()->json(['success' => 'Akun Berhasil di tambahkan']);
        }
    }
    public function edit($id)
    {
        $data = User::where('id', $id)->first();
        return response()->json(['result' => $data]);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nama' => "max:100|min:3",
            'email' => "email:dns|unique:users",
        ],
        [
            'nama.max' => 'Maximal 100 digit untuk mengisi kolom Nama',
            'nama.min' => 'Minimal 3 digit untuk mengisi kolom Nama',
            'email.email' => 'Format email wajib di tulis',
            'email.unique' => 'Email Sudah di pakai',
        ]);
        if($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        }else{
            $data = [
                'nama' => $request->nama,
                'email' => $request->email,
                'role' => $request->role
            ];
            User::where('id', $id)->update($data);
            return response()->json(['success' => 'Akun berhasil di Edit']);
        }
    }
    public function delete($id)
    {
        User::where('id', $id)->delete();
    }

}
