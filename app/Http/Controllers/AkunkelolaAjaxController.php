<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class AkunkelolaAjaxController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = User::orderBy('nama', 'asc');
        return DataTables::of($data)->addIndexColumn()->addColumn('aksi', function($data){
            return view('ajax.button', compact('data'));
        })->make('true');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => "required|max:100|min:3",
            'email' => "required|email:dns|unique:users",
            'password' => "required|min:7",
            'role' => 'required'
        ],
        [   'nama.required' => 'Nama wajib di isi',
            'nama.max' => 'Maximal 100 digit untuk mengisi kolom Nama',
            'nama.min' => 'Minimal 3 digit untuk mengisi kolom Nama',
            'email.required' => 'Email wajib di isi',
            'email.email' => 'Format email wajib di tulis',
            'email.unique' => 'Email Sudah di pakai',
            'password.required' => 'Password wajib di isi',
            'password.min' => 'Minimal 7 digit untuk mengisi kolom Password',
            'role.required' => 'Role wajib di pilih'
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
            return response()->json(['success' => 'Berhasil']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        User::find($id);
        return 'ok';
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'nama' => "required|max:100|min:3",
            'email' => "required|email:dns|unique:users",
            'role' => 'required'
        ],
        [   'nama.required' => 'Nama wajib di isi',
            'nama.max' => 'Maximal 100 digit untuk mengisi kolom Nama',
            'nama.min' => 'Minimal 3 digit untuk mengisi kolom Nama',
            'email.required' => 'Email wajib di isi',
            'email.email' => 'Format email wajib di tulis',
            'email.unique' => 'Email Sudah di pakai',
            'role.required' => 'Role wajib di pilih'
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
            return response()->json(['success' => 'Berhasil']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
