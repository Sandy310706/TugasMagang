<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

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
        $validator = $request->validate([
            'nama' => 'required',
            'email' => ['required', 'email:dns', 'unique:users'],
            'password' => 'required',
            'role' => 'required'
        ]);

        User::create($validator);
    }
    public function update(Request $request, String $id)
    {

    }
}
