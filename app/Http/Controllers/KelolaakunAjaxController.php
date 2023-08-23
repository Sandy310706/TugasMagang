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
        return "Berhasil";
    }
}
